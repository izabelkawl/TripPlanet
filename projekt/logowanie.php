<?php

	session_start();
	
	if ((isset($_SESSION['zalogowany'])) && ($_SESSION['zalogowany']==true))
	{
		header('Location: index.php');
		exit();
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
<div class="col-sm-4"></div>
<div class="col-sm-4  kontakt log">
  <form action="zaloguj.php" method="post" >
    
    <div class="form-group">
      <label for="inputAddress">Adres e-mail</label>
      <input type="text" name="email" class="form-control" id="inputAddress" placeholder="Email">
    </div>
    <div class="form-group">
      <label for="inputPassword4">Hasło:</label>
      <input type="password" name="haslo" class="form-control" id="inputPassword4" placeholder="Hasło">
    </div>
    <p>Nie masz konta? <a href="rejestracja.php">Zarejestruj się!</a></p>
      <!--wyrzucenie błędu o logowaniu-->
      <?php if(isset($_SESSION['blad'])){
                  echo '<p style="color:red">'.$_SESSION['blad'].'</p>';
                  }?>
    <button type="submit" class="btn btn-primary">Zaloguj się</button>
  </form> 
  </div>
  </header>
</div>

</body>
</html>