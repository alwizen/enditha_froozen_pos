<?php  
$title = 'Data Supplier';
include 'nav_admin/header.php';
  ?>
 
<div class="container">
<a href="tambahdatasupplier.php"><button class="btn btn-primary">Tambah Data Supplier</button></a> <br>
</div> <br>
<link rel="stylesheet" type="text/css" href="../css/dataTables.bootstrap.css">
<div class="container">
<div class="panel panel-primary">
  <!-- Default panel contents -->
 <div class="panel-heading"><strong><span class="glyphicon glyphicon-briefcase"></span> Data Supplier</strong></div> 
   <div class="panel-body"> 
 	<table class="table table-bordered" id="datasup">
       	      <thead>
        <tr class="success">
          <th>#</th>
            <th>Nama Supplier</th>
            <th>Alamat</th>
            <th>No Tlp</th>   	               
      	    <th><center>Aksi</center></th>
          </tr>
        </thead>
			<tbody>

			<?php 
                include '../koneksi.php';
                $no = 1;
                $data = mysqli_query($koneksi,"SELECT * FROM supplier");
                while($d = mysqli_fetch_array($data)){
              echo'	
			<tr>
				<td>'. $no++ .'</td>
				<td>'. $d['nama_supplier'].'</td>
				<td>'. $d['alamat'].' </td>
				<td>'. $d['no_tlp'].'</td>
				<td>
                        <center>
                          <a href="proses/editsupplier.php?id_supplier='. $d['id_supplier'].'" class="btn btn-warning">Ubah</a>

                          <a href="proses/prosessupplier.php?act=delete&id_supplier='. $d['id_supplier'].'" class="btn btn-danger" onclick ="if (!confirm(\'Apakah Anda yakin akan menghapus data ini?\')) return false;">Hapus</a>
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
    $('#datasup').dataTable();
  });
</script>
 

 <?php 
include 'nav_admin/footer.php';
  ?>
