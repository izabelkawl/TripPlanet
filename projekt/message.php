<?php
$headers =  'MIME-Version: 1.0' . "\r\n"; 
$headers .= 'From: Your name <info@address.com>' . "\r\n";
$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n"; 


$adres = "izabelawlazlo9@gmail.com";
$nazwa= $_POST['email'];
$wiadomosc = $_POST['message'];
// użycie funkcji mail
mail($adres, $nazwa, $wiadomosc);
?>