<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <script src="js/bootstrap.min.js"></script>
</head>
<body>
    <title>Veikkausliiga</title>
    <div class="container">
        <div class="row">
        </div>
        <div class="row">
            <table class="table table-striped table-bordered">
                <thead>
                    <tr>
                        <th>Joukkue</th>
                        <th>Ottelut</th>
                        <th>Voitot</th>
                        <th>Tasapelit</th>
                        <th>Tappiot</th>
                        <th>Pisteet</th>
                    </tr>
                </thead>
                <tbody>
                    <h2>Pelitietojen haku</h2>
                    <form method="post" action="">
                        Joukkue: <input name="joukkue">
                        <button type="submit" name="hakunappi" class="btn btn-success">Hae</button>
                        <a class="btn" href="etusivu.php">Takaisin</a>
                    </form>
                    <?php
                    include("tietokanta.php");
                    if (isset($_REQUEST["joukkue"])) {
                        $kysely = $yhteys->prepare("SELECT * FROM sarjataulukko WHERE joukkue = :joukkue");
                        $joukkue = $_REQUEST["joukkue"];
                        $kysely->bindParam(":joukkue", $joukkue);
                        $kysely->execute();
                        $rivi = $kysely->fetch();
                        echo "<tr>";
                        echo "<td>" . $rivi["joukkue"] . "</td>";
                        echo "<td>" . $rivi["ottelut"] . "</td>";
                        echo "<td>" . $rivi["voitot"] . "</td>";
                        echo "<td>" . $rivi["tasapelit"] . "</td>";
                        echo "<td>" . $rivi["tappiot"] . "</td>";
                        echo "<td>" . $rivi["pisteet"] . "</td>";
                        echo '<td><a class="btn" href="muuta.php?id=' . $rivi["joukkue"] . '">Muuta</a></td>';
                        echo '<td><a class="btn" href="poista.php?id=' . $rivi["joukkue"] . '">Poista</a></td>';
                        echo "</tr>";
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </div> <!-- /container -->
</body>
</html>
<!--Lähteet: Arto Väätäinen-->
<!--https://www.startutorial.com/articles/view/php-crud-tutorial-part-1-->
<!--Koodit on uudelleen kirjoittetu demoista.-->