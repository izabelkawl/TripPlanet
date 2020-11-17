<?php
  session_start();
  require('fpdf/fpdf.php');
    
  $pdf = new FPDF('P','mm','A4');
  $pdf->AddPage();

$tekst='Rzeszów';
$tekst = iconv('utf-8','iso-8859-2',$tekst);
$osoby='Ilosc osób: ';
$osoby = iconv('UTF-8','cp1250',$osoby);

$pdf->SetFont('arial', '', 12);
$pdf->Cell(50,7,'Triplanet S.A.','',0,'L');
$pdf->Cell(140,7, date("Y-m-d"),'',1,'R');
$pdf->Cell(50,7,'ul. Warszawska 5b','',1,'L');

$pdf->Cell(50,7,'35-304 '.$tekst.'','',1,'L');
$pdf->Cell(50,7,'NIP: 947-07-77-385','',1,'L');
$pdf->Cell(50,7,'REGON: 193458039 KRS 314229','',1,'L');

$pdf->Cell(50,30,'Dane biletu: ','',0,'C');
$pdf->Image('img/qr.png',180,null,-300);
$pdf->Cell(190,7, '','',1,'R');
//łączenie z bazą danych
require_once "connect.php";
$conn = new mysqli($host, $db_user, $db_password, $db_name);
//warunki po wciśnięciu subbmitów - polskie znaki

  //miasto 1
  if(isset($_POST['jeden'])){
      $panstwo=$_SESSION['ap']; $panstwo = iconv('utf-8','iso-8859-2',$panstwo);
      $miasto=$_SESSION['am']; $miasto = iconv('utf-8','iso-8859-2',$miasto);
      $hotel=$_SESSION['ah']; $hotel = iconv('utf-8','iso-8859-2',$hotel);
      $wylot=$_SESSION['aw']; $wylot = iconv('utf-8','iso-8859-2',$wylot);
      $dnie=$_SESSION['ai']; $dnie = iconv('utf-8','iso-8859-2',$dnie);
      $cena=$_SESSION['ac']; $cena = iconv('utf-8','iso-8859-2',$cena);
      //zarejestrowanie wycieczki do bazy danych
      $sqli = "INSERT INTO wycieczki VALUES (null,'".$_SESSION['data']."',".$_SESSION['id'].",'".$_SESSION['am']."','".$_SESSION['email']."','".$_SESSION['imie']."','".$_SESSION['nazwisko']."','".$_SESSION['ac']."')";
            $result = $conn->query($sqli);
    }
  //miasto 2
    if(isset($_POST['dwa'])){
      $panstwo=$_SESSION['bp']; $panstwo = iconv('utf-8','iso-8859-2',$panstwo);
      $miasto=$_SESSION['bm']; $miasto = iconv('utf-8','iso-8859-2',$miasto);
      $hotel=$_SESSION['bh']; $hotel = iconv('utf-8','iso-8859-2',$hotel);
      $wylot=$_SESSION['bw']; $wylot = iconv('utf-8','iso-8859-2',$wylot);
      $dnie=$_SESSION['bi']; $dnie = iconv('utf-8','iso-8859-2',$dnie);
      $cena=$_SESSION['bc']; $cena = iconv('utf-8','iso-8859-2',$cena);
      //zarejestrowanie wycieczki do bazy danych
      $sqli = "INSERT INTO wycieczki VALUES (null,'".$_SESSION['data']."',".$_SESSION['id'].",'".$_SESSION['bm']."','".$_SESSION['email']."','".$_SESSION['imie']."','".$_SESSION['nazwisko']."','".$_SESSION['bc']."')";
            $result = $conn->query($sqli);
    }
  //miasto 3
    if(isset($_POST['trzy'])){
      $panstwo=$_SESSION['cp']; $panstwo = iconv('utf-8','iso-8859-2',$panstwo);
      $miasto=$_SESSION['cm']; $miasto = iconv('utf-8','iso-8859-2',$miasto);
      $hotel=$_SESSION['ch']; $hotel = iconv('utf-8','iso-8859-2',$hotel);
      $wylot=$_SESSION['cw']; $wylot = iconv('utf-8','iso-8859-2',$wylot);
      $dnie=$_SESSION['ci']; $dnie = iconv('utf-8','iso-8859-2',$dnie);
      $cena=$_SESSION['cc']; $cena = iconv('utf-8','iso-8859-2',$cena);
      //zarejestrowanie wycieczki do bazy danych
      $sqli = "INSERT INTO wycieczki VALUES (null,'".$_SESSION['data']."',".$_SESSION['id'].",'".$_SESSION['cm']."','".$_SESSION['email']."','".$_SESSION['imie']."','".$_SESSION['nazwisko']."','".$_SESSION['cc']."')";
            $result = $conn->query($sqli);
    }
  $imie=$_SESSION['imie']; $imie = iconv('utf-8','iso-8859-2',$imie);
  $nazwisko=$_SESSION['nazwisko']; $nazwisko = iconv('utf-8','iso-8859-2',$nazwisko);

$pdf->Cell(50,7, 'Data wyjazdu: ','L T',0,'L');
$pdf->Cell(140,7, $_SESSION['data'],'T R',1,'P');
$pdf->Cell(50,7, 'Kraj:','L',0,'L');
$pdf->Cell(140,7, $panstwo,'R',1,'L');
$pdf->Cell(50,7,'Miasto: ','L',0,'L');
$pdf->Cell(140,7,$miasto,'R',1,'L');
$pdf->Cell(50,7,'Hotel:','L',0,'L');
$pdf->Cell(140,7,$hotel,'R',1,'L');
$pdf->Cell(50,7,'Wylot: ','L',0,'L');
$pdf->Cell(140,7,$wylot,'R',1,'L');
$pdf->Cell(50,7,'Ilosc dni:','L',0,'L');
$pdf->Cell(140,7, $dnie,'R',1,'L');
$pdf->Cell(50,7,$osoby,'L  B ',0,'L');
$pdf->Cell(140,7,$_SESSION['osoby'],'R B',1,'L');
$pdf->Cell(50,7,'Imie: ','L T',0,'L');
$pdf->Cell(140,7,$imie,'R T',1,'L');
$pdf->Cell(50,7,'Nazwisko: ','L',0,'L');
$pdf->Cell(140,7,$nazwisko,'R',1,'L');
$pdf->Cell(50,7,'Adres email: ','L',0,'L');
$pdf->Cell(140,7,$_SESSION['email'],'R',1,'L');
$pdf->Cell(50,7,'Numer telefonu: ','L',0,'L');
$pdf->Cell(140,7,$_SESSION['telefon'],'R',1,'L');
$pdf->Cell(50,7,'Cena: ','L B',0,'L');
$pdf->Cell(140,7,$cena.' PLN','R B',1,'R');
   
$pdf->Cell(50,10,'Dane do przelewu bankowego: ',0,1 ,'L');
$pdf->Cell(50,7,'Triplanet s.a.',0,1,'L');
$pdf->Cell(50,7,'ul. Warszawska 5b 35-304 '.$tekst.'','',1,'L');
$pdf->Cell(50,7,'Numer rachunku:',0,1,'L');
$pdf->Cell(50,7,'94 1240 4650 0010 1121 8562. ',0,1,'L');

$pdf->Output();