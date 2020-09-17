<?php 
header("Content-type: application/vnd-ms-excel");
header("Content-Disposition: attachment; filename=datlporan.xls");
?>
<h1 align="center">Data Laporan</h1>
<table border="1" width="100%">
<thead>
<tr>
<th>ID Laporan</th>
                  <th>KD Gardu</th>
                  <th>Gambar Awal</th>
                  <th>Kondisi awal</th>
                  <th>Lokasi</th>
                  <th>Waktu</th>
                  <th>Gambar Baru</th>
                  <th>Kondisi Baru</th>
                  <th>Nama Petugas</th>
 </tr>
</thead>
<tbody>
<?php $i=1; foreach($dat_laporan as $dat_laporan) { ?>
<tr>
<td><?php echo $dat_laporan->kd_gardu ?></td>
 <td><?php echo $dat_laporan->img_bef ?></td>
 <td><?php echo $dat_laporan->kondisi_awal ?></td>
 <td><?php echo $dat_laporan->lokasi ?></td>
 <td><?php echo $dat_laporan->waktu ?></td>
 <td><?php echo $dat_laporan->img_baru ?></td>
 <td><?php echo $dat_laporan->kondisi_baru ?></td>
 <td><?php echo $dat_laporan->nama_petugas?></td>
 </tr>
<?php $i++; } ?>
</tbody>
</table>