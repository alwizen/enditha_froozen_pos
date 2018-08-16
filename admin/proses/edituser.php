<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Edit User</title>
  <link rel="icon" href="../../img/logoo.png">
 
  <!-- Bootstrap -->
  <link href="../../css/bootstrap.min.css" rel="stylesheet">
 
  
</head>
<body>

<?php
  include '../../koneksi.php';
  $id = $_GET['id'];
  $sqlquery = "SELECT * FROM users WHERE id='$id'";
  $result = mysqli_query($koneksi, $sqlquery) or die (mysqli_connect_error());
  $d = mysqli_fetch_assoc($result);
  ?>

  
<div class="container main-section">
    <div class="col-md-4 col-sm-8 col-xs-12 col-md-offset-4 col-sm-offset-2 login-image-main text-center">
      <div class="row"><br>
        <strong><h3><span class="glyphicon glyphicon-user"></span> Edit Pengguna</h3></strong><br>
        <div class="col-md-12 col-sm-12 col-xs-12 user-login-box">
         <form action="prosesuser.php?act=update" method="POST">
             <div class="form-group">
              <label class="control-label" >Nama pengguna :</label>
              <input type="hidden" name="id" id="id" value="<?php echo $d["id"]; ?>">
               <input type="text" class="form-control" name="nama" placeholder="Name" value="<?php echo $d["nama"]; ?>">
             </div>
          <div class="form-group">
            <label class="control-label" >Username :</label>
              <input type="text" class="form-control" name="username" placeholder="Username" value="<?php echo $d["username"]; ?>">
          </div>
          <div class="form-group">
            <label class="control-label" >Password :</label>
              <input type="text" name="password" class="form-control" placeholder="Password" value="<?php echo $d["password"]; ?>">
          </div>
          <div class="form-group">
            <label class="control-label" >Hak Akses :</label>
            <select name="level" class="form-control" id="">
              <option value="admin">Admin</option>
              <option value="kasir">Kasir</option>
            </select>
          </div>
          <input type="submit" name="input" class="btn btn-primary" value="Simpan" />
          <a href="../daftaruser.php" class="btn btn-danger ">Batal</a>
        </div>
        </form>
      </div>
  </div>
</div>