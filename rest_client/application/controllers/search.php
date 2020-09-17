<?php

Class search Extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->helper('url');
        $this->load->model('m_cari');
        $this->load->helper('form');
    }

    function index(){
        
    }

    public function search()
    {
        $keyword    =   $this->input->post('keyword');
        $data['data_petugas']    =   $this->m_cari->get_keyword($keyword);
        $this->load->view('list',$data);
    }


    public function searchdt()
    {
        $keyword    =   $this->input->post('keyword');
        $data['dat_laporan']    =   $this->m_cari->dat_laporan($keyword);
        $this->load->view('listk',$data);
    }

    public function searchtrafo()
    {
        $keyword    =   $this->input->post('keyword');
        $data['data_trafo']    =   $this->m_cari->datatrafo($keyword);
        $this->load->view('listy',$data);
    }

    public function searchlokasi()
    {
        $keyword    =   $this->input->post('keyword');
        $data['dat_lokasi']    =   $this->m_cari->lokasi($keyword);
        $this->load->view('listm',$data);
    }

}

?>