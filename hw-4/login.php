<?php
session_start();

if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true){
    header("location: imdb.php");
    exit;
}

require_once "config.php";
 

$email = $korisnicko_ime = $lozinka = "";
$email_err = $korisnicko_ime_err = $lozinka_err = "";
 
if($_SERVER["REQUEST_METHOD"] == "POST"){
 
    if(empty(trim($_POST["korisnicko_ime"])) && empty(trim($_POST["email"]))){
        $korisnicko_ime_err = "Unesite korisničko ime ili email adresu.";
		$email_err = "Unesite email adresu ili korisničko ime.";
    } elseif(!empty(trim($_POST["email"])) && empty(trim($_POST["korisnicko_ime"]))){
		$email = trim($_POST["email"]);
	} elseif(empty(trim($_POST["email"])) && !empty(trim($_POST["korisnicko_ime"]))){
        $korisnicko_ime = trim($_POST["korisnicko_ime"]);
    } else{
		$email = trim($_POST["email"]);
		$korisnicko_ime = trim($_POST["korisnicko_ime"]);
    }
    if(empty(trim($_POST["lozinka"]))){
        $lozinka_err = "Unesite lozinku.";
    } else{
        $lozinka = trim($_POST["lozinka"]);
    }
    
    if(empty($korisnicko_ime_err) && empty($lozinka_err)){
        $sql = "SELECT id, korisnicko_ime, lozinka FROM korisnici WHERE korisnicko_ime = ?";
        
        if($stmt = mysqli_prepare($link, $sql)){
            mysqli_stmt_bind_param($stmt, "s", $param_korisnicko_ime);
            
            $param_korisnicko_ime = $korisnicko_ime;
            
            if(mysqli_stmt_execute($stmt)){
                mysqli_stmt_store_result($stmt);
                
                if(mysqli_stmt_num_rows($stmt) == 1){                    
                    mysqli_stmt_bind_result($stmt, $id, $korisnicko_ime, $baza_lozinka);
                    if(mysqli_stmt_fetch($stmt)){
                        if($lozinka == $baza_lozinka){
                            session_start();
                            
                            $_SESSION["loggedin"] = true;
                            $_SESSION["id"] = $id;
                            $_SESSION["korisnicko_ime"] = $korisnicko_ime;                            
                            
                            header("location: imdb.php");
                        } else{
                            $lozinka_err = "Pogrešna lozinka.";
                        }
                    }
                } else{
                    $korisnicko_ime_err = "Ovaj korisnik nije registrovan.";
                }
            } else{
                echo "Došlo je do greške! Pokušajte ponovo.";
            }
            mysqli_stmt_close($stmt);
        }
    }
	
	if(empty($email_err) && empty($lozinka_err)){
        $sql = "SELECT id, korisnicko_ime, lozinka FROM korisnici WHERE email = ?";
        
        if($stmt = mysqli_prepare($link, $sql)){
            mysqli_stmt_bind_param($stmt, "s", $param_email);
            
			$param_email = $email;
            
            if(mysqli_stmt_execute($stmt)){
                mysqli_stmt_store_result($stmt);
                
                if(mysqli_stmt_num_rows($stmt) == 1){                    
                    mysqli_stmt_bind_result($stmt, $id, $korisnicko_ime, $baza_lozinka);
                    if(mysqli_stmt_fetch($stmt)){
                        if($lozinka == $baza_lozinka){
                            session_start();
                            
                            $_SESSION["loggedin"] = true;
                            $_SESSION["id"] = $id;
                            $_SESSION["korisnicko_ime"] = $korisnicko_ime;                            
                            
                            header("location: imdb.php");
                        } else{
                            $lozinka_err = "Pogrešna lozinka.";
                        }
                    }
                } else{
					$email_err = "Ovaj korisnik nije registrovan.";
                }
            } else{
                echo "Došlo je do greške! Pokušajte ponovo.";
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
    <meta charset="UTF-8">
    <title>Login</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.css">
    <link href="imdb.css" rel="stylesheet">
</head>
<body>
    <div class="wrapper">
        <h2>Ulogujte se</h2>
        <p>Popunite email adresu ili korisničko ime i lozinku.</p>
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
			<div class="form-group <?php echo (!empty($email_err)) ? 'has-error' : ''; ?>">
                <label>Email adresa:</label>
                <input type="text" name="email" class="form-control" value="<?php echo $email; ?>">
                <span class="help-block"><b><?php echo $email_err; ?></b></span>
            </div>
            <div class="form-group <?php echo (!empty($korisnicko_ime_err)) ? 'has-error' : ''; ?>">
                <label>Korisničko ime:</label>
                <input type="text" name="korisnicko_ime" class="form-control" value="<?php echo $korisnicko_ime; ?>">
                <span class="help-block"><b><?php echo $korisnicko_ime_err; ?></b></span>
            </div>    
            <div class="form-group <?php echo (!empty($lozinka_err)) ? 'has-error' : ''; ?>">
                <label>Lozinka:</label>
                <input type="password" name="lozinka" class="form-control">
                <span class="help-block"><b><?php echo $lozinka_err; ?></b></span>
            </div>
            <div class="form-group">
                <input type="submit" class="btn btn-primary" value="Login">
            </div>
            <p>Nemate nalog? <a href="registracija.php">Registrujte se</a>.</p>
        </form>
    </div>    
</body>
</html>
