<?php
include 'connect.php';
session_start();
if (!isset($_SESSION['login_user'])) {
	header("Location: login.php");
}
?>
<?php $nomor=1; ?>
          
          <?php $totalbelanja = 0; ?>
          <?php 
              $ambil = $c->query("SELECT * FROM pemesanan_chara JOIN chara ON pemesanan_chara.id=chara.id 
                WHERE pemesanan_chara.id_pemesanan='$_GET[id]'");
                $take=mysqli_fetch_assoc($ambil);
           ?>
           
<?php



require('fpdf/fpdf.php');



$pdf = new FPDF('P','mm',array(208,208));

$pdf->AddPage();
$title = 'INVOICE PEMBAYARAN';
$pdf->SetTitle($title);
//set font to arial, bold, 14pt
$pdf->SetFont('Arial','B',14);

//Cell(width , height , text , border , end line , [align] )

$pdf->Cell(130	,5,'PT. SHINING INDONESIA',0,0);
$pdf->Cell(59	,5,'BUYER',0,1);//end of line

//set font to arial, regular, 12pt
$pdf->SetFont('Arial','',12);


$pdf->Cell(59	,5,'',0,1);//end of line

$pdf->Cell(130	,5,'Jakarta, Indonesia',0,0);
$pdf->Cell(25	,5,'Name',0,0,);
$pdf->SetFont('Arial','B',12);
$pdf->Cell(39	,5,$take['realname'],0,1,);//end of line
$pdf->SetFont('Arial','',12);
$pdf->SetFont('Arial','B',12);
$pdf->Cell(130	,5,'General Manager',0,0);
$pdf->SetFont('Arial','',12);
$pdf->Cell(25	,5,'Akun',0,0,);
$pdf->SetFont('Arial','B',12);
$pdf->Cell(34	,5,$take['nameuser'],0,1);//end of line
$pdf->SetFont('Arial','',12);
$pdf->SetFont('Arial','B',12);
$pdf->Cell(130	,5,'Zheng Eriksen D',0,0);
$pdf->SetFont('Arial','',12);
$pdf->Cell(25	,5,'Order ID',0,0);
$pdf->SetFont('Arial','B',12);
$pdf->Cell(34	,5,$take['number'],0,1);//end of line
$pdf->SetFont('Arial','',12);
//make a dummy empty cell as a vertical spacer




//make a dummy empty cell as a vertical spacer
$pdf->Cell(189	,10,'',0,1);//end of line

//invoice contents
$pdf->SetFont('Arial','B',12);

$pdf->Cell(130	,5,'Karakter',1,0);
$pdf->Cell(22	,5,'Jumlah',1,0);
$pdf->Cell(37	,5,'Harga',1,1);//end of line

$pdf->SetFont('Arial','',12);

//Numbers are right-aligned so we give 'R' after new line parameter
$ambil = $c->query("SELECT * FROM pemesanan_chara JOIN chara ON pemesanan_chara.id=chara.id 
WHERE pemesanan_chara.id_pemesanan='$_GET[id]'");
while ($pecah=$ambil->fetch_assoc()) { 
     $subharga1=$pecah['harga']*$pecah['jumlah']; 
     $totalbelanja+=$subharga1;
$pdf->Cell(130	,5,$pecah['nama'],1,0);
$pdf->Cell(22	,5,$pecah['jumlah'],1,0);
$pdf->Cell(7	,5,'Rp.',1,0);
$pdf->Cell(30	,5,$subharga1,1,1,'R');
}


//summary
$pdf->Cell(130	,5,'',0,0);
$pdf->Cell(22	,5,'Harga Total',0,0);
$pdf->Cell(6    	,5,'',0,0);
$pdf->Cell(1   	,5,'Rp',0,0);
$pdf->SetFont('Arial','B',12);
$pdf->Cell(30	,5,$totalbelanja,0,1,'R');//end of line
$pdf->SetFont('Arial','',12);
$pdf->Cell(230	,10,'',0,1);

$pdf->Cell(130	,5,'',0,0);
$pdf->Cell(22	,5,'Uang Bayar',0,0);
$pdf->Cell(6    	,5,'',0,0);
$pdf->Cell(1   	,5,'Rp',0,0);
$pdf->SetFont('Arial','B',12);
$pdf->Cell(30	,5,$take['paid'],0,1,'R');//end of line
$pdf->SetFont('Arial','',12);


$pdf->Cell(130	,5,'',0,0);
$pdf->Cell(22	,5,'Kembali',0,0);
$pdf->Cell(6    	,5,'',0,0);
$pdf->Cell(1   	,5,'Rp',0,0);
$pdf->SetFont('Arial','B',12);
$pdf->Cell(30	,5,$take['kembalian'],0,1,'R');//end of line
$pdf->SetFont('Arial','',12);

$pdf->Cell(189	,10,'',0,1);//end of line

$pdf->SetFont('Arial','BI',12);
$pdf->Cell(130	,5,'*Makanan/Minuman/Snack yang telah dibeli tidak dapat direfund ataupun ditukar',0,0);
$pdf->SetFont('Arial','',12);

$pdf->Output('INVOICE PEMBAYARAN.pdf', 'I');
?>
