<?php
session_start();

if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: login.php");
    exit;
}

require_once "config.php";
$str = "";
$q = "";
$zanr = "false";

if($_SERVER["REQUEST_METHOD"] == "POST"){
	$q = $_POST["q"];
}
/*
if($_SERVER["REQUEST_METHOD"] == "GET"){
	if(isset($_GET["zanr"])) {
		$zanr = $_GET["zanr"];
	}
}*/
?>
 
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>IMDB</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.css">
    <style>
	body{
	font: 14px sans-serif;
	background-image: url("slike/pozadina.jpg");
	background-size: 100%;
}

.wrapper{
	display: block;
	margin-left: auto;
	margin-right: auto;
	width: 27%;
	padding-top: 8%;
	color: white;
}

.zaglavlje{
	display: block;
	width: 30%;
	float: right;
	text-align: right;
	color: white;
	font: 25px sans-serif;
	padding-top: 13px;
	padding-right: 13px;
	margin-bottom: 15px;
}

.izloguj{
	float: right;
	padding-left: 13px;
}

h2{
	text-align: center;
}

.slike {
	padding:5px;
	margin-right: 10px;
}

.lista{
	margin-bottom: 20px;
	font: 25px sans-serif;
	width: 400px;
	margin-left: auto;
	margin-right: auto;
}

.pretraga{
	width: 500px;
	padding-top: 13px;
	margin-left: auto;
	margin-right: auto;
}

.prikaz{
	padding-top: 105px;
	margin-bottom: 20px;
	font: 15px sans-serif;
	width: 900px;
	margin-left: auto;
	margin-right: auto;
	color: white;
}

.zanr{
	padding-left: 27%;
	color: white;
}

.zanr a{
	color: white;
	font: font: 20px sans-serif;
}
	</style>
</head>
<body>
	<div class="zaglavlje">
		Nalog:&nbsp;<b><?php echo htmlspecialchars($_SESSION["korisnicko_ime"]); ?></b>
		<div class="izloguj">
			<p><a href="logout.php" class="btn btn-danger">Izlogujte se</a></p>
		</div>
	</div>
	<div class="pretraga">
		<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" class="form-horizontal" method="post">
			<div class="form-group">
				<div class="col-sm-8">
					<input type="text" name="q" class="form-control">
				</div>
				<div class="col-sm-4">
					<input type="submit" class="btn btn-primary" value="Pretraži">
				</div>
				<div class="zanr">
					<!--<a href="imdb.php?zanr=true" > >>Pretražite po žanru<< </a></br>
					<a href="imdb.php?zanr=false" > >>Pretražite po naslovu<< </a>-->
				</div>
			</div>
		</form>
	</div>
	<div class="lista">
	<?php
	/*
		if($zanr == "false"){
			$sql = "SELECT * FROM filmovi WHERE naslov LIKE '%".$q."%'";
		}
		else
		{
			$sql = "SELECT * FROM filmovi WHERE zanr LIKE '%".$q."%'";
		}	*/
		$sql = "SELECT * FROM filmovi WHERE naslov LIKE '%".$q."%'";
		$result = $link->query($sql);
		if($result->num_rows > 0) {
			while($row = $result->fetch_assoc()) {
				$str .= "<br><img class=\"slke\" src=\"". $row['poster_path'] ."\" height=\"200\" width=\"150\" style=\"float:left\"/>" .					
				"<br><br><a href=\"film.php?q=". $row['naslov'] ."\"> ". $row['naslov'] ." </a><br>".
					"<span> ". $row['zanr'] ."  </span><br><br><br><br>";
			}
			echo $str;
		}
		
		
	?>

	</div>
</body>
</html>
