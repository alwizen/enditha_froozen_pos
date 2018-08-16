<?php
include '../../koneksi.php';
 
$act=$_GET['act'];

if ($act=='delete'){
	$kd_barang=$_GET['kd_barang'];
	$row = mysqli_query($koneksi, "DELETE FROM barang WHERE kd_barang = '$kd_barang'");
	header("location:../databarang.php");
}
 
elseif ($act=='input'){
	$nama_barang   = $_POST['nama_barang'];
    $id_supplier   = $_POST['id_supplier'];
    $harga_jual    = $_POST['harga_jual'];
	$harga_beli    = $_POST['harga_beli'];
	$kadaluarsa	   = $_POST['kadaluarsa'];

	$sql = "INSERT INTO barang VALUES ('','$nama_barang', '$id_supplier', '$harga_jual' , '$harga_beli', '$kadaluarsa')";
	$aksi =mysqli_query($koneksi, $sql);

	if($aksi)
	{
        echo "<script>alert('Anda telah berhasil .'); window.location = '../databarang.php'</script>";
	}
	else {echo "gagal";}

}

elseif ($act=='update'){
	$kd_barang	   = $_POST['kd_barang'];
	$nama_barang   = $_POST['nama_barang'];
    $id_supplier   = $_POST['id_supplier'];
    $harga_jual    = $_POST['harga_jual'];
	$harga_beli    = $_POST['harga_beli'];
	$kadaluarsa	   = $_POST['kadaluarsa'];

	$sql = "UPDATE barang SET nama_barang='$nama_barang', id_supplier='$id_supplier', harga_jual='$harga_jual', harga_beli='$harga_beli', kadaluarsa='$kadaluarsa' WHERE kd_barang='$kd_barang'";

	if(mysqli_query($koneksi, $sql)){
		mysqli_close($koneksi);
		 echo "<script>alert('Anda telah berhasil .'); window.location = '../databarang.php'</script>";
	}
	else {
		echo '<script type="text/javascript">';
		echo 'alert("gagal");';
		echo '</script>';
	}

}
?>
