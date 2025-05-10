<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Buku extends CI_Controller
{

  public function __construct()
  {
    parent::__construct();
    $this->load->model("buku_model");
  }

  public function index()
  {
    $data['judul'] = "Halaman buku";
    $data['petugas'] = $this->db->get_where('petugas', ['email' => $this->session->userdata('email')])->row_array();
    $data['buku'] = $this->buku_model->get();
    $this->load->view("layout/header", $data);
    $this->load->view("Buku/vw_buku", $data);
    $this->load->view("layout/footer");
  }
  public function tambah()
  {
    $data['judul'] = "Halaman Tambah buku";
    $data['petugas'] = $this->db->get_where('petugas', ['email' =>
    $this->session->userdata('email')])->row_array();
    // $data['buku'] = $this->buku_model->get();
    $this->form_validation->set_rules('judul', 'Judul', 'required', [ 'required' => 'Judul Wajib di isi' ]);
    $this->form_validation->set_rules('pengarang', 'Pengarang', 'required', [ 'required' => 'Pengarang Wajib di isi' ]);
    $this->form_validation->set_rules('kategori', 'Kategori', 'required', [ 'required' => 'Kategori Wajib di isi' ]);
    $this->form_validation->set_rules('penerbit', 'Penerbit', 'required', [ 'required' => 'Penerbit Wajib di isi' 
  ]);

    if ($this->form_validation->run() == false) {
      // echo "Form validation failed";
      $this->load->view("layout/header", $data);
      $this->load->view("Buku/vw_tambah_buku", $data);
      $this->load->view("layout/footer");
    } else {
      $data = [
        'judul' => $this->input->post('judul'),
        'pengarang' => $this->input->post('pengarang'),
        'kategori' => $this->input->post('kategori'),
        'penerbit' => $this->input->post('penerbit'),
        'tahun' => $this->input->post('tahun'),
      ];
      $this->buku_model->insert($data);
      $this->session->set_flashdata('message', '<div class="alert alert-succes " role="alert">Buku Berhasil Ditambahkan!</div>');
      redirect('Buku');
    }
  }
  public function detail($id)
  {
    $data['judul'] = "Halaman Detail Buku";
    $data['buku'] = $this->buku_model->getById($id);
    $this->load->view("layout/header");
    $this->load->view("Buku/vw_detail_buku", $data);
    $this->load->view("layout/footer");
  }
  public function hapus($id)
  {
    $this->buku_model->delete($id);
    $error = $this->db->error();
    if ($error['code'] != 0) {
      $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert"><i class="icon
fas fa-info-circle"></i>Data buku tidak dapat dihapus (sudah berelasi)!</div>');
    } else {
      $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert"><i
class="icon fas fa-check-circle"></i>Data buku Berhasil Dihapus!</div>');
    }
    redirect('buku');
  }
  public function update($id)
  {
    $data['judul'] = "Halaman Edit buku";
    $data['buku'] = $this->buku_model->getById($id);
    $data['petugas'] = $this->db->get_where('petugas', ['email' =>
    $this->session->userdata('email')])->row_array();
   
    $this->form_validation->set_rules('judul', 'Judul', 'required', [
      'required' => 'Judul Buku Wajib di isi'
    ]);
    $this->form_validation->set_rules('pengarang', 'Pengarang', 'required', [
      'required' => 'Pengarang Buku Wajib di isi',
    ]);
    $this->form_validation->set_rules('kategori', 'Kategori', 'required', [
      'required' => 'Kategori Buku Wajib di isi'
    ]);
    $this->form_validation->set_rules('penerbit', 'Penerbit', 'required', [
      'required' => 'Penerbit Buku Wajib di isi'
    ]);
    $this->form_validation->set_rules('tahun', 'Tahun', 'required', [
      'required' => 'Tahun Buku Wajib di isi'
    ]);

    if ($this->form_validation->run() == false) {
      $this->load->view("layout/header", $data);
      $this->load->view("Buku/vw_ubah_buku", $data);
      $this->load->view("layout/footer");
    } else {
      $data = [
        'id_buku' => $id,
        'judul' => $this->input->post('judul'),
        'pengarang' => $this->input->post('pengarang'),
        'kategori' => $this->input->post('kategori'),
        'penerbit' => $this->input->post('penerbit'),
        'tahun' => $this->input->post('tahun')
      ];

      $this->buku_model->update(['id_buku' => $id], $data);
      $this->session->set_flashdata('message', '<div class="alert alert-succes " 
      role="alert">Data buku Berhasil Diedit!</div>');
      redirect('buku');
    }
    // function update()
    // {
    //   $data = [
    //     'judul' => $this->input->post('judul'),
    //     'pengarang' => $this->input->post('pengarang'),
    //     'kategori' => $this->input->post('kategori'),
    //     'penerbit' => $this->input->post('penerbit')
    //   ];
    //   $id = $this->input->post('id');
    //   $this->buku_model->update(['id' => $id], $data);
    //   redirect('buku');
    // }
  }
}


/* End of file Jurusan.php */
/* Location: ./application/controllers/Jurusan.php */