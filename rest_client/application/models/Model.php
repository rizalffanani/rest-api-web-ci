<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Model extends CI_Model {

public function __construct()
 {
 parent::__construct();
 $this->load->database();
 }

// Listing
public function getDATLAPORAN() {
    $this->db->select('*');
    $this->db->from('dat_laporan');
    $query = $this->db->get();
    return $query->result();
    }
public function getGEPD() {
        $this->db->select('*');
        $this->db->from('ge_pd');
        $query = $this->db->get();
        return $query->result();
        }
public function getKOLEKTIF() {
            $this->db->select('*');
            $this->db->from('kolektif');
            $query = $this->db->get();
            return $query->result();
            }
public function getTGPHASAPB() {
                $this->db->select('*');
                $this->db->from('tgphasa_pb');
                $query = $this->db->get();
                return $query->result();
                }
 public function getTGPHASAPD() {
                    $this->db->select('*');
                    $this->db->from('tgphasa_pd');
                    $query = $this->db->get();
                    return $query->result();
                    }
}