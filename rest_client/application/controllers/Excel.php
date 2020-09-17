<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Excel extends CI_Controller {

// Load database
 public function __construct() {
 parent::__construct();
 $this->load->model('user_model');
 }

public function index() {
 $data = array( 'title' => 'Data GE PB', 
                'ge_pb' => $this->user_model->listing());
 $this->load->view('excel',$data);
 }

public function export_excel(){
 $data = array( 'title' => 'Laporan Excel', 
                'ge_pb' => $this->user_model->listing());
 $this->load->view('laporan_excel',$data);
 }

}