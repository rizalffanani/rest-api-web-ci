<?php
    defined('BASEPATH') OR exit('No direct script access allowed');

    require APPPATH . '/libraries/REST_Controller.php';
    use Restserver\Libraries\REST_Controller;

    class petugas extends REST_Controller {

        function __construct($config = 'rest') {
            parent::__construct($config);
            $this->load->database();
        }

        //Menampilkan data kontak
        function index_get() {
            $id_petugas = $this->get('id_petugas');
            if ($id_petugas == '') {
                $petugas = $this->db->get('petugas')->result();
            } else {
                $this->db->where('id_petugas', $id_petugas);
                $petugas = $this->db->get('petugas')->result();
            }
            $this->response($petugas, 200);
        }

        
        //Mengirim atau menambah data kontak baru
        function index_post() {
            $data = array(
                'id_petugas' => $this->input->post('id_petugas'),
                'nama_petugas' => $this->input->post('nama_petugas'),
                'alamat'=> $this->input->post('alamat'),
                'ttl'=> $this->input->post('ttl'),
                'telp'=>$this->input->post('telp'));
            $insert = $this->db->insert('petugas', $data);

            if ($insert) {
                $this->response($data, 200);
            } else {
                $this->response(array('status' => 'fail', 502));
            }
        }

        //Memperbarui data kontak yang telah ada
        function index_put() {
            $id_petugas = $this->put('id_petugas');
            $data = array(
                'id_petugas' => $this->put('id_petugas'),
                'nama_petugas' => $this->put('nama_petugas'),
                'alamat'=> $this->put('alamat'),
                'ttl'=> $this->put('ttl'),
                'telp'=> $this->put('telp'));
            $this->db->where('id_petugas', $id_petugas);
            $update = $this->db->update('petugas', $data);

            if ($update) {
                $this->response($data, 200);
            } else {
                $this->response(array('status' => 'fail', 502));
            }
        }

        //Menghapus salah satu data kontak
        function index_delete() {
            $id = $this->delete('id_petugas');
            $this->db->where('id_petugas', $id);
            $delete = $this->db->delete('petugas');

            if ($delete) {
                $this->response(array('status' => 'success'), 201);
            } else {
                $this->response(array('status' => 'fail', 502));
            }
        }
    }
?>