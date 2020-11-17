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
<!--nazwigacja-->
    <nav class="navbar navbar-inverse">
    <div class="container-fluid">
      <ul class="nav navbar-nav">
        <li><a href="index.php">Triplanet</a></li>
      </ul>
      <ul class="nav navbar-nav navbar-right">
        <li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="#">
            <?php 
                    session_start();
                    //jeżeli zalogowany to pokaż 'imię'
                    if (isset($_SESSION['zalogowany']))
                    {
                      echo "Witaj ".$_SESSION['imie']."</a>
                      <ul class='dropdown-menu'>
                        <li><a href='logout.php'>Wyloguj się</a></li>";
                    } 
                    //jeżeli niezalogowany pokaż 'dołącz do nas'
                    elseif (!isset($_SESSION['zalogowany']))
                    {
                        echo "Dołącz do nas </a>
                        <ul class='dropdown-menu'>
                            <li><a  href='logowanie.php'>Zaloguj się</a></li>
                            <li><a  href='rejestracja.php'>Rejestracja</a></li>";
                          }
                      ?>
              </ul>
          </li>
      </ul>
    </div>
</nav>
<div class="formularz col-sm-12 col-lg-12">
  <div class="col-sm-12 col-lg-3"></div>
  <form class="kontakt col-sm-12 col-lg-6" action="message.php" method="post">
      <div class="form-group">
        <label for="inputAddress">Email<em>*</em></label>  
        <input class="form-control" required type="email" id="inputAddress" name="email" id="email" placeholder="Email" <?php /*wpisuje email gdy jest zalogowany*/if (isset($_SESSION['zalogowany'])){ ?> value="<?php echo $_SESSION['email']; ?>"<?php }?>>
        </div>
      <div class="form-group ">
        <label for="message">Wiadomość<em>*</em></label> 
        <textarea class="form-control" required rows="10" cols="20" name="message" id="message" placeholder="Wpisz treść wiadomości"></textarea>
        </div>
      <div class="form-group">        
      <button type="submit" class="btn btn-primary">Wyślij</button>
      </div> 
        <em>* pola obowiązkowe</em>
  </form>
                        </div>
</div>
</body>

</html>