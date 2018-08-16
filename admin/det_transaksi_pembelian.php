<?php 
include '../koneksi.php';
include '../assets/fungsi_rupiah.php';
$id = $_GET['id_pembelian'];

$query = "SELECT 
        kd_pembelian, 
        p.tanggal,
        jumlah,
        nama_barang,
        harga_beli
        FROM pembelian p 
        LEFT JOIN det_pembelian dp ON p.id_pembelian=dp.id_pembelian
        LEFT JOIN barang b ON dp.kd_barang=b.kd_barang
        WHERE p.id_pembelian = ".$id."
        ORDER BY p.kd_pembelian  DESC";

		 $result = mysqli_query($koneksi, $query);
		 $data = array();

		 while($row = mysqli_fetch_array($result)){
           $judul = $row['kd_pembelian'];
            $data[] = array(
          	'nama_barang' =>$row['nama_barang'] ,
          	'jumlah' 		  =>$row['jumlah'],
            'harga_beli' => Rp($row['harga_beli'])
          );

          } 
          echo json_encode(array(
          	"data"  => $data, 
          	"judul" => $judul
          ));
 ?>
         