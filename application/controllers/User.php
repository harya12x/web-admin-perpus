<?php
defined('BASEPATH') or exit('No direct script access allowed');

class User extends CI_Controller
{
    public function hapus_data_pengarang($kd_pengarang)
    {
        $this->M_buku->hapus_data_pengarang($kd_pengarang);
        redirect('user/pengarang');
    }

    public function hapus_jenis_buku($kd_jenis_buku)
    {
        $this->M_buku->hapus_data_jenis_buku($kd_jenis_buku);
        redirect('user/jenis_buku');
    }

    public function hapus_data_anggota($kd_anggota)
    {
        $this->M_buku->hapus_data_anggota($kd_anggota);
        redirect('user/anggota');
    }

    public function hapus_data_penerbit($kd_penerbit)
    {
        $this->M_buku->hapus_data_penerbit($kd_penerbit);
        redirect('user/penerbit');
    }

    public function hapus_data_peminjam($kd_peminjaman)
    {
        $this->M_buku->hapus_data_penerbit($kd_peminjaman);
        redirect('user/data_peminjaman');
    }

    public function hapus_data_buku($kd_buku)
    {
        $this->M_buku->hapus_data_penerbit($kd_buku);
        redirect('user/databuku');
    }


    public function proses_edit_data_pengarang()
    {
        $this->M_buku->proses_edit_data_pengarang();

        redirect('user/pengarang');
    }

    public function edit_data_pengarang($kd_pengarang)
    {
        $data['title'] = 'Edit data';
        $data['user'] = $this->db->get_where('users', ['email' => $this->session->userdata('email')])->row_array();
        $data['pengarang'] = $this->M_buku->ambil_id_pengarang($kd_pengarang);

        $this->load->view('editdata/home', $data);
        $this->load->view('editdata/home_footer');
        $this->load->view('editdata/home_header', $data);
    }

    public function edit_data_anggota($kd_anggota)
    {
        $data['title'] = 'Edit data';
        $data['user'] = $this->db->get_where('users', ['email' => $this->session->userdata('email')])->row_array();
        $data['anggota'] = $this->M_buku->ambil_id_anggota($kd_anggota);

        $this->load->view('editdata/editanggota', $data);
        $this->load->view('editdata/home_footer');
        $this->load->view('editdata/home_header', $data);
    }

    public function proses_edit_data_anggota()
    {
        $this->M_buku->proses_edit_data_anggota();

        redirect('user/anggota');
    }

    public function edit_data_penerbit($kd_penerbit)
    {
        $data['title'] = 'Edit data';
        $data['user'] = $this->db->get_where('users', ['email' => $this->session->userdata('email')])->row_array();
        $data['penerbit'] = $this->M_buku->ambil_id_penerbit($kd_penerbit);

        $this->load->view('editdata/editpenerbit', $data);
        $this->load->view('editdata/home_footer');
        $this->load->view('editdata/home_header', $data);
    }


    public function edit_data_jenis_buku($kd_jenis_buku)
    {
        $data['title'] = 'Edit data';
        $data['user'] = $this->db->get_where('users', ['email' => $this->session->userdata('email')])->row_array();
        $data['jenis_buku'] = $this->M_buku->ambil_id_jenis_buku($kd_jenis_buku);

        $this->load->view('editdata/editjenisbuku', $data);
        $this->load->view('editdata/home_footer');
        $this->load->view('editdata/home_header', $data);
    }

    public function proses_edit_data_buku()
    {
        $this->M_buku->proses_edit_data_buku();

        redirect('user/databuku');
    }

    public function edit_data_buku($kd_buku)
    {
        $data['title'] = 'Edit data';
        $data['user'] = $this->db->get_where('users', ['email' => $this->session->userdata('email')])->row_array();
        $data['buku'] = $this->M_buku->ambil_id_buku($kd_buku);

        $this->load->view('editdata/editbuku', $data);
        $this->load->view('editdata/home_footer');
        $this->load->view('editdata/home_header', $data);
    }

    public function edit_data_peminjam($kd_peminjaman)
    {
        $data['title'] = 'Edit data';
        $data['user'] = $this->db->get_where('users', ['email' => $this->session->userdata('email')])->row_array();
        $data['peminjaman'] = $this->M_buku->ambil_id_peminjaman($kd_peminjaman);

        $this->load->view('editdata/editpeminjam', $data);
        $this->load->view('editdata/home_footer');
        $this->load->view('editdata/home_header', $data);
    }

    public function proses_edit_data_peminjaman()
    {
        $this->M_buku->proses_edit_data_peminjaman();

        redirect('user/data_peminjam');
    }

    public function proses_edit_data_jenis_buku()
    {
        $this->M_buku->proses_edit_data_jenis_buku();

        redirect('user/jenis_buku');
    }

    public function proses_tambah_jenis_buku()
    {
        $this->M_buku->proses_tambah_jenis_buku();

        redirect('user/jenis_buku');
    }

    public function proses_tambah_data_peminjam()
    {
        $this->M_buku->proses_tambah_data_peminjam();

        redirect('user/data_peminjaman');
    }

    public function proses_tambah_data_penerbit()
    {
        $this->M_buku->proses_tambah_data_penerbit();

        redirect('user/penerbit');
    }

    public function proses_tambah_data_anggota()
    {
        $this->M_buku->proses_tambah_data_anggota();

        redirect('user/anggota');
    }

    public function proses_tambah_data()
    {
        $this->M_buku->proses_tambah_data();

        redirect('user/databuku');
    }


    public function proses_tambah_data_pengarang()
    {
        $this->M_buku->proses_tambah_data_pengarang();

        redirect('user/pengarang');
    }


    public function index()
    {
        $data['title'] = 'Halaman Administrator';
        $this->load->view('user/home_header', $data);
        $data['user'] = $this->db->get_where('users', ['email' => $this->session->userdata('email')])->row_array();


        $this->load->view('user/home', $data);
        $this->load->view('templates/auth_footer');
    }

    public function jenis_buku()
    {
        $data['jenis_buku'] = $this->M_buku->jenisbuku();
        $data['title'] = 'Data Jenis Buku';
        $data['user'] = $this->db->get_where('users', ['email' => $this->session->userdata('email')])->row_array();

        $this->load->view('datajenisbuku/home', $data);
        $this->load->view('datajenisbuku/home_footer');
        $this->load->view('datajenisbuku/home_header', $data);
    }

    public function pengarang()
    {
        $data['pengarang'] = $this->M_buku->pengarang();
        $data['title'] = 'Data Pengarang Buku';
        $data['user'] = $this->db->get_where('users', ['email' => $this->session->userdata('email')])->row_array();

        $this->load->view('datapengarang/home', $data);
        $this->load->view('datapengarang/home_footer');
        $this->load->view('datapengarang/home_header', $data);
    }

    public function penerbit()
    {
        $data['penerbit'] = $this->M_buku->penerbit();
        $data['title'] = 'Data Penerbit Buku';
        $data['user'] = $this->db->get_where('users', ['email' => $this->session->userdata('email')])->row_array();

        $this->load->view('datapenerbit/home', $data);
        $this->load->view('datapenerbit/home_footer');
        $this->load->view('datapenerbit/home_header', $data);
    }

    public function anggota()
    {
        $data['anggota'] = $this->M_buku->member();
        $data['title'] = 'Data Anggota';
        $data['user'] = $this->db->get_where('users', ['email' => $this->session->userdata('email')])->row_array();

        $this->load->view('datamember/home', $data);
        $this->load->view('datamember/home_footer');
        $this->load->view('datamember/home_header', $data);
    }

    public function data_peminjaman()
    {
        $data['peminjaman'] = $this->M_buku->peminjam();
        $data['title'] = 'Data Peminjaman';
        $data['user'] = $this->db->get_where('users', ['email' => $this->session->userdata('email')])->row_array();

        $this->load->view('datapeminjam/home', $data);
        $this->load->view('datapeminjam/home_footer');
        $this->load->view('datapeminjam/home_header', $data);
    }

    public function databuku()
    {
        $data['buku'] = $this->M_buku->getData();
        $data['title'] = 'Data Buku';
        $data['user'] = $this->db->get_where('users', ['email' => $this->session->userdata('email')])->row_array();

        $this->load->view('databuku/home', $data);
        $this->load->view('databuku/home_footer');
        $this->load->view('databuku/home_header', $data);
    }
}
