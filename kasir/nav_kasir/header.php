<?php
session_start(); //memulai session
if( !isset($_SESSION['nama_u']) ) //jika session nama tidak ada
{
 header('location:./../'.$_SESSION['akses']); //alihkan halaman
 exit();
}else{ //jika ada session
 $nama = $_SESSION['nama_u']; //menyimpan session nama ke variabel $nama
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Enditha Froozen</title>

  <!-- Bootstrap -->
  <link href="../css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="../css/select2.min.css">
  <link rel="stylesheet" href="../css/select2-bootstrap.min.css">
  <script src="../js/jquery-1.10.2.min.js"></script>
  <script src="../js/bootstrap.min.js"></script>
  <script src="../js/select2.min.js"></script>
   
      <style>
        .navbar-default {
          background-color: #06464a;
          border-color: #0d5155;
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
        .navbar-default .navbar-nav > .active > a,
        .navbar-default .navbar-nav > .active > a:hover,
        .navbar-default .navbar-nav > .active > a:focus {
          color: #ecdbff;
          background-color: #0d5155;
        }
        .navbar-default .navbar-nav > .open > a,
        .navbar-default .navbar-nav > .open > a:hover,
        .navbar-default .navbar-nav > .open > a:focus {
          color: #ecdbff;
          background-color: #0d5155;
        }
        .navbar-default .navbar-toggle {
          border-color: #0d5155;
        }
        .navbar-default .navbar-toggle:hover,
        .navbar-default .navbar-toggle:focus {
          background-color: #0d5155;
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
            background-color: #0d5155;
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
            line-height: 50px;
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
            text-align: left;
            line-height:50px;
            background-color: #333;
            color: white;
            position:fixed;
            bottom:0px;
            padding-left: 50px;
            z-index:9999;
            width:100%;
       }
  </style>

</head>
<body style="background-color: #EFEEEE;">
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

                <li><a href="transaksipenjualan.php" style="font-size: 14px;"><strong><span class="glyphicon glyphicon-tasks"></span> Transaksi Penjualan</strong></a></li>
                <li><a href="detailpenjualan.php" style="font-size: 14px;"><strong><span class="glyphicon glyphicon-list-alt"></span> Riwayat Penjualan</strong></a></li>



                <li class="dropdown">
                  <a href="#"class="dropdown-toggle" data-toggle="dropdown" style="font-size:14px"><strong><span class="glyphicon glyphicon-share"></span> <?php echo $nama; ?></strong> <b class="caret"></b></a>
                  <ul class="dropdown-menu">
                    <li class=""><a href="./../logout.php" onclick="return confirm('Yakin ingin Logout?')">Keluar</a></li>
                  </ul>
                </li>

            </ul>
                
          </div>
      </div>
</nav>

