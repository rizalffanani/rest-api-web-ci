<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class m_cari extends CI_Model {    
  public function __construct(){
    parent::__construct();
    // $this->db->database();
  }
    public function get_keyword($keyword){
      $this->db->select('*');
      $this->db->from('petugas');
      $this->db->like('id_petugas', $keyword);
      $this->db->or_like('nama_petugas', $keyword);
      $query = $this->db->get();
      return $query->result();
    }

    public function dat_laporan($keyword){
        $this->db->select('*');
        $this->db->from('dat_laporan');
        $this->db->like('id_laporan', $keyword);
        $this->db->or_like('kd_gardu', $keyword);
        $query = $this->db->get();
        return $query->result();  
      }

      public function lokasi($keyword){
        $this->db->select('*');
        $this->db->from('dat_lokasi');
        $this->db->like('no', $keyword);
        $this->db->or_like('kd_gardu', $keyword);
        $query = $this->db->get();
        return $query->result();  
      }

      public function datatrafo($keyword){
        $this->db->select('*');
        $this->db->from('data_trafo');
        $this->db->like('kd_gardu', $keyword);
        $this->db->or_like('merk', $keyword);
        $query = $this->db->get();
        return $query->result();
      }

  }

?>