<!DOCTYPE html>
<html lang="en">
<head>
    <!--Bootstrap 3-->
    <meta charset="utf-8">
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <script src="js/bootstrap.min.js"></script>
</head>
<body>
    <title>Veikkausliiga</title>
    <div class="container">
        <div class="row">
            <h3>Sarjataulukko</h3>
        </div>
        <div class="row">
            <p>
                <!-- Linkit sivuille -->
                <a href="lisaa.php" class="btn btn-success">Lisää</a>
                <a href="haku.php" class="btn btn-success">Hae</a>
                <a href="logout.php" class="btn btn-succes">Kirjaudu ulos</a>
            </p>
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
                    <?php 
                    include("tietokanta.php"); 
                    //haetaan tarvittavat tiedot 
                    $kysely = $yhteys->prepare("SELECT * FROM sarjataulukko");
                    $kysely->execute(); 
                    while ($rivi = $kysely->fetch()) { 
                        echo "<tr>";
                        echo "<td>" . $rivi["joukkue"] . "</td>";
                        echo "<td>" . $rivi["ottelut"] . "</td>";
                        echo "<td>" . $rivi["voitot"] . "</td>";
                        echo "<td>" . $rivi["tasapelit"] . "</td>";
                        echo "<td>" . $rivi["tappiot"] . "</td>";
                        echo "<td>" . $rivi["pisteet"] . "</td>";
                        echo '<td><a class="btn" href="muuta.php?id='.$rivi["joukkue"].'">Muuta</a></td>';
                        echo '<td><a class="btn" href="poista.php?id='.$rivi["joukkue"].'">Poista</a></td>';
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
