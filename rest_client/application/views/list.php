<!DOCTYPE html>
<html lang="en">

<head>
  <link rel="shortcut icon" href="<?php echo base_url(); ?>assets/img/logo.png">
  <title>PLN ULP MALANG KOTA</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
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
    <?php echo form_open('search/search') ?>
    <input type="text" name="keyword" id="keyword" class="form-control" placeholder="Search">
    <button type="submit" class="btn btn-info">Cari</button>

    <?php echo form_close() ?>

    <!-- Table -->
    <div class="table-responsive">
      <table class="table table-bordered">

        <!-- /.row -->
        <div class="row">
          <div class="col-lg-6">
            <?php echo $this->session->flashdata('hasil'); ?>

            <h1>Data Petugas Lapangan</h1>

            <a class="btn btn-primary" href="<?php echo base_url('petugas/create') ?>"><i class="fa fa file"></i>Create</a>
            <table width="150%" class="table table-striped table-bordered table-hover" id="dataTables-example">
              <thead>
                <tr>
                  <th>ID Petugas</th>
                  <th>Nama Petugas</th>
                  <th>Alamat</th>
                  <th>Tempat Tanggal lahir</th>
                  <th>Telepon</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tbody>
                <?php
                foreach ($petugas as $pe) {
                  echo "<tr>
                                    <td>$pe->id_petugas</td>
                                    <td>$pe->nama_petugas</td>
                                    <td>$pe->alamat</td>
                                    <td>$pe->ttl</td>                                
                                    <td>$pe->telp</td>                                
                                    <td>" . anchor('petugas/edit/' . $pe->id_petugas, 'Edit') . "
                                      " . anchor('petugas/delete/' . $pe->id_petugas, 'Delete') . "</td>
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
  </section>
  </div>
  <footer>
    <div>
      <img src="<?php echo base_url(); ?>assets/img/footer1.png" height="90">&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
      &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp<a href="http://www.pln.co.id">www.pln.co.id</a>
    </div>
  </footer>
</body>

</html>