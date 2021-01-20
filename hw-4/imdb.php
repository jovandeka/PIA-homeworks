<?php
session_start();

if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: login.php");
    exit;
}
?>
 
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>IMDB</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.css">
    <link href="imdb.css" rel="stylesheet">
</head>
<body>
	<div class="zaglavlje">
        Nalog: <b><?php echo htmlspecialchars($_SESSION["korisnicko_ime"]); ?></b>
		<div class="izloguj">
			<p><a href="logout.php" class="btn btn-danger">Izlogujte se</a></p>
		</div>
	</div>
</body>
</html>
