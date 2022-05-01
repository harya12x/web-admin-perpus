<?php
header('Access-Control-Allow-Origin: *');
header("Access-Control-Allow-Methods: GET, OPTIONS");
defined('BASEPATH') or exit('No direct script access allowed');

class Api extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('M_Perpus');
    }

    public function index()
    {
        $status = array(
            'status' => 'Data Berhasil'
        );
        echo json_encode($status);
    }

    public function GetData()
    {
        $query = $this->M_Perpus->GetDataJoinWhere("buku")->result();
        echo json_encode($query);
    }

    public function GetDataPeminjam()
    {
        $query = $this->M_Perpus->GetDataJoinPeminjam("peminjaman")->result();
        echo json_encode($query);
    }

    public function PostData()
    {
        $data = [
            'kd_anggota' => urldecode($this->uri->segment(3)),
            'kd_buku' => urldecode($this->uri->segment(4)),
            'jumlah_pinjam' => urldecode($this->uri->segment(5)),
            'tanggal_pinjam' => urldecode($this->uri->segment(6)),
        ];
        $input = $this->M_Perpus->AddData('peminjaman', $data);
        if ($input) {
            redirect('Perpus');;
        } else {
            echo "Error";
        }
    }
}
