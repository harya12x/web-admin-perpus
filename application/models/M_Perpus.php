<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_Perpus extends CI_Model
{
    function AddData($tabel, $data = [])
    {
        $this->db->insert($tabel, $data);
        return $this->db->affected_rows();
    }

    function UpdateData($tabel, $where, $where_value, $data = [])
    {
        $this->db->update($tabel, $data, [$where => $where_value]);
        return $this->db->affected_rows();
    }

    function DeleteData($tabel, $where, $where_value)
    {
        $this->db->where($where, $where_value)->delete($tabel);
        return $this->db->affected_rows();
    }

    function GetData($tabel, $where = null, $value = null)
    {
        if ($where === null && $value === null) {
            $query = $this->db->get($tabel);
            return $query;
        } else {
            $query = $this->db->get_where($tabel, [$where => $value]);
            return $query;
        }
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

    function GetDataJoinPeminjam($tbl1)
    {
        $this->db->select("peminjaman.kd_peminjaman, anggota.nama AS NamaAnggota, buku.judul AS NamaBuku, peminjaman.jumlah_pinjam AS TotalPinjamBuku, peminjaman.tanggal_pinjam AS tanggal");
        $this->db->from($tbl1);
        $this->db->join(
            "anggota",
            "anggota.kd_anggota = peminjaman.kd_anggota"
        );
        $this->db->join("buku", "buku.kd_buku = peminjaman.kd_buku");
        $query = $this->db->get();
        return $query;
    }

    public function proses_login($username, $pass)
    {
        return $this->db->query("SELECT kd_user FROM users WHERE username = '$username' AND password = MD5('$pass')");
    }

    public function cek_register($kd_user)
    {
        return $this->db->query("SELECT kd_user FROM users WHERE kd_user = '$kd_user'");
    }

    public function cek_if_register($kd_user)
    {
        return $this->db->query("SELECT * FROM users WHERE kd_user = '$kd_user' AND username IS NOT NULL");
    }

    public function cek_user_exist_register($username)
    {
        return $this->db->query("SELECT username FROM users WHERE username = '$username'");
    }

    public function proses_register()
    {
        $username = $_POST['username'];
        $pass = md5($_POST['password']);
        $kd_user = $_POST['kd_user'];

        $this->db->query("UPDATE users SET username = '$username', password = '$pass' WHERE kd_user = '$kd_user'");
    }

    public function logout()
    {
    }

    function CheckLogin($table, $field1, $field2)
    {
        $this->db->select("*");
        $this->db->from($table);
        $this->db->where("username", $field1);
        $this->db->where("password", $field2);
        $this->db->limit(1);
        $query = $this->db->get();
        if ($query->num_rows() == 0) {
            return null;
        } else {
            return $query->result();
        }
    }

    function SearchData($match)
    {
        $this->db->select("*");
        $this->db->from("buku");
        $this->db->join(
            "jenis_buku",
            "jenis_buku.kd_jenis_buku = buku.kd_jenis_buku"
        );

        $this->db->join("penerbit", "penerbit.kd_penerbit = buku.kd_penerbit");
        $this->db->join(
            "pengarang",
            "pengarang.kd_pengarang = buku.kd_pengarang"
        );
        $this->db->like("judul", $match);
        return $this->db->get();
    }
}
