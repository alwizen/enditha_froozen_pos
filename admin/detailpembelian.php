<?php
$title = "Detail Pembelian"; 
include 'nav_admin/header.php'; 
include '../koneksi.php';
include '../assets/fungsi_tanggal.php'; 
include '../assets/fungsi_rupiah.php';
?>
 <link rel="stylesheet" href="../css/dataTables.bootstrap.min.css">
<link rel="stylesheet" href="../css/jquery-ui.css">

<div class="container">
  <div class="panel panel-primary">
  <!-- Default panel contents -->
    <div class="panel-heading"><strong>Detail Pembelian</strong></div>
    <div class="panel-body">
   
        <div>
            <table class="table table-bordered table-hover table-responsive" id="mydata">
              <thead>
              <tr>
                <th>No</th>
                <th>Kode Pembelian</th>
                <th>Tanggal</th>
                <th>Supplier</th>
                <th>Jumlah Beli</th>
                <th>Grand Total</th>
                <th><center> Aksi </center></th>
            </tr>
            </thead>
            <tbody>
              <?php
              $no =1;
              $query = "SELECT  
                        p.id_pembelian,
                        p.kd_pembelian, 
                        p.tanggal,
                        b.nama_barang,
                        b.harga_beli,
                        dp.jumlah,
                        s.nama_supplier, 
                        SUM(dp.jumlah*b.harga_beli) AS grand_total
                        FROM pembelian p
                        LEFT JOIN det_pembelian dp ON p.id_pembelian=dp.id_pembelian
                        LEFT JOIN barang b ON dp.kd_barang=b.kd_barang
                        LEFT JOIN supplier s ON b.id_supplier=s.id_supplier
                        GROUP BY p.kd_pembelian ORDER BY p.id_pembelian DESC";
              $sql = mysqli_query($koneksi, $query);
              while($row= mysqli_fetch_array($sql))
              {
                echo '
                  <tr>
                  <td>'.$no++.'</td>
                  <td>'.$row["kd_pembelian"].'</td>
                  <td>'.tgl_indo($row["tanggal"]).'</td>
                  <td>'.$row['nama_supplier'] .'</td>
                  <td>'.$row["jumlah"] .'</td>
                  <td>'.Rp($row["grand_total"]).'</td>
                   <td>
                              <button type="button" class="btn btn-info" onclick="getDetailTransaksi('.$row['id_pembelian'].')">Detail</button>
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
    <!--     <button class="btn btn-danger">Cetak</button> -->
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div>


 
 <script>
  $(document).ready(function() {
    $('#mydata').dataTable();
  });
  var getDetailTransaksi = function (id_pembelian) {

    $.get("det_transaksi_pembelian.php?id_pembelian="+id_pembelian, function(response){
      $("#list_transaksi").html('');
      console.log(response);
        if (response.data.length > 0 ) {
          $.each(response.data, function(i,obj){
            console.log(obj);
            var content = "<tr>";  
            content += "<td>" + obj.nama_barang + "</td>";
            content += "<td>" + obj.harga_beli + "</td>";
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
 include ('nav_admin/footer.php'); ?>


