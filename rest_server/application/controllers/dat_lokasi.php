<?php
    defined('BASEPATH') OR exit('No direct script access allowed');

    require APPPATH . '/libraries/REST_Controller.php';
    use Restserver\Libraries\REST_Controller;

    class dat_lokasi extends REST_Controller {

        function __construct($config = 'rest') {
            parent::__construct($config);
            $this->load->database();
        }

        //Menampilkan data kontak
        function index_get() {
            $no = $this->get('no');
            if ($no == '') {
                $dat_lokasi = $this->db->get('dat_lokasi')->result();
            } else {
                $this->db->where('no', $no);
                $dat_lokasi = $this->db->get('dat_lokasi')->result();
            }
            $this->response($dat_lokasi, 200);
        }

        
        //Mengirim atau menambah data kontak baru
        function index_post() {
            $data = array(
                'no' => $this->input->post('no'),
                'kd_gardu' => $this->post('kd_gardu'),
                'kd_pylg' => $this->input->post('kd_pylg'),
                'alamat'=> $this->input->post('alamat'),
                'latitude' => $this->input->post('latitude'),
                'longtitude' => $this->input->post('longtitude'),
                'upj' => $this->input->post('upj'));
            $insert = $this->db->insert('dat_lokasi', $data);

            if ($insert) {
                $this->response($data, 200);
            } else {
                $this->response(array('status' => 'fail', 502));
            }
        }

        //Memperbarui data kontak yang telah ada
        function index_put() {
            $no = $this->put('no');
            $data = array(
                'no' => $this->put('no'),
                'kd_gardu' => $this->put('kd_gardu'),
                'kd_pylg' => $this->put('kd_pylg'),
                'alamat'=> $this->put('alamat'),
                'latitude' => $this->put('latitude'),
                'longtitude' => $this->put('longtitude'),
                'upj'=> $this->put('upj'));
            $this->db->where('no', $no);
            $update = $this->db->update('dat_lokasi', $data);

            if ($update) {
                $this->response($data, 200);
            } else {
                $this->response(array('status' => 'fail', 502));
            }
        }

        //Menghapus salah satu data kontak
        function index_delete() {
            $no = $this->delete('no');
            $this->db->where('no', $no);
            $delete = $this->db->delete('dat_lokasi');

            if ($delete) {
                $this->response(array('status' => 'success'), 201);
            } else {
                $this->response(array('status' => 'fail', 502));
            }
        }
    }
?>