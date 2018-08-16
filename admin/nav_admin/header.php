<?php
session_start(); //memulai session
if( !isset($_SESSION['saya_admin']) ) //jika session login bukan admin
{
 header('location:./../'.$_SESSION['akses']); //alihkan berdasarkan hak akses
 exit();
}
$nama = ( isset($_SESSION['nama_u']) ) ? $_SESSION['nama_u'] : '';
?> 
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title><?= $title ?> - Enditha Froozen</title>
   <link rel="icon" href="../img/logoo.png">

  <!-- Bootstrap -->
  <link href="../css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="../css/select2.min.css">
  <link rel="stylesheet" href="../css/select2-bootstrap.min.css">
  <script src="../js/jquery-1.10.2.min.js"></script>
  <script src="../js/bootstrap.min.js"></script>
  <script src="../js/select2.min.js"></script> 

  <style> 
.navbar-default {
  background-color: #19819b;
  border-color: #3b889b;
}
.navbar-default .navbar-brand {
  color: #ecf0f1;
}
.navbar-default .navbar-brand:hover,
.navbar-default .navbar-brand:focus {
  color: #ecdbff;
}
.navbar-default .navbar-text {
  color: #ecf0f1;
}
.navbar-default .navbar-nav > li > a {
  color: #ecf0f1;
}
.navbar-default .navbar-nav > li > a:hover,
.navbar-default .navbar-nav > li > a:focus {
  color: #ecdbff;
}
.navbar-default .navbar-nav > li > .dropdown-menu {
  background-color: #19819b;
}
.navbar-default .navbar-nav > li > .dropdown-menu > li > a {
  color: #ecf0f1;
}
.navbar-default .navbar-nav > li > .dropdown-menu > li > a:hover,
.navbar-default .navbar-nav > li > .dropdown-menu > li > a:focus {
  color: #ecdbff;
  background-color: #3b889b;
}
.navbar-default .navbar-nav > li > .dropdown-menu > li.divider {
  background-color: #3b889b;
}
.navbar-default .navbar-nav .open .dropdown-menu > .active > a,
.navbar-default .navbar-nav .open .dropdown-menu > .active > a:hover,
.navbar-default .navbar-nav .open .dropdown-menu > .active > a:focus {
  color: #ecdbff;
  background-color: #3b889b;
}
.navbar-default .navbar-nav > .active > a,
.navbar-default .navbar-nav > .active > a:hover,
.navbar-default .navbar-nav > .active > a:focus {
  color: #ecdbff;
  background-color: #3b889b;
}
.navbar-default .navbar-nav > .open > a,
.navbar-default .navbar-nav > .open > a:hover,
.navbar-default .navbar-nav > .open > a:focus {
  color: #ecdbff;
  background-color: #3b889b;
}
.navbar-default .navbar-toggle {
  border-color: #3b889b;
}
.navbar-default .navbar-toggle:hover,
.navbar-default .navbar-toggle:focus {
  background-color: #3b889b;
}
.navbar-default .navbar-toggle .icon-bar {
  background-color: #ecf0f1;
}
.navbar-default .navbar-collapse,
.navbar-default .navbar-form {
  border-color: #ecf0f1;
}
.navbar-default .navbar-link {
  color: #ecf0f1;
}
.navbar-default .navbar-link:hover {
  color: #ecdbff;
}

@media (max-width: 767px) {
  .navbar-default .navbar-nav .open .dropdown-menu > li > a {
    color: #ecf0f1;
  }
  .navbar-default .navbar-nav .open .dropdown-menu > li > a:hover,
  .navbar-default .navbar-nav .open .dropdown-menu > li > a:focus {
    color: #ecdbff;
  }
  .navbar-default .navbar-nav .open .dropdown-menu > .active > a,
  .navbar-default .navbar-nav .open .dropdown-menu > .active > a:hover,
  .navbar-default .navbar-nav .open .dropdown-menu > .active > a:focus {
    color: #ecdbff;
    background-color: #3b889b;
  }
}
 .navbar {
            min-height: 80px;

        }
        .navbar-nav > li > a {
            padding-top: 26.5px;
            padding-bottom: 26.5px;
            line-height: 27px;
        }
        .navbar-brand {
            font-family: 'Lobster 1.4', padding: 0 15px;
            height: 80px;
            line-height: 80px;
        }
        .navbar-brand>img {
            max-height: auto;
            height: 120%;
            width: auto;
            margin: -12px;
            padding-bottom: auto;
        }
        body { 
            margin-top: 100px;
            margin-bottom: 120px;
        }
        .footer{
            height:50px;
            text-align: right;
            line-height:50px;
            background-color: #123239;
            color: white;
            position:fixed;
            bottom:0;
            padding-right: 50px;
            z-index:9999;
            width:100%;
            overflow: hidden;
       }
</style>
    

</head>
<body>
  <nav class="navbar navbar-default navbar-fixed-top">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="index.php"><img src="../img/lo.png"></a>
        </div>
        <div class="navbar-collapse collapse">
            <ul class="nav navbar-nav navbar-right">
              <li class="dropdown">
                <a href="#"class="dropdown-toggle" data-toggle="dropdown" style="font-size:14px"><strong><span class="glyphicon glyphicon-home" aria-hidden="true"></span>   Master</strong> <b class="caret"></b></a>
                <ul class="dropdown-menu">
                 
                  <li><a href="databarang.php">Data Barang</a></li>
                  <li><a href="datapelanggan.php">Data Pelanggan</a></li>
                  <li><a href="datasales.php">Data Sales</a></li>
                  <li><a href="datasupplier.php">Data Supplier</a></li>
                </ul>
<li class="dropdown">
                  <a href="#"class="dropdown-toggle" data-toggle="dropdown" style="font-size:14px"><strong><span class="glyphicon glyphicon-tags"></span> Transaksi</strong> <b class="caret"></b></a>
                  <ul class="dropdown-menu">
                    <li><a href="transaksipembelian.php">Transaksi Pembelian</a></li>
                    <li><a href="transaksipenjualan.php">Transaksi Penjualan</a></li>
                    <li><a href="detailpenjualan.php">Detail Transaksi Penjualan</a></li>
                    <li><a href="detailpembelian.php">Detail Transaksi Pembelian</a></li>
                  </ul>
                </li>

              </li>
              <li class="dropdown">
                  <a href="#"class="dropdown-toggle" data-toggle="dropdown" style="font-size:14px"><strong><span class="glyphicon glyphicon-list-alt"></span> Laporan</strong> <b class="caret"></b></a>
                  <ul class="dropdown-menu">
                    <li><a href="laporanpenjualan.php">Laporan Penjualan</a></li>
                    <li><a href="laporanpembelian.php">Laporan pembelian</a></li>
                    <li><a href="laporanpersediaan.php">Laporan persediaan barang</a></li>
                  </ul>
                </li>

                <li class="dropdown">
                  <a href="#"class="dropdown-toggle" data-toggle="dropdown" style="font-size:14px"><strong><span class="glyphicon glyphicon-share"></span> <?php echo $nama; ?></strong> <b class="caret"></b></a>
                  <ul class="dropdown-menu">
                    <li><a href="tambahuser.php">Tambah Pengguna</a></li>
                    <li><a href="daftaruser.php">Daftar Pengguna</a></li>
                    <li role="separator" class="divider"></li>
                    <li class=""><a href="./../logout.php" onclick="return confirm('Yakin ingin Logout?')">Keluar</a></li>
                  </ul>
                </li>

            </ul>
                
          </div>
      </div>
</nav>

