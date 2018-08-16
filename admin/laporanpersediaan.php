<?php 
$title = 'Laporan persediaan Barang';
include 'nav_admin/header.php'; 
include '../assets/fungsi_rupiah.php';
include '../koneksi.php'; 
$query ="SELECT
                            b.kd_barang,
                            b.nama_barang,
                            b.harga_beli,
                            b.harga_jual,
                            s.nama_supplier,
                            (SELECT IF(SUM(dp.jumlah) IS NULL,0,SUM(dp.jumlah)) FROM det_pembelian dp  WHERE dp.kd_barang = b.kd_barang) as jml,
                            ((SELECT IF(SUM(dp.jumlah) IS NULL,0,SUM(dp.jumlah)) FROM det_pembelian dp  WHERE dp.kd_barang = b.kd_barang) - (SELECT (IF(SUM(dp2.jumlah) IS NULL,0,SUM(dp2.jumlah)))
                            FROM det_penjualan dp2 WHERE dp2.kd_barang = b.kd_barang)) as stok
                            FROM `barang` b
                            LEFT JOIN supplier s ON b.id_supplier=s.id_supplier
                            GROUP BY b.kd_barang ORDER BY `nama_barang` ASC";  
$result = mysqli_query($koneksi, $query);
?>
<link rel="stylesheet" href="../css/buttons.dataTables.min.css">
<link rel="stylesheet" href="../css/dataTables.bootstrap.min.css">
<div class="container">
<div class="panel panel-primary">
  <!-- Default panel contents -->
  <div class="panel-heading"><strong><span class="glyphicon glyphicon-briefcase"></span> Persediaan Barang</strong></div>
      <div class="panel-body">
        <table class="table table-bordered table-condensed " id="mydata">
            		<thead>
            		<tr class="success">
      	               <th>#</th>
      	               <th>Nama Barang</th>
      	               <th>Supplier</th>
      	               <th>Harga Beli</th>
      	               <th>Harga Jual</th>
      	               <th>Stok</th>
      	           </tr>
      	            </thead>
                                        
                   <?php  
                      $no = 1;
                          while($row = mysqli_fetch_array($result))  
                          {  
                               echo '  
                               <tr>  
                                  <td>'.$no++.'</td>
                                    <td>'.$row["nama_barang"].'</td>  
                                    <td>'.$row["nama_supplier"].'</td>  
                                    <td>'.Rp($row["harga_beli"]).'</td>  
                                    <td>'.Rp($row["harga_jual"]).'</td>  
                                    <td>'.$row["stok"].'</td> 
                               </tr>  

                               ';  
                          }  
                          ?>  
            </table>
      		</div>
        </div>
        </div>
<?php include 'nav_admin/footer.php'; ?>

<script src="../js/dataTables.buttons.min.js"></script>
<script src="../js/buttons.flash.min.js"></script>
<script src="../js/jszip.min.js"></script>
<script src="../js/pdfmake.min.js"></script>
<script src="../js/vfs_fonts.js"></script>
<script src="../js/buttons.html5.min.js"></script>
<script src="../js/buttons.print.min.js"></script>
<script>
$(document).ready(function() {
    $('#mydata').DataTable( {
        dom: 'Bfrtip',
        buttons: [
            'copy', 'excel', 'pdf', 'print'
        ]
    } );
} );
</script>
</script>