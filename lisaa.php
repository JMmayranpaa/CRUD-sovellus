<?php

require "tietokanta.php";

if (!empty($_POST)) {
    // pidetään lukua validointi erroreista. 
    $joukkueError = null;
    $ottelutError = null;
    $voitotError = null;
    $tasapelitError = null;
    $tappiotError = null;
    

    // pidetään lukua post-arvoista
    $joukkue = $_POST["joukkue"];
    $ottelu = $_POST["ottelut"];
    $voitot = $_POST["voitot"];
    $tasapelit = $_POST["tasapelit"];
    $tappiot = $_POST["tappiot"];

    // validointi input
    $valid = true;
    if (empty($joukkue)) {
        $joukkueError = "Lisää joukkue";
        $valid = false;
    }

    if (empty($ottelu)) {
        $ottelutError = "Lisää otteluiden määrä!";
        $valid = false;
    }

    if (empty($voitot)) {
        $voitotError = "Lisää voittojen määrä!";
        $valid = false;
    }
    if (empty($tasapelit)) {
        $tasapelitError = "Lisää tasapelit määrä!";
        $valid = false;
    }
    if (empty($tappiot)) {
        $tappiotError = "Lisää tappioiden määrä!";
        $valid = false;
    }

    
    if (isset($_REQUEST["lisaa"])) {
    
  	//Lomakkeelta tulevat tiedot
	$joukkue=$_REQUEST['joukkue'];
	$ottelut=$_REQUEST['ottelut'];
	$voitot=$_REQUEST['voitot'];
	$tasapelit=$_REQUEST['tasapelit'];
	$tappiot=$_REQUEST['tappiot'];
    $pisteet = $voitot * 3 + $tasapelit * 1;
	//Lisätään kantaan. PHP:n muuttujat sidotaan SQL-parametreihin bindParam-metodilla.
	$kysely=$yhteys->prepare("INSERT INTO sarjataulukko (joukkue, ottelut, voitot, tasapelit, tappiot, pisteet) VALUES (:joukkue, :ottelut, :voitot, :tasapelit, :tappiot, :pisteet)");
	//Tietoturvasyistä SQL-lauseeseen ei kirjoiteta suoraan lomakkeelta tulleita tietoja (SQL-injektion vaara)!!!!!!
	$kysely->bindParam(":joukkue", $joukkue);
	$kysely->bindParam(":ottelut", $ottelut);
	$kysely->bindParam(":tasapelit", $tasapelit);
	$kysely->bindParam(":voitot",$voitot);
	$kysely->bindParam(":tappiot",$tappiot);
    $kysely -> bindParam(":pisteet", $pisteet);
	$kysely->execute();
    header("Location: etusivu.php");
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <script src="js/bootstrap.min.js"></script>
</head>

<body>
    <div class="container">

        <div class="span10 offset1">
            <div class="row">
                <h3>Lisää Joukkue</h3>
            </div>
 
            <form class="form-horizontal" action="lisaa.php" method="post">
                <div class="control-group <?php echo !empty($joukkueError) ? 'error' : ''; ?>">
                    <label class="control-label">Joukkue</label>
                    <div class="controls">
                        <input name="joukkue" type="text" placeholder="joukkue" value="<?php echo !empty($joukkue) ? $joukkue : ''; ?>">
                        <?php if (!empty($joukkueError)) : ?>
                            <span class="help-inline"><?php echo $joukkueError; ?></span>
                        <?php endif; ?>
                    </div>
                </div>
                <div class="control-group <?php echo !empty($ottelutError) ? 'error' : ''; ?>">
                    <label class="control-label">Ottelut</label>
                    <div class="controls">
                        <input name="ottelut" type="text" placeholder="ottelut" value="<?php echo !empty($ottelut) ? $ottelut : ''; ?>">
                        <?php if (!empty($ottelutError)) : ?>
                            <span class="help-inline"><?php echo $ottelutError; ?></span>
                        <?php endif; ?>
                    </div>
                </div>
                <div class="control-group <?php echo !empty($voitotError) ? 'error' : ''; ?>">
                    <label class="control-label">Voitot</label>
                    <div class="controls">
                        <input name="voitot" type="text" placeholder="voitot" value="<?php echo !empty($voitot) ? $voitot : ''; ?>">
                        <?php if (!empty($voitotError)) : ?>
                            <span class="help-inline"><?php echo $voitotError; ?></span>
                        <?php endif; ?>
                    </div>
                </div>
                <div class="control-group <?php echo !empty($tasapelitError) ? 'error' : ''; ?>">
                    <label class="control-label">Tasapelit</label>
                    <div class="controls">
                        <input name="tasapelit" type="text" placeholder="tasapelit" value="<?php echo !empty($tasapelit) ? $tasapelit : ''; ?>">
                        <?php if (!empty($tasapelitError)) : ?>
                            <span class="help-inline"><?php echo $tasapelitError; ?></span>
                        <?php endif; ?>
                    </div>
                </div>
                <div class="control-group <?php echo !empty($tappiotError) ? 'error' : ''; ?>">
                    <label class="control-label">Tappiot</label>
                    <div class="controls">
                        <input name="tappiot" type="text" placeholder="tappiot" value="<?php echo !empty($tappiot) ? $tappiot : ''; ?>">
                        <?php if (!empty($tappiotError)) : ?>
                            <span class="help-inline"><?php echo $tappiotError; ?></span>
                        <?php endif; ?>
                    </div>
                </div>
                <div class="form-actions">
                    <button type="submit" name = "lisaa" class="btn btn-success">Lisää</button>
                    <a class="btn" href="etusivu.php">Takaisin</a>
                </div>
            </form>
        </div>

    </div> <!-- /container -->
</body>
</html>
<!--Lähteet: Arto Väätäinen-->
<!--https://www.startutorial.com/articles/view/php-crud-tutorial-part-1-->
<!--Koodit on uudelleen kirjoittetu demoista.-->