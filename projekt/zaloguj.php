<?php

	session_start();
	if ((!isset($_POST['email'])) || (!isset($_POST['haslo'])))
	{
		header('Location: logowanie.php');
		exit();
	}
//łączenie z bazą danych
	require_once "connect.php";
	$polaczenie = @new mysqli($host, $db_user, $db_password, $db_name);
	if ($polaczenie->connect_errno!=0)
	{
		echo "Error: ".$polaczenie->connect_errno;
	}
	else
	{ 
//pobranie email i hasło z formularza
		$email = $_POST['email'];
		$haslo = $_POST['haslo'];

		$email = htmlentities($email, ENT_QUOTES, "UTF-8");
		if ($rezultat = @$polaczenie->query(sprintf("SELECT * FROM uzytkownicy WHERE email='%s'",mysqli_real_escape_string($polaczenie,$email))))
		{
				$wiersz = $rezultat->fetch_assoc();
				if (password_verify($haslo, $wiersz['haslo']))
				{
//zliczanie ilości logowan
					$ilosc = @$polaczenie->query(sprintf("UPDATE uzytkownicy SET ilosc_logowan = ilosc_logowan+1 WHERE email='%s'",mysqli_real_escape_string($polaczenie,$email)));

					$_SESSION['zalogowany'] = true;
					$_SESSION['id'] = $wiersz['id'];
					$_SESSION['imie'] = $wiersz['imie'];
					$_SESSION['nazwisko'] = $wiersz['nazwisko'];
					$_SESSION['telefon'] = $wiersz['telefon'];
					$_SESSION['email'] = $wiersz['email'];
					$_SESSION['ilosc_logowan'] = $wiersz['ilosc_logowan'];
					
					unset($_SESSION['blad']);
					$rezultat->free_result();
					//zalogowanie - powrót na stronę główną
					header('Location: index.php');
				}
				else 
				{
					$_SESSION['blad'] = 'Nieprawidłowy email lub hasło!';
					header('Location: logowanie.php');
				}
		}
		$polaczenie->close();
	}
?>