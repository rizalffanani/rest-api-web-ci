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

  <!-- /.row -->
  <div class="row">
    <div class="col-lg-6">
      <?php echo $this->session->flashdata('hasil'); ?>
      <hr>
      <div class="panel-heading">
        <i class="fa fa-table"></i>
      </div>
      <!-- /.panel-heading -->
      <div class="panel-body">
        <?php echo form_open('dat_lokasi/editm'); ?>
        <?php echo form_hidden('no', $dat_lokasi[0]->no); ?>
        <table>
          <!-- <tr>
    <td><?php echo form_input('', $dat_lokasi[0]->no, "disabled"); ?></td>
  </tr> -->
          <tr>
            <td>NO</td>
            <td><?php echo form_input('no', $dat_lokasi[0]->no); ?></td>
          </tr>
          <tr>
            <td>KD GARDU</td>
            <td><?php echo form_input('kd_gardu', $dat_lokasi[0]->kd_gardu); ?></td>
          </tr>
          <tr>
            <td>KD Penyulang</td>
            <td><?php echo form_input('kd_pylg', $dat_lokasi[0]->kd_pylg); ?></td>
          </tr>
          <tr>
            <td>Alamat</td>
            <td><?php echo form_input('alamat', $dat_lokasi[0]->alamat); ?></td>
          </tr>
          <tr>
            <td>Latitude</td>
            <td><?php echo form_input('latitude', $dat_lokasi[0]->latitude); ?></td>
          </tr>
          <tr>
            <td>Longitude</td>
            <td><?php echo form_input('longtitude', $dat_lokasi[0]->longtitude); ?></td>
          </tr>
          <tr>
            <td>UPJ</td>
            <td><?php echo form_input('upj', $dat_lokasi[0]->upj); ?></td>
          </tr>
          <tr>
            <td colspan="2">
              <?php echo form_submit('submit', 'Simpan'); ?>
              <?php echo anchor('dat_lokasi', 'Kembali'); ?></td>
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
  <img src="<?php echo base_url(); ?>assets/img/footer.png" height="80">
  </div>
</body>

</html>