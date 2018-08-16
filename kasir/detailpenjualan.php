<?php
$title = "Detail Penjualan"; 
include ('nav_kasir/header.php');
include '../assets/fungsi_rupiah.php';
include '../assets/fungsi_tanggal.php';
 ?>
 <link rel="stylesheet" href="../css/dataTables.bootstrap.min.css">
 <div class="container">
<div class="panel panel-primary">
  <!-- Default panel contents -->
  <div class="panel-heading"><strong>Detail Penjualan</strong></div>
  <div class="panel-body">
   <!-- Table -->
  <table class="table table-hover table-responsive table-bordered" id="mydata">
    <thead>
      <tr>
        <th>#</th>
        <th>No. Transaksi</th>
        <th>Nama Pelanggan</th>
        <th>Tanggal</th>  
        <th>Grand Total</th>
        <th>Aksi</th>
      </tr>
    </thead>
    <tbody>
        <?php 
          include '../koneksi.php';
          $no = 1;
          $data = mysqli_query($koneksi,"SELECT
                                        p.id_penjualan, 
                                        kd_penjualan, 
                                        p.tanggal,
                                        jumlah,
                                        nama_barang,
                                        pl.nama_pelanggan,
                                        SUM(dp.jumlah*dp.harga) as grand_total 
                                        FROM penjualan p 
                                        LEFT JOIN det_penjualan dp ON p.id_penjualan=dp.id_penjualan 
                                        LEFT JOIN barang b ON dp.kd_barang=b.kd_barang
                                        LEFT JOIN pelanggan pl ON dp.id_pelanggan = pl.id_pelanggan
                                        GROUP BY p.id_penjualan ORDER BY p.kd_penjualan DESC");
                            while($d = mysqli_fetch_array($data))
                            {
                         echo '<tr>
                            <td>'. $no++.'</td>
                            <td>'. $d['kd_penjualan'].'</td>
                            <td>'. $d['nama_pelanggan'].'</td>
                            <td>'. tgl_indo($d['tanggal']).'</td>
                            <td>'. Rp($d['grand_total']).'</td>
                            <td>
                              <button type="button" class="btn btn-info" onclick="getDetailTransaksi('.$d['id_penjualan'].')">Detail</button>
                               <a href="proses/cetak_penjualan.php?id_penjualan= '.$d['id_penjualan'].'" class="btn btn-danger" target="_blank">Cetak</a>
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


<!-- Modal -->
<div id="modal_list" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title" id="judul"> </h4>
      </div>
      <div class="modal-body">
          <table class="table table-bordered table-hover">
            <thead>
              <tr>
                <th>Nama Barang</th>
                <th>Harga</th>
                <th>Jumlah</th>
              </tr>
            </thead>
            <tbody id="list_transaksi">
              
            </tbody>
          </table>      
  

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div>

<script>
  $(document).ready(function() {
    $('#mydata').dataTable();
  });
  var getDetailTransaksi = function (id_penjualan) {

    $.get("det_transaksi.php?id_penjualan="+id_penjualan, function(response){
      $("#list_transaksi").html('');
      console.log(response);
        if (response.data.length > 0 ) {
          $.each(response.data, function(i,obj){
            console.log(obj);
            var content = "<tr>";  
            content += "<td>" + obj.nama_barang + "</td>";
            content += "<td>" + obj.harga_jual + "</td>";
            content += "<td>" + obj.jumlah + "</td>";
            content +=  "</tr>"; 
            $("#list_transaksi").append(content);
          })
          $("#judul").html(response.judul);
          $("#modal_list").modal('show');
        }
         
    },'json');
  }
</script>
  
 <?php 
 include ('nav_kasir/footer.php'); ?>
