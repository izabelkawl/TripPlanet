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
  <title>TripPlanet</title>
</head>
 
<body>
  <div class="container-grid">
  <header>
<!--nazwigacja-->
    <nav class="navbar navbar-inverse">
    <div class="container-fluid">
      <ul class="nav navbar-nav">
        <li><a href="index.php">Triplanet</a></li>
        <li><a href="contact.php">Kontakt</a></li>
<?php
 session_start();
 if (isset($_SESSION['zalogowany']))
                    {
      if ($_SESSION['email'] == 'admin@gmail.com'){
      echo "<li><a href='admin.php'>Panel Administratora</a></li>";
    }
  }
  ?>
       
      </ul>
      <ul class="nav navbar-nav navbar-right">
              <li  class="dropdown"> 
                <a href="#" class="btn dropdown-toggle" type="button" data-toggle="dropdown">
            <?php 
                    //jeżeli zalogowany to pokaż 'imię'
                    if (isset($_SESSION['zalogowany']))
                    {
                      echo "Witaj ".$_SESSION['imie']."
                      </a>
                      <ul class='dropdown-menu dropdown-menu-right'>
                        <li><a href='logout.php'>Wyloguj się</a></li>
                      </ul>";
                    } 
                    //jeżeli niezalogowany pokaż 'dołącz do nas'
                    elseif (!isset($_SESSION['zalogowany']))
                    {
                        echo "Dołącz do nas
                        </a>
                        <ul class='dropdown-menu dropdown-menu-right'>
                            <li><a class='drop' href='logowanie.php'>Zaloguj się</a></li>
                            <li><a class='drop' href='rejestracja.php'>Rejestracja</a></li>
                        </ul>";
                          }
                      ?>
          </li>
      </ul>
    </div>
  </nav>

<div >
    <form class="section col-sm-12 col-lg-6" action="wycieczki.php" method="post">
        <input class="form-control col-sm-12 col-lg-12" type="text" name="kraj" placeholder="Wpisz nazwę kraju aby wyszukać ofertę">
      <div class="form-row">
        <label class="col-sm-12 col-lg-6">Data wyjazdu:</label>
        <label class="col-sm-12 col-lg-6">Ilość osób: </label> 
      </div>
      <div class="form-row">
      <input class="col-sm-12 col-lg-5" type="date" name="data" value="<?php echo date("Y-m-d");?>">
      <input class="col-sm-12 col-lg-2 col-sm-offset-0 col-lg-offset-1"type="number" min="1" max="6" name="osoby" value="1">
        <input class="submit col-sm-12 col-lg-3 col-sm-offset-0 col-lg-offset-1" type="submit" value="Wyszukaj">
        </div>
    </form>
</div>
<div class="col-sm-10 col-lg-10 section1"> 
          <h3>Najlepsza oferta - Wakacje 2019.</h3><p>Zorganizujemy Twój wypoczynek! </p> 
</div>
</header>

  <div class="sekcja col-lg-12 col-sm-12">
  <h4> Wybierz idealne miejsce docelowe</h4>
          <hr>
  <div class="col-lg-4 col-sm-12">
          
          <br> Posiadamy aż 12 kierunków podruży na terenie Europy! Prosty proces sprzedaży oraz rezerwacja oferty i wylot w ten sam dzień. Za wycieczkę zapłacisz przelewem tradycyjnym w dowolnym terminie.
    </div>
    <div class="col-lg-6 col-sm-12 col-sm-offset-0 col-lg-offset-2">
        
         <div class="col-lg-4">✈ Szwajcaria<br>✈ Niemcy<br>✈ Polska<br>✈ Wielka Brytania</div>
         <div class="col-lg-4">✈ Finlandia<br>✈ Irlandia<br>✈ Hiszpania<br>✈ Rumunia</div>
         <div class="col-lg-4">✈ Chorwacja<br>✈ Francja<br>✈ Grecja<br>✈ Czechy</div>
                        </div>
  </div>


<div class="stopka col-lg-12 col-sm-12">
  <div class="col-lg-4 col-sm-12"> 
    <h5>Firma</h5><br>TriPlanet S.A.<br>ul. Warszawska 5b<br>35-304 Rzeszów<br>NIP: 947-07-77-385<br> REGON: 193458039
KRS 314229
    </div>  
  <div class="sek col-lg-4 col-sm-12"><h5> Sekretariat</h5><br>e-mail: sekretariat@wakacje.pl <br>telefon: +48 38 300 16 60 <br>fax: +48 58 235 29 11</div> 
  <div class="col-lg-4 col-sm-12"><h5>masz pytanie? napisz do nas!</h5><br>
  <a class="link" href="contact.php"> kontakt </a></div> 
</div>
  <footer class="col-lg-12 col-sm-12">Copyright &copy 2019 </footer>
  </div>
</body>
</html>