<!DOCTYPE html>
<html><head>
	<title></title>
</head><body>
	<table>
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
        
        <?php
         foreach ($dat_laporan as $la) {
            echo "<tr>
                    <td>$la->id_laporan</td>
          <td>$la->kd_gardu</td>
          <td><img src= ../assets/img/" . $la->img_bef . " width='100' height='100'></td>
                          <td>$la->kondisi_awal</td>
                          <td>$la->lokasi</td>
                          <td>$la->waktu</td>
          <td><img src= ../assets/img/" . $la->img_baru . " width='100' height='100'></td>
          <td>$la->kondisi_baru</td>
         <td>$la->nama_petugas</td>
        </tr>";
        }
	    ?>
	</table>
</body></html>