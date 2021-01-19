<?php
require_once "config.php";

$ime = $prezime = $email = $korisnicko_ime = $lozinka = "";
$ime_err = $prezime_err = $email_err = $korisnicko_ime_err = $lozinka_err = "";
 
if($_SERVER["REQUEST_METHOD"] == "POST"){
	
	// Validacija imena
	if(empty(trim($_POST["ime"]))){
        $ime_err = "Unesite ime.";
	} else{
        $ime = trim($_POST["ime"]);
    }
	
	// Validacija prezimena
	if(empty(trim($_POST["prezime"]))){
        $prezime_err = "Unesite prezime.";
	} else{
        $prezime = trim($_POST["prezime"]);
    }
	
	// Validacija email-a
    if(empty(trim($_POST["email"]))){
        $email_err = "Unesite email adresu.";
    } else{
        $sql = "SELECT id FROM korisnici WHERE email = ?";
        
        if($stmt = mysqli_prepare($link, $sql)){
            mysqli_stmt_bind_param($stmt, "s", $param_email);

            $param_email = trim($_POST["email"]);
            
            if(mysqli_stmt_execute($stmt)){
                mysqli_stmt_store_result($stmt);
                
                if(mysqli_stmt_num_rows($stmt) == 1){
                    $email_err = "Ova email adresa je već rezervisana.";
                } else{
                    $email = trim($_POST["email"]);
                }
            } else{
                echo "Došlo je do greške! Pokušajte ponovo.";
            }
			
            mysqli_stmt_close($stmt);
        }
    }
 
    // Validacija korisnickog imena
    if(empty(trim($_POST["korisnicko_ime"]))){
        $korisnicko_ime_err = "Unesite korisničko ime.";
    } else{
        $sql = "SELECT id FROM korisnici WHERE korisnicko_ime = ?";
        
        if($stmt = mysqli_prepare($link, $sql)){
            mysqli_stmt_bind_param($stmt, "s", $param_korisnicko_ime);

            $param_korisnicko_ime = trim($_POST["korisnicko_ime"]);
            
            if(mysqli_stmt_execute($stmt)){
                mysqli_stmt_store_result($stmt);
                
                if(mysqli_stmt_num_rows($stmt) == 1){
                    $korisnicko_ime_err = "Ovo korisničko ime je već rezervisano.";
                } else{
                    $korisnicko_ime = trim($_POST["korisnicko_ime"]);
                }
            } else{
                echo "Došlo je do greške! Pokušajte ponovo.";
            }
			
            mysqli_stmt_close($stmt);
        }
    }
    
    // Validacija lozinke
    if(empty(trim($_POST["lozinka"]))){
        $lozinka_err = "Unesite lozinku.";     
    } elseif(strlen(trim($_POST["lozinka"])) < 5){
        $lozinka_err = "Lozinka mora da ima bar 5 znakova.";
    } else{
        $lozinka = trim($_POST["lozinka"]);
    }
    
	// Ubacivanje u bazu
    if(empty($ime_err) && empty($prezime_err) && empty($email_err) && empty($korisnicko_ime_err) && empty($lozinka_err)){
        
        $sql = "INSERT INTO korisnici (ime, prezime, email, korisnicko_ime, lozinka) VALUES (?, ?, ?, ?, ?)";
         
        if($stmt = mysqli_prepare($link, $sql)){
            mysqli_stmt_bind_param($stmt, "sssss", $param_ime, $param_prezime, $param_email, $param_korisnicko_ime, $param_lozinka);
            
			$param_ime = $ime;
			$param_prezime = $prezime;
			$param_email = $email;
            $param_korisnicko_ime = $korisnicko_ime;
            $param_lozinka = $lozinka;
            
            if(mysqli_stmt_execute($stmt)){
                header("location: login.php");
            } else{
                echo "Došlo je do greške! Pokušajte kasnije.";
            }
            mysqli_stmt_close($stmt);
        }
    }
    mysqli_close($link);
}
?>
 
<!DOCTYPE html>
<html>
	<head>
		<title>Registracija</title>
		<meta charset="UTF-8">
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.css">
		<link href="imdb.css" rel="stylesheet">
	</head>
<body>
    <div class="wrapper">
        <h2>Registrujte se</h2>
        <p>Popunite sva polja kako biste se uspešno registrovali.</p>
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
			<div class="form-group <?php echo (!empty($ime_err)) ? 'has-error' : ''; ?>">
                <label>Ime:</label>
                <input type="text" name="ime" class="form-control" value="<?php echo $ime; ?>">
                <span class="help-block"><?php echo $ime_err; ?></span>
            </div> 
			<div class="form-group <?php echo (!empty($prezime_err)) ? 'has-error' : ''; ?>">
                <label>Prezime:</label>
                <input type="text" name="prezime" class="form-control" value="<?php echo $prezime; ?>">
                <span class="help-block"><?php echo $prezime_err; ?></span>
            </div> 
			<div class="form-group <?php echo (!empty($email_err)) ? 'has-error' : ''; ?>">
                <label>Email adresa:</label>
                <input type="text" name="email" class="form-control" value="<?php echo $email; ?>">
                <span class="help-block"><?php echo $email_err; ?></span>
            </div> 
            <div class="form-group <?php echo (!empty($korisnicko_ime_err)) ? 'has-error' : ''; ?>">
                <label>Korisničko ime:</label>
                <input type="text" name="korisnicko_ime" class="form-control" value="<?php echo $korisnicko_ime; ?>">
                <span class="help-block"><?php echo $korisnicko_ime_err; ?></span>
            </div>    
            <div class="form-group <?php echo (!empty($lozinka_err)) ? 'has-error' : ''; ?>">
                <label>Lozinka:</label>
                <input type="password" name="lozinka" class="form-control" value="<?php echo $lozinka; ?>">
                <span class="help-block"><?php echo $lozinka_err; ?></span>
            </div>
            <div class="form-group">
                <input type="submit" class="btn btn-primary" value="Submit">
                <input type="reset" class="btn btn-default" value="Reset">
            </div>
            <p>Već ste registrovani? <a href="login.php">Ulogujte se ovde</a>.</p>
        </form>
    </div>    
</body>
</html>
