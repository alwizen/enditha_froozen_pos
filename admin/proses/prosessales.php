<?php 
include '../../koneksi.php';

$act = $_GET['act'];

if ($act == 'delete') {
    $id_sales = $_GET['id_sales'];
    $row = mysqli_query($koneksi, "DELETE FROM sales WHERE id_sales = '$id_sales'");
    header("location:../datasales.php");

} elseif ($act == 'input') {
    $nama_sales    = $_POST['nama_sales'];
    $id_supplier   = $_POST['id_supplier'];
    $alamat        = $_POST['alamat'];
    $no_tlp        = $_POST['no_tlp'];

    $sql  = "INSERT INTO sales VALUES('', '$nama_sales', '$id_supplier', '$alamat', '$no_tlp')";
    $aksi = mysqli_query($koneksi, $sql);

    if ($aksi) {
        echo "<script>alert('Anda telah berhasil .'); window.location = '../datasales.php'</script>";
    } else {
        echo "gagal";
    }
} elseif ($act == 'update') { 
    $id_sales      = $_POST['id_sales'];
    $nama_sales    = $_POST['nama_sales'];
    $id_supplier   = $_POST['id_supplier'];
    $alamat        = $_POST['alamat'];
    $no_tlp        = $_POST['no_tlp'];

    $sql = "UPDATE sales SET nama_sales='$nama_sales', id_supplier='$id_supplier', alamat='$alamat', no_tlp='$no_tlp' WHERE id_sales='$id_sales'";

    if (mysqli_query($koneksi, $sql)) {
        mysqli_close($koneksi);
        echo "<script>alert('Data Berhasil diubah .'); window.location = '../datasales.php'</script>";
    } else {
        echo '<script type="text/javascript">';
        echo 'alert("gagal");';
        echo '</script>';
    }

}
?>
