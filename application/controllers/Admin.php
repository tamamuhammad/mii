<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        is_logged();
    }

    public function index()
    {
        $email = $this->session->userdata('email');
        $data['user'] = $this->db->get_where('user', ['email' => $email])->row_array();
        $data['petugas'] = $this->db->get('user')->result_array();
        $data['title'] = 'Data Petugas';
        $this->load->view('templates/header', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('admin/index', $data);
        $this->load->view('templates/footer');
    }

    public function signup()
    {
        $email = $this->session->userdata('email');
        $data['user'] = $this->db->get_where('user', ['email' => $email])->row_array();
        $data['title'] = 'Register Petugas';

        $this->form_validation->set_rules('name', 'Nama', 'required|trim');
        $this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email|is_unique[user.email]');
        $this->form_validation->set_rules('password1', 'Password', 'required|trim|matches[password2]|min_length[6]');
        $this->form_validation->set_rules('password2', 'Repeat Password', 'required|trim|matches[password1]');

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('admin/signup');
            $this->load->view('templates/footer');
        } else {
            $this->_signup();
        }
    }

    private function _signup()
    {
        $email = $this->input->post('email', true);
        $data = [
            'nama' => htmlspecialchars($this->input->post('name', true)),
            'email' => htmlspecialchars($email),
            'password' => password_hash($this->input->post('password1'), PASSWORD_DEFAULT),
            'gambar' => 'default.jpg',
            'role' => 2,
            'dibuat' => time()
        ];
        $this->db->insert('user', $data);
        $this->session->set_flashdata('message', 'Ditambahkan');
        redirect('admin');
    }

    public function detail($id)
    {
        $email = $this->session->userdata('email');
        $data['user'] = $this->db->get_where('user', ['email' => $email])->row_array();
        $data['petugas'] = $this->db->get_where('user', ['id' => $id])->row_array();
        $role = $data['petugas']['role'];
        $data['role'] = $this->db->get_where('user_role', ['id' => $role])->row_array();
        $data['title'] = 'Detail ' . $data['petugas']['nama'];
        $this->load->view('templates/header', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('admin/detail', $data);
        $this->load->view('templates/footer');
    }

    public function hapus($id)
    {
        $this->db->where('id', $id);
        $this->db->delete('user');
        $this->session->set_flashdata('message', 'Dihapus');
        redirect('admin');
    }

    public function edit($id)
    {
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['admin'] = $this->db->get_where('user', ['id' => $id])->row_array();
        $data['title'] = 'Edit ' . $data['admin']['nama'];
        $this->form_validation->set_rules('name', 'Full Name', 'required|trim');

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('admin/edit', $data);
            $this->load->view('templates/footer');
        } else {
            $name = $this->input->post('name');
            $email = $this->input->post('email');

            $img = $_FILES['gambar']['name'];

            if ($img) {
                $config['allowed_types'] = 'jpg|png|gif|jpeg';
                $config['max_size'] = '2048';
                $config['upload_path'] = './assets/img/';

                $this->load->library('upload', $config);

                if ($this->upload->do_upload('gambar')) {
                    $data = $this->upload->data();
                    $oldgambar = $data['admin']['gambar'];
                    if ($oldgambar != 'default.jpg') {
                        unlink(FCPATH . 'assets/img/' . $oldgambar);
                    }
                    $config['image_library'] = 'gd2';
                    $config['width'] = '480';
                    $config['height'] = '480';
                    $config['x_axis'] = '480';
                    $config['y_axis'] = '480';
                    $this->load->library('image_lib', $config);
                    $this->image_lib->crop();
                    $config['new_image'] = './assets/img/' . $data['file_name'];
                    $newgambar = $data['file_name'];
                    $this->db->set('gambar', $newgambar);
                } else {
                    echo $this->upload->display_errors();
                }
            }
            $this->db->set('nama', $name);
            $this->db->where('id', $id);
            $this->db->update('user');
            $this->session->set_flashdata('message', 'Diubah');
            redirect('admin');
        }
    }

    public function role()
    {
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['title'] = 'Role Management';
        $data['role'] = $this->db->get('user_role')->result_array();
        $this->load->view('templates/header', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('admin/role', $data);
        $this->load->view('templates/footer');
    }

    public function tambahRole()
    {
        $role = [
            'role' => $this->input->post('role')
        ];
        $this->db->insert('user_role', $role);
        $this->session->set_flashdata('message', 'Ditambahkan');
        redirect('admin/role');
    }

    public function hapusRole($id)
    {
        $this->db->delete('user_role', ['id' => $id]);
        $this->session->set_flashdata('message', 'Dihapus');
        redirect('admin/role');
    }

    public function ambilrole()
    {
        echo json_encode($this->db->get_where('user_role', ['id' => $this->input->post('id')])->row_array());
    }

    public function editRole($id)
    {
        $role = [
            'role' => $this->input->post('role')
        ];
        $this->db->set($role);
        $this->db->where('id', $id);
        $this->db->update('user_role');
        $this->session->set_flashdata('message', 'Diubah');
        redirect('admin/role');
    }

    public function roleAccess($role_id)
    {
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['role'] = $this->db->get_where('user_role', ['id' => $role_id])->row_array();
        $data['title'] = $data['role']['role'] . ' Access';
        $data['menu'] = $this->db->get('user_menu')->result_array();
        $this->load->view('templates/header', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('admin/roleAccess', $data);
        $this->load->view('templates/footer');
    }

    public function changeAccess()
    {
        $role_id = $this->input->post('roleId');
        $menu_id = $this->input->post('menuId');

        $data = [
            'role_id' => $role_id,
            'menu_id' => $menu_id
        ];

        $result = $this->db->get_where('user_access', $data)->num_rows();

        if ($result < 1) {
            $this->db->insert('user_access', $data);
        } else {
            $this->db->delete('user_access', $data);
        }
        $this->session->set_flashdata('message', 'Diubah');
    }
}
