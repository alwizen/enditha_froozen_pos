<?php 
$title = 'Data pelanggan';
include 'nav_admin/header.php';
 ?> 
 <link rel="stylesheet" type="text/css" href="../css/dataTables.bootstrap.css">
<div class="container">
 	<a href="tambahdatapelanggan.php"><button class="btn btn-primary">Tambah Data Pelanggan</button></a> <br>
</div> <br>
<div class="container">
  <div class="panel panel-primary">
  <!-- Default panel contents -->
  <div class="panel-heading"><strong><span class="glyphicon glyphicon-briefcase"></span> Data Pelanggan</strong></div>
      <div class="panel-body">
 	<table class="table table-hover table-bordered" id="datapel">
            			<thead>
            		<tr class="warning">
      	               <th>#</th>
      	               <th>Nama Pelanggan</th>
      	               <th>Jenis Kelamin</th>
      	               <th>Alamat</th>
      	               <th>No. Tlp</th>
      	               <th><center>ACTION</center></th>
            			   </tr>
            			</thead>
                       <tbody>

												<?php 
                          include '../koneksi.php';
                          $no = 1;
                            $data = mysqli_query($koneksi,"SELECT * FROM pelanggan");
                            while($d = mysqli_fetch_array($data)){
                    echo'
 
             
                  	<tr>
                  		<td>'. $no++ .'</td>
                      <td>'. $d['nama_pelanggan'].' </td>
                      <td>'. $d['jns_kel'].'</td>
                      <td>'. $d['alamat'].'</td>
                      <td>'. $d['no_tlp'].'</td>
                      <td>
                        <center>
												<a href="proses/editpelanggan.php?id_pelanggan='. $d["id_pelanggan"].'" class="btn btn-warning">Edit</a>
												<a href="proses/prosespelanggan.php?act=delete&id_pelanggan='. $d['id_pelanggan'].'" class="btn btn-danger" onclick ="if (!confirm(\'Apakah Anda yakin akan menghapus data ini?\')) return false;">Hapus</a>
                        </center>
                      </td>
                    </tr> 
                    ';

									
                  }
                     ?>              
                </tbody>
      		  </table>
</div>
</div>
</div>
<script>
  $(document).ready(function() {
    $('#datapel').dataTable();
  });
</script>

 <?php 
 include 'nav_admin/footer.php';
  ?>