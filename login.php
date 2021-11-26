
<?php include("serveri.php") ?>
<!DOCTYPE html>
<html>
<head>
  <title>Veikkausliiga</title>
  <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
  <div class="header">
  	<h2>Kirjaudu sisään</h2>
  </div>
	 
  <form method="post" action="login.php">
  	<?php include("errors.php"); ?>
  	<div class="input-group">
  		<label>Käyttäjätunnus:</label>
  		<input type="text" name="kayttajatunnus" >
  	</div>
  	<div class="input-group">
  		<label>Salasana</label>
  		<input type="password" name="salasana">
  	</div>
  	<div class="input-group">
  		<button type="submit" class="btn" name="kirjaudu_sisaan">Kirjaudu!</button>
  	</div>
  	<p>
  		Etkö ole vielä rekisteröitynyt? <a href="rekisterointi.php">Rekisteröidy!</a>
  	</p>
  </form>
</body>
</html>
<!--Lähteet:-->
<!--https://codewithawa.com/posts/complete-user-registration-system-using-php-and-mysql-database-->
<!--Linkin koodi muokattu sovellukseen sopivaksi.-->