<!DOCTYPE html>
<html lang="en">  
<head>
  <meta charset="UTF-8">
  <title>Edit Supplier</title>
  <link rel="icon" href="../../img/logoo.png">
  <link rel="stylesheet" href="../../css/bootstrap.min.css">
</head>
<body>

<?php 
 include '../../koneksi.php';
  $id_supplier = $_GET['id_supplier'];
  $sqlquery = "SELECT * FROM supplier WHERE id_supplier='$id_supplier'";
  $result = mysqli_query($koneksi, $sqlquery) or die (mysqli_connect_error());
  $d = mysqli_fetch_assoc($result);
 ?>

   <div class="container">
  <h3><span class="glyphicon glyphicon-plus" aria-hidden="true"></span>Edit Data Supplier</h3><br>
<form class="form-horizontal" action="prosessupplier.php?act=update" method="POST">
   <input type="hidden" name="id_supplier" id="id_supplier" value="<?php echo $d["id_supplier"]; ?>">
    <div class="form-group">
      <label class="control-label col-sm-2" >Nama Supplier :</label>
      <div class="col-sm-6">          
        <input type="text" class="form-control" placeholder="Nama supplier" name="nama_supplier" value=" <?php echo $d['nama_supplier'] ?> "> 
      </div>
    </div>
     <div class="form-group">
      <label class="control-label col-sm-2" >Nama Sales :</label>
      <div class="col-sm-6">          
        <input type="text" class="form-control" placeholder="Nama sales" name="nama_sales" value=" <?php echo $d['nama_sales'] ?> "> 
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
        <a class="btn btn-default" href="../datasupplier.php">Batal</a>
      </div>
    </div>
  </form>
  </div>


</body>
<script type="text/javascript" src="js/jquery-1.10.2.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
</html>