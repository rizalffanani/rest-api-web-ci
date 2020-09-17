<?php
    defined('BASEPATH') OR exit('No direct script access allowed');

    require APPPATH . '/libraries/REST_Controller.php';
    use Restserver\Libraries\REST_Controller;

    class admin extends REST_Controller {

        function __construct($config = 'rest') {
            parent::__construct($config);
            $this->load->database();
        }

        //Menampilkan data kontak
        function index_get() {
            $id_admin = $this->get('id_admin');
            if ($id_admin == '') {
                $admin = $this->db->get('admin')->result();
            } else {
                $this->db->where('id_admin', $id_admin);
                $admin = $this->db->get('admin')->result();
            }
            $this->response($admin, 200);
        }

        
        //Mengirim atau menambah data kontak baru
        function index_post() {
            $data = array(
                'id_admin' => $this->input->post('id_admin'),
                'nama_admin' => $this->input->post('nama_admin'),
                'alamat'=> $this->input->post('alamat'),
                'ttl'=> $this->input->post('ttl'));
            $insert = $this->db->insert('admin', $data);

            if ($insert) {
                $this->response($data, 200);
            } else {
                $this->response(array('status' => 'fail', 502));
            }
        }

        //Memperbarui data kontak yang telah ada
        function index_put() {
            $id_admin = $this->put('id_admin');
            $data = array(
                'id_admin' => $this->put('id_admin'),
                'nama_admin' => $this->put('nama_admin'),
                'alamat'=> $this->put('alamat'),
                'ttl'=> $this->put('ttl'));
            $this->db->where('id_admin', $id_admin);
            $update = $this->db->update('admin', $data);

            if ($update) {
                $this->response($data, 200);
            } else {
                $this->response(array('status' => 'fail', 502));
            }
        }

        //Menghapus salah satu data kontak
        function index_delete() {
            $idpel = $this->delete('id_admin');
            $this->db->where('id_admin', $idpel);
            $delete = $this->db->delete('admin');

            if ($delete) {
                $this->response(array('status' => 'success'), 201);
            } else {
                $this->response(array('status' => 'fail', 502));
            }
        }
    }
?>