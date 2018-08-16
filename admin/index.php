<?php 
$title = "Selamat Datang";
include 'nav_admin/header.php'; 
include '../assets/fungsi_rupiah.php';
include '../assets/fungsi_tanggal.php';
include '../koneksi.php'; 
?>
<style type="text/css">
	
</style>

<link rel="stylesheet" href="../css/dataTables.bootstrap.min.css">
<link rel="stylesheet" href="../css/dataTables.bootstrap.min.css">
  <!-- <img src="../img/toko.jpg" alt="" style="vertical-align: middle; background-size: cover; margin-left: 40px; margin-top: -5px;"><br><br> -->
<div class="container">
           <div class="row "style="padding-top:40px;">
                <div class="col-md-5 col-sm-4 col-xs-6">
                        <div class="panel panel-primary">
                            <div class="panel-heading"><span class="glyphicon glyphicon-bookmark"></span> Informasi Penjualan / <?php $tgl=date('l, d-m-Y'); echo'<b style="color: #F1D447;">'. $tgl.'</b>';?></div>
                            <div class="panel-body">
                              <style>
                                table {
                                        width: 100%;
                                    }

                                    tr {
                                        height: 37px;
                                    }
                              </style>
                              <table class="table-striped">
                                
                                <tr>
                                  <td>Nama User</td>
                                  <td> <strong> <?php echo $nama; ?> </strong></td>
                                </tr>

                                 <tr>
                                  <td>Total Barang</td>
                                  <?php
                                  $jumlah_record = mysqli_query($koneksi, "SELECT COUNT(*) as total FROM `barang`");
                                  $jum = mysqli_fetch_array($jumlah_record);
                                  echo '
                                  <td><b>' . $jum['total'] . ' </b>Barang</td>';
                                  ?>                                
                                </tr>

                                <tr>
                                  <td>Total Pelanggan</td>
                                  <?php
                                  $jumlah_record = mysqli_query($koneksi, "SELECT COUNT(*) as total FROM `pelanggan`");
                                  $jum = mysqli_fetch_array($jumlah_record);
                                  echo '
                                  <td><b>' . $jum['total'] . ' </b>Pelanggan</td>';
                                  ?>                                
                                </tr>

                                <tr>
                                  <td>Total Supplier</td>
                                  <?php
                                  $jumlah_record = mysqli_query($koneksi, "SELECT COUNT(*) as total FROM `supplier`");
                                  $jum = mysqli_fetch_array($jumlah_record);
                                  echo '
                                  <td><b>' . $jum['total'] . ' </b>Supplier</td>';
                                  ?>                                
                                </tr>

                                <tr>
                                  <td>Barang Terjual</td>
                                  <?php
                                  $jumlah_record = mysqli_query($koneksi, "SELECT SUM(jumlah) as total FROM `det_penjualan`");
                                  $jum = mysqli_fetch_array($jumlah_record);
                                  echo '
                                  <td><b>' . $jum['total'] . ' </b>Barang</td>';
                                  ?>                                
                                </tr>

                                <tr>
                                  <td>Total Pembelian</td>
                                  <?php
                                  $jumlah_record = mysqli_query($koneksi, "SELECT SUM(jumlah) as total FROM `det_pembelian`");
                                  $jum = mysqli_fetch_array($jumlah_record);
                                  echo '
                                  <td><b>' . $jum['total'] . ' </b>Barang</td>';
                                  ?>                                
                                </tr>

                                <tr>
                                  <td>Penjualan Hari ini</td>
                                  <?php
                                  $jumlah_record = mysqli_query($koneksi, "SELECT tanggal,COUNT(*) AS harian FROM penjualan WHERE tanggal=DATE(NOW()) GROUP BY tanggal");
                              
                                  $jum = mysqli_fetch_array($jumlah_record);
                                  echo '
                                  <td><b>' . $jum['harian'] . '</b> Tranasaksi</td>';
                                  ?>
                                </tr>

                                <tr>
                                  <td>Pemasukkan Hari ini</td>
                                  <?php
                                  $jumlah_record = mysqli_query($koneksi, "SELECT tanggal, 
                                                                    SUM(harga*jumlah) AS total
                                                                    FROM penjualan p
                                                                    LEFT JOIN det_penjualan dp ON p.id_penjualan = dp.id_penjualan
                                                                    WHERE tanggal=DATE(NOW())
                                                                    GROUP BY tanggal");
                                  $jum = mysqli_fetch_array($jumlah_record);
                                  echo '
                                  <td><b>' . Rp($jum['total']) . '</b> </td>';
                                  ?>
                                </tr>

                            </table>
                            </div>
                          </div>
                        </div>
                  <!-- chart -->

      <div class="col-md-7 col-sm-4 col-xs-6">
        <div class="panel panel-primary">
          <div class="panel-heading">
            <span class="glyphicon glyphicon-paperclip"></span> Presentase Barang Laku </div>
             <div id="chart-container">
                <canvas id="mycanvas"></canvas>
            </div>
       </div>
      </div>  
    </div>
  </div>


 

<div class="container">
  <div class="panel panel-primary">
                            <div class="panel-heading"><span class="glyphicon glyphicon-shopping-cart"></span> Informasi Barang</div>
                            <div class="panel-body">
        <table class="table table-bordered table-condensed " id="mydata">
            		<thead>
            		<tr class="active">
      	               <th>#</th>
      	               <th>Nama Barang</th>
      	               <th>Supplier</th>
      	               <th>Harga Beli</th>
      	               <th>Harga Jual</th>
      	               <th>Stok</th>
      	           </tr>
      	            </thead>
                                        
                   <?php  
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

 </body>
 <!-- library jQuery -->

<script src="../js/bootstrap.min.js"></script>
<script src="../js/jquery-3.3.1.min.js"></script>
<script type="text/javascript" src="../js/chartjs.min.js"></script>
<script type="text/javascript" src="../js/app.js"></script>
<script src="../js/jquery.dataTables.min.js"></script>
<script src="../js/datatables.min.js"></script>
<?php include 'nav_admin/footer.php'; ?>
<script>
  $(document).ready(function() {
    $('#mydata').dataTable();
  });
</script>
</html>
