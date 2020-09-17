<?php
    defined('BASEPATH') OR exit('No direct script access allowed');

    require APPPATH . '/libraries/REST_Controller.php';
    use Restserver\Libraries\REST_Controller;

    class data_trafo extends REST_Controller {

        function __construct($config = 'rest') {
            parent::__construct($config);
            $this->load->database();
        }

        //Menampilkan data kontak
        function index_get() {
            $kd_gardu = $this->get('kd_gardu');
            if ($kd_gardu == '') {
                $data_trafo = $this->db->get('data_trafo')->result();
            } else {
                $this->db->where('kd_gardu', $kd_gardu);
                $data_trafo = $this->db->get('data_trafo')->result();
            }
            $this->response($data_trafo, 200);
        }

        
        //Mengirim atau menambah data kontak baru
        function index_post() {
            $data = array(
                'kd_gardu' => $this->input->post('kd_gardu'),
                'nomor_seri' => $this->input->post('nomor_seri'),
                'jenis' => $this->input->post('jenis'),
                'alamat'=> $this->input->post('alamat'),
                'merk'=> $this->input->post('merk'),
                'status'=> $this->input->post('status'),
                'kondisi'=> $this->input->post('kondisi'));
            $insert = $this->db->insert('data_trafo', $data);

            if ($insert) {
                $this->response($data, 200);
            } else {
                $this->response(array('status' => 'fail', 502));
            }
        }

        //Memperbarui data kontak yang telah ada
        function index_put() {
            $kd_gardu = $this->put('kd_gardu');
            $data = array(
                'kd_gardu' => $this->put('kd_gardu'),
                'nomor_seri' => $this->put('nomor_seri'),
                'jenis' => $this->put('jenis'),
                'alamat'=> $this->put('alamat'),
                'merk'=> $this->put('merk'),
                'status'=> $this->put('status'),
                'kondisi'=> $this->put('kondisi'));
            $this->db->where('kd_gardu', $kd_gardu);
            $update = $this->db->update('data_trafo', $data);

            if ($update) {
                $this->response($data, 200);
            } else {
                $this->response(array('status' => 'fail', 502));
            }
        }

        //Menghapus salah satu data kontak
        function index_delete() {
            $id = $this->delete('kd_gardu');
            $this->db->where('kd_gardu', $id);
            $delete = $this->db->delete('data_trafo');

            if ($delete) {
                $this->response(array('status' => 'success'), 201);
            } else {
                $this->response(array('status' => 'fail', 502));
            }
        }
    }
?>