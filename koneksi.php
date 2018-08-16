<?php
 $url    = 'http://localhost/enditha'; 
 $dbhost = 'localhost';  
 $dbuser = 'root'; 
 $dbpass = 'BAba55ko';  
 $dbname = 'enditha';  
 
 $koneksi = mysqli_connect($dbhost,$dbuser,$dbpass,$dbname);  //koneksi Database

 // $koneksi = mysqli_connect("localhost","root","","akademik");

 //Check koneksi, berhasil atau tidak
if (mysqli_connect_errno()){

	echo "Koneksi database gagal : " . mysqli_connect_error();

}

 // $url = rtrim($url,'/');
 ?>
