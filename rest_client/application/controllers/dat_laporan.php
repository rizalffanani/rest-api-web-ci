<?php
class dat_laporan extends CI_Controller
{
    var $API = "";

    function __construct()
    {
        parent::__construct();
        $this->API  = "http://localhost/PLN/rest_server/";
        $this->load->library('upload');
    }

    // menampilkan data mahasiswa
    function index()
    {
        $data['dat_laporan'] = json_decode($this->curl->simple_get($this->API . '/dat_laporan'));
        $this->load->view('listk', $data);
    }

    // insert data mahasiswa
    function createk()
    {
        if (isset($_POST['submit'])) {
            $config['upload_path'] = 'assets/img/';
            $config['allowed_types'] = 'gif|jpg|png|jpeg|bmp';
            $config['max_size'] = '2048';
            $config['overwrite'] = true;

            $this->upload->initialize($config);

            if (!empty($_FILES['img_bef']['name'])) {
                if (!$this->upload->do_upload('img_bef')) {
                    echo $this->upload->display_errors();
                } else {
                    var_dump($this->upload->data());
                }
            } else {
                echo "<script>
                        alert('Gambar Before tidak boleh kosong');
                        windowa.location.href='" . base_url() . "upload/index';
                        </script>";
            }

            if (!empty($_FILES['img_baru']['name'])) {
                if (!$this->upload->do_upload('img_baru')) {
                    $this->upload->display_errors();
                } else {
                    var_dump($this->upload->data());
                }
            } else {
                echo "<script>
                        alert('Gambar Sesudah tidak boleh kosong');
                        windowa.location.href='" . base_url() . "upload/index';
                        </script>";
            }

            $data = array(
                'id_laporan' => $this->input->post('id_laporan'),
                'kd_gardu' => $this->input->post('kd_gardu'),
                'img_bef' => $_FILES['img_bef']['name'],
                'kondisi_awal' => $this->input->post('kondisi_awal'),
                'lokasi' => $this->input->post('lokasi'),
                'waktu' => $this->input->post('waktu'),
                'img_baru' => $_FILES['img_baru']['name'],
                'kondisi_baru' => $this->input->post('kondisi_baru'),
                'nama_petugas' => $this->input->post('nama_petugas')
            );

            $insert = $this->curl->simple_post($this->API . '/dat_laporan', $data, array(CURLOPT_BUFFERSIZE => 10));
            if ($insert) {
                $this->session->set_flashdata('hasil', 'Insert Data Berhasil');
            } else {
                $this->session->set_flashdata('hasil', 'Insert Data Gagal');
            }
            redirect('dat_laporan');
        } else {
            $data['dat_laporan'] = json_decode($this->curl->simple_get($this->API . '/dat_laporan'));
            $this->load->view('createk', $data);
        }
    }

    // edit data mahasiswa
    function editk()
    {
        if (isset($_POST['submit'])) {
            $data = array(
                'id_laporan' => $this->input->post('id_laporan'),
                'kd_gardu' => $this->input->post('kd_gardu'),
                'img_bef' => $this->input->post('img_bef'),
                'kondisi_awal' => $this->input->post('kondisi_awal'),
                'lokasi' => $this->input->post('lokasi'),
                'waktu' => $this->input->post('waktu'),
                'img_baru' => $this->input->post('img_baru'),
                'kondisi_baru' => $this->input->post('kondisi_baru'),
                'nama_petugas' => $this->input->post('nama_petugas')
            );
            $update = $this->curl->simple_put($this->API . '/dat_laporan', $data, array(CURLOPT_BUFFERSIZE => 10));
            if ($update) {
                $this->session->set_flashdata('hasil', 'Update Data Berhasil');
            } else {
                $this->session->set_flashdata('hasil', 'Update Data Gagal');
            }
            redirect('dat_laporan');
        } else {
            $data['dat_laporan'] = json_decode($this->curl->simple_get($this->API . '/dat_laporan'));
            $params = array('id_laporan' => $this->uri->segment(3));
            $data['dat_laporan'] = json_decode($this->curl->simple_get($this->API . '/dat_laporan', $params));
            $this->load->view('editk', $data);
        }
    }

    function delete($id)
    {
        if (empty($id)) {
            redirect('dat_laporan');
        } else {
            $delete = $this->curl->simple_delete($this->API . '/dat_laporan', array('id_laporan' => $id), array(CURLOPT_BUFFERSIZE => 10));
            if ($delete) {
                $this->session->set_flashdata('hasil', 'Delete Data Berhasil');
            } else {
                $this->session->set_flashdata('hasil', 'Delete Data Gagal');
            }
            redirect('dat_laporan');
        }
    }
    function print()
    {
        $data['dat_laporan'] = json_decode($this->curl->simple_get($this->API . '/dat_laporan'));
        $this->load->view('print_dat_laporan', $data);
    }

    function pdf()
    {
        $this->load->library('dompdf_gen');

        $data['dat_laporan'] = json_decode($this->curl->simple_get($this->API . '/dat_laporan'));

        $this->load->view('laporan_pdf', $data);

        $paper_size = 'A4';
        $orientation = 'potrait';
        $html = $this->output->get_output();
        $this->dompdf->set_paper($paper_size, $orientation);

        $this->dompdf->load_html($html);
        $this->dompdf->render();
        $this->dompdf->stream("laporan_dat.pdf", array('Attachment' => 0));
    }

    public function export()
    {
        $this->load->model('Model');
        $data['dat_laporan'] = $this->Model->getDATLAPORAN();
        $this->load->view('laporan_excel_dat_laporan', $data);
    }
}
