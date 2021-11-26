<?php
session_start();
// asetetaan muuttujat
$kayttajatunnus = "";
$errors = array();
// tietokanta yhteys
$yhteys = mysqli_connect('localhost', 'root', '', 'veikkausliiga');

// käyttäjä rekisteröinti
if (isset($_POST["rekisteroi"])) {
	// receive all input values from the form
	$kayttajatunnus = mysqli_real_escape_string($yhteys, $_POST["kayttajatunnus"]);
	$salasana_1 = mysqli_real_escape_string($yhteys, $_POST['salasana_1']);
	$salasana_2 = mysqli_real_escape_string($yhteys, $_POST['salasana_2']);

	// Validointi: varmista, että käyttäjä syöttää tarvittavat tiedot
	// array_push yhteydessä errors.php $errors arrayhin.
	if (empty($kayttajatunnus)) {
		array_push($errors, "Syötä käyttäjätunnus!");
	}
	
	if (empty($salasana_1)) {
		array_push($errors, "Syötä salasana!");
	}
	if ($salasana_1 != $salasana_2) {
		array_push($errors, "Salasanat eivät täsmää. Syötä uudelleen!");
	}
	// ensiksi katsotaan, että tietokanannassa ei ole samaa käyttäjää samoilla käyttäjä tunnuksilla.
	$tietokanta_query_check = "SELECT * FROM tunnukset WHERE tunnus='$kayttajatunnus'";
	$tulos = mysqli_query($yhteys, $tietokanta_query_check);
	$kayttaja = mysqli_fetch_assoc($tulos);

	if ($kayttaja) { //jos käyttäjä löytyy.
		if ($kayttaja["kayttajatunnus"] === $kayttajatunnus) {
			array_push($errors, "Käyttäjätunnus on jo käytössä. Yritä uudelleen!");
		}
	}
	// rekisteröi käyttäjä jos ei ole erroreita.

	if (count($errors) == 0) {
		$salasana = md5($salasana_1); //md5 cryptaus salasanalle.
		

		$query = "INSERT INTO tunnukset(tunnus, salasana) VALUES('$kayttajatunnus', '$salasana')";
		mysqli_query($yhteys, $query);
		$_SESSION["kayttajatunnus"] = $kayttajatunnus;
		$_SESSION["succes"] = "Olet nyt kirjautunut sisään!";
		header("location: etusivu.php");
	}
}

// Login käyttäjä
if (isset($_POST["kirjaudu_sisaan"])) {
	$kayttajatunnus = mysqli_real_escape_string($yhteys, $_POST["kayttajatunnus"]);
	$salasana = mysqli_real_escape_string($yhteys, $_POST["salasana"]);
  
	if (empty($kayttajatunnus)) {
		array_push($errors, "Syötä käyttäjätunnus!");
	}
	if (empty($salasana)) {
		array_push($errors, "Syötä salasana!");
	}
  
	if (count($errors) == 0) {
		$salasana = md5($salasana);
		$query = "SELECT * FROM tunnukset WHERE tunnus='$kayttajatunnus' AND salasana='$salasana'";
		$tulos = mysqli_query($yhteys, $query);
		if (mysqli_num_rows($tulos) == 1) {
		  $_SESSION["kayttajatunnus"] = $kayttajatunnus;
		  $_SESSION["succes"] = "Olet nyt kirjautunut sisään!";
		  header("location: etusivu.php");
		}else {
			array_push($errors, "Väärä käyttäjätunnus tai salasana!");
		}
	}
  }
?>
<!--Lähteet:-->
<!--https://codewithawa.com/posts/complete-user-registration-system-using-php-and-mysql-database-->
<!--Linkin koodi muokattu sovellukseen sopivaksi.-->