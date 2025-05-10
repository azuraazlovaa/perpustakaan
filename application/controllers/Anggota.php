<?php
defined('BASEPATH') or exit('No direct script access allowed');


class anggota extends CI_Controller
{

  public function __construct()
  {
    parent::__construct();
    $this->load->model('anggota_model');
    // $this->load->model('jurusan_model');
  }

  public function index()
  {
    $data['judul'] = "Halaman anggota";
    $data['petugas'] = $this->db->get_where('petugas', ['email' => $this->session->userdata('email')])->row_array();
    $data['anggota'] = $this->anggota_model->get();
    $this->load->view("layout/header", $data);
    $this->load->view("Anggota/vw_anggota", $data);
    $this->load->view("layout/footer", $data);
  }
  public function tambah()
  {
    $data['judul'] = "Halaman Tambah anggota";
    $data['petugas'] = $this->db->get_where('petugas', ['email' =>
    $this->session->userdata('email')])->row_array();
    // $data['jurusan'] = $this->jurusan_model->get();
    $this->form_validation->set_rules('nama', 'Nama Anggota', 'required', [
      'required' => 'Nama anggota Wajib di isi'
    ]);
    $this->form_validation->set_rules('jenis_kelamin', 'Jenis Kelamin', 'required', [
      'required' => 'Jenis Kelamin anggota Wajib di isi',
    ]);
    $this->form_validation->set_rules('alamat', 'Alamat', 'required', [
      'required' => 'Alamat anggota Wajib di isi'
    ]);
    $this->form_validation->set_rules('no_telp', 'No HP', 'required|integer', [
      'required' => 'NO HP anggota Wajib di isi',
      'integer' => 'NO HP harus Angka'
    ]);
    if ($this->form_validation->run() == false) {
      // echo "Form validation failed";
      $this->load->view("layout/header", $data);
      $this->load->view("Anggota/vw_tambah_anggota", $data);
      $this->load->view("layout/footer");
    } else {
      $data = [
        'nama' => $this->input->post('nama'),
        'jenis_kelamin' => $this->input->post('jenis_kelamin'),
        'alamat' => $this->input->post('alamat'),
        'no_telp' => $this->input->post('no_telp'),
      ];
      $this->anggota_model->insert($data);
      $this->session->set_flashdata('message', '<div class="alert alert-success"
role="alert">Data anggota Berhasil Ditambah!</div>');
      redirect('Anggota');
    }
  }
  public function detail($id)
  {
    $data['judul'] = "Halaman Detail Anggota";
    $data['anggota'] = $this->anggota_model->getById($id);
    $this->load->view("layout/header");
    $this->load->view("Anggota/vw_detail_anggota", $data);
    $this->load->view("layout/footer");
  }
  public function hapus($id)
  {
    $this->anggota_model->delete($id);
    $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data
    anggota Berhasil Dihapus!</div>');
    redirect('anggota');
  }
  public function update($id)
  {
    $data['judul'] = "Halaman Edit anggota";
    $data['anggota'] = $this->anggota_model->getById($id);
    $data['petugas'] = $this->db->get_where('petugas', ['email' =>
    $this->session->userdata('email')])->row_array();
    // $data['jurusan'] = $this->jurusan_model->get();

    $this->form_validation->set_rules('nama', 'Nama Anggota', 'required', [
      'required' => 'Nama anggota Wajib di isi'
    ]);
    $this->form_validation->set_rules('jenis_kelamin', 'Jenis Kelamin', 'required', [
      'required' => 'Jenis Kelamin anggota Wajib di isi',
    ]);
    $this->form_validation->set_rules('alamat', 'Alamat', 'required', [
      'required' => 'Alamat anggota Wajib di isi'
    ]);
    $this->form_validation->set_rules('no_telp', 'No HP', 'required|numeric', [
      'required' => 'NO HP anggota Wajib di isi',
      'numeric' => 'NO HP harus Angka'
    ]);
    if ($this->form_validation->run() == false) {
      $this->load->view("layout/header", $data);
      $this->load->view("Anggota/vw_ubah_anggota", $data);
      $this->load->view("layout/footer");
    } else {
      $data = [
        'id_anggota' => $id,
        'nama' => $this->input->post('nama'),
        'jenis_kelamin' => $this->input->post('jenis_kelamin'),
        'alamat' => $this->input->post('alamat'),
        'no_telp' => $this->input->post('no_telp')
      ];
      // $id = $this->input->post('id_anggota');
      $this->anggota_model->update(['id_anggota' => $id], $data);
      $this->session->set_flashdata('message', '<div class="alert alert-success"
      role="alert">Data anggota Berhasil DiUbah!</div>');
      redirect('Anggota');
    }
  }
}


/* End of file mahasiswa.php */
/* Location: ./application/controllers/mahasiswa.php */