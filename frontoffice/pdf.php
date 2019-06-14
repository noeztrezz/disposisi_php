<?php 
require '../plugins/fpdf/fpdf.php';
class PDF extends FPDF{
function header(){
		$this->SetFont('arial','B',16);
		$this->Cell(0,1,'Laporan Surat Masuk','B',1,'C');
	}	
}
$pdf = new PDF('L','cm','A4');
//margin (kiri,atas,kanan)
$pdf->SetMargins(2,2,2);
//addpage untuk menambah halaman / kertas
$pdf->AddPage();
$pdf->Ln();
$pdf->SetFont('times','',8);
$pdf->cell(2,1,'Nomor',1,0,'C');
$pdf->cell(3,1,'Jenis Surat',1,0,'C');
$pdf->cell(5,1,'Nama Pengirim',1,0,'C');
$pdf->cell(3,1,'Nomor Dinas',1,0,'C');
$pdf->cell(3,1,'Penanggung Jawab',1,0,'C');
$pdf->cell(3,1,'Tanggal Input',1,0,'C');
$pdf->cell(3,1,'Tanggal Selesai',1,0,'C');


require'../koneksi.php';
$q = mysqli_query($con,"SELECT *From surat");
$no =1;
while($row = mysqli_fetch_object($q)){
	$pdf->Ln();
	$pdf->Cell(2,1,$no++,'LRBT',0,'C');
	$pdf->Cell(3,1,$row->jenis_surat,'LRBT',0,'C');
	$pdf->Cell(5,1,$row->pengirim,'LRBT',0,'C');
	$pdf->Cell(3,1,$row->no_dinas,'LRBT',0,'C');

	$sql = $con->query("SELECT * FROM sub_bidang WHERE id_bidang=".$row->id_penerima);
          $sin = mysqli_fetch_array($sql);
	$pdf->Cell(3,1,$sin['nama_sub'],'LRBT',0,'C');
	$pdf->Cell(3,1,$row->tanggal_input,'LRBT',0,'C');
	$pdf->Cell(3,1,$row->tanggal_selesai,'LRBT',0,'C');

	}
$pdf->Output('LaporanSuratMasuk.pdf','D');


 ?>