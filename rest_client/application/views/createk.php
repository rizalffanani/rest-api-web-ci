<!DOCTYPE html>
<html lang="en">

<head>
  <link rel="shortcut icon" href="<?php echo base_url(); ?>/assets/img/logo.png">
  <title>PLN ULP MALANG KOTA</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>


</head>

<body>
<nav class="navbar navbar-default">
    <div class="container-fluid">
      <div class="navbar-header">
        <img src="https://upload.wikimedia.org/wikipedia/commons/2/20/Logo_PLN.svg" alt="logoBrand" id="logoBrand" width="150" height="70">
      </div>
      <ul class="nav navbar-nav">
      <li><a href="<?php echo base_url() . 'petugas' ?>">Data Petugas Lapangan</a></li>
        <li><a href="<?php echo base_url() . 'dat_laporan' ?>">Data Laporan</a></li>
        <li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="#">Info Trafo<span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li><a href="<?php echo base_url() . 'data_trafo' ?>">Data Trafo</a></li>
            <li><a href="<?php echo base_url() . 'dat_lokasi' ?>">Lokasi Trafo</a></li>
          </ul>
        </li>
      </ul>
    </div>
  </nav>
  <div class="clear"></div>
  </header>

  <section>
    <div id="page-wrapper">
      <div class="row">
        <div class="col-lg-6">
          <h1 class="page-header">Tambah Data</h1>
        </div>
      </div>

      <!-- /.row -->
      <div class="row">
        <div class="col-lg-6">
          <?php echo $this->session->flashdata('hasil'); ?>
          <!-- /.panel-heading -->

          <div class="container">
            <div class="col-lg-10">
              <?= form_open_multipart('dat_laporan/createk') ?>
              <table>
                <tr>
                  <td>ID Laporan</td>
                  <td><?php echo form_input('id_laporan'); ?></td>
                </tr>
                <tr>
                  <td>KD Gardu</td>
                  <td><?php echo form_input('kd_gardu'); ?></td>
                </tr>
                <tr>
                  <td>Gambar Before</td>
                  <td><input type="file" <?php echo form_input('img_bef'); ?></td> </tr> <tr>
                  <td>Kondisi Awal</td>
                  <td><?php echo form_input('kondisi_awal'); ?></td>
                </tr>
                <tr>
                  <td>Lokasi</td>
                  <td><?php echo form_input('lokasi'); ?></td>
                </tr>
                <tr>
                  <td>Waktu</td>
                  <td><?php echo form_input('waktu', date("Y-m-d")); ?></td>
                </tr>
                <tr>
                  <td>Gambar After</td>
                  <td><input type="file" <?php echo form_input('img_baru'); ?></td> </tr> <tr>
                  <td>Kondisi Baru</td>
                  <td><?php echo form_input('kondisi_baru'); ?></td>
                </tr>
                <tr>
                  <td>Nama Petugas</td>
                  <td><?php echo form_input('nama_petugas'); ?></td>
                </tr>
                <tr>
                  <td colspan="2">
                    <?php echo form_submit('submit', 'Simpan'); ?>
                    <?php echo anchor('dat_laporan', 'Kembali'); ?></td>
                </tr>
              </table>
              <?php echo form_close(); ?>

              <!-- /.table-responsive -->
            </div>
            <!-- /.panel-body -->
          </div>
          <!-- /.panel -->
        </div>
        <!-- /.col-lg-12 -->
      </div>
  </section>
  <footer>
    <img src="<?php echo base_url(); ?>assets/img/footer.png" height="80">
  </footer>
  </div>
</body>

</html>