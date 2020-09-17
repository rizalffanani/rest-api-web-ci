<?php
class data_trafo extends CI_Controller
{
    var $API = "";

    function __construct()
    {
        parent::__construct();
        $this->API  = "http://localhost/PLN/rest_server/";
    }

    // menampilkan data pelanggan
    function index()
    {
        $data['data_trafo'] = json_decode($this->curl->simple_get($this->API . '/data_trafo'));
        $data['petugas'] = json_decode($this->curl->simple_get($this->API . '/petugas'));
        $this->load->view('listy', $data);
    }

    // insert data mahasiswa
    function createy()
    {
        if (isset($_POST['submit'])) {
            $data = array(
                'kd_gardu' => $this->input->post('kd_gardu'),
                'nomor_seri' => $this->input->post('nomor_seri'),
                'jenis' => $this->input->post('jenis'),
                'alamat' => $this->input->post('alamat'),
                'merk' => $this->input->post('merk'),
                'status' => $this->input->post('status'),
                'kondisi' => $this->input->post('kondisi')
            );
            $insert = $this->curl->simple_post($this->API . '/data_trafo', $data, array(CURLOPT_BUFFERSIZE => 10));
            if ($insert) {
                $this->session->set_flashdata('hasil', 'Insert Data Berhasil');
            } else {
                $this->session->set_flashdata('hasil', 'Insert Data Gagal');
            }
            redirect('data_trafo');
        } else {
            $data['data_trafo'] = json_decode($this->curl->simple_get($this->API . '/data_trafo'));
            $this->load->view('createy', $data);
        }
    }

    // edit data pelanggan
    function edity()
    {
        if (isset($_POST['submit'])) {
            $data = array(
                'kd_gardu' => $this->input->post('kd_gardu'),
                'nomor_seri' => $this->input->post('nomor_seri'),
                'jenis' => $this->input->post('jenis'),
                'alamat' => $this->input->post('alamat'),
                'merk' => $this->input->post('merk'),
                'status' => $this->input->post('status'),
                'kondisi' => $this->input->post('kondisi')
            );
            $update = $this->curl->simple_put($this->API . '/data_trafo', $data, array(CURLOPT_BUFFERSIZE => 10));
            if ($update) {
                $this->session->set_flashdata('hasil', 'Update Data Berhasil');
            } else {
                $this->session->set_flashdata('hasil', 'Update Data Gagal');
            }
            redirect('data_trafo');
        } else {
            $data['data_trafo'] = json_decode($this->curl->simple_get($this->API . '/data_trafo'));
            $params = array('id_laporan' => $this->uri->segment(3));
            $data['data_trafo'] = json_decode($this->curl->simple_get($this->API . '/data_trafo', $params));
            $this->load->view('edity', $data);
        }
    }

    function delete($kd_gardu)
    {
        if (empty($kd_gardu)) {
            redirect('data_trafo');
        } else {
            $delete = $this->curl->simple_delete($this->API . '/data_trafo', array('kd_gardu' => $kd_gardu), array(CURLOPT_BUFFERSIZE => 10));
            if ($delete) {
                $this->session->set_flashdata('hasil', 'Delete Data Berhasil');
            } else {
                $this->session->set_flashdata('hasil', 'Delete Data Gagal');
            }
            redirect('data_trafo');
        }
    }

    public function kirim()
    {
        $data = json_encode(
            array(
                'chatId' => $this->input->post('no_hp') . '@c.us',
                'body' => $this->input->post('pesan')
            )
        );

        $apiURL = 'https://eu116.chat-api.com/instance140325/';
        $token = '7e2q82931dyjmxq5';

        $options = stream_context_create(
            array('http' =>
            array(
                'method'  => 'POST',
                'header'  => 'Content-type: application/json',
                'content' => $data
            ))
        );
        $result = file_get_contents($apiURL . 'message?token=' . $token, false, $options);

        $response = json_decode($result, true);

        if ($response['sent'] == "true") {
            echo "<script>
                alert('Pesan berhasil dikirim');
                window.location.href='" . base_url() . "data_trafo/index';
                </script>";
        } else {
            echo "<script>
                alert('Pesan gagal dikirim');
                window.location.href='" . base_url() . "data_trafo/index';
                </script>";
        }
    }

    public function kirim_2()
    {
        $ch = curl_init('https://app.whatspie.com/api/messages');

        $array = array(
            'receiver' => $this->input->post('no_hp'),
            'device' => '081336174315',
            'message' => $this->input->post('pesan'),
            'type' => 'chat',
        );

        $post = http_build_query($array);

        curl_setopt($ch, CURLOPT_POSTFIELDS, $post);
        curl_setopt($ch, CURLOPT_HTTPHEADER, array(
            'Accept: application/json',
            'Content-Type: application/x-www-form-urlencoded',
            'Authorization: Bearer aAqhpNDKRn1E51bKZd3X2pMfquyMfcWe9vzfdN1R1GhAgciX67'
        ));

        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

        $result = curl_exec($ch);
        curl_close($ch);
        if ($result === FALSE) {
            echo "<script>
                alert('Pesan gagal dikirim');
                window.location.href='" . base_url() . "data_trafo/index';
                </script>";
        } else {
            echo "<script>
                alert('Pesan berhasil dikirim');
                window.location.href='" . base_url() . "data_trafo/index';
                </script>";
        }
    }

    function print()
    {
        $data['data_trafo'] = json_decode($this->curl->simple_get($this->API . '/data_trafo'));
        $this->load->view('print_data_trafo', $data);
    }

    function pdf()
    {
        $this->load->library('dompdf_gen');

        $data['data_trafo'] = json_decode($this->curl->simple_get($this->API . '/data_trafo'));

        $this->load->view('laporan_pdf_data_trafo', $data);

        $paper_size = 'A4';
        $orientation = 'landscape';
        $html = $this->output->get_output();
        $this->dompdf->set_paper($paper_size, $orientation);

        $this->dompdf->load_html($html);
        $this->dompdf->render();
        $this->dompdf->stream("data_trafo.pdf", array('Attachment' => 0));
    }

    public function export()
    {
        $this->load->model('Model');
        $data['data_trafo'] = $this->Model->getTGPHASAPB();
        $this->load->view('laporan_excel_tgphasapb', $data);
    }
}
