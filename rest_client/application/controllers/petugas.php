<?php
Class  petugas extends CI_Controller{
    var $API ="";

    function __construct() {
        parent::__construct();
        $this->API  ="http://localhost/PLN/rest_server/";
    }

    // menampilkan data mahasiswa
    function index(){
        $data['petugas'] = json_decode($this->curl->simple_get($this->API.'/petugas'));
        $this->load->view('list',$data);
    }

    // insert data mahasiswa
    function create(){
        if(isset($_POST['submit'])){
            $data = array(
                'id_petugas' => $this->input->post('id_petugas'),
                'nama_petugas' => $this->input->post('nama_petugas'),
                'alamat'=> $this->input->post('alamat'),
                'ttl'=> $this->input->post('ttl'),
                'telp'=> $this->input->post('telp'));
            $insert = $this->curl->simple_post($this->API.'/petugas', $data, array(CURLOPT_BUFFERSIZE => 10)); 
            if($insert){
                $this->session->set_flashdata('hasil','Insert Data Berhasil');
            }else{
                $this->session->set_flashdata('hasil','Insert Data Gagal');
            }
            redirect('petugas');
        }else{
            $data['petugas'] = json_decode($this->curl->simple_get($this->API.'/petugas'));
            $this->load->view('create',$data);
        }
    }
    
    // edit data mahasiswa
    function edit(){
        if(isset($_POST['submit'])){
            $data = array(
                'id_petugas' => $this->input->post('id_petugas'),
                'nama_petugas' => $this->input->post('nama_petugas'),
                'alamat'=> $this->input->post('alamat'),
                'ttl'=> $this->input->post('ttl'),
                'telp'=> $this->input->post('telp'));
            $update = $this->curl->simple_put($this->API.'/petugas', $data, array(CURLOPT_BUFFERSIZE => 10));
            // return var_dump($data); 
            if($update){
                $this->session->set_flashdata('hasil','Update Data Berhasil');
            }else{
                $this->session->set_flashdata('hasil','Update Data Gagal');
            }
            redirect('petugas');
        }else{
            $data['petugas'] = json_decode($this->curl->simple_get($this->API.'/petugas'));
            $params = array('id_petugas'=> $this->uri->segment(3));
            $data['petugas'] = json_decode($this->curl->simple_get($this->API.'/petugas',$params));
            $this->load->view('edit',$data);
        }
    }
 
    function delete($id){
        if(empty($id)){
            redirect('petugas');
        }else{
            $delete = $this->curl->simple_delete($this->API.'/petugas', array('id_petugas'=>$id), array(CURLOPT_BUFFERSIZE => 10)); 
            if($delete){
                $this->session->set_flashdata('hasil','Delete Data Berhasil');
            }else{
                $this->session->set_flashdata('hasil','Delete Data Gagal');
            }
            redirect('petugas');
        }
    }

    function print() {
        $data['petugas'] = json_decode($this->curl->simple_get($this->API.'/petugas'));
        $this->load->view('print_petugas', $data );
    }

     function pdf() {
        $this->load->library('dompdf_gen');

        $data['petugas'] = json_decode($this->curl->simple_get($this->API.'/petugas'));

        $this->load->view('laporan_pdf_petugas',$data);

        $paper_size = 'A4';
        $orientation = 'landscape';
        $html = $this->output->get_output();
        $this->dompdf->set_paper($paper_size, $orientation);

        $this->dompdf->load_html($html);
        $this->dompdf->render();
        $this->dompdf->stream("laporan_petugas.pdf", array('Attachment' =>0));
    }

    public function export()
	{
		$this->load->model('Model');
		$data['petugas'] =$this->Model->getGEPB();
 		$this->load->view('laporan_excel_gepb', $data);
	}
}
