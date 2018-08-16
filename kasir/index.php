<?php 
include 'nav_kasir/header.php'; 
include '../assets/fungsi_rupiah.php';
include '../assets/fungsi_tanggal.php';
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
 
<link rel="stylesheet" href="../css/dataTables.bootstrap.min.css">
	
<div class="container">
           <div class="row "style="padding-top:40px;">
                <div class="col-md-4 col-sm-4 col-xs-6">
                        <div class="panel panel-primary">
                            <div class="panel-heading">
                             INFORMASI
                            </div>
                            <div class="panel-body">
                                  <?php
                                  $tgl=date('l, d-m-Y');
                                  echo $tgl;
                                  ?>
                                  <p> Nama User : <strong style="color: red;"> <?php echo $nama; ?> </strong></p>
                                  
                            </div>
                            <div class="panel-footer">
                                
                            </div>
                        </div>
                    </div>
                <div class="col-md-8 col-sm-4 col-xs-6">
                        <div class="panel panel-primary">
                          <div class="panel-heading">
                             <span class="glyphicon glyphicon-paperclip"></span> Stok Barang
                           </div>
                          <div class="panel-body">
                            <table class="table table-condensed table-bordered" id="mydata">
                                  <thead>
                                  <tr class="active">
                                         <th>#</th>
                                         <th>Nama Barang</th>
                                         <th>Harga</th>
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
                                             <td>'.Rp($row["harga_jual"]).'</td>  
                                             <td>'.$row["stok"].'</td>
                                        </tr>  
                                     ';  
                                    }  
                                  ?>  
                              </table>
                            </div>
                            <div class="panel-footer">
                            </div>
                        </div>
                    </div>
      </div>
    </div>

      <div class="footer">
            Copyright &copy; <a href="index.php"><strong>Endhita Froozen Food 2018</strong></a> 
      </div>
      
 </body>
 <!-- library jQuery -->
  <script src="../js/bootstrap.min.js"></script>

</html>
<script src="../js/jquery-3.3.1.min.js"></script>
<script src="../js/jquery.dataTables.min.js"></script>
<script src="../js/datatables.min.js"></script>
<script>
  $(document).ready(function() {
    $('#mydata').dataTable();
  });
</script>
