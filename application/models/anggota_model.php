<?php
defined('BASEPATH') or exit('No direct script access allowed');

class anggota_model extends CI_Model
{
    public $table = 'anggota';
    public $id = 'anggota.id';
    public function __construct()
    {
        parent::__construct();
    }
    public function get()
    {
        $this->db->from($this->table);
        $query = $this->db->get();
        return $query->result_array();
    }
    public function getAll()
    {
        return $this->db->get('anggota')->result_array();
    }
    
    public function getById($id)
    {
        $this->db->from($this->table);
        $this->db->where('id_anggota', $id);
        $query = $this->db->get();
        return $query->row_array();
    }

    public function update($where, $data)
    {
        $this->db->update($this->table, $data, $where);
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
        $this->db->where('id_anggota', $id);
        $this->db->delete($this->table);
        return $this->db->affected_rows();
    }
}
