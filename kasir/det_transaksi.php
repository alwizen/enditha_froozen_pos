<?php 
include '../koneksi.php';
include '../assets/fungsi_rupiah.php';
$id = $_GET['id_penjualan'];

$query = "SELECT 
		    kd_penjualan, 
        p.tanggal,
        jumlah,
        nama_barang,
        harga_jual
		FROM penjualan p 
		LEFT JOIN det_penjualan dp ON p.id_penjualan=dp.id_penjualan 
		LEFT JOIN barang b ON dp.kd_barang=b.kd_barang
		WHERE p.id_penjualan = ".$id." 
		ORDER BY p.kd_penjualan ASC";

		 $result = mysqli_query($koneksi, $query);
		 $data = array();

		 while($row = mysqli_fetch_array($result)){
           $judul = $row['kd_penjualan'];
            $data[] = array(
          	'nama_barang' =>$row['nama_barang'] ,
          	'jumlah' 		  =>$row['jumlah'],
            'harga_jual' => Rp($row['harga_jual'])
          );

          } 
          echo json_encode(array(
          	"data"  => $data, 
          	"judul" => $judul
          ));
 ?>
         