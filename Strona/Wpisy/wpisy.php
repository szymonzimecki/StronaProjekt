<?php
	@include 'connect.php';
	include ('DodajWpis.php');
?>
<?php
	echo "Wpisy";
?>

<nav id="Szukaj">
	<input class="WpisySzukaj" type="text" placeholder="Szukaj" name="" value="">
	<input class="WpisySubmit" type="submit" value="Szukaj" />

	<h1><strong>Opisy najciekawszych miejsc w województwie Zachodniopomorskim</strong></h1>

	<section id="Wpisy">
		<?php

			if (isset($_GET['idWpis'])) {
			$idWpis = $_GET['idWpis'];
			}
			else{
				$idWpis = 2;
			}

			// Wszystkie Wpisy
			if ($idWpis < 0) {
				$query = "SELECT * FROM wpisy";
				$result = mysqli_query($conn, $query);

		  		while($row = mysqli_fetch_array($result)){
		  			
				    echo
				    '<h1>'. $row[1] . '</h2>'.
				    '<img src="./Zdjecia/'.$row[3].'">'.
				    '<input class="sub" type="submit" name="sub" value="Podgląd">'.
				    "<br><br>";
				}
				mysqli_close($conn);

			}else{
				// Wyswietlanie podglądu we wpisie

				$query = "SELECT * FROM wpisy WHERE id=$idWpis";
				$result = mysqli_query($conn, $query);

		  		while($row = mysqli_fetch_array($result)){
		  			
				    echo
				    '<h1>'. $row[1] . '</h2>'.
				    '<img class="ZdjeciaWpisy" src="./Zdjecia/'.$row[3].'">'.
				    "<br><br>".
				    $row[2];
				}
				mysqli_close($conn);

			}
	  		
	  	 ?>
	  	
	</section>
</nav>