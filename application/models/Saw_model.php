<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Saw_model extends CI_Model
{
  public function getData()
  {
    # code...
  }
  public function altId($id)
  {
    return $this->db->get_where('alternatif', ['id' => $id])->row_array();
  }
  public function editAlternatif()
  {
    $this->db->where('id', $this->input->post('id'));
    $this->db->update('alternatif', [
      'kode_alternatif' => $this->input->post('kode_alternatif'),
      'keterangan_alternatif' => $this->input->post('keterangan_alternatif')
    ]);
  }
  public function joinAlternatif()
  {
    $query = "select a.*,b.keterangan_alternatif from nilai_alternatif_kriteria a join alternatif b on a.alternatif_id=b.id";
    return $this->db->query($query)->result_array();
  }
  public function max()
  {
    $query = "select max(c1) as c1, max(c2) as c2, min(c3) as c3, max(c4) as c4, max(c5) as c5 from nilai_alternatif_kriteria";
    return $this->db->query($query)->result();
  }
  public function urutan()
  {
    $query = "select count(id)+1 as id from kriteria";
    return $this->db->query($query)->result();
  }
  public function getId($id)
  {
    $query = "select bobot_nilai_kriteria from kriteria where urutan_id = $id";
    return $this->db->query($query)->result();
  }
}
