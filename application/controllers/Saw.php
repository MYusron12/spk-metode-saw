<?php

use phpDocumentor\Reflection\Types\This;

defined('BASEPATH') or exit('No direct script access allowed');

class Saw extends CI_Controller
{
  public function __construct()
  {
    parent::__construct();
    $this->load->model('Saw_model', 'saw');
    if (!$this->session->userdata('email')) {
      redirect('auth');
    }
  }

  public function index()
  {
    $data['title'] = "Dashboard dan Perangkingan SAW";
    $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
    $data['alternatif'] = $this->db->get('alternatif')->result_array();
    $data['nilai'] = $this->saw->joinAlternatif();
    $data['max'] = $this->saw->max();
    $data['kriteria'] = $this->db->get('kriteria')->result_array();
    $urutan1 = $this->saw->getId(1);
    foreach ($urutan1 as $row) {
      $data['kriteria1'] = $row->bobot_nilai_kriteria;
    }
    $urutan2 = $this->saw->getId(2);
    foreach ($urutan2 as $row) {
      $data['kriteria2'] = $row->bobot_nilai_kriteria;
    }
    $urutan3 = $this->saw->getId(3);
    foreach ($urutan3 as $row) {
      $data['kriteria3'] = $row->bobot_nilai_kriteria;
    }
    $urutan4 = $this->saw->getId(4);
    foreach ($urutan4 as $row) {
      $data['kriteria4'] = $row->bobot_nilai_kriteria;
    }
    $urutan5 = $this->saw->getId(5);
    foreach ($urutan5 as $row) {
      $data['kriteria5'] = $row->bobot_nilai_kriteria;
    }
    $this->load->view('templates/header', $data);
    $this->load->view('templates/sidebar', $data);
    $this->load->view('templates/topbar', $data);
    $this->load->view('saw/index', $data);
    $this->load->view('templates/footer', $data);
  }

  public function alternatif()
  {
    $data['title'] = "Alternatif";
    $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
    $data['alternatif'] = $this->db->get('alternatif')->result_array();
    $this->load->view('templates/header', $data);
    $this->load->view('templates/sidebar', $data);
    $this->load->view('templates/topbar', $data);
    $this->load->view('saw/alternatif', $data);
    $this->load->view('templates/footer', $data);
  }
  public function tambahAlternatif()
  {
    $data['title'] = "Tambah Alternatif";
    $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
    $this->form_validation->set_rules('keterangan_alternatif', 'Keterangan Alternatif', 'required|is_unique[alternatif.keterangan_alternatif]');
    $this->form_validation->set_rules('kode_alternatif', 'Kode Alternatif', 'required|is_unique[alternatif.kode_alternatif]');
    if ($this->form_validation->run() == false) {
      $this->load->view('templates/header', $data);
      $this->load->view('templates/sidebar', $data);
      $this->load->view('templates/topbar', $data);
      $this->load->view('saw/tambahalternatif', $data);
      $this->load->view('templates/footer', $data);
    } else {
      $this->db->insert('alternatif', [
        'kode_alternatif' => $this->input->post('kode_alternatif'),
        'keterangan_alternatif' => $this->input->post('keterangan_alternatif')
      ]);
      $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Berhasil menambah Alternatif</div>');
      redirect('saw/alternatif');
    }
  }
  public function editAlternatif($id)
  {
    $data['title'] = "Edit Alternatif";
    $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
    $data['alternatif'] = $this->db->get('alternatif')->result_array();
    $data['altid'] = $this->saw->altId($id);
    $this->form_validation->set_rules('keterangan_alternatif', 'Keterangan Alternatif', 'required');
    $this->form_validation->set_rules('kode_alternatif', 'Kode Alternatif', 'required');
    if ($this->form_validation->run() == false) {
      $this->load->view('templates/header', $data);
      $this->load->view('templates/sidebar', $data);
      $this->load->view('templates/topbar', $data);
      $this->load->view('saw/editalternatif', $data);
      $this->load->view('templates/footer', $data);
    } else {
      $this->saw->editAlternatif($id);
      $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Berhasil mengubah Alternatif</div>');
      redirect('saw/alternatif');
    }
  }
  public function hapusAlternatif($id)
  {
    $this->db->delete('alternatif', ['id' => $id]);
    $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Berhasil menghapus Alternatif</div>');
    redirect('saw/alternatif');
  }

  public function kriteria()
  {
    $data['title'] = "Kriteria";
    $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
    $data['kriteria'] = $this->db->get('kriteria')->result_array();
    $this->load->view('templates/header', $data);
    $this->load->view('templates/sidebar', $data);
    $this->load->view('templates/topbar', $data);
    $this->load->view('saw/kriteria', $data);
    $this->load->view('templates/footer', $data);
  }
  public function tambahKriteria()
  {
    $data['title'] = "Tambah Kriteria";
    $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
    $data['urutan'] = $this->saw->urutan();
    $this->form_validation->set_rules('nama_kriteria', 'Nama Kriteria', 'required|is_unique[kriteria.nama_kriteria]');
    $this->form_validation->set_rules('tipe_kriteria', 'Tipe Kriteria', 'required');
    $this->form_validation->set_rules('bobot_nilai_kriteria', 'Bobot Nilai Kriteria', 'required');
    if ($this->form_validation->run() == false) {
      $this->load->view('templates/header', $data);
      $this->load->view('templates/sidebar', $data);
      $this->load->view('templates/topbar', $data);
      $this->load->view('saw/tambahkriteria', $data);
      $this->load->view('templates/footer', $data);
    } else {
      $this->db->insert('kriteria', [
        'nama_kriteria' => $this->input->post('nama_kriteria'),
        'tipe_kriteria' => $this->input->post('tipe_kriteria'),
        'bobot_nilai_kriteria' => $this->input->post('bobot_nilai_kriteria'),
        'urutan_id' => $this->input->post('urutan_id')
      ]);
      $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Berhasil menambah Kriteria</div>');
      redirect('saw/kriteria');
    }
  }
  public function editKriteria($id)
  {
    $data['title'] = "Edit Kriteria";
    $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
    $data['kriteriaid'] = $this->db->get_where('kriteria', ['id' => $id])->row_array();
    $this->form_validation->set_rules('nama_kriteria', 'Nama Kriteria', 'required');
    $this->form_validation->set_rules('tipe_kriteria', 'Tipe Kriteria', 'required');
    $this->form_validation->set_rules('bobot_nilai_kriteria', 'Bobot Nilai Kriteria', 'required');
    if ($this->form_validation->run() == false) {
      $this->load->view('templates/header', $data);
      $this->load->view('templates/sidebar', $data);
      $this->load->view('templates/topbar', $data);
      $this->load->view('saw/editkriteria', $data);
      $this->load->view('templates/footer', $data);
    } else {
      $data = [
        'nama_kriteria' => $this->input->post('nama_kriteria'),
        'tipe_kriteria' => $this->input->post('tipe_kriteria'),
        'bobot_nilai_kriteria' => $this->input->post('bobot_nilai_kriteria')
      ];
      $this->db->where('id', $this->input->post('id'));
      $this->db->update('kriteria', $data);
      $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Berhasil mengubah Kriteria</div>');
      redirect('saw/kriteria');
    }
  }
  public function hapusKriteria($id)
  {
    $this->db->delete('kriteria', ['id' => $id]);
    $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Berhasil menghapus Kriteria</div>');
    redirect('saw/kriteria');
  }

  public function preferensi()
  {
    $data['title'] = "Preferensi";
    $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
    $data['preferensi'] = $this->db->get('nilai_preferensi')->result_array();
    $this->load->view('templates/header', $data);
    $this->load->view('templates/sidebar', $data);
    $this->load->view('templates/topbar', $data);
    $this->load->view('saw/preferensi', $data);
    $this->load->view('templates/footer', $data);
  }
  public function tambahPreferensi()
  {
    $data['title'] = "Tambah Preferensi";
    $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
    $this->form_validation->set_rules('keterangan', 'Keterangan', 'required|is_unique[nilai_preferensi.keterangan]');
    $this->form_validation->set_rules('skor_nilai', 'Skor Nilai', 'required|is_unique[nilai_preferensi.skor_nilai]');
    if ($this->form_validation->run() == false) {
      $this->load->view('templates/header', $data);
      $this->load->view('templates/sidebar', $data);
      $this->load->view('templates/topbar', $data);
      $this->load->view('saw/tambahpreferensi', $data);
      $this->load->view('templates/footer', $data);
    } else {
      $this->db->insert('nilai_preferensi', [
        'keterangan' => $this->input->post('keterangan'),
        'skor_nilai' => $this->input->post('skor_nilai')
      ]);
      $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Berhasil menambah Nilai Preferensi</div>');
      redirect('saw/preferensi');
    }
  }
  public function editPreferensi($id)
  {
    $data['title'] = "Tambah Preferensi";
    $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
    $data['preferensiid'] = $this->db->get_where('nilai_preferensi', ['id' => $id])->row_array();
    $this->form_validation->set_rules('keterangan', 'Keterangan', 'required');
    $this->form_validation->set_rules('skor_nilai', 'Skor Nilai', 'required');
    if ($this->form_validation->run() == false) {
      $this->load->view('templates/header', $data);
      $this->load->view('templates/sidebar', $data);
      $this->load->view('templates/topbar', $data);
      $this->load->view('saw/editpreferensi', $data);
      $this->load->view('templates/footer', $data);
    } else {
      $data = [
        'keterangan' => $this->input->post('keterangan'),
        'skor_nilai' => $this->input->post('skor_nilai')
      ];
      $this->db->where('id', $this->input->post('id'));
      $this->db->update('nilai_preferensi', $data);
      $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Berhasil mengubah Preferensi</div>');
      redirect('saw/preferensi');
    }
  }
  public function hapusPreferensi($id)
  {
    $this->db->delete('nilai_preferensi', ['id' => $id]);
    $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Berhasil menghapus Preferensi</div>');
    redirect('saw/preferensi');
  }

  public function nilai()
  {
    $data['title'] = "Nilai Alternatif Kriteria";
    $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
    // $data['nilai'] = $this->db->get('nilai_alternatif_kriteria')->result_array();
    $data['nilai'] = $this->saw->joinAlternatif();
    $this->load->view('templates/header', $data);
    $this->load->view('templates/sidebar', $data);
    $this->load->view('templates/topbar', $data);
    $this->load->view('saw/nilai', $data);
    $this->load->view('templates/footer', $data);
  }
  public function tambahNilai()
  {
    $data['title'] = "Nilai Nilai Alternatif Kriteria";
    $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
    $data['alternatif'] = $this->db->get('alternatif')->result();
    $this->form_validation->set_rules('alternatif_id', 'Alternatif', 'required|is_unique[nilai_alternatif_kriteria.alternatif_id]');
    $this->form_validation->set_rules('c1', 'Kriteria', 'required');
    $this->form_validation->set_rules('c2', 'Kriteria', 'required');
    $this->form_validation->set_rules('c3', 'Kriteria', 'required');
    $this->form_validation->set_rules('c4', 'Kriteria', 'required');
    $this->form_validation->set_rules('c5', 'Kriteria', 'required');
    if ($this->form_validation->run() == false) {
      $this->load->view('templates/header', $data);
      $this->load->view('templates/sidebar', $data);
      $this->load->view('templates/topbar', $data);
      $this->load->view('saw/tambahnilai', $data);
      $this->load->view('templates/footer', $data);
    } else {
      $this->db->insert('nilai_alternatif_kriteria', [
        'alternatif_id' => $this->input->post('alternatif_id'),
        'c1' => $this->input->post('c1'),
        'c2' => $this->input->post('c2'),
        'c3' => $this->input->post('c3'),
        'c4' => $this->input->post('c4'),
        'c5' => $this->input->post('c5')
      ]);
      $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Berhasil menambah Nilai Kriteria</div>');
      redirect('saw/nilai');
    }
  }
  public function editNilai($id)
  {
    $data['title'] = "Edit Nilai Alternatif Kriteria";
    $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
    $data['nilaiid'] = $this->db->get_where('nilai_alternatif_kriteria', ['id' => $id])->row_array();
    $data['alternatif'] = $this->db->get('alternatif')->result();
    $this->form_validation->set_rules('alternatif_id', 'Alternatif', 'required');
    $this->form_validation->set_rules('c1', 'Kriteria', 'required');
    $this->form_validation->set_rules('c2', 'Kriteria', 'required');
    $this->form_validation->set_rules('c3', 'Kriteria', 'required');
    $this->form_validation->set_rules('c4', 'Kriteria', 'required');
    $this->form_validation->set_rules('c5', 'Kriteria', 'required');
    if ($this->form_validation->run() == false) {
      $this->load->view('templates/header', $data);
      $this->load->view('templates/sidebar', $data);
      $this->load->view('templates/topbar', $data);
      $this->load->view('saw/editnilai', $data);
      $this->load->view('templates/footer', $data);
    } else {
      $data = [
        'alternatif_id' => $this->input->post('alternatif_id'),
        'c1' => $this->input->post('c1'),
        'c2' => $this->input->post('c2'),
        'c3' => $this->input->post('c3'),
        'c4' => $this->input->post('c4'),
        'c5' => $this->input->post('c5')
      ];
      $this->db->where('id', $this->input->post('id'));
      $this->db->update('nilai_alternatif_kriteria', $data);
      $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Berhasil mengubah Nilai Kriteria</div>');
      redirect('saw/nilai');
    }
  }
  public function hapusNilai($id)
  {
    $this->db->delete('nilai_alternatif_kriteria', ['id' => $id]);
    $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Berhasil menghapus Nilai Kriteria</div>');
    redirect('saw/nilai');
  }

  public function normalisasi()
  {
    $data['title'] = "Normalisasi";
    $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
    $data['alternatif'] = $this->db->get('alternatif')->result_array();
    $data['nilai'] = $this->saw->joinAlternatif();
    $data['max'] = $this->saw->max();
    $this->load->view('templates/header', $data);
    $this->load->view('templates/sidebar', $data);
    $this->load->view('templates/topbar', $data);
    $this->load->view('saw/normalisasi', $data);
    $this->load->view('templates/footer', $data);
  }
}
