<?php 
$title = "Tambah Sales";
include 'nav_admin/header.php';
?>

<div class="container">
<div class="panel panel-primary">
  <div class="panel-heading"><span class="glyphicon glyphicon-download-alt"></span>  Form Tambah Sales</div>
  <div class="panel-body">
    <form class="form-horizontal" action="proses/prosessales.php?act=input" method="POST">
    <div class="form-group">
      <label class="control-label col-sm-2" for="">Nama Sales :</label>
      <div class="col-sm-8">          
        <input type="text" class="form-control" placeholder="Nama Sales" name="nama_sales" required>
      </div>
    </div>

     <div class="form-group">
      <label class="control-label col-sm-2" for="">Nama Supplier :</label>
                  <?php 
                    include '../koneksi.php';
                    $query = "SELECT * FROM supplier";
                    $result = mysqli_query($koneksi, $query);
                    ?>
            <div class="col-sm-8">
                <select required class="form-control" id="item" name="id_supplier" >
                        <option value="">- Pilih Supplier -</option>
                          <?php while ($row1 = mysqli_fetch_array($result)) :; ?>
                          <option value="<?php echo $row1['id_supplier']; ?>"> <?php echo $row1['nama_supplier']; ?></option>
                          <?php endwhile; ?>
                </select>
            </div>
    </div>

    <div class="form-group">
      <label class="control-label col-sm-2" for="">Alamat :</label>
      <div class="col-sm-8">          
        <textarea type="text" class="form-control" id="" placeholder="Alamat Sales" name="alamat" required></textarea>
      </div>
    </div>

    <div class="form-group">
      <label class="control-label col-sm-2" for="">No Telp :</label>
      <div class="col-sm-8">          
        <input type="text" class="form-control" id="" placeholder="No Telp" name="no_tlp">
      </div>
    </div>

    <div class="form-group">        
      <div class="col-sm-offset-2 col-sm-10">
        <button type="submit" class="btn btn-primary">Submit</button>
        <a class="btn btn-danger" href="datasales.php">Batal</a>
      </div>
    </div>
  </form>
  </div>
</div>
</div>


<?php 
include 'nav_admin/footer.php';
?>