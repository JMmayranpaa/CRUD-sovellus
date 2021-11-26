<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <script src="js/bootstrap.min.js"></script>
</head>
<body>
	<div class="container">
		<h2>Joukkueen pelitietojen muutos</h2>
		<h4>Haku</h4>
		<form method="post" action="muuta.php">
			Joukkue: <input name="joukkue">
			<input type="submit" name="hakunappi" value="Hae">
		</form>

		<?php
		include("tietokanta.php");
		//Haetaan halutun joukkueen pelitiedot ja tulostetaan se haku napilla.
		if (isset($_REQUEST["hakunappi"])) {
			$kysely = $yhteys->prepare("SELECT * FROM sarjataulukko WHERE joukkue = :joukkue");
			$joukkue = $_REQUEST["joukkue"];
			$kysely->bindParam(":joukkue", $joukkue);
			$kysely->execute();
			$rivi = $kysely->fetch();
		}
		?>
		<hr />
		<h4>Tallennus</h4>
		<form method="post" action="muuta.php">
			<input type="hidden" name="joukkue" value="<?php echo $rivi["joukkue"]; ?>">
			Ottelut: <input name="ottelut" value="<?php echo $rivi["ottelut"]; ?>">
			<br />
			Voitot: <input name="voitot" value="<?php echo $rivi["voitot"]; ?>">
			<br />
			Tasapelit: <input name="tasapelit" value="<?php echo $rivi["tasapelit"]; ?>">
			<br />
			Tappiot: <input name="tappiot" value="<?php echo $rivi["tappiot"]; ?>">
			<br />

			<button type="submit" name="muutosnappi" class="btn btn-success">Tallenna</button>
			<a class="btn" href="etusivu.php">Takaisin</a>
		</form>
		<?php
		if (isset($_REQUEST["muutosnappi"])) {
			$kysely = $yhteys->prepare("UPDATE sarjataulukko SET ottelut = :ottelut, voitot = :voitot, tasapelit = :tasapelit, tappiot = :tappiot, pisteet = :pisteet WHERE joukkue = :joukkue");
			$joukkue = $_REQUEST["joukkue"];
			$ottelut = $_REQUEST["ottelut"];
			$voitot = $_REQUEST["voitot"];
			$tasapelit = $_REQUEST["tasapelit"];
			$tappiot = $_REQUEST["tappiot"];
			$pisteet = $voitot * 3 + $tasapelit * 1;


			$kysely->bindParam(":joukkue", $joukkue);
			$kysely->bindParam(":ottelut", $ottelut);
			$kysely->bindParam(":voitot", $voitot);
			$kysely->bindParam(":tasapelit", $tasapelit);
			$kysely->bindParam(":tappiot", $tappiot);
			$kysely->bindParam(":pisteet", $pisteet);
			$kysely->execute();
			header("Location: etusivu.php");
		}
		?>
</body>

</html>
<!--Lähteet: Arto Väätäinen-->
<!--https://www.startutorial.com/articles/view/php-crud-tutorial-part-1-->
<!--Koodit on uudelleen kirjoittetu demoista.-->