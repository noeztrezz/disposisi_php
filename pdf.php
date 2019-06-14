<?php 
require 'fpdf/fpdf.php';
class PDF extends FPDF{
function header(){
		$this->SetFont('arial','B',16);
		$this->Cell(0,1,'Data Sinopsis','B',1,'C');
	}	
}
$pdf = new PDF('P','cm','A4');
//margin (kiri,atas,kanan)
$pdf->SetMargins(2,2,2);
//addpage untuk menambah halaman / kertas
$pdf->AddPage();
$pdf->Ln();
$pdf->SetFont('times','',12);
$pdf->cell(2,1,'Nomor',1,0,'C');
$pdf->cell(3,1,'nim',1,0,'C');
$pdf->cell(5,1,'Nama Dosen Pembimbing',1,0,'C');
$pdf->cell(3,1,'Judul',1,0,'C');
$pdf->cell(3,1,'Latar Belakang',1,0,'C');


require'koneksi.php';
$q = mysqli_query($con,"SELECT *From tbl_sinopsis");
$no =1;
while($row = mysqli_fetch_object($q)){
	$pdf->Ln();
	$pdf->Cell(2,1,$no++,'LRBT',0,'C');
	$pdf->Cell(3,1,$row->nim,'LRBT',0,'C');
	$pdf->Cell(5,1,$row->calon_dosen_pembimbing,'LRBT',0,'C');
	$pdf->Cell(3,1,$row->judul,'LRBT',0,'C');
	$pdf->Cell(3,1,$row->latar_belakang,'LRBT',0,'C');

	}
$pdf->Output('LaporanSinopsis.pdf','D');


 ?>