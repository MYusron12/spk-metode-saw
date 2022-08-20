<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pieces extends CI_Controller
{
  public function __construct()
  {
    parent::__construct();
    $this->load->model('Pieces_model', 'pieces');
    if (!$this->session->userdata('email')) {
      redirect('auth');
    }
  }

  public function index()
  {
    # code...
  }

  #skala likert
  public function skalaLikert()
  {
    $data['title'] = 'Dashboard';
    $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
    $data['likert'] = $this->db->get('pieces_skala_likert')->result_array();
    $this->load->view('templates/header', $data);
    $this->load->view('templates/sidebar', $data);
    $this->load->view('templates/topbar', $data);
    $this->load->view('pieces/skalalikert', $data);
    $this->load->view('templates/footer', $data);
  }
  public function tambahSkalaLikert()
  {
    $data['title'] = 'Dashboard';
    $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
    $this->form_validation->set_rules('kriteria', 'Kriteria', 'required|is_unique[pieces_skala_likert.kriteria]');
    if ($this->form_validation->run() == false) {
      $this->load->view('templates/header', $data);
      $this->load->view('templates/sidebar', $data);
      $this->load->view('templates/topbar', $data);
      $this->load->view('pieces/skalalikert', $data);
      $this->load->view('templates/footer', $data);
    } else {
      $data = [
        // fieldnya apa aja
      ];
      $this->db->insert('pieces_skala_likert', $data);
      $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Skala Likert berhasil ditambah</div>');
      redirect('pieces/skalaLikert');
    }
  }
  public function editSkalaLikert($id)
  {
    # code...
  }
  public function hapusSkalaLikert($id)
  {
    # code...
  }

  #pieces framework
  public function piecesFramework()
  {
    # code...
  }
  public function tambahPiecesFramework()
  {
    # code...
  }
  public function editPieceFramework($id)
  {
    # code...
  }
  public function hapusPiecesFramework($id)
  {
    # code...
  }

  #indikator pertanyaa
  public function indikatorPertanyaan()
  {
    # code...
  }
  public function tambahIndikatorPertanyaan()
  {
    # code...
  }
  public function editIndikatorPertanyaan($id)
  {
    # code...
  }
  public function hapusIndikatorPertanyaan($id)
  {
    # code...
  }
}
