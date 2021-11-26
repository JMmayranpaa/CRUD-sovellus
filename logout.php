<?php
//session aloitus
session_start();
unset($_SESSION["kayttajanimi"]);
unset($_SESSION["succes"]);
header("Location:login.php");
?>