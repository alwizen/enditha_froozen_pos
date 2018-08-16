<?php
$title = "Tambah Pengguna"; 
include 'nav_admin/header.php'
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Tambah User</title>

  <!-- Bootstrap -->
  <link href="css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" type="text/css" href="custom.css">
</head>
<body>
<div class="container main-section">
    <div class="col-md-4 col-sm-8 col-xs-12 col-md-offset-4 col-sm-offset-2 login-image-main text-center">
      <div class="row">
        <strong><h3><span class="glyphicon glyphicon-user"></span> Tambah Pengguna Baru</h3></strong><br>
        <div class="col-md-12 col-sm-12 col-xs-12 user-login-box">
          <form action="proses/prosesuser.php?act=input" method="POST">
             <div class="form-group">
               <input type="text" class="form-control" name="nama" placeholder="Name" id="nama" required>
             </div>
          <div class="form-group">
              <input type="text" class="form-control" name="username" placeholder="Username" id="username" required>
          </div>
          <div class="form-group">
              <input type="text" name="password" class="form-control" placeholder="Password" id="usr" required>
          </div>
          <div class="form-group">
            <select required name="level" class="form-control" id="">
              <option value="admin">Admin</option>
              <option value="kasir">Kasir</option>
            </select>
          </div>
          <input type="submit" name="login" class="btn btn-primary" value="Daftar" />
          <a href="index.php" class="btn btn-danger ">Batal</a>
        </div>
        </form>
      </div>
  </div>
</div>
<?php include 'nav_admin/footer.php'; ?>