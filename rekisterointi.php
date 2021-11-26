<?php include("serveri.php") ?>
<!DOCTYPE html>
<html>
<head>
    <title>Veikkausliiga</title>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
    <div class="header">
        <h2>Rekisteröidy</h2>
    </div>

    <form method="post" action="rekisterointi.php">
        <?php include("errors.php"); ?>
        <div class="input-group">
            <label>Käyttäjätunnus:</label>
            <input type="text" name="kayttajatunnus" value="<?php echo $kayttajatunnus; ?>">
        </div>
        <div class="input-group">
            <label>Salasana:</label>
            <input type="salasana" name="salasana_1">
        </div>
        <div class="input-group">
            <label>Salasana uudelleen:</label>
            <input type="password" name="salasana_2">
        </div>
        <div class="input-group">
            <button type="submit" class="btn" name="rekisteroi">Rekisteröidy</button>
        </div>
        <p>
            Oletko jo rekisteröitynyt <a href="login.php">Kirjaudu sisään!</a>
        </p>
    </form>
</body>

</html>
<!--Lähteet:-->
<!--https://codewithawa.com/posts/complete-user-registration-system-using-php-and-mysql-database-->
<!--Linkin koodi muokattu sovellukseen sopivaksi.-->