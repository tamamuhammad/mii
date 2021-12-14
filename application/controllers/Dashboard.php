<?php
defined('BASEPATH') or exit('No direct script access allowed');
require 'vendor/autoload.php';

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Reader\Xlsx;

class Dashboard extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        is_logged();
        $this->load->model('Tablemodel');
    }

    public function index()
    {
        $email = $this->session->userdata('email');
        $data['user'] = $this->db->get_where('user', ['email' => $email])->row_array();
        $data['alumni'] = $this->db->count_all_results('alumni');
        $data['cowo'] = count($this->db->get_where('alumni', ['jns_kel' => 'Laki-Laki'])->result_array());
        $data['cewe'] = count($this->db->get_where('alumni', ['jns_kel' => 'Perempuan'])->result_array());
        $data['title'] = 'Dashboard';
        $this->load->view('templates/header', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('dashboard/index', $data);
        $this->load->view('templates/footer');
    }

    public function table()
    {
        $email = $this->session->userdata('email');
        $data['user'] = $this->db->get_where('user', ['email' => $email])->row_array();
        $data['alumni'] = $this->db->get('alumni')->result_array();

        $data['title'] = 'Tabel Alumni';
        $this->load->view('templates/header', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('dashboard/table', $data);
        $this->load->view('templates/footer');
    }


    public function tambah()
    {
        $email = $this->session->userdata('email');
        $data['user'] = $this->db->get_where('user', ['email' => $email])->row_array();
        $data['title'] = 'Tambah Data Alumni';
        $this->form_validation->set_rules('nis', 'NIS', 'required|numeric');
        $this->form_validation->set_rules('nama', 'Nama', 'required');
        $this->form_validation->set_rules('jeniskelamin', 'Jenis Kelamin', 'required');
        $this->form_validation->set_rules('ttl', 'Tempat Lahir', 'required');
        $this->form_validation->set_rules('tgl', 'Tanggal Lahir', 'required');
        $this->form_validation->set_rules('alamat', 'Alamat', 'required');
        $this->form_validation->set_rules('ayah', 'Nama Ayah', 'required');
        $this->form_validation->set_rules('ibu', 'Nama Ibu', 'required');

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('dashboard/tambah', $data);
            $this->load->view('templates/footer');
        } else {
            $data = [
                'nis' => $this->input->post('nis'),
                'nama' => $this->input->post('nama'),
                'jns_kel' => $this->input->post('jeniskelamin'),
                'tempat_lahir' => $this->input->post('ttl'),
                'tgl_lahir' => $this->input->post('tgl'),
                'alamat' => $this->input->post('alamat'),
                'nama_ayah' => $this->input->post('ayah'),
                'nama_ibu' => $this->input->post('ibu'),
                'tahun_masuk' => $this->input->post('masuk'),
                'tahun_keluar' => $this->input->post('keluar'),
                'tgl_input' => date('y-m-d'),
                'link_berkas' => $this->input->post('berkas')
            ];
            $this->db->insert('alumni', $data);
            $this->session->set_flashdata('message', 'Ditambahkan');
            redirect('dashboard/table');
        }
    }

    public function import()
    {
        $email = $this->session->userdata('email');
        $data['user'] = $this->db->get_where('user', ['email' => $email])->row_array();
        $data['title'] = 'Import Data Alumni';
        $this->load->view('templates/header', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('dashboard/import', $data);
        $this->load->view('templates/footer');
    }

    public function preview()
    {
        $email = $this->session->userdata('email');
        $data['user'] = $this->db->get_where('user', ['email' => $email])->row_array();
        $data['title'] = 'Import Data Alumni';
        $data['data4'] = [];
        $date = date('YmdHis');
        $filename = 'alumni-' . $date . ' .xlsx';

        if (is_file('tmp/' . $filename))
            unlink('tmp/' . $filename);

        $ext = pathinfo($_FILES['file']['name'], PATHINFO_EXTENSION);
        $tmp_file = $_FILES['file']['tmp_name'];

        if ($ext == 'xlsx') {
            move_uploaded_file($tmp_file, 'tmp/' . $filename);

            $reader = new Xlsx();
            $spreadsheet = $reader->load('tmp/' . $filename);
            $sheet = $spreadsheet->getActiveSheet()->toArray(null, true, true, true);
            $data['data1'] = "<form method='post' action='" . base_url('dashboard/store') . "'>";
            $data['data2'] = "<input type='hidden' name='namafile' value='" . $filename . "'>";
            $data['data3'] = "<table class='table table-striped table-responsive' id='dataTable' width='100%' cellspacing='0'>
                        <thead>
                            <tr>
                                <th>NIS</th>
                                <th>Nama</th>
                                <th>Jenis Kelamin</th>
                                <th>Tempat Lahir</th>
                                <th>Tanggal Lahir</th>
                                <th>Alamat</th>
                                <th>Nama Ayah</th>
                                <th>Nama Ibu</th>
                                <th>Tahun Masuk</th>
                                <th>Tahun Keluar</th>
                                <th>Link Berkas</th>
                            </tr>
                        </thead>
                        <tbody>";

            $numrow = 1;
            $kosong = 0;
            foreach ($sheet as $row) {
                $nis = $row['A'];
                $nama = $row['B'];
                $jns_kel = $row['C'];
                $tempat_lahir = $row['D'];
                $tgl_lahir = $row['E'];
                $alamat = $row['F'];
                $nama_ayah = $row['G'];
                $nama_ibu = $row['H'];
                $tahun_masuk = $row['I'];
                $tahun_keluar = $row['J'];
                $link_berkas = $row['K'];

                if ($nis == "" && $nama == "" && $jns_kel == "" && $tempat_lahir == "" && $tgl_lahir == "" && $alamat == "" && $nama_ayah == "" && $nama_ibu == "" && $tahun_masuk == "" && $tahun_keluar == "" && $link_berkas == "")
                    continue;

                if ($numrow > 1) {
                    $nis_td = (!empty($nis)) ? "" : " style='background: #E07171;'";
                    $nama_td = (!empty($nama)) ? "" : " style='background: #E07171;'";
                    $jk_td = (!empty($jns_kel)) ? "" : " style='background: #E07171;'";
                    $tempat_td = (!empty($tempat_lahir)) ? "" : " style='background: #E07171;'";
                    $tgl_td = (!empty($tgl_lahir)) ? "" : " style='background: #E07171;'";
                    $alamat_td = (!empty($alamat)) ? "" : " style='background: #E07171;'";
                    $ayah_td = (!empty($nama_ayah)) ? "" : " style='background: #E07171;'";
                    $ibu_td = (!empty($nama_ibu)) ? "" : " style='background: #E07171;'";
                    $masuk_td = (!empty($tahun_masuk)) ? "" : " style='background: #E07171;'";
                    $keluar_td = (!empty($tahun_keluar)) ? "" : " style='background: #E07171;'";
                    $berkas_td = (!empty($link_berkas)) ? "" : " style='background: #E07171;'";

                    if ($nis == "" or $nama == "" or $jns_kel == "" or $tempat_lahir == "" or $tgl_lahir == "" or $alamat == "" or $nama_ayah == "" or $nama_ibu == "" or $tahun_masuk == "" or $tahun_keluar == "" or $link_berkas == "") {
                        $kosong++;
                    }

                    $tabelnya = "<tr>
                                <td" . $nis_td . ">" . $nis . "</td>
                                <td" . $nama_td . ">" . $nama . "</td>
                                <td" . $jk_td . ">" . $jns_kel . "</td>
                                <td" . $tempat_td . ">" . $tempat_lahir . "</td>
                                <td" . $tgl_td . ">" . $tgl_lahir . "</td>
                                <td" . $alamat_td . ">" . $alamat . "</td>
                                <td" . $ayah_td . ">" . $nama_ayah . "</td>
                                <td" . $ibu_td . ">" . $nama_ibu . "</td>
                                <td" . $masuk_td . ">" . $tahun_masuk . "</td>
                                <td" . $keluar_td . ">" . $tahun_keluar . "</td>
                                <td" . $berkas_td . ">" . $link_berkas . "</td>
                            </tr>";

                    array_push($data['data4'], $tabelnya);
                }

                $numrow++;
            }

            $data['data5'] = "</tbody>
                </table>";

            if ($kosong > 0) {
                $data['data6'] = "<div id='kosong' style='color: red;margin-bottom: 10px;'>" . $kosong . " data belum diisi</div>";
            } else {
                $data['data6'] = "<hr>
                        <button type='submit' class='btn btn-success float-right'><i class='fas fa-table mr-2'></i>Import</button>";
            }

            $data['data7'] = "</form>";
        } else {
            $data['data1'] = "<div style='color: red;margin-bottom: 10px;'>Hanya File Excel (.xlsx) yang diperbolehkan</div>";
        }
        $this->load->view('templates/header', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('dashboard/preview', $data);
        $this->load->view('templates/footer');
    }

    public function store()
    {
        $filename = $_POST['namafile'];
        $path = 'tmp/' . $filename;

        $reader = new Xlsx();
        $spreadsheet = $reader->load($path);
        $sheet = $spreadsheet->getActiveSheet()->toArray(null, true, true, true);

        $numrow = 1;
        foreach ($sheet as $row) {
            $nis = $row['A'];
            $nama = $row['B'];
            $jns_kel = $row['C'];
            $tempat_lahir = $row['D'];
            $tgl_lahir = explode('-', $row['E']);
            $tgl_lahir = $tgl_lahir[2] . '-' . $tgl_lahir[1] . '-' . $tgl_lahir[0];
            $alamat = $row['F'];
            $nama_ayah = $row['G'];
            $nama_ibu = $row['H'];
            $tahun_masuk = $row['I'];
            $tahun_keluar = $row['J'];
            $link_berkas = $row['K'];

            if ($nis == "" && $nama == "" && $jns_kel == "" && $tempat_lahir == "" && $tgl_lahir == "" && $alamat == "" && $nama_ayah == "" && $nama_ibu == "" && $tahun_masuk == "" && $tahun_keluar == "" && $link_berkas == "")
                continue;

            if ($numrow > 1) {
                $data = [
                    'nis' => $nis,
                    'nama' => $nama,
                    'jns_kel' => $jns_kel,
                    'tempat_lahir' => $tempat_lahir,
                    'tgl_lahir' => $tgl_lahir,
                    'alamat' => $alamat,
                    'nama_ayah' => $nama_ayah,
                    'nama_ibu' => $nama_ibu,
                    'tahun_masuk' => $tahun_masuk,
                    'tahun_keluar' => $tahun_keluar,
                    'tgl_input' => date('y-m-d'),
                    'link_berkas' => $link_berkas
                ];
                $this->db->insert('alumni', $data);
            }

            $numrow++;
        }

        unlink($path);
        $this->session->set_flashdata('message', 'Ditambahkan');
        redirect('dashboard/table');
    }

    public function detail($id)
    {
        $email = $this->session->userdata('email');
        $data['user'] = $this->db->get_where('user', ['email' => $email])->row_array();
        $data['alumni'] = $this->db->get_where('alumni', ['id' => $id])->row_array();
        $data['title'] = 'Detail ' . $data['alumni']['nama'];
        $this->load->view('templates/header', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('dashboard/detail', $data);
        $this->load->view('templates/footer');
    }

    public function edit($id)
    {
        $email = $this->session->userdata('email');
        $data['user'] = $this->db->get_where('user', ['email' => $email])->row_array();
        $data['alumni'] = $this->db->get_where('alumni', ['id' => $id])->row_array();
        $data['title'] = 'Edit ' . $data['alumni']['nama'];
        $this->form_validation->set_rules('nis', 'NIS', 'required|numeric');
        $this->form_validation->set_rules('nama', 'Nama', 'required');
        $this->form_validation->set_rules('jeniskelamin', 'Jenis Kelamin', 'required');
        $this->form_validation->set_rules('ttl', 'Tempat Lahir', 'required');
        $this->form_validation->set_rules('tgl', 'Tanggal Lahir', 'required');
        $this->form_validation->set_rules('alamat', 'Alamat', 'required');
        $this->form_validation->set_rules('ayah', 'Nama Ayah', 'required');
        $this->form_validation->set_rules('ibu', 'Nama Ibu', 'required');

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('dashboard/edit', $data);
            $this->load->view('templates/footer');
        } else {
            $data = [
                'nis' => $this->input->post('nis'),
                'nama' => $this->input->post('nama'),
                'jns_kel' => $this->input->post('jeniskelamin'),
                'tempat_lahir' => $this->input->post('ttl'),
                'tgl_lahir' => $this->input->post('tgl'),
                'alamat' => $this->input->post('alamat'),
                'nama_ayah' => $this->input->post('ayah'),
                'nama_ibu' => $this->input->post('ibu'),
                'tahun_masuk' => $this->input->post('masuk'),
                'tahun_keluar' => $this->input->post('keluar'),
                'tgl_input' => $data['alumni']['tgl_input'],
                'link_berkas' => $this->input->post('berkas')
            ];
            $this->db->set($data);
            $this->db->where('id', $id);
            $this->db->update('alumni');
            $this->session->set_flashdata('message', 'Diedit');
            redirect('dashboard/table');
        }
    }

    public function hapus($id)
    {
        $this->db->where('id', $id);
        $this->db->delete('alumni');
        $this->session->set_flashdata('message', 'Dihapus');
        redirect('dashboard/table');
    }

    public function konten()
    {
        $email = $this->session->userdata('email');
        $data['user'] = $this->db->get_where('user', ['email' => $email])->row_array();
        $data['konten'] = $this->db->get('konten')->result_array();
        $data['title'] = 'Daftar Konten';
        $this->load->view('templates/header', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('dashboard/konten', $data);
        $this->load->view('templates/footer');
    }

    public function editK($id)
    {
        $email = $this->session->userdata('email');
        $data['user'] = $this->db->get_where('user', ['email' => $email])->row_array();
        $data['konten'] = $this->db->get_where('konten', ['id' => $id])->row_array();
        $data['title'] = 'Edit ' . $data['konten']['judul_konten'];
        $this->form_validation->set_rules('judul', 'Judul', 'required');
        $this->form_validation->set_rules('isi', 'Isi loker', 'required');

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('dashboard/editK', $data);
            $this->load->view('templates/footer');
        } else {
            $img = $_FILES['gambar']['name'];

            if ($img) {
                $config['allowed_types'] = 'jpg|png|gif';
                $config['max_size'] = '2048';
                $config['upload_path'] = './assets/img/konten/';

                $this->load->library('upload', $config);

                if ($this->upload->do_upload('gambar')) {
                    $newImage = $this->upload->data('file_name');
                } else {
                    echo $this->upload->display_errors();
                }
            } else {
                $newImage = $data['konten']['gambar'];
            }
            $data = [
                'judul_konten' => $this->input->post('judul'),
                'isi_konten' => $this->input->post('isi'),
                'gambar' => $newImage,
            ];
            $this->db->set($data);
            $this->db->where('id', $id);
            $this->db->update('konten');
            $this->session->set_flashdata('message', 'Diedit');
            redirect('dashboard/konten');
        }
    }

    public function galeri()
    {
        $email = $this->session->userdata('email');
        $data['user'] = $this->db->get_where('user', ['email' => $email])->row_array();
        $data['galeri'] = $this->db->get('galeri')->result_array();
        $data['title'] = 'Galeri';
        $this->load->view('templates/header', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('dashboard/galeri', $data);
        $this->load->view('templates/footer');
    }

    public function tambahF()
    {
        $img = $_FILES['gambar']['name'];

        if ($img) {
            $config['allowed_types'] = 'jpg|png|gif';
            $config['max_size'] = '2048';
            $config['upload_path'] = './assets/img/galeri/';

            $this->load->library('upload', $config);

            if ($this->upload->do_upload('gambar')) {
                $newImage = $this->upload->data('file_name');
            } else {
                echo $this->upload->display_errors();
            }
        }
        $data = [
            'nama_gambar' => $newImage,
            'gambar' => $this->input->post('nama'),
            'tgl' => date('y-m-d'),
        ];
        $this->db->insert('galeri', $data);
        $this->session->set_flashdata('message', 'Ditambah');
        redirect('dashboard/galeri');
    }

    public function hapusF($id)
    {
        $this->db->where('id', $id);
        $this->db->delete('galeri');
        $this->session->set_flashdata('message', 'Dihapus');
        redirect('dashboard/galeri');
    }

    public function profile()
    {
        $email = $this->session->userdata('email');
        $data['user'] = $this->db->get_where('user', ['email' => $email])->row_array();
        $data['sekolah'] = $this->db->get_where('sekolah', ['id' => 1])->row_array();
        $data['title'] = 'Profil Sekolah';
        $this->form_validation->set_rules('nama', 'Nama Sekolah', 'required');
        $this->form_validation->set_rules('slogan', 'Slogan', 'required');
        $this->form_validation->set_rules('email', 'Email', 'required');
        $this->form_validation->set_rules('telp', 'Telepon', 'required');
        $this->form_validation->set_rules('alamat', 'Alamat', 'required');
        $this->form_validation->set_rules('fb', 'Facebook', 'required');
        $this->form_validation->set_rules('link_fb', 'Link Facebook', 'required');
        $this->form_validation->set_rules('ig', 'Instagram', 'required');
        $this->form_validation->set_rules('link_ig', 'Link Instagram', 'required');
        $this->form_validation->set_rules('yt', 'Youtube', 'required');
        $this->form_validation->set_rules('link_yt', 'Link Youtube', 'required');

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('dashboard/profile', $data);
            $this->load->view('templates/footer');
        } else {
            $img = $_FILES['logo']['name'];

            if ($img) {
                $config['allowed_types'] = 'jpg|png|gif';
                $config['max_size'] = '2048';
                $config['upload_path'] = './assets/img/';

                $this->load->library('upload', $config);

                if ($this->upload->do_upload('logo')) {
                    $newImage = $this->upload->data('file_name');
                } else {
                    echo $this->upload->display_errors();
                }
            } else {
                $newImage = $data['sekolah']['logo'];
            }
            $data = [
                'nama_sekolah' => $this->input->post('nama'),
                'slogan' => $this->input->post('slogan'),
                'logo' => $newImage,
                'alamat' => $this->input->post('alamat'),
                'telp' => $this->input->post('telp'),
                'email' => $this->input->post('email'),
                'fb' => $this->input->post('fb'),
                'link_fb' => $this->input->post('link_fb'),
                'ig' => $this->input->post('ig'),
                'link_ig' => $this->input->post('link_ig'),
                'yt' => $this->input->post('yt'),
                'link_yt' => $this->input->post('link_yt')
            ];
            $this->db->set($data);
            $this->db->where('id', 1);
            $this->db->update('sekolah');
            $this->session->set_flashdata('message', 'Diedit');
            redirect('dashboard/profile');
        }
    }
}
