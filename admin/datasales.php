<?php
$title = "Data Sales";
include 'nav_admin/header.php';
include '../koneksi.php';
?>
<div class="container">
<a href="tambahdatasales.php"><button class="btn btn-primary">Tambah Data Sales</button></a> <br>
</div> <br>
<link rel="stylesheet" type="text/css" href="../css/dataTables.bootstrap.css">
<div class="container">
<div class="panel panel-primary">
  <!-- Default panel contents -->
 <div class="panel-heading"><strong><span class="glyphicon glyphicon-briefcase"></span> Data Sales</strong></div> 
   <div class="panel-body"> 
 	<table class="table table-bordered" id="datasales">
       	      <thead>
        <tr class="success">
          <th>#</th>
            <th>Nama Sales</th>
            <th>Supplier</th>
            <th>Alamat</th>
            <th>No Tlp</th>   	               
      	    <th><center>Aksi</center></th>
          </tr>
        </thead>
			<tbody>
                <?php
                $no = 1;
                $data = mysqli_query($koneksi, "SELECT 
                                                s.id_sales,
                                                s.nama_sales,
                                                s.alamat,
                                                s.no_tlp,
                                                su.nama_supplier
                                                FROM `sales` s
                                                LEFT JOIN supplier su ON s.id_supplier=su.id_supplier
                                                ORDER BY nama_sales ASC");
                while ($d = mysqli_fetch_array($data)) {
                    echo '	
                    <tr>
                        <td>' . $no++ . '</td>
                        <td>' . $d['nama_sales'] . ' </td>
                        <td>' . $d['nama_supplier'] . '</td>
                        <td>' . $d['alamat'] . ' </td>
                        <td>' . $d['no_tlp'] . '</td>
                        <td>
                                <center>
                                <a href="proses/editsales.php?id_sales=' . $d['id_sales'] . '" class="btn btn-warning">Ubah</a>

                                <a href="proses/prosessales.php?act=delete&id_sales=' . $d['id_sales'] . '" class="btn btn-danger" onclick ="if (!confirm(\'Apakah Anda yakin akan menghapus data ini?\')) return false;">Hapus</a>
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
    $('#datasales').dataTable();
  });
</script>

 <?php 
include 'nav_admin/footer.php';
?>
 