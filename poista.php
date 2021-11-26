<?php
//Ohjelma poistaa halutun joukkuee tiedot kannasta

include("tietokanta.php");

$id = $_REQUEST['id'];
//ajetaan SQL-lause
$kysely = $yhteys->prepare("DELETE FROM sarjataulukko WHERE joukkue = :joukkue");
$kysely->bindParam(":joukkue",$id);
$kysely ->execute();
header("Location: etusivu.php");
?>
<!--Lähteet: Arto Väätäinen-->
<!--https://www.startutorial.com/articles/view/php-crud-tutorial-part-1-->
<!--Koodit on uudelleen kirjoittetu demoista.-->