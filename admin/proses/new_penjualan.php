<?php

include '../../koneksi.php';

$order_items      = $_POST["order_items"];
$kasir            = $_POST['kasir'];
$tanggal          = $_POST["tanggal"];
$total_dibayarkan = $_POST['total_dibayarkan'];
$total_kembalian  = $_POST['total_kembalian'];

$today = date("Ymd");
$rand = strtoupper(substr(uniqid(sha1(time())),0,4));
$unique = $today . $rand;

$order = mysqli_query($koneksi, "INSERT INTO penjualan (kd_penjualan, tanggal, kasir) VALUES ('$unique', '$tanggal','$kasir')");
$order_id = mysqli_insert_id($koneksi);
 
foreach ($order_items as $item) {
	mysqli_query($koneksi, "INSERT INTO det_penjualan (id_penjualan, kd_barang, id_pelanggan, jumlah, harga, total_dibayarkan, total_kembalian) VALUES 
		($order_id, " . (int)$item["kd_barang"] . "," . (int)$item["id_pelanggan"] . ", " . (int)$item["jumlah"] . ", " . (int)$item["harga"] . "," . (int)$total_dibayarkan . ", " . (int)$total_kembalian . ")");
}
echo "success";