<?php
class dat_lokasi extends CI_Controller
{
    var $API = "";

    function __construct()
    {
        parent::__construct();
        $this->API = "http://localhost/PLN/rest_server/";
    }

    // menampilkan data pelanggan
    function index()
    {
        $data['dat_lokasi'] = json_decode($this->curl->simple_get($this->API . '/dat_lokasi'));
        $this->load->view('listm', $data);
    }

    // insert data pelanggan
    function createm()
    {
        if (isset($_POST['submit'])) {
            $data = array(
                'no' => $this->input->post('no'),
                'kd_gardu' => $this->input->post('kd_gardu'),
                'kd_pylg' => $this->input->post('kd_pylg'),
                'alamat' => $this->input->post('alamat'),
                'latitude' => $this->input->post('latitude'),
                'longtitude' => $this->input->post('longtitude'),
                'upj' => $this->input->post('upj')
            );
            $insert = $this->curl->simple_post($this->API . '/dat_lokasi', $data, array(CURLOPT_BUFFERSIZE => 10));
            if ($insert) {
                $this->session->set_flashdata('hasil', 'Insert Data Berhasil');
            } else {
                $this->session->set_flashdata('hasil', 'Insert Data Gagal');
            }
            redirect('dat_lokasi');
        } else {
            $data['dat_lokasi'] = json_decode($this->curl->simple_get($this->API . '/dat_lokasi'));
            $this->load->view('createm', $data);
        }
    }

    // edit data mahasiswa
    function editm()
    {
        if (isset($_POST['submit'])) {
            $data = array(
                'no' => $this->input->post('no'),
                'kd_gardu' => $this->input->post('kd_gardu'),
                'kd_pylg' => $this->input->post('kd_pylg'),
                'alamat' => $this->input->post('alamat'),
                'latitude' => $this->input->post('latitude'),
                'longtitude' => $this->input->post('longtitude'),
                'upj' => $this->input->post('upj')
            );
            $update = $this->curl->simple_put($this->API . '/dat_lokasi', $data, array(CURLOPT_BUFFERSIZE => 10));
            if ($update) {
                $this->session->set_flashdata('hasil', 'Update Data Berhasil');
            } else {
                $this->session->set_flashdata('hasil', 'Update Data Gagal');
            }
            redirect('dat_lokasi');
        } else {
            $data['dat_lokasi'] = json_decode($this->curl->simple_get($this->API . '/dat_lokasi'));
            $params = array('no' => $this->uri->segment(3));
            $data['dat_lokasi'] = json_decode($this->curl->simple_get($this->API . '/dat_lokasi', $params));
            $this->load->view('editm', $data);
        }
    }


    // delete data pelanggan
    function delete($no)
    {
        if (empty($no)) {
            redirect('dat_lokasi');
        } else {
            $delete = $this->curl->simple_delete($this->API . '/dat_lokasi', array('no' => $no), array(CURLOPT_BUFFERSIZE => 10));
            if ($delete) {
                $this->session->set_flashdata('hasil', 'Delete Data Berhasil');
            } else {
                $this->session->set_flashdata('hasil', 'Delete Data Gagal');
            }
            redirect('dat_lokasi');
        }
    }

    // function print() {
    //     $data['dat_lokasi'] = json_decode($this->curl->simple_get($this->API.'/dat_lokasi'));
    //     $this->load->view('print_dat_lokasi', $data );
    // }

    //  function pdf() {
    //     $this->load->library('dompdf_gen');

    //     $data['dat_lokasi'] = json_decode($this->curl->simple_get($this->API.'/dat_lokasi'));

    //     $this->load->view('laporan_pdf_dat_lokasi',$data);

    //     $paper_size = 'A4';
    //     $orientation = 'landscape';
    //     $html = $this->output->get_output();
    //     $this->dompdf->set_paper($paper_size, $orientation);

    //     $this->dompdf->load_html($html);
    //     $this->dompdf->render();
    //     $this->dompdf->stream("laporan_dat_lokasi.pdf", array('Attachment' =>0));
    // }

    // public function export()
    // {
    // 	$this->load->model('Model');
    // 	$data['dat_lokasi'] =$this->Model->getTGPHASAPD();
    // 	$this->load->view('laporan_excel_tgphasapd', $data);
    // }
}
