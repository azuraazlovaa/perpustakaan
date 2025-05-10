<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pinjam extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model("pinjam_model");
    }

    public function index()
    {
        $data['judul'] = "Halaman pinjam";
        $data['petugas'] = $this->db->get_where('petugas', ['email' => $this->session->userdata('email')])->row_array();
        $data['pinjam'] = $this->pinjam_model->get();
        $data['anggota'] = $this->anggota_model->getAll();
        $data['buku'] = $this->db->get('buku')->result_array();

        $this->load->view("layout/header", $data);
        $this->load->view("Pinjam/vw_pinjam", $data);
        $this->load->view("layout/footer");
    }
    public function tambah()
    {
        $data['judul'] = 'Form Tambah Peminjaman Buku';
        $data['anggota'] = $this->anggota_model->getAll();
        $data['buku'] = $this->buku_model->getAll(); // untuk dropdown buku juga
        $data['petugas'] = $this->db->get_where('petugas', ['email' =>
        $this->session->userdata('email')])->row_array();
        // $data['pinjam'] = $this->pinjam_model->get();

        $this->form_validation->set_rules('id_anggota', 'Anggota', 'required');
        $this->form_validation->set_rules('id_buku', 'Buku', 'required');
        $this->form_validation->set_rules('tgl_pinjam', 'Tanggal Pinjam', 'required', [
            'required' => 'tgl_pinjam Wajib di isi'
        ]);
        $this->form_validation->set_rules('tgl_kembali', 'Tanggal Kembali', 'required', [
            'required' => 'tgl_kembali Wajib di isi'
        ]);
        if ($this->form_validation->run() == false) {
            //   echo "Form validation failed";
            $this->load->view("layout/header", $data);
            $this->load->view("Pinjam/vw_tambah_pinjam", $data);
            $this->load->view("layout/footer");
        } else {
            $data = [
                'id_anggota' => $this->input->post('id_anggota'),
                'id_buku' => $this->input->post('id_buku'),
                'tgl_pinjam' => $this->input->post('tgl_pinjam'),
                'tgl_kembali' => $this->input->post('tgl_kembali')
            ];
            $this->pinjam_model->insert($data);
            $this->session->set_flashdata('message', '<div class="alert alert-success " role="alert">Data Peminjaman Buku Berhasil Ditambahkan!</div>');
            redirect('Pinjam');
        }
    }
    public function detail($id)
    {
        $data['judul'] = "Halaman Detail Pinjam";
        $data['pinjam'] = $this->pinjam_model->getById($id);
        $this->load->view("layout/header");
        $this->load->view("Pinjam/vw_detail_pinjam", $data);
        $this->load->view("layout/footer");
    }
    public function hapus($id)
    {
        $this->pinjam_model->delete($id);
        $error = $this->db->error();
        if ($error['code'] != 0) {
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert"><i class="icon
fas fa-info-circle"></i>Data Peminjaman Buku tidak dapat dihapus (sudah berelasi)!</div>');
        } else {
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert"><i
class="icon fas fa-check-circle"></i>Data Peminjaman Buku Berhasil Dihapus!</div>');
        }
        redirect('Pinjam');
    }
    public function update($id)
    {
        $data['judul'] = "Halaman Edit Pinjam";
        $data['pinjam'] = $this->pinjam_model->getById($id);
        $data['anggota'] = $this->anggota_model->getAll();
        $data['buku'] = $this->buku_model->getAll();
        $data['petugas'] = $this->db->get_where('petugas', ['email' =>
        $this->session->userdata('email')])->row_array();

        $this->form_validation->set_rules('id_anggota', 'Nama Anggota', 'required', [
            'required' => 'Nama Anggota pinjam Wajib di isi'
        ]);
        $this->form_validation->set_rules('id_buku', 'Pinjam Buku', 'required', [
            'required' => 'buku pinjam Wajib di isi',
        ]);
        $this->form_validation->set_rules('tgl_pinjam', 'Tanggal Pinjam', 'required', [
            'required' => 'tgl_pinjam pinjam Wajib di isi'
        ]);
        $this->form_validation->set_rules('tgl_kembali', 'Tanggal Kembali', 'required', [
            'required' => 'tgl_kembali pinjam Wajib di isi'
        ]);

        if ($this->form_validation->run() == false) {
            $this->load->view("layout/header", $data);
            $this->load->view("Pinjam/vw_ubah_pinjam", $data);
            $this->load->view("layout/footer");
        } else {
            $data = [
                'id_pinjam' => $this->input->post('id'),
                'id_anggota' => $this->input->post('id_anggota'),
                'id_buku' => $this->input->post('id_buku'),
                'tgl_pinjam' => $this->input->post('tgl_pinjam'),
                'tgl_kembali' => $this->input->post('tgl_kembali')
            ];


            $this->pinjam_model->update(['id_pinjam' => $this->input->post('id')], $data);


            // Redirect atau beri notifikasi sukses

            $this->session->set_flashdata('message', 'Data peminjaman berhasil diubah');
            redirect('Pinjam');
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
        //   $this->pinjam_model->update(['id' => $id], $data);
        //   redirect('pinjam');
        // }
    }
}


/* End of file Jurusan.php */
/* Location: ./application/controllers/Jurusan.php */