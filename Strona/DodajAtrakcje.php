<?php
	include ('connect.php');

	function DodajAtrakcje($id, $nazwa, $opis, $zdjecie){
		$insert = "INSERT INTO wpisy(nazwa, opis, zdjecie) VALUES('$nazwa', '$opis', '$zdjecie')";

		header('location:StronaPoczatkowa.php?page=atrakcje&nfolder=Atrakcje');

		$query = mysqli_query($GLOBALS['conn'], $insert);

		echo "Dodano Wpis";
	}

?>