<?php
	include ('connect.php');

	function DodajWpis($id, $nazwa, $opis, $zdjecie){
		$insert = "INSERT INTO wpisy(nazwa, opis, zdjecie) VALUES('$nazwa', '$opis', '$zdjecie')";

		header('location:StronaPoczatkowa.php?page=wpisy&nfolder=Wpisy');

		$query = mysqli_query($GLOBALS['conn'], $insert);

		echo "Dodano Wpis";
	}

?>