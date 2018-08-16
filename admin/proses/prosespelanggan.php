<?php
include '../../koneksi.php';
 
$act=$_GET['act']; 

if ($act=='delete'){
	$id_pelanggan=$_GET['id_pelanggan'];
	$row = mysqli_query($koneksi, "DELETE FROM pelanggan WHERE id_pelanggan = '$id_pelanggan'");
	header("location:../datapelanggan.php");
}

elseif ($act=='input'){
	$nama_pelanggan = $_POST['nama_pelanggan'];
	$jns_kel        = $_POST['jns_kel'];
	$alamat         = $_POST['alamat'];
	$no_tlp         = $_POST['no_tlp'];
	
	$sql = "INSERT INTO pelanggan VALUES('', '$nama_pelanggan', '$jns_kel','$alamat', '$no_tlp')";
	$aksi =mysqli_query($koneksi, $sql);

	if($aksi)
	{
        header("location:../datapelanggan.php");
	}
	else {echo "gagal";}

}

elseif ($act=='update'){
	$id_pelanggan   = $_POST['id_pelanggan'];
	$nama_pelanggan = $_POST['nama_pelanggan'];
	$jns_kel        = $_POST['jns_kel'];
	$alamat         = $_POST['alamat'];
	$no_tlp         = $_POST['no_tlp'];

	$sql = "UPDATE pelanggan SET nama_pelanggan='$nama_pelanggan', jns_kel='$jns_kel', alamat='$alamat', no_tlp='$no_tlp' WHERE id_pelanggan='$id_pelanggan'";

	if(mysqli_query($koneksi, $sql)){
		mysqli_close($koneksi);
		echo "<script>alert('Anda telah berhasil .'); window.location = '../datapelanggan.php'</script>";
	}
	else {
		echo '<script type="text/javascript">';
		echo 'alert("gagal");';
		echo '</script>';
	}

}
?>
