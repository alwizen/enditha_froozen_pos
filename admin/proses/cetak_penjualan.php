<?php 
session_start();
$nama = (isset($_SESSION['nama_u'])) ? $_SESSION['nama_u'] : '';
include '../../koneksi.php';
include '../../assets/fungsi_tanggal.php';
include '../../assets/fungsi_rupiah.php';
require ('../../assets/pdf/fpdf.php');

$pdf = new FPDF("P","cm","A4");

$pdf->SetMargins(2,1,1);
$pdf->AliasNbPages();
$pdf->AddPage();
$pdf->SetFont('Times','B',11);
$pdf->Image('../../img/logoo.png',1.3,0.5,2,2);
$pdf->SetX(4);            
$pdf->MultiCell(19.5,0.5,'Enditha Froozen Food',0,'L');
$pdf->SetX(4);
$pdf->MultiCell(19.5,0.5,'Telpon : 0856-0074-6662',0,'L');    
$pdf->SetFont('Arial','B',10);
$pdf->SetX(4);
$pdf->MultiCell(19.5,0.5,'JL. S Parman Kasepuhan - Batang',0,'L');
$pdf->SetFont('Arial','B',10);
$pdf->SetX(4);
$pdf->Line(1,3.1,20.5,3.1);
$pdf->SetLineWidth(0.1);      
$pdf->Line(1,3.2,20.5,3.2);   
$pdf->SetLineWidth(0);
$pdf->ln(1);
$pdf->SetFont('Arial','B',14);
$pdf->ln(1);
$pdf->Cell(18,0.7,"NOTA PENJUALAN",0,10,'C');
$pdf->SetFont('Arial','B',10);
// $pdf->Cell(5,0.7,"Di cetak pada : ".date("D d-M-Y"),0,0,'C');
$pdf->ln(1);
$pdf->SetFont('Arial','B',10);
$pdf->Cell(1, 0.8, 'No ', 1, 0, 'C');
$pdf->Cell(3, 0.8, 'Tanggal', 1, 0, 'C');
$pdf->Cell(4, 0.8, 'Nama Barang', 1, 0, 'C');
$pdf->Cell(2.5, 0.8, 'Harga', 1, 0, 'C');
$pdf->Cell(2, 0.8, 'Jumlah', 1, 0, 'C');
$pdf->Cell(4.5, 0.8, 'Total', 1, 1, 'C');
$pdf->SetFont('Arial','',10);

$no=1;
$id_penjualan = $_GET['id_penjualan'];
$grand_total  = 0;
$jumlah       = 0;
$bayar        = 0;
$kembali      = 0;
$kasir        = 0;
$query=mysqli_query($koneksi,"SELECT
                                        p.id_penjualan, 
                                        kd_penjualan, 
                                        p.tanggal,
                                        p.kasir,
                                        jumlah,
                                        nama_barang,
                                        harga_jual,
                                        pl.nama_pelanggan,
                                        dp.total_dibayarkan,
                                        dp.total_kembalian,
                                        SUM(dp.jumlah*dp.harga) as grand_total 
                                        FROM penjualan p 
                                        LEFT JOIN det_penjualan dp ON p.id_penjualan=dp.id_penjualan 
                                        LEFT JOIN barang b ON dp.kd_barang=b.kd_barang
                                        LEFT JOIN pelanggan pl ON dp.id_pelanggan = pl.id_pelanggan
                                        WHERE p.id_penjualan = '$id_penjualan'
                                        GROUP BY id_det_penjualan ORDER BY p.kd_penjualan ASC");
while($lihat=mysqli_fetch_array($query)){
     $pdf->Cell(1, 0.8, $no , 1, 0, 'C');
     $pdf->Cell(3, 0.8, tgl_indo($lihat["tanggal"]), 1, 0,'C');
     $pdf->Cell(4, 0.8, $lihat['nama_barang'],1, 0, 'C'); 
     $pdf->Cell(2.5, 0.8, Rp($lihat['harga_jual']),1, 0, 'C'); 
     $pdf->Cell(2, 0.8, $lihat['jumlah'],1, 0, 'C');
     $pdf->Cell(4.5, 0.8, Rp($lihat['grand_total']), 1, 1,'C');
     $grand_total += $lihat['grand_total'];
     $jumlah      += $lihat['jumlah'];
     $bayar        = $lihat['total_dibayarkan'];
     $kembali      = $lihat['total_kembalian'];
     $kasir        = $lihat['kasir'];
     $no++;
}
$pdf->SetFont('Arial', 'B', 10);      
$pdf->Cell(10.5, 0.8, "Grand Total ", 1, 0,'R');
$pdf->Cell(2, 0.8, $jumlah, 1, 0, 'C');
$pdf->Cell(4.5, 0.8, Rp($grand_total), 1, 0,'C');
$pdf->ln();
$pdf->SetFont('Arial', '', 10);
$pdf->Cell(12.5, 0.8, "Tunai ", 1, 0, 'R');
$pdf->Cell(4.5, 0.8, Rp($bayar), 1, 0, 'C');
$pdf->ln();
$pdf->Cell(12.5, 0.8, "Kembali ", 1, 0, 'R');
$pdf->Cell(4.5, 0.8, Rp($kembali), 1, 0, 'C');

$pdf->SetFont('Arial', 'I', 10);
$pdf->ln(1);
$pdf->MultiCell(19.5, 2, 'Batang, ' . tgl_indo(date("Y-m-d")) . '', 0, 'L');
$pdf->SetFont('Arial', 'B', 10);
$pdf->ln(1);
$pdf->SetFont('Arial', 'U', 10);
$pdf->MultiCell(19.5, 0.8, ' ' . $kasir . ' ', 0, 'L');
$pdf->Output("nota.pdf","I");

?>