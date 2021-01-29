<?php
session_start();

if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: login.php");
    exit;
}

require_once "config.php";
$str = "";
$q = "";

if($_SERVER["REQUEST_METHOD"] == "GET"){
	if(isset($_GET["q"])){
		$q = $_GET["q"];
	}
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

h1{
	text-align: center;
	color: yellow;
}

.slike {
	padding:5px;
	margin-right: 10px;
}

.prikaz{
	padding-top: 73px;
	margin-bottom: 20px;
	font: 15px sans-serif;
	width: 900px;
	margin-left: auto;
	margin-right: auto;
	color: white;
}

.vrati{
	padding-top: 13px;
	width: 150px;
	margin-left: auto;
	margin-right: auto;
}

.pretraga{
	width: 500px;
	padding-top: 13px;
	margin-left: auto;
	margin-right: auto;
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
	<div class="vrati">
		<a href="imdb.php"> <input type="submit" class="btn btn-primary" value=">> Vratite se na pretragu <<"></a>
	</div>
	<div class="prikaz">
	<?php
	
		$sql = "SELECT * FROM filmovi WHERE naslov = '".$q."'";
		$result = $link->query($sql);
		if($result->num_rows > 0) {
			while($row = $result->fetch_assoc()) {
				$str = "<br><img class=\"slike\" src=\"". $row['poster_path'] ."\" height=\"445\" width=\"300\" style=\"float:left\"/>" .					
				"<br><br><h1> ". $row['naslov']. " ( " .$row['godina'] ." ) </h1></br></br>" .
				"<span> ". $row['zanr'] ."  </span></br></br>" .
				"<span> Dužina trajanja:&nbsp;&nbsp;". $row['trajanje'] ."  </span></br></br>" .
				"<span> ". $row['opis'] ."  </span></br></br>" .
				"<span> Scenaristi:&nbsp;&nbsp;". $row['scenarista'] ."  </span></br></br>" .
				"<span> Režiser:&nbsp;&nbsp;". $row['reziser'] ."  </span></br></br>" .
				"<span> Producentske kuće:&nbsp;&nbsp;". $row['prod_kuca'] ."  </span></br></br>" .
				"<span> Glumci:&nbsp;&nbsp;". $row['glumci'] ."  </span></br></br>"
				;
			}
			echo $str;
		}
		
		
	?>

	</div>
</body>
</html>
