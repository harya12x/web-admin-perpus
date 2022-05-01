<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_buku extends CI_Model
{
    public function hapus_data_pengarang($kd_pengarang)
    {
        $this->db->where('kd_pengarang', $kd_pengarang);
        $this->db->delete('pengarang');
    }

    public function hapus_data_jenis_buku($kd_jenis_buku)
    {
        $this->db->where('kd_jenis_buku', $kd_jenis_buku);
        $this->db->delete('jenis_buku');
    }

    public function hapus_data_anggota($kd_anggota)
    {
        $this->db->where('kd_anggota', $kd_anggota);
        $this->db->delete('anggota');
    }

    public function hapus_data_penerbit($kd_penerbit)
    {
        $this->db->where('kd_penerbit', $kd_penerbit);
        $this->db->delete('penerbit');
    }

    public function hapus_data_peminjam($kd_peminjaman)
    {
        $this->db->where('kd_peminjaman', $kd_peminjaman);
        $this->db->delete('peminjaman');
    }

    public function hapus_data_buku($kd_buku)
    {
        $this->db->where('kd_buku', $kd_buku);
        $this->db->delete('buku');
    }

    public function getData()
    {

        return $this->db->get('buku')->result_array();
    }



    public function proses_tambah_data()
    {
        $data = [
            "kd_buku" => $this->input->post('kd_buku'),
            "judul" => $this->input->post('judul'),
            "kd_jenis_buku" => $this->input->post('kd_jenis_buku'),
            "kd_penerbit" => $this->input->post('kd_penerbit'),
            "kd_pengarang" => $this->input->post('kd_pengarang'),
            "stok" => $this->input->post('stok'),
        ];

        $this->db->insert('buku', $data);
    }
    public function ambil_id_buku($kd_buku)
    {
        return $this->db->get_where('buku', ['kd_buku' => $kd_buku])->row_array();
    }
    public function proses_edit_data_buku()
    {
        $data = [
            "kd_buku" => $this->input->post('kd_buku'),
            "judul" => $this->input->post('judul'),
            "kd_jenis_buku" => $this->input->post('kd_jenis_buku'),
            "kd_penerbit" => $this->input->post('kd_penerbit'),
            "kd_pengarang" => $this->input->post('kd_pengarang'),
            "stok" => $this->input->post('stok'),
        ];
        $this->db->where('kd_buku', $this->input->post('kd_buku'));
        $this->db->update('buku', $data);
    }



    public function member()
    {
        return $this->db->get('anggota')->result_array();
    }
    public function proses_tambah_data_anggota()
    {
        $data = [
            "nama" => $this->input->post('nama'),
        ];

        $this->db->insert('anggota', $data);
    }
    public function ambil_id_anggota($kd_anggota)
    {
        return $this->db->get_where('anggota', ['kd_anggota' => $kd_anggota])->row_array();
    }
    public function proses_edit_data_anggota()
    {
        $data = [
            "nama" => $this->input->post('nama'),
        ];
        $this->db->where('kd_anggota', $this->input->post('kd_anggota'));
        $this->db->update('anggota', $data);
    }





    public function penerbit()
    {
        return $this->db->get('penerbit')->result_array();
    }
    public function proses_tambah_data_penerbit()
    {
        $data = [
            "nama" => $this->input->post('nama'),
        ];

        $this->db->insert('penerbit', $data);
    }
    public function ambil_id_penerbit($kd_penerbit)
    {
        return $this->db->get_where('penerbit', ['kd_penerbit' => $kd_penerbit])->row_array();
    }
    public function proses_edit_data_penerbit()
    {
        $data = [
            "nama" => $this->input->post('nama'),
        ];
        $this->db->where('kd_penerbit', $this->input->post('kd_penerbit'));
        $this->db->update('penerbit', $data);
    }





    public function jenisbuku()
    {
        return $this->db->get('jenis_buku')->result_array();
    }
    public function proses_tambah_jenis_buku()
    {
        $data = [
            "nama" => $this->input->post('nama'),
        ];

        $this->db->insert('jenis_buku', $data);
    }
    public function ambil_id_jenis_buku($kd_jenis_buku)
    {
        return $this->db->get_where('jenis_buku', ['kd_jenis_buku' => $kd_jenis_buku])->row_array();
    }
    public function proses_edit_data_jenis_buku()
    {
        $data = [
            "nama" => $this->input->post('nama'),
        ];
        $this->db->where('kd_jenis_buku', $this->input->post('kd_jenis_buku'));
        $this->db->update('jenis_buku', $data);
    }







    public function peminjam()
    {
        return $this->db->get('peminjaman')->result_array();
    }
    public function proses_tambah_data_peminjam()
    {
        $data = [
            "kd_peminjaman" => $this->input->post('kd_peminjaman'),
            "kd_anggota" => $this->input->post('kd_anggota'),
            "kd_buku" => $this->input->post('kd_buku'),
            "jumlah_pinjam" => $this->input->post('jumlah_pinjam'),
            "tanggal_pinjam" => $this->input->post('tanggal_pinjam'),
        ];

        $this->db->insert('peminjaman', $data);
    }
    public function ambil_id_peminjaman($kd_peminjaman)
    {
        return $this->db->get_where('peminjaman', ['kd_peminjaman' => $kd_peminjaman])->row_array();
    }
    public function proses_edit_data_peminjaman()
    {
        $data = [
            "jumlah_pinjam" => $this->input->post('jumlah_pinjam'),
            "tanggal_pinjam" => $this->input->post('tanggal_pinjam'),
        ];
        $this->db->where('kd_peminjaman', $this->input->post('kd_peminjaman'));
        $this->db->update('peminjaman', $data);
    }






    public function pengarang()
    {
        return $this->db->get('pengarang')->result_array();
    }
    public function proses_tambah_data_pengarang()
    {
        $data = [
            "nama" => $this->input->post('nama'),
        ];

        $this->db->insert('pengarang', $data);
    }
    public function ambil_id_pengarang($kd_pengarang)
    {
        return $this->db->get_where('pengarang', ['kd_pengarang' => $kd_pengarang])->row_array();
    }
    public function proses_edit_data_pengarang()
    {
        $data = [
            "nama" => $this->input->post('nama'),
        ];
        $this->db->where('kd_pengarang', $this->input->post('kd_pengarang'));
        $this->db->update('pengarang', $data);
    }




    function GetDataJoinWhere($tbl1)
    {
        $this->db->select("buku.kd_buku, buku.judul, jenis_buku.nama AS JenisBuku, penerbit.nama AS PenerbitBuku, pengarang.nama AS PengarangBuku, buku.stok");
        $this->db->from($tbl1);
        $this->db->join(
            "jenis_buku",
            "jenis_buku.kd_jenis_buku = buku.kd_jenis_buku"
        );
        $this->db->join("penerbit", "penerbit.kd_penerbit = buku.kd_penerbit");
        $this->db->join(
            "pengarang",
            "pengarang.kd_pengarang = buku.kd_pengarang"
        );
        $query = $this->db->get();
        return $query;
    }
}
