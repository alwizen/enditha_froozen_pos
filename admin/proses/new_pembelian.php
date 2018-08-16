<?php

include '../../koneksi.php';

$order_items = $_POST["order_items"]; 
$tanggal = $_POST["tanggal"];

$today = date("Ymd");
$rand = strtoupper(substr(uniqid(sha1(time())),0,4));
$unique = $today . $rand;

$order = mysqli_query($koneksi, "INSERT INTO pembelian (kd_pembelian, tanggal) VALUES ('$unique', '$tanggal')");
$order_id = mysqli_insert_id($koneksi);

foreach ($order_items as $item) {

mysqli_query($koneksi, "INSERT INTO det_pembelian (id_pembelian, kd_barang, jumlah) VALUES ($order_id, " . (int)$item["kd_barang"] . ", " . (int)$item["jumlah"] . ")" );
}

echo "success";