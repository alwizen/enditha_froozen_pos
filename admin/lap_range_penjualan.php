<?php 
session_start();
$nama = (isset($_SESSION['nama_u'])) ? $_SESSION['nama_u'] : '';
include '../koneksi.php';
include '../assets/fungsi_tanggal.php';
include '../assets/fungsi_rupiah.php';
require ('../assets/pdf/fpdf.php');

$pdf = new FPDF("L","cm","A4"); //set kertas
$pdf->SetMargins(2,1,1);
$pdf->AliasNbPages();
$pdf->AddPage();
$pdf->SetFont('Times','B',11);
$pdf->Image('../img/logoo.png',1.3,0.5,2,2);
$pdf->SetX(4);            
$pdf->MultiCell(19.5,0.5,'Enditha Froozen Food',0,'L');
$pdf->SetX(4);
$pdf->MultiCell(19.5,0.5,'Telpon : 0857xxxxxx',0,'L');    
$pdf->SetFont('Arial','B',10);
$pdf->SetX(4);
$pdf->MultiCell(19.5,0.5,'JL. xxxxxx no.xx xxxxxxx',0,'L');
$pdf->SetX(4);
$pdf->Line(1,3.1,28.5,3.1);
$pdf->SetLineWidth(0.1);      
$pdf->Line(1,3.2,28.5,3.2);   
$pdf->SetLineWidth(0);
$pdf->ln(1);
$pdf->SetFont('Arial','B',14);
$pdf->ln(1);
$pdf->Cell(25.5,0.7,"Laporan Penjualan Barang",0,10,'C');
$pdf->ln(1);
$pdf->SetFont('Arial','B',10);
// $pdf->Cell(5,0.7,"Di cetak pada : ".date("D-d/m/Y"),0,0,'C');
$pdf->ln(1);
$pdf->Cell(9,0.7,"Dari : ".tgl_indo($_POST['dari']) ." - Sampai :".tgl_indo($_POST['sampai']),0,0,'C');
$pdf->ln(1);
$pdf->SetFont('Arial','B',10);
$pdf->Cell(1, 0.8, 'No ', 1, 0, 'C');
$pdf->Cell(4, 0.8, 'Faktur', 1, 0, 'C');
$pdf->Cell(4, 0.8, 'Pelanggan', 1, 0, 'C');
$pdf->Cell(4, 0.8, 'Tanggal', 1, 0, 'C');
$pdf->Cell(4, 0.8, 'Nama Barang', 1, 0, 'C');
$pdf->Cell(3, 0.8, 'Jumlah', 1, 0, 'C');
$pdf->Cell(4, 0.8, 'Total', 1, 1, 'C');
$pdf->SetFont('Arial','',10);

$no=1;
$grand_total = 0;
$dari=$_POST['dari'];
$sampai=$_POST['sampai'];
$query=mysqli_query($koneksi,"SELECT 
          p.kd_penjualan,  
          p.tanggal,
          jumlah,
          nama_barang,
          pl.nama_pelanggan,
          SUM(dp.jumlah*dp.harga) as grand_total 
          FROM penjualan p 
          LEFT JOIN det_penjualan dp ON p.id_penjualan=dp.id_penjualan 
          LEFT JOIN barang b ON dp.kd_barang=b.kd_barang
          LEFT JOIN pelanggan pl ON dp.id_pelanggan = pl.id_pelanggan
          WHERE p.tanggal BETWEEN '".$_POST["dari"]."' AND '".$_POST["sampai"]."' 
          GROUP BY id_det_penjualan ORDER BY p.tanggal ASC");
while($lihat=mysqli_fetch_array($query)){
	$pdf->Cell(1, 0.8, $no , 1, 0, 'C');
	$pdf->Cell(4, 0.8, $lihat['kd_penjualan'],1, 0, 'C');
    $pdf->Cell(4, 0.8, $lihat['nama_pelanggan'],1, 0, 'C');
	$pdf->Cell(4, 0.8, tgl_indo($lihat["tanggal"]), 1, 0,'C');
	$pdf->Cell(4, 0.8, $lihat['nama_barang'],1, 0, 'C');
	$pdf->Cell(3, 0.8, $lihat['jumlah'],1, 0, 'C');
	$pdf->Cell(4, 0.8, Rp($lihat['grand_total']), 1, 1,'C');
    $grand_total += $lihat['grand_total'];
	$no++;
}
$pdf->SetFont('Arial', 'B', 10);
$pdf->Cell(20, 0.8, "Grand Total ", 1, 0,'C');          
$pdf->Cell(4, 0.8, Rp($grand_total), 1, 0,'C');
$pdf->SetFont('Arial', 'I', 10);
$pdf->ln(1);
$pdf->MultiCell(19.5, 2, 'Pekalongan, ' . tgl_indo(date("Y-m-d")) . '', 0, 'R');
$pdf->SetFont('Arial', 'B', 10);
$pdf->ln(1);
$pdf->ln(1);
$pdf->SetFont('Arial', 'U', 10);
$pdf->MultiCell(19.5, 0.8, ' ' . $nama . ' ', 0, 'R');
$pdf->Output("laporan_Pembelian.pdf", "I");
?>
