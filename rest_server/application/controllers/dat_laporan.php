<?php
    defined('BASEPATH') OR exit('No direct script access allowed');

    require APPPATH . '/libraries/REST_Controller.php';
    use Restserver\Libraries\REST_Controller;

    class dat_laporan extends REST_Controller {

        function __construct($config = 'rest') {
            parent::__construct($config);
            $this->load->database();
        }

        //Menampilkan data kontak
        function index_get() {
            $id_laporan = $this->get('id_laporan');
            if ($id_laporan == '') {
                $dat_laporan = $this->db->get('dat_laporan')->result();
            } else {
                $this->db->where('id_laporan', $id_laporan);
                $dat_laporan = $this->db->get('dat_laporan')->result();
            }
            $this->response($dat_laporan, 200);
        }

        
        //Mengirim atau menambah data kontak baru
        function index_post() {
            $data = array(
                'id_laporan' => $this->input->post('id_laporan'),
                'kd_gardu' => $this->input->post('kd_gardu'),
                'img_bef'=> $this->input->post('img_bef'),
                'kondisi_awal'=> $this->input->post('kondisi_awal'),
                'lokasi'=> $this->input->post('lokasi'),
                'waktu' => $this->input->post('waktu'),
                'img_baru' => $this->input->post('img_baru'),
                'kondisi_baru' => $this->input->post('kondisi_baru'),
                'nama_petugas' => $this->input->post('nama_petugas'));
            $insert = $this->db->insert('dat_laporan', $data);

            if ($insert) {
                $this->response($data, 200);
            } else {
                $this->response(array('status' => 'fail', 502));
            }
        }

        //Memperbarui data kontak yang telah ada
        function index_put() {
            $id_laporan = $this->put('id_laporan');
            $data = array(
                'id_laporan' => $this->put('id_laporan'),
                'kd_gardu' => $this->put('kd_gardu'),
                'img_bef'=> $this->put('img_bef'),
                'kondisi_awal'=> $this->put('kondisi_awal'),
                'lokasi'=> $this->put('lokasi'),
                'waktu' => $this->put('waktu'),
                'img_baru' => $this->put('img_baru'),
                'kondisi_baru' => $this->put('kondisi_baru'),
                'nama_petugas' => $this->put('nama_petugas'));
            $this->db->where('id_laporan', $id_laporan);
            $update = $this->db->update('dat_laporan', $data);

            if ($update) {
                $this->response($data, 200);
            } else {
                $this->response(array('status' => 'fail', 502));
            }
        }

        //Menghapus salah satu data kontak
        function index_delete() {
            $id = $this->delete('id_laporan');
            $this->db->where('id_laporan', $id);
            $delete = $this->db->delete('dat_laporan');

            if ($delete) {
                $this->response(array('status' => 'success'), 201);
            } else {
                $this->response(array('status' => 'fail', 502));
            }
        }
    }
?>