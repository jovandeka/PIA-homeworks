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
    <div class="page-header">
        <h1>Zdravo, <b><?php echo htmlspecialchars($_SESSION["korisnicko_ime"]); ?></b>. Dobrodošli na sajt za recenzije filmova.</h1>
    </div>
    <p>
        <a href="logout.php" class="btn btn-danger">Izlogujte se</a>
    </p>
</body>
</html>