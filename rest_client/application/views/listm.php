<!DOCTYPE html>
<html lang="en">

<head>
  <link rel="shortcut icon" href=".<?php echo base_url(); ?>assets/img/logo.png">
  <title>PLN ULP MALANG KOTA</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  <link rel="stylesheet" href="https://unpkg.com/leaflet@1.6.0/dist/leaflet.css" integrity="sha512-xwE/Az9zrjBIphAcBb3F6JVqxf46+CDLwfLMHloNu6KEQCAWi6HcDUbeOfBIptF7tcCzusKFjFw2yuvEpDL9wQ==" crossorigin="" />
  <script src="https://unpkg.com/leaflet@1.6.0/dist/leaflet.js" integrity="sha512-gZwIG9x3wUXg2hdXF6+rVkLF/0Vi9U8D2Ntg4Ga5I5BZpVkVxlJWbSQtXPSiUTtC0TjtGOmxa1AJPuV0CPthew==" crossorigin=""></script>
  <style type="text/css">
    #mapid {
      height: 200px;
    }
  </style>

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
    <?php echo form_open('search/searchlokasi') ?>
    <input type="text" name="keyword" id="keyword" class="form-control" placeholder="Kd Gardu">
    <button type="submit" class="btn btn-info">Cari</button>

    <?php echo form_close() ?>

    <!-- Table -->
    <div class="table-responsive">
      <table class="table table-bordered">

        <!-- /.row -->
        <div class="row">
          <div class="col-lg-6">
            <?php echo $this->session->flashdata('hasil'); ?>

            <h1>Data Lokasi</h1>
            <a class="btn btn-primary" href="<?php echo base_url('dat_lokasi/createm') ?>"><i class="fa fa file"></i>Create</a>
            <table width="150%" class="table table-striped table-bordered table-hover" id="dataTables-example">
              <thead>
                <tr>
                  <th>No</th>
                  <th>KD GARDU</th>
                  <th>KD Penyulang</th>
                  <th>Alamat</th>
                  <th>Latitude</th>
                  <th>Longtitude</th>
                  <th>UPJ</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tbody>
                <?php
                foreach ($dat_lokasi as $c) {
                  echo "<tr>
                <td>$c->no</td>
                <td>$c->kd_gardu</td>
                <td>$c->kd_pylg</td>
                <td>$c->alamat</td>
                <td>$c->latitude</td>
                <td>$c->longtitude</td>
                <td>$c->upj</td>
								<td>" . anchor('dat_lokasi/editm/' . $c->no, 'Edit') . "
									" . anchor('dat_lokasi/delete/' . $c->no, 'Delete') . "</td>
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
  <div id="mapid" style="width: 100%; height: 500px;"></div>
  <script>
    var mymap = L.map('mapid').setView([-7.9775467689, 112.6434508643], 15);
    L.tileLayer('https://api.mapbox.com/styles/v1/{id}/tiles/{z}/{x}/{y}?access_token={accessToken}', {
      attribution: 'Map data &copy; <a href="https://www.openstreetmap.org/">OpenStreetMap</a> contributors, <a href="https://creativecommons.org/licenses/by-sa/2.0/">CC-BY-SA</a>, Imagery © <a href="https://www.mapbox.com/">Mapbox</a>',
      maxZoom: 18,
      id: 'mapbox/streets-v11',
      tileSize: 512,
      zoomOffset: -1,
      accessToken: 'pk.eyJ1IjoiZHdpLXJpZmFsZGk0MTI5OSIsImEiOiJja2JsdDRnd2MxYzh4Mnhsc25ndXZwcjQyIn0.vYl2V9F_D-qdVwc0IMg6zA'
    }).addTo(mymap);

    var marker = L.marker([-7.9775467689, 112.6434508643]).addTo(mymap);
    marker.bindPopup("<b>Gardu P0330</b>").openPopup();
    var marker2 = L.marker([-7.9855172616, 112.6368854776]).addTo(mymap);
    marker2.bindPopup("<b>Gardu P0417</b>").openPopup();
    var marker2 = L.marker([-7.9635142702, 112.6369502474]).addTo(mymap);
    marker2.bindPopup("<b>Gardu P0384</b>").openPopup();
    var marker2 = L.marker([-7.9618567648, 112.6391460883]).addTo(mymap);
    marker2.bindPopup("<b>Gardu P0313</b>").openPopup();
    var marker2 = L.marker([-7.9710291905, 112.6437044871]).addTo(mymap);
    marker2.bindPopup("<b>Gardu P0328</b>").openPopup();
    var marker2 = L.marker([-7.9723844823, 112.6452767132]).addTo(mymap);
    marker2.bindPopup("<b>Gardu P0090</b>").openPopup();
    var marker2 = L.marker([-7.9942501041, 112.6396689583]).addTo(mymap);
    marker2.bindPopup("<b>Gardu P1538</b>").openPopup();
    var marker2 = L.marker([-7.9582917948, 112.6314342679]).addTo(mymap);
    marker2.bindPopup("<b>Gardu P0358</b>").openPopup();
    var marker2 = L.marker([-7.9827702058, 112.6300681966]).addTo(mymap);
    marker2.bindPopup("<b>Gardu P0363</b>").openPopup();
    var marker2 = L.marker([-7.9765110953, 112.6301961939]).addTo(mymap);
    marker2.bindPopup("<b>Gardu P0045</b>").openPopup();
    var marker2 = L.marker([-7.957306, 112.638667]).addTo(mymap);
    marker2.bindPopup("<b>cakpri</b>").openPopup();
  </script>

  </section>
  <img src="<?php echo base_url(); ?>assets/img/footer1.png" height="90">&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
  &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp<a href="http://www.pln.co.id">www.pln.co.id</a>
  </div>
</body>

</html>