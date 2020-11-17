<!DOCTYPE html>
<html lang="pl-PL">
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
<!--nawigacja-->
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
<!--Wypisanie miast-->
  <div class="content col-lg-12 col-sm-12">
<?php
//łączenie z bazą danych
require_once "connect.php";
$conn = new mysqli($host, $db_user, $db_password, $db_name);

if ($conn->connect_error) {
    die("Połączenie zakończone błędem: " . $conn->connect_error);
} 
// przesłanie z wyszukiwarki
$panstwo = $_POST['kraj'];
$_SESSION['data'] = $_POST['data'];
$_SESSION['osoby'] = $_POST['osoby'];
//kodowanie polskich znaków z bazy danych
$conn->set_charset("utf8");
$conn->query("SET collation_connection = utf8_polish_ci");
//miasto 1
$sql = "SELECT * FROM miasto WHERE panstwo ='$panstwo' and nr=1";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
  while($row = $result->fetch_array()) {
    if (isset($_SESSION['zalogowany'])){
      if($_SESSION['ilosc_logowan']>30){
        $row['cena']= ($row['cena'] - 50);
      }
    }
    echo "<form method='post' action='pdf1.php'>
    <div class='miasta col-lg-8 col-sm-12'>
            <div class='col-lg-3 col-sm-12'>
              <img src='img/".$row["zdj"]."'>
            </div>
     <div class='dane col-lg-8  col-sm-12 col-sm-offset-0 col-lg-offset-1'>
                <div class='col-lg-10 col-sm-12'>
                    <h4>".$row["miasto"]."</h4>
                  </div>";
                    if (isset($_SESSION['zalogowany']))
                {
                  echo " <div class='col-lg-2 col-sm-12'><input class='submit sub' type='submit' name='jeden' value='Pobierz bilet'>
                  </div>";     
              }
                   echo "<div class='wiersz col-lg-12 col-sm-12'> ".$row["hotel"]. "</div>
                   <div class='wiersz col-lg-12 col-sm-12'>Wylot z: ".$row["wylot"]."</div>
                   <div class='wiersz col-lg-12 col-sm-12'>Data wyjazdu: ".$_SESSION['data']."</div>
                  <div class='wiersz col-lg-5 col-sm-12'>
              <p>Ilość dni: ".$row["ilosc_dni"]."</p>
            </div>
            <div class='col-lg-5 col-sm-12'>
                <p>Ilość osób: ".$_SESSION['osoby']."</p> 
            </div>
            <div class=' cena col-lg-2 col-sm-12'>";
            if (isset($_SESSION['zalogowany'])){
            if($_SESSION['ilosc_logowan']>30){
              echo "<s>".$stala_cena=($row['cena']* $_SESSION['osoby'] + 50)."</s>";
            }
          } echo "<p>".($row["cena"] * $_SESSION['osoby'] ). "zł </p></div>";
            $_SESSION['id']=$row['id'];
            $_SESSION['ap']=$row['panstwo'];
            $_SESSION['am']=$row['miasto'];
            $_SESSION['ah']=$row['hotel'];
            $_SESSION['ai']=$row['ilosc_dni'];
            $_SESSION['ac']=($row["cena"] * $_SESSION['osoby']);
            $_SESSION['aw']=$row['wylot'];
            $_SESSION['an']= $row['nr'];
         echo "</div> </div>
      </form>";
  }
}
//miasto 2
$sql = "SELECT * FROM miasto WHERE panstwo ='$panstwo' and nr=2";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
  while($row = $result->fetch_array()) {
    if (isset($_SESSION['zalogowany'])){
      if($_SESSION['ilosc_logowan']>30){
        $row['cena']= ($row['cena'] - 50);
      }
    }
    echo "<form method='post' action='pdf1.php'>
    <div class='miasta col-lg-8 col-sm-12'>
            <div class='col-lg-3 col-sm-12'>
              <img src='img/".$row["zdj"]."'>
            </div>
     <div class='dane col-lg-8  col-sm-12 col-sm-offset-0 col-lg-offset-1'>
                <div class='col-lg-10 col-sm-12'>
                    <h4>".$row["miasto"]."</h4>
                  </div>";
                    if (isset($_SESSION['zalogowany']))
                {
                  echo " <div class='col-lg-2 col-sm-12'><input class='submit sub' type='submit' name='dwa' value='Pobierz bilet'>
                  </div>";     
              }
                   echo "<div class='wiersz col-lg-12 col-sm-12'> ".$row["hotel"]. "</div>
                   <div class='wiersz col-lg-12 col-sm-12'>Wylot z: ".$row["wylot"]."</div>
                   <div class='wiersz col-lg-12 col-sm-12'>Data wyjazdu: ".$_SESSION['data']."</div>
                  <div class='wiersz col-lg-5 col-sm-12'>
              <p>Ilość dni: ".$row["ilosc_dni"]."</p>
            </div>
            <div class='col-lg-5 col-sm-12'>
                <p>Ilość osób: ".$_SESSION['osoby']."</p> 
            </div>
            <div class=' cena col-lg-2 col-sm-12'>";
            if (isset($_SESSION['zalogowany'])){
            if($_SESSION['ilosc_logowan']>30){
              echo "<s>".$stala_cena=($row['cena']* $_SESSION['osoby'] + 50)."</s>";
            }
            } echo "<p>".($row["cena"] * $_SESSION['osoby'] ). "zł </p></div>";
            $_SESSION['id']=$row['id'];
            $_SESSION['bp']=$row['panstwo'];
            $_SESSION['bm']=$row['miasto'];
            $_SESSION['bh']=$row['hotel'];
            $_SESSION['bi']=$row['ilosc_dni'];
            $_SESSION['bc']=($row["cena"] * $_SESSION['osoby']);
            $_SESSION['bw']=$row['wylot'];
            $_SESSION['bn']= $row['nr'];
         echo " </div> </div>
      </form>";
  }
}
//miasto 3
$sql = "SELECT * FROM miasto WHERE panstwo ='$panstwo' and nr=3";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
  while($row = $result->fetch_array()) {
    if (isset($_SESSION['zalogowany'])){
      if($_SESSION['ilosc_logowan']>30){
        $row['cena']= ($row['cena'] - 50);
      }
    }
    echo "<form method='post' action='pdf1.php'>
    <div class='miasta col-lg-8 col-sm-12'>
            <div class='col-lg-3 col-sm-12'>
              <img src='img/".$row["zdj"]."'>
            </div>
     <div class='dane col-lg-8  col-sm-12 col-sm-offset-0 col-lg-offset-1'>
                <div class='col-lg-10 col-sm-12'>
                    <h4>".$row["miasto"]."</h4>
                  </div>";
                    if (isset($_SESSION['zalogowany']))
                {
                  echo " <div class='col-lg-2 col-sm-12'><input class='submit sub' type='submit' name='trzy' value='Pobierz bilet'>
                  </div>";     
              }
                   echo "<div class='wiersz col-lg-12 col-sm-12'> ".$row["hotel"]. "</div>
                   <div class='wiersz col-lg-12 col-sm-12'>Wylot z: ".$row["wylot"]."</div>
                   <div class='wiersz col-lg-12 col-sm-12'>Data wyjazdu: ".$_SESSION['data']."</div>
                  <div class='wiersz col-lg-5 col-sm-12'>
              <p>Ilość dni: ".$row["ilosc_dni"]."</p>
            </div>
            <div class='col-lg-5 col-sm-12'>
                <p>Ilość osób: ".$_SESSION['osoby']."</p> 
            </div>
            <div class=' cena col-lg-2 col-sm-12'>";
            if (isset($_SESSION['zalogowany'])){
            if($_SESSION['ilosc_logowan']>30){
              echo "<s>".$stala_cena=($row['cena']* $_SESSION['osoby'] + 50)."</s>";
            }
            } echo "<p>".($row["cena"] * $_SESSION['osoby'] ). "zł </p> </div>";
            $_SESSION['id']=$row['id'];
            $_SESSION['cp']=$row['panstwo'];
            $_SESSION['cm']=$row['miasto'];
            $_SESSION['ch']=$row['hotel'];
            $_SESSION['ci']=$row['ilosc_dni'];
            $_SESSION['cc']=($row["cena"] * $_SESSION['osoby']);
            $_SESSION['cw']=$row['wylot'];
            $_SESSION['cn']= $row['nr'];
         echo " </div> </div>
      </form>";
  }
}else{ echo "<div style='color:white; font-size:20px; padding: 40px;'>Brak wyników</div>";
}$conn->close();
?> 
  </div>
</header>
</div>
</body>
</html>