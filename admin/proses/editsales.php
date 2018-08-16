<!DOCTYPE html>
<html lang="en">  
<head>
  <meta charset="UTF-8">
  <title>Edit Sales</title>
  <link rel="icon" href="../../img/logoo.png">
  <link rel="stylesheet" href="../../css/bootstrap.min.css">
</head>
<body>

<?php 
include '../../koneksi.php';
$id_sales = $_GET['id_sales'];
$sqlquery = "SELECT * FROM sales WHERE id_sales='$id_sales'";
$result = mysqli_query($koneksi, $sqlquery) or die(mysqli_connect_error());
$d = mysqli_fetch_assoc($result);
?>

   <div class="container">
  <h3><span class="glyphicon glyphicon-plus" aria-hidden="true"></span>Edit Data Sales</h3><br>
<form class="form-horizontal" action="prosessales.php?act=update" method="POST">
   <input type="hidden" name="id_sales" id="id_sales" value="<?php echo $d["id_sales"]; ?>">

     <div class="form-group">
      <label class="control-label col-sm-2" >Nama Sales :</label>
      <div class="col-sm-8">          
        <input type="text" class="form-control" placeholder="Nama sales" name="nama_sales" value=" <?php echo $d['nama_sales'] ?> "> 
      </div>
    </div>

     <div class="form-group">
      <label class="control-label col-sm-2" for="">Nama Supplier :</label>
                  <?php 
                  include '../../koneksi.php';
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
      <input type="text" class="form-control" id="" placeholder="Alamat" name="alamat" value=" <?php echo $d['alamat'] ?> ">
      </div>
    </div>
    <div class="form-group">
      <label class="control-label col-sm-2" for="">No Telp :</label>
      <div class="col-sm-8">          
        <input type="text" class="form-control" id="" placeholder="No Telp" name="no_tlp" value=" <?php echo $d['no_tlp'] ?> ">
      </div>
    </div>

    <div class="form-group">        
      <div class="col-sm-offset-2 col-sm-10">
      <button type='input' name='input' class='btn btn-warning'>Edit</button>
        <a class="btn btn-default" href="../datasales.php">Batal</a>
      </div>
    </div>
  </form>
  </div>


</body>
<script type="text/javascript" src="js/jquery-1.10.2.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
</html>