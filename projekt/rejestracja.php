<?php
session_start();
	
	if (isset($_POST['email']))
	{
		//Udana walidacja
    $wszystko_OK=true;
    //przesłanie dnaych z formularza
    $imie = $_POST['imie'];
    $nazwisko = $_POST['nazwisko'];
    $email = $_POST['email'];
    $telefon = $_POST['telefon'];
		$haslo1 = $_POST['haslo1'];
    $haslo2 = $_POST['haslo2'];

    // Sprawdź poprawność adresu email
$emailB = filter_var($email, FILTER_SANITIZE_EMAIL);

if ((filter_var($emailB, FILTER_VALIDATE_EMAIL)==false) || ($emailB!=$email))
{
  $wszystko_OK=false;
  $_SESSION['e_email']="Podaj poprawny adres e-mail!";
}
//sprawdzenie poprawnści hasła
if ((strlen($haslo1)<8) || (strlen($haslo1)>20))
{
  $wszystko_OK=false;
  $_SESSION['e_haslo']="Hasło musi posiadać od 8 do 20 znaków!";
}
if ($haslo1!=$haslo2)
{
  $wszystko_OK=false;
  $_SESSION['e_haslo']="Podane hasła nie są identyczne!";
}	
$haslo_hash = password_hash($haslo1, PASSWORD_DEFAULT);
    //połączenie z bazą
		require_once "connect.php";
		mysqli_report(MYSQLI_REPORT_STRICT);
		
		try 
		{
			$polaczenie = new mysqli($host, $db_user, $db_password, $db_name);
			if ($polaczenie->connect_errno!=0)
			{
				throw new Exception(mysqli_connect_errno());
			}
			else
			{
        //Czy email już istnieje?
$rezultat = $polaczenie->query("SELECT id FROM uzytkownicy WHERE email='$email'");
if (!$rezultat) throw new Exception($polaczenie->error);

$ile_takich_maili = $rezultat->num_rows;
if($ile_takich_maili>0)
{
$wszystko_OK=false;
$_SESSION['e_email']="Istnieje już konto przypisane do tego adresu e-mail!";
}		
				if ($wszystko_OK==true)
				{
					//Ddodajemy użytkowników do bazy gdy wszystko przebiegło prawidłowo
					if ($polaczenie->query("INSERT INTO uzytkownicy (id,imie,nazwisko,email,telefon,haslo)VALUES(NULL, '$imie', '$nazwisko', '$email','$telefon' ,'$haslo_hash')"))
					{
            $_SESSION['udanarejestracja']=true;
						header('Location: logowanie.php');
					}
					else
					{
						throw new Exception($polaczenie->error);
					}
				}
				$polaczenie->close();
			}
		}
		catch(Exception $e)
		{
			echo '<span style="color:red;">Błąd serwera! Przepraszamy za niedogodności i prosimy o rejestrację w innym terminie!</span>'.$e;
		}
	}
?>
 <!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible"content="ie=edge">
 
 <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
 <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
 <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
  <link href="https://fonts.googleapis.com/css?family=Rubik:300,400,500" rel="stylesheet">
  <link href="css/style.css" rel="stylesheet">
  </head>
<body>

<div class="container-grid">
  <header>
<nav class="header navbar navbar-inverse">
    <div class="container-fluid">
      <ul class="nav navbar-nav">
        <li><a href="index.php">Strona główna</a></li>
      </ul>
    </div>
</nav>
<div class="col-sm-3"></div>
  <form method="post" class="kontakt col-sm-6">
  <div class="form-row  ">
    <div class="form-group col-sm-5">
      <label for="inputEmail4">Imię:</label>
      <input type="text" name="imie" class="form-control form-control-sm" placeholder="Imię">
    </div>
    <div class="form-group col-sm-6 col-xs-offset-0 col-sm-offset-1">
      <label for="inputPassword4">Nazwisko:</label>
      <input type="text" name="nazwisko" class="form-control form-control-sm" placeholder="Nazwisko">
    </div>
  </div>
  <div class="form-group col-sm-12">
    <label for="inputAddress">Adres e-mail</label>
    <input type="email" name="email" class="form-control form-control-sm"  placeholder="Email">
  </div>
  <div class="form-group col-sm-12">
    <label for="inputAddress2">Numer telefonu:</label>
    <input type="text" name="telefon" class="form-control form-control-sm" placeholder="Telefon">
  </div>
  <div class="form-row">
    <div class="form-group col-sm-5">
      <label for="inputPassword4">Hasło:</label>
      <input type="password" name="haslo1" class="form-control form-control-sm" placeholder="Hasło">
    </div>
     <div class="form-group col-sm-6 col-xs-offset-0 col-sm-offset-1">
      <label for="inputPassword4">Powtórz hasło:</label>
      <input type="password" name="haslo2" class="form-control form-control-sm" placeholder="Hasło">
    </div>
    <?php
    if (isset($_SESSION['fr_email']))
    {
      echo '<p style="color:red">'.$_SESSION['fr_email'].'</p>';
      unset($_SESSION['fr_email']);
    }
  elseif (isset($_SESSION['e_email']))
  {
    echo '<p style="color:red">'.$_SESSION['e_email'].'</p>';
    unset($_SESSION['e_email']);
  }
			elseif (isset($_SESSION['fr_haslo1']))
			{
				echo '<p style="color:red">'.$_SESSION['fr_haslo1'].'</p>';
				unset($_SESSION['fr_haslo1']);
			} 
			elseif (isset($_SESSION['e_haslo']))
			{
				echo '<p style="color:red">'.$_SESSION['e_haslo'].'</p>';
				unset($_SESSION['e_haslo']);
			}
			
  ?>
  </div>

  <button type="submit" class="btn btn-primary">Zarejestruj się</button>
</form>
</header>
</div>
</body>
</html>