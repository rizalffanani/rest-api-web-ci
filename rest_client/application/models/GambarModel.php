<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class GambarModel extends CI_Model {
  // Fungsi untuk menampilkan semua data gambar
  public function view(){
    return $this->db->get('gambar')->result();
  }
  
  // Fungsi untuk melakukan proses upload file
  public function upload(){
    $config['upload_path'] = './images/';
    $config['allowed_types'] = 'jpg|png|jpeg';
    $config['max_size']  = '2048';
    $config['remove_space'] = TRUE;
  
    $this->load->library('upload', $config); // Load konfigurasi uploadnya
    if($this->upload->do_upload('input_gambar')){ // Lakukan upload dan Cek jika proses upload berhasil
      // Jika berhasil :
      $return = array('result' => 'success', 'file' => $this->upload->data(), 'error' => '');
      return $return;
    }else{
      // Jika gagal :
      $return = array('result' => 'failed', 'file' => '', 'error' => $this->upload->display_errors());
      return $return;
    }
  }
  
  // Fungsi untuk menyimpan data ke database
  public function save($upload){
    $data = array(
        'id_laporan' => $this->input->post('id_laporan'),
        'no_seri' => $this->input->post('no_seri'),
        'img_bef'=> $this->input->post('img_bef'),
        'kondisi_awal'=> $this->input->post('kondisi_awal'),
        'lokasi'=> $this->input->post('lokasi'),
        'waktu' => $this->input->post('waktu'),
        'img_baru' => $this->input->post('img_baru'),
        'kondisi_baru' => $this->input->post('kondisi_baru'),
        'nama_petugas' => $this->input->post('nama_petugas'));
    
    $this->db->insert('gambar', $data);
  }
