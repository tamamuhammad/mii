<?php
defined('BASEPATH') or exit('No direct script access allowed');
require 'vendor/autoload.php';

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Reader\Xlsx;

class Home extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Tablemodel');
    }

    public function index()
    {
        $data['alumni'] = $this->db->get('alumni')->result_array();
        $data['sekolah'] = $this->db->get_where('sekolah', ['id' => 1])->row_array();
        $data['sejarah'] = $this->db->get_where('konten', ['id' => 1])->row_array();
        $data['sambutan'] = $this->db->get_where('konten', ['id' => 2])->row_array();
        $data['galeri'] = $this->db->get('galeri')->result_array();
        $data['title'] = 'MI Islamiyah Banyuurip 01';
        $this->load->view('index', $data);
    }
}
