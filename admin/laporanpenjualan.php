<?php 
$title = "Cetak Laporan Penjualan";
include 'nav_admin/header.php'; 
include '../koneksi.php';
include '../assets/fungsi_rupiah.php';
include '../assets/fungsi_tanggal.php';
$query = "SELECT  
          p.kd_penjualan, 
          p.tanggal,
          jumlah, 
          nama_barang,
          pl.nama_pelanggan,
          SUM(dp.jumlah*dp.harga) as grand_total 
          FROM penjualan p 
          LEFT JOIN det_penjualan dp ON p.id_penjualan=dp.id_penjualan 
          LEFT JOIN barang b ON dp.kd_barang=b.kd_barang
          LEFT JOIN pelanggan pl ON dp.id_pelanggan = pl.id_pelanggan
          GROUP BY id_det_penjualan ORDER BY p.tanggal ASC";
$sql = mysqli_query($koneksi, $query);
?>
 
<link rel="stylesheet" href="../css/jquery-ui.css">

<div class="container">
  <div class="panel panel-primary">
  <!-- Default panel contents -->
    <div class="panel-heading"><strong>Laporan Penjualan</strong></div>
    <div class="panel-body">
      <form action="lap_range_penjualan.php" method="post">
       <div class="col-md-2">
            <input type="date" name="dari" id="dari" class="form-control" required />
        </div>
        <div class="col-md-2">
            <input type="date" name="sampai" id="sampai" class="form-control" required />
        </div>
        <div class="col-md-8">
          <button class="btn btn-info" type="submit" formtarget="_blank"> <span class="glyphicon glyphicon-print"></span> Cetak</button>
        </div>
        </form>

        <div class="clearfix"></div>
        <br/>
        <div id="purchase_order">
            <table class="table table-bordered">
              <tr class="active">
                <th>Kode Transaksi</th>
                <th>Nama Pelanggan</th>
                <th>Tanggal</th>
                <th>Nama Barang</th>
                <th>Jumlah</th>
                <th>Grand Total</th>
            </tr>
              <?php
              $jumlah = 0;
              $grand_total = 0;
              while($row= mysqli_fetch_array($sql))
              {
                ?>
                  <tr>
                  <td><?php echo $row["kd_penjualan"]; ?></td>
                  <td><?php echo $row["nama_pelanggan"]; ?></td>
                  <td><?php echo tgl_indo($row["tanggal"]);?></td>
                  <td><?php echo $row["nama_barang"]; ?></td>
                  <td><?php echo $row['jumlah']; ?></td>
                  <td><?php echo Rp($row["grand_total"]); ?></td>
                  </tr>
                  <?php 
                  $grand_total += $row['grand_total'];
                  $jumlah += $row['jumlah'];

                }
                echo '<tr class="danger">
                        <td colspan="4">TOTAL</td>
                        <td><b>' . $jumlah . '</b></td>
                        <td><b>' . Rp($grand_total) . '</b></td>
                      </tr>'
                ?>
            </table>
      </div>
  </div>
  <div class="panel-footer">
    <!-- <a href="cetak.php" class="btn btn-danger col-md-offset-11" ><span class="glyphicon glyphicon-print"></span> Cetak</a> -->
  </div>
</div>
</div>
   
 <?php include 'nav_admin/footer.php'; ?>
 <!-- library jQuery -->
 <script src="../js/jquery-3.3.1.min.js"></script>
<script src="../js/jquery-ui.js"></script>
<script>
// $(document).ready(function(){
//   $.datepicker.setDefaults({
//     dateFormat: 'yy-mm-dd'
//   });
//   $(function(){
//     $("#From").datepicker();
//     $("#to").datepicker();
//   });
//   $('#range').click(function(){
//     var From = $('#From').val();
//     var to = $('#to').val();
//     if(From != '' && to != '')
//     {
//       $.ajax({
//         url:"range_penjualan.php",
//         method:"POST",
//         data:{From:From, to:to},
//         success:function(data)
//         {
//           $('#purchase_order').html(data);
//         }
//       });
//     }
//     else
//     {
//       alert("Please Select the Date");
//     }
//   });
// });
</script>
