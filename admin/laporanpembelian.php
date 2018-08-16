<?php 
$title = "Cetak Laporan Pembelian";
include 'nav_admin/header.php'; 
include '../koneksi.php';
include '../assets/fungsi_tanggal.php';
include '../assets/fungsi_rupiah.php';
$query = "SELECT 
          p.kd_pembelian,
          p.tanggal,
          b.nama_barang,
          dp.jumlah,
          s.nama_supplier,
          SUM(dp.jumlah*b.harga_beli) AS grand_total
          FROM pembelian p
          LEFT JOIN det_pembelian dp ON p.id_pembelian=dp.id_pembelian
          LEFT JOIN barang b ON dp.kd_barang=b.kd_barang
          LEFT JOIN supplier s ON b.id_supplier=s.id_supplier
          GROUP BY p.kd_pembelian ORDER BY p.kd_pembelian ASC";
$sql = mysqli_query($koneksi, $query);
?>
<link rel="stylesheet" href="../css/jquery-ui.css">
<div class="container">
  <div class="panel panel-primary">
  <!-- Default panel contents -->
    <div class="panel-heading"><strong>Laporan Pembelian</strong></div>
    <div class="panel-body">

      <form action="lap_range_pembelian.php" method="post">
       <div class="col-md-2">
            <input type="date" name="dari" id="dari" class="form-control" required />
        </div>
        <div class="col-md-2">
            <input type="date" name="sampai" id="sampai" class="form-control" required />
        </div>
        <div class="col-md-8">
          <button class="btn btn-danger" type="submit" formtarget="_blank"> <span class="glyphicon glyphicon-print"></span> Cetak</button>
        </div>
        </form>

        <div class="clearfix"></div>
        <br/>
        <div id="purchase_order">
            <table class="table table-bordered">
              <tr>
                <th>Kode Pembelian</th>
                <th>Tanggal</th>
                <th>Nama Barang</th>
                <th>Supplier</th>
                <th>Jumlah Beli</th>
                <th>Grand Total</th>
            </tr>
              <?php
              $jumlah = 0;
              $grand_total = 0;
              while($row= mysqli_fetch_array($sql))
              {
                ?>
                  <tr>
                  <td><?php echo $row["kd_pembelian"]; ?></td>
                  <td><?php echo tgl_indo($row["tanggal"]); ?></td>
                  <td><?php echo $row["nama_barang"]; ?></td>
                  <td><?php echo $row['nama_supplier'] ?></td>
                  <td><?php echo $row["jumlah"]; ?></td>
                  <td><?php echo Rp($row["grand_total"]); ?></td>
                  </tr>
                  
                  <?php 
                  $grand_total += $row['grand_total'];
                  $jumlah += $row['jumlah'];

                }
                echo '<tr>
                        <td colspan="4">TOTAL</td>
                        <td><b>' . $jumlah . '</b></td>
                        <td><b>' . Rp($grand_total) . '</b></td>
                      </tr>'
                ?>
            </table>

      </div>
  </div>
  <div class="panel-footer">
  </div>
</div>
</div>

 <?php include 'nav_admin/footer.php'; ?>
 <!-- library jQuery -->
 <script src="../js/jquery-3.3.1.min.js"></script>
<script src="../js/jquery-ui.js"></script>

<!-- <script>
$(document).ready(function(){
  $.datepicker.setDefaults({
    dateFormat: 'yy-mm-dd'
  });
  $(function(){
    $("#From").datepicker();
    $("#to").datepicker();
  });
  $('#range').click(function(){
    var From = $('#From').val();
    var to = $('#to').val();
    if(From != '' && to != '')
    {
      $.ajax({
        url:"act_lap_pem.php",
        method:"POST",
        data:{From:From, to:to},
        success:function(data)
        {
          $('#purchase_order').html(data);
        }
      });
    }
    else
    {
      alert("Please Select the Date");
    }
  });
});
</script> -->