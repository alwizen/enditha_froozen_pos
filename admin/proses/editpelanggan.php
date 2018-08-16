<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Edit Pelanggan</title>
  <link rel="icon" href="../../img/logoo.png">
  <link rel="stylesheet" href="../../css/bootstrap.min.css">
</head>
<body>

<?php
  include '../../koneksi.php';
  $id_pelanggan = $_GET['id_pelanggan'];
  $sqlquery = "SELECT * FROM pelanggan WHERE id_pelanggan='$id_pelanggan'";
  $result = mysqli_query($koneksi, $sqlquery) or die (mysqli_connect_error());
  $d = mysqli_fetch_assoc($result);
  ?>


  <div class="container">
  <h3><span class="glyphicon glyphicon-plus" aria-hidden="true"></span>Edit Data pelanggan</h3><br>
<form class="form-horizontal" action="prosespelanggan.php?act=update" method="POST">
   <input type="hidden" name="id_pelanggan" id="id_pelanggan" value="<?php echo $d["id_pelanggan"]; ?>">
    <div class="form-group">
      <label class="control-label col-sm-2" for="">Nama pelanggan :</label>
      <div class="col-sm-6">          
        <input type="text" class="form-control" placeholder="Nama pelanggan" name="nama_pelanggan" value=" <?php echo $d['nama_pelanggan'] ?> ">
      </div>
    </div>
    <div class="form-group">
      <label class="control-label col-sm-2" for="">Jenis Kelamin :</label>
      <div class="col-sm-6">          
        <select name="jns_kel"  class="form-control" data-style="btn-primary">
            <option value="">- Pilih Jenis Kelamin -</option>
            <option value="Laki-laki">Laki-Laki</option>
            <option value="Perempuan">Perempuan</option>
        </select>
      </div>
    </div>
    <div class="form-group">
      <label class="control-label col-sm-2" for="">Alamat :</label>
      <div class="col-sm-6">          
      <input type="text" class="form-control" id="" placeholder="Alamat" name="alamat" value=" <?php echo $d['alamat'] ?> ">
      </div>
    </div>
    <div class="form-group">
      <label class="control-label col-sm-2" for="">No Telp :</label>
      <div class="col-sm-6">          
        <input type="text" class="form-control" id="" placeholder="No Telp" name="no_tlp" value=" <?php echo $d['no_tlp'] ?> ">
      </div>
    </div>

    <div class="form-group">        
      <div class="col-sm-offset-2 col-sm-10">
      <button type='input' name='input' class='btn btn-warning'>Edit</button>
        <a class="btn btn-default" href="../datapelanggan.php">Batal</a>
      </div>
    </div>
  </form>
  </div>


</body>
<script type="text/javascript" src="js/jquery-1.10.2.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
</html>