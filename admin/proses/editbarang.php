<!DOCTYPE html>
<html lang="en">
<head> 
  <meta charset="UTF-8">
  <title>Edit Barang</title>
    <link rel="icon" href="../../img/logoo.png">
  <link rel="stylesheet" href="../../css/bootstrap.min.css">
</head>
<body> 

<?php
  include '../../koneksi.php';
  $kd_barang = $_GET['kd_barang'];
  $sqlquery = "SELECT * FROM barang WHERE kd_barang='$kd_barang'";
  $result = mysqli_query($koneksi, $sqlquery) or die (mysqli_connect_error());
  $d = mysqli_fetch_assoc($result);
  ?>


  <div class="container main-section">
    <div class="col-md-4 col-sm-8 col-xs-12 col-md-offset-4 col-sm-offset-2 login-image-main text-center">
      <div class="row">
        <h3><span class="glyphicon glyphicon-edit" aria-hidden="true"></span> Edit Data Barang</h3><br>
        <form action="prosesbarang.php?act=update" method="post">
          <div class="form-group">
             <label class="control-label"> Nama Barang :</label>
            <input type="hidden" name="kd_barang" id="kd_barang" value="<?php echo $d["kd_barang"]; ?>">
            <input type="text" class="form-control" name="nama_barang" placeholder="Name Barang"  value="<?php echo $d["nama_barang"]; ?>">
          </div>

          <div class="form-group">
             <label class="control-label"> Nama Supplier :</label>
                  <?php 
                  include '../../koneksi.php';
                    $query = "SELECT * FROM supplier";
                    $result = mysqli_query($koneksi, $query);
                   ?>
                <select class="form-control" id="item" name="id_supplier" value="<?php echo $d["id_supplier"]; ?>">
                        <option>- Pilih Supplier -</option>
                          <?php while($row1 = mysqli_fetch_array($result)):;?>
                          <option value="<?php echo $row1['id_supplier'];?>"> <?php echo $row1['nama_supplier'];?></option>
                          <?php endwhile;?>
                </select>
          </div>

          <div class="form-group">
                  <label class="control-label"> Harga Beli :</label>
                 <input type="text" class="form-control" name="harga_beli" placeholder="Harga Beli" value=" <?php echo $d['harga_beli'] ?>">
          </div>

          <div class="form-group">
                 <label class="control-label"> Harga Jual :</label>
                 <input type="text" class="form-control" name="harga_jual" placeholder="Harga Jual" value=" <?php echo $d['harga_jual'] ?>">
          </div>
          <div class="form-group">
                 <label class="control-label"> Kadaluarsa :</label>
                 <input type="date" class="form-control" name="kadaluarsa" placeholder="kadaluarsa" value=" <?php echo $d['kadaluarsa'] ?>">
          </div>

           
            <button type='input' name='input' class='btn btn-success'>Edit Barang</button>
              <a class="btn btn-primary" href="../databarang.php">Batal</a>
            </div>
         </div>
       </form>
</div>


</body>
<script type="text/javascript" src="js/jquery-1.10.2.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
</html>