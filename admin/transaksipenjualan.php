<?php
$title = "Transaksi Penjualan";  
include 'nav_admin/header.php';
include '../koneksi.php';
 ?>
 
<div class="container" style="margin-top: 50px;">
      <div class="row">
        <div class="col-lg-6">
        </div>
      </div>
      <div class="col-md-12">
        <div class="panel panel-primary">
          <div class="panel-heading">
            <h3 class="panel-title"><span class="glyphicon glyphicon-tag"></span><strong> Form Transaksi Penjualan</strong></h3>
          </div>
          <div class="panel-body">
            <!-- <form id="form_input" action="proses/proses.php" method="post"> -->

                <!-- tanggal dan model  -->
                 <div class="row">
                  <div class="col-xs-2 form-group">
                     <label>Kasir</label>
                        <input type="text" name="kasir" id="kasir" class="form-control" value="<?php echo $nama; ?>" disabled/>
                  </div>

                   <div class="col-xs-2 form-group">
                     <label>Tanggal</label>
                        <input type="date" name="tanggal" id="tanggal" class="form-control"/>
                  </div>

                       <div class="col-xs-3 form-group">
                    <?php  
                      $query = "SELECT * FROM pelanggan";
                      $result = mysqli_query($koneksi, $query);
                     ?>
                     <label>Pelanggan</label>      
                        <select class="form-control nama_pelanggan" id="id_pelanggan" name="nama_pelanggan">
                            <?php while($row1 = mysqli_fetch_array($result)):;?>
                            <option value="<?php echo $row1['id_pelanggan'];?>" ><?php echo $row1['nama_pelanggan'];?></option>
                            <?php endwhile;?>
                        </select>
                     </div>              
  
                  <div class="col-xs-3 form-group">
                    <?php 
                      $query = "SELECT * FROM barang";
                      $result = mysqli_query($koneksi, $query);
                     ?>
                     <label>Nama Barang</label>      
                        <select class="form-control item" id="item" name="nama_barang">
                            <?php while($row1 = mysqli_fetch_array($result)):;?>
                            <option value="<?php echo $row1['kd_barang'];?>" data-harga="<?php echo $row1["harga_jual"] ?>"><?php echo $row1['nama_barang'];?></option>
                            <?php endwhile;?>
                        </select>
                     </div>
                     <div class="row">
                  <div class="col-xs-2 form-group">
                     <label class="control-label">Jumlah</label>
                     <input type="number" class="form-control" placeholder="jumlah " name="jumlah" id="jumlah" required>
                   </div>
                   </div>
                   <div class="col-xs-1 form-group">
                     <label class="control-label"></label>
                   <input type="button" id="add_item" value="Tambah Barang" class="btn btn-primary" disabled>
                 </div><br>
                 </div>
                 <br>
                 <h4><span class="glyphicon glyphicon-shopping-cart"></span> Barang Belanja </h4>
                     <!-- Table -->
                    <table class="table table-hover" id="order_items_table">
                      <thead>
                        <tr class="success">
                          <th>#</th>
                          <th>Nama Barang</th>
                          <th>Harga</th>
                          <th>Jumlah</th>
                          <th>Sub-Total</th>
                          <th>Aksi</th>
                          </tr>
                      </thead>
                      <tbody>
                     </tbody>
                     <tfoot>
                       <tr>
                        <td colspan="3">Total</td>
                        <td><input style=" width: 30%;"  type="text" id="total_barang" class="form-control" readonly></td>
                        <td><input style=" width: 30%; height: 50px; font-size: large;" type="text" id="grand_total_harga" class="form-control" readonly></td>
                      </tr>
                     </tfoot>
                   </table><br>
                   <div class="row">
                    <div class="col-lg-3 col-lg-offset-4">
                      <div class="input-group">
                        <span class="input-group-addon" id="basic-addon1">Rp</span>
                        <input type="number" class="form-control" id="total_dibayarkan" placeholder="Total Bayar ..">
                      </div><!-- /input-group -->
                    </div><!-- /.col-lg-6 -->
                    <div class="col-lg-3">
                      <div class="input-group">
                        <span class="input-group-addon" id="basic-addon1">Rp</span>
                        <input type="number" class="form-control" id="total_kembalian" placeholder="Kembalian .." disabled>
                      </div><!-- /input-group -->
                      
                    </div><!-- /.col-lg-6 -->
                    <div class="col-lg-2">
                        <button class="btn btn-primary" type="button" id="checkout">Bayar</button>
                        <a href="kasir/index.php" class="btn btn-default">Batal</a>
                      </div>
                  </div><!-- /.row -->
                  </div>
                </div>
              </div>
            <!-- </form> -->
         </div>
      </div>
   </div>
</div>

</body>
 <!-- library jQuery -->

    <script>
      $(document).ready(function() {
      $('.item').select2({
       theme: "bootstrap",
       placeholder: "Pilih Barang",
       allowClear: true
        });
      $('.nama_pelanggan').select2({
       theme: "bootstrap",
       placeholder: "Pilih Pelanggan",
       allowClear: true
        });
    });


       $('#add_item').prop('disabled', true);
          $("#jumlah").on("keyup", function() {
              if ((this.value != '') && ($("#item").val() !='')) {
                $('#add_item').prop('disabled', false);
              } else {
                $('#add_item').prop('disabled', true);
              }
          });

          $order_items = [];
          $total_harga = 0;
          $number =1;
      var formBarang={
        getTotal:function(){
          var totalHarga = 0;
          var totalBarang = 0;
          $('.row_barang').each(function(){
            totalBarang += parseFloat($(this).find('td:eq(3)').text());
            totalHarga += parseFloat($(this).find('td:eq(4)').text());
          });
          $('#total_barang').val(totalBarang);
          $('#grand_total_harga').val(totalHarga);
        }
      }
      $(function() {

          $("#add_item").on("click", function() {
              // Add data to order_items before it's submitted
              $order_items.push({
                "id_pelanggan":$("#id_pelanggan").val(),
                "kd_barang": $("#item").val(),
                "jumlah": $("#jumlah").val(),
                "harga": $("#item option:selected").attr("data-harga"),
                "temp_id":$number

              });

              $total_harga += (parseInt($("#jumlah").val()) * parseInt($("#item option:selected").attr("data-harga")));
              // Add row to table
              $("#order_items_table > tbody").append("<tr class='row_barang'><td>" + ($order_items.length + 0) + "</td><td>" + $("#item option:selected").text()  + "</td><td>" + $("#item option:selected").attr("data-harga") + "</td><td>" + $("#jumlah").val() + "</td><td>" + (parseInt($("#jumlah").val()) * parseInt($("#item option:selected").attr("data-harga"))) + "</td><td> <button data-id='"+$number+"' class='btn btn-danger hapus_item'>Hapus</button> </td></tr>");

              // Reset selected item and quantity
              $("#jumlah").val("");
              $("#item").prop("selectedIndex", 0);

              console.log($order_items);
              $number++;
              formBarang.getTotal();
          });

          $("#total_dibayarkan").on("keyup", function() {
              $("#total_kembalian").val(parseInt($(this).val()) - $total_harga);
          });
           $(document).on("click", ".hapus_item", function(e){
            // console.log('hapus');
            var tempId = $(this).attr('data-id');
            console.log(tempId);
            var temp_order_items = $order_items.filter(function(obj) {
              return obj.temp_id != tempId;
            });
            $order_items = temp_order_items;
            $(this).parent().parent().remove();
            formBarang.getTotal();
          });

          $("#checkout").on("click", function() {
            console.log($order_items);
              if ($order_items.length < 1) {
                alert("Anda belum memasukkan item!");
              } else {

                var totalDibayar = ($('#total_dibayarkan').val() == "" || !isNaN($('#total_dibayarkan').val())) ? parseInt($('#total_dibayarkan').val()) : 0;
                if(totalDibayar > 0) {
                  //ini diproses
                var request = $.ajax({
                  url: "proses/new_penjualan.php",
                  method: "POST",
                  data: {
                    "order_items": $order_items,
                    "tanggal":$('#tanggal').val(),
                    "kasir":$('#kasir').val(),
                    "total_dibayarkan":$('#total_dibayarkan').val(),
                    "total_kembalian":$('#total_kembalian').val()
                  },
                  json: true
                });

                request.success(function(response) {
                    alert("Transaksi Berhasil!");
                    window.open('href','_blank');
                    document.location.reload(true);
                });

                request.fail(function(error) {
                  alert(error);
                });
                } else {
                  //klo 0 tampilkan notifikasi
                  alert("Harus diisi");
                }



              }
          });
      });
    </script>
</html>