<?php 
$title = "Tambah Data Barang"; 
include 'nav_admin/header.php';
include '../koneksi.php';
// include("../fungsi/fungsi_indotgl.php");
// include("../fungsi/fungsi_rupiah.php");
 ?>

<div class="container main-section">
    <div class="col-md-4 col-sm-8 col-xs-12 col-md-offset-4 col-sm-offset-2 login-image-main text-center">
      <div class="row">
        <h3><span class="glyphicon glyphicon-save-file" aria-hidden="true"></span> Tambah Data Barang</h3><br>
          <form action="proses/prosesbarang.php?act=input" method="POST">
             <div class="form-group">
              <label class="control-label"> Nama Barang :</label>
                 <input type="text" class="form-control" name="nama_barang" placeholder="Name Barang" id="nama_barang" required>
              </div>
              <div class="form-group">
                <label class="control-label"> Nama Supplier :</label>
                  <?php 
                  include '../koneksi.php';
                    $query = "SELECT * FROM supplier";
                    $result = mysqli_query($koneksi, $query);
                   ?>
                <select required class="form-control" id="item" name="id_supplier" >
                        <option value="">- Pilih Supplier -</option>
                          <?php while($row1 = mysqli_fetch_array($result)):;?>
                          <option value="<?php echo $row1['id_supplier'];?>"> <?php echo $row1['nama_supplier'];?></option>
                          <?php endwhile;?>
                </select>
              </div>
              <div class="form-group">
                <label class="control-label"> Harga Beli :</label>
                 <input type="text" class="form-control" name="harga_beli" placeholder="Harga Beli" id="harga_beli" required>
              </div>
              <div class="form-group">
                <label class="control-label"> Harga Jual :</label>
                 <input type="text" class="form-control" name="harga_jual" placeholder="Harga Jual" id="harga_jual" required>
              </div>
              <div class="form-group">
                <label class="control-label"> Kadaluarsa :</label>
                 <input type="date" class="form-control" name="kadaluarsa" placeholder="Kadaluarsa" id="kadaluarsa" required>
              </div>

          <input type="submit" class="btn btn-primary" value="Simpan" />
          <a href="databarang.php" class="btn btn-danger ">Batal</a>
        </div>
    </form>
</div>

</div>

<?php 
include 'nav_admin/footer.php';
  ?>