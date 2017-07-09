<?php
header('Content-Type: text/html; charset=UTF-8');

include_once '../config.php';
include_once '../function.php';

session_start();

if (isset($_SESSION['hibas_jelszo']) and ($_SESSION['hibas_jelszo'] != 0)) {
	$hiba_jelszo = $_SESSION['hibas_jelszo'];
} else {
	$hiba_jelszo = 0;
}
if (isset($_SESSION['belepve'])) {
	$belepve = $_SESSION['belepve'];
} else {
	$belepve = 0;
}

//$szuperadmin = $_SESSION['szuperadmin'];
$hash = $_SESSION['hash'];

if (isset($_SESSION['uzenet'][1])) {
	$uzenet_id = $_SESSION['uzenet'][0];
	$uzenet_szoveg = $_SESSION['uzenet'][1];
} else {
	$uzenet_id = "";
	$uzenet_szoveg = "";
}

$_SESSION = array();
unset($_SESSION);
session_destroy();

session_start();

$_SESSION['uzenet'][0] = $uzenet_id;
$_SESSION['uzenet'][1] = $uzenet_szoveg;
//$_SESSION['szuperadmin'] = $szuperadmin;
$_SESSION['hash'] = $hash;

$_SESSION['hibas_jelszo'] = $hiba_jelszo;

if ($belepve != 0) {
	$_SESSION['belepve'] = $belepve;
} else {
	$_SESSION['belepve'] = 0;
}

if (isset($_POST['login'])) {
	$_SESSION['belepve'] = 0;
}

if ($_SESSION['belepve'] == 1) {
	include 'belepve.php';
} else {

	$conn = open_db();
	if ($conn) {

		if (isset($_POST['user']) and isset($_POST['pass'])) {

			$u = atalakit($_POST['user']);
			$p = hash('ripemd160', atalakit($_POST['pass']));

			$sql = myq('SELECT count(id) as c FROM users WHERE felhasznalonev="' . $u . '" AND jelszo="' . $p . '"', 1);

			if ($sql['c'] == 1) {
				// ha van ilyen felhasználó akkor lekérdezzük az adatait
				$res = mysql_query('SELECT * FROM users WHERE felhasznalonev="' . $u . '" AND jelszo="' . $p . '"');
				$num_rows = mysql_num_rows($res);
				if (($num_rows == 1)) {
					//ha a sorok száma 1 és van ilyen
					while ($sor = mysql_fetch_assoc($res)) {
						//$szuperadmin = $sor['szuperadmin'];
						$hash = $sor['hash'];
						$aktiv = $sor['aktiv'];
					}
					if ($aktiv == 1) {
						//ha aktiv
						//$_SESSION['szuperadmin'] = $szuperadmin;
						$_SESSION['hash'] = $hash;
						//sikeres belépés
						$_SESSION['hibas_jelszo'] = 0;
						$_SESSION['belepve'] = 1;
						header("Location: index.php");
					} else {
						$_SESSION['belepve'] = 0;
						$_SESSION['hibas_jelszo'] = "Hibás jelszó!";
						$hiba_jelszo = "Hibás felhasználónév vagy jelszó!";
					}
				} else {
					$_SESSION['belepve'] = 0;
					$_SESSION['hibas_jelszo'] = "Hibás jelszó!";
					$hiba_jelszo = "Hibás felhasználónév vagy jelszó!";
				}
			} else {
				$_SESSION['belepve'] = 0;
				$_SESSION['hibas_jelszo'] = "Hibás jelszó!";
				$hiba_jelszo = "Hibás felhasználónév vagy jelszó!";
			}

		}

		close_db($conn);
	}
	if ($_SESSION['belepve'] == 0) {
	}
	include 'kilepve.php';
}

?>
