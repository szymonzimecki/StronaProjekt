<?php
	@include 'connect.php';
	include ('DodajAtrakcje.php');

	echo "Atrakcje";
?>

<nav id="Szukaj">
	<form method="post">
		<input class="AtrakcjeSzukaj" type="text" placeholder="Szukaj" name="Szukaj_Fraza" value="">
		<input class="AtrakcjeSubmit" type="submit" name="Szukaj" value="Szukaj" />
	</form>

	<h1><strong>Opisy najciekawszych miejsc w województwie Zachodniopomorskim</strong></h1>

	<section id="Atrakcje">
		<?php

			function AtrakcjaSheet($tytul, $img, $id) {
				global $conn;

				echo
				'<h1>'. $tytul . '</h2>'.
				'<img class="ZdjeciaWpisy" src="./Zdjecia/'.$img.'">'.
				//'<input class="sub" type="submit" name="sub" value="Podgląd">'.
				'<a href="StronaPoczatkowa.php?page=atrakcja&nfolder=Atrakcje&idAtrakcje='. $id . '"><b>Podgląd</b></a>'.
				"<br><br>";
			}
			
			if (isset($_POST["Szukaj"])) {
				$query1 = "SELECT * FROM wpisy WHERE nazwa LIKE '%{$_POST['Szukaj_Fraza']}%'";
				$result1 = mysqli_query($conn, $query1);

				while($row = mysqli_fetch_array($result1)){
					AtrakcjaSheet($row[1], $row[3], $row[0]);
				}
			}
			else {
				$query = "SELECT * FROM wpisy";
				$result = mysqli_query($conn, $query);
	
				while($row = mysqli_fetch_array($result)){
					AtrakcjaSheet($row[1], $row[3], $row[0]);
				}
			}
	  	 ?>
	  	
	</section>
</nav>