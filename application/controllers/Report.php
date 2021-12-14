<?php
defined('BASEPATH') or exit('No direct script access allowed');
require('vendor/autoload.php');

use PhpOffice\PhpSpreadsheet\Helper\Sample;
use PhpOffice\PhpSpreadsheet\IOFactory;
use PhpOffice\PhpSpreadsheet\Spreadsheet;

class Report extends CI_Controller
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
        $data['admin'] = $this->db->get('user')->result_array();
        $data['title'] = 'Export Laporan';
        $this->load->view('templates/header', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('export/index', $data);
        $this->load->view('templates/footer');
    }

    public function export()
    {
        $masuk = $this->input->post('masuk');
        $keluar = $this->input->post('keluar');
        if ($masuk && $keluar) {
            $query = "SELECT * FROM `alumni` WHERE `tahun_masuk` = '$masuk' AND `tahun_keluar` = '$keluar'";
        } else if ($masuk) {
            $query = "SELECT * FROM `alumni` WHERE `tahun_masuk` = '$masuk'";
        } else if ($keluar) {
            $query = "SELECT * FROM `alumni` WHERE `tahun_keluar` = '$keluar'";
        } else {
            $query = "SELECT * FROM `alumni`";
        }
        $data['admin'] = $this->db->query($query)->result_array();
        $data['masuk'] = $masuk;
        $data['keluar'] = $keluar;
        if ($this->input->post('excel')) {

            $excel = new Spreadsheet();
            $excel->getProperties()->setCreator('MII Banyuurip');
            $excel->getProperties()->setLastModifiedBy('MII Banyuurip');

            $excel->setActiveSheetIndex(0);

            if ($masuk) {
                $excel->getActiveSheet()->setCellValue('A1', 'Tahun Masuk :');
            }
            if ($keluar) {
                $excel->getActiveSheet()->setCellValue('A2', 'Tahun Lulus :');
            }
            $excel->getActiveSheet()->setCellValue('A4', 'No. ');
            $excel->getActiveSheet()->setCellValue('B4', 'NIS');
            $excel->getActiveSheet()->setCellValue('C4', 'Nama Lengkap');
            $excel->getActiveSheet()->setCellValue('D4', 'Jenis Kelamin');
            $excel->getActiveSheet()->setCellValue('E4', 'Tempat Lahir');
            $excel->getActiveSheet()->setCellValue('F4', 'Tanggal Lahir');
            $excel->getActiveSheet()->setCellValue('G4', 'Alamat');
            $excel->getActiveSheet()->setCellValue('H4', 'Nama Ayah');
            $excel->getActiveSheet()->setCellValue('I4', 'Nama Ibu');
            $excel->getActiveSheet()->setCellValue('J4', 'Tanggal Input');
            if (!$masuk) {
                $excel->getActiveSheet()->setCellValue('K4', 'Tahun Masuk');
            }
            if (!$keluar) {
                $excel->getActiveSheet()->setCellValue('L4', 'Tahun Keluar');
            }

            $baris = 5;
            $no = 1;

            foreach ($data['admin'] as $a) {
                if ($masuk) {
                    $excel->getActiveSheet()->setCellValue('B1', $a['tahun_masuk']);
                }
                if ($keluar) {
                    $excel->getActiveSheet()->setCellValue('B2', $a['tahun_keluar']);
                }
                $excel->getActiveSheet()->setCellValue('A' . $baris, $no++);
                $excel->getActiveSheet()->setCellValue('B' . $baris, $a['nis']);
                $excel->getActiveSheet()->setCellValue('C' . $baris, $a['nama']);
                $excel->getActiveSheet()->setCellValue('D' . $baris, $a['jns_kel']);
                $excel->getActiveSheet()->setCellValue('E' . $baris, $a['tempat_lahir']);
                $excel->getActiveSheet()->setCellValue('F' . $baris, $a['tgl_lahir']);
                $excel->getActiveSheet()->setCellValue('G' . $baris, $a['alamat']);
                $excel->getActiveSheet()->setCellValue('H' . $baris, $a['nama_ayah']);
                $excel->getActiveSheet()->setCellValue('I' . $baris, $a['nama_ibu']);
                $excel->getActiveSheet()->setCellValue('J' . $baris, $a['tgl_input']);
                if (!$masuk) {
                    $excel->getActiveSheet()->setCellValue('K' . $baris, $a['tahun_masuk']);
                }
                if (!$keluar) {
                    $excel->getActiveSheet()->setCellValue('L' . $baris, $a['tahun_keluar']);
                }

                $baris++;
                if ($masuk && $keluar) {
                    $filename = $a['tahun_masuk'] . ' - ' . $a['tahun_keluar'] . ' - MII Banyuurip 01.xlsx';
                    $excel->getProperties()->setTitle($a['tahun_masuk'] . ' - ' . $a['tahun_keluar']);
                } else if ($masuk) {
                    $filename = $a['tahun_masuk'] . ' - MII Banyuurip 01.xlsx';
                    $excel->getProperties()->setTitle($a['tahun_masuk']);
                } else if ($keluar) {
                    $filename = $a['tahun_keluar'] . ' - MII Banyuurip 01.xlsx';
                    $excel->getProperties()->setTitle($a['tahun_keluar']);
                } else {
                    $filename = 'Alumni MII Banyuurip 01.xlsx';
                    $excel->getProperties()->setTitle('MII Banyuurip 01');
                }
            }

            ob_clean();
            header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
            header('Content-Disposition: attachment;filename="' . $filename . '"');
            header('Cache-Control: max-age=0');

            $writer = IOFactory::createWriter($excel, 'Xlsx');
            $writer->save('php://output');
        } else if ($this->input->post('pdf')) {
            $html = $this->load->view('pdf', $data, true);
            // $html = $this->output->get_output();
            $filename = 'Alumni MII Banyuurip 01';
            $this->dompdf_gen->generate($html, $filename, true, 'A4', 'portrait');
        }
    }
}
