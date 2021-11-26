<?php
//Yhteys kantaan: tietokantamoottori, ip-osoite,tietokannan nimi
$yhteys = "mysql:host=localhost;dbname=veikkausliiga"; 
$kayttajatunnus = "root"; 
$salasana = "";  
//virhetarkastus
try {
	$yhteys = new PDO($yhteys, $kayttajatunnus, $salasana); 
	$yhteys->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	$yhteys->exec("SET CHARACTER SET utf8;");
}
catch (PDOException $e) {
	die("Tietokantaan ei saada yhteyttä. Virhe: ".$e);
}
?>

<!--Lähteet:-->
<!--Arto Väätäinen: XAMK-php kurssi-->