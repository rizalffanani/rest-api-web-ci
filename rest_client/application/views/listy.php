<!DOCTYPE html>
<html lang="en">

<head>
  <link rel="shortcut icon" href="<?php echo base_url(); ?>../assets/img/logo.png">
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
      <ul class="nav navbar-nav navbar-right">
        <li><a href="http://localhost/PLN/rest_client/login"><span class="glyphicon glyphicon-log-in"></span> Logout</a></li>
      </ul>
    </div>
  </nav>
  <div class="navbar-form navbar-center">
    <?php echo form_open('search/searchtrafo') ?>
    <input type="text" name="keyword" id="keyword" class="form-control" placeholder="KD Gardu">
    <button type="submit" class="btn btn-info">Cari</button>

    <?php echo form_close() ?>
    <!-- Table -->
    <div class="table-responsive">
      <table class="table table-bordered">

        <!-- /.row -->
        <div class="row">
          <div class="col-lg-6">
            <?php echo $this->session->flashdata('hasil'); ?>

            <h1>Data Trafo</h1>
            <a class="btn btn-primary" href="<?php echo base_url('data_trafo/createy') ?>"><i class="fa fa file"></i>Create</a>
            <table width="150%" class="table table-striped table-bordered table-hover" id="dataTables-example">
              <thead>
                <tr>
                  <th>KD Gardu</th>
                  <th>Nomor Seri Trafo</th>
                  <th>Jenis Gardu</th>
                  <th>Alamat</th>
                  <th>Merk</th>
                  <th>Status</th>
                  <th>Kondisi</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tbody>
                <?php
                foreach ($data_trafo as $c) {
                  echo "<tr>
                <td>$c->kd_gardu</td>
                <td>$c->nomor_seri</td>
                <td>$c->jenis</td>
                <td>$c->alamat</td>
                <td>$c->merk</td>
                <td>$c->status</td>
                <td>$c->kondisi</td>

                <td>" . anchor('data_trafo/edity/' . $c->kd_gardu, 'Edit') . "
                  " . anchor('data_trafo/delete/' . $c->kd_gardu, 'Delete') . "
                  " . anchor('Message', 'Kirim', ['data-toggle' => 'modal', 'data-target' => '#exampleModal']) . "</td>
                </tr>";
                }
                ?>
              </tbody>
            </table>
            <!-- /.table-responsive -->
          </div>
          <!-- /.panel-body -->
        </div>
        <!-- /.panel -->
    </div>
    <!-- /.col-lg-12 -->
  </div>

  <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Kirim Pesan</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <form action="data_trafo/kirim_2" method="POST">
            <div class="form-group">
              <label for="pesan">Pesan</label>
              <input type="text" class="form-control" id="pesan" name="pesan" value="Waktunya perbaiki transformator">
            </div>
            <div class="form-group">
              <label for="no_hp">Penerima</label>
              <select class="form-control" id="no_hp" name="no_hp">
                <?php foreach ($petugas as $pt) : ?>
                  <option value="<?= $pt->telp ?>"><?= $pt->nama_petugas ?></option>
                <?php endforeach; ?>
              </select>
            </div>
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary">Kirim</button>
          </form>
        </div>
        <div class="modal-footer">

        </div>
      </div>
    </div>
  </div>

  </section>
  <img src="<?php echo base_url(); ?>assets/img/footer1.png" height="90">&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
  &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp<a href="http://www.pln.co.id">www.pln.co.id</a>
  </div>
</body>

</html>