<?php
defined('BASEPATH') or exit('No direct script access allowed');

class pinjam_model extends CI_Model
{
    public $table = 'pinjam';
    public $id = 'pinjam.id';

    public function __construct()
    {
        parent::__construct();
        $this->load->model('anggota_model'); // <-- tambahkan baris ini
        $this->load->model('buku_model');    // <-- ini juga kalau kamu pakai buku_model
    }
    public function get()
    {

        $this->db->select('p.*, a.nama AS nama, b.judul AS judul');
        $this->db->from('pinjam p');
        $this->db->join('anggota a', 'p.id_anggota = a.id_anggota');
        $this->db->join('buku b', 'p.id_buku = b.id_buku');
        $query = $this->db->get();
        return $query->result_array();
    }

    public function getById($id)
    {
        $this->db->select('p.*, a.nama AS nama, b.judul AS judul');
        $this->db->from('pinjam p');
        $this->db->join('anggota a', 'p.id_anggota = a.id_anggota');
        $this->db->join('buku b', 'p.id_buku = b.id_buku');
        $this->db->where('p.id_pinjam', $id);
        $query = $this->db->get();
        return $query->row_array();
    }


    public function update($where, $data)
    {
        $this->db->where($where);
        $this->db->update($this->table, $data);
        return $this->db->affected_rows();
    }



    public function insert($data)
    {
        $this->db->insert($this->table, $data);
        return $this->db->insert_id();
        var_dump($data);
    }
    public function delete($id)
    {
        $this->db->where('id_pinjam', $id);
        $this->db->delete($this->table);
        return $this->db->affected_rows();
    }
}
