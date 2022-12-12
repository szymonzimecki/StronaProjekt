<link rel="stylesheet" type="text/css" href="Atrakcje/style.css">

<?php
	@include 'connect.php';
	include ('DodajAtrakcje.php');
?>
<?php
	echo "Atrakcje";
?>

<nav id="Szukaj">
	<input class="AtrakcjeSzukaj" type="text" placeholder="Szukaj" name="" value="">
	<input class="AtrakcjeSubmit" type="submit" value="Szukaj" />

	<h1><strong>Opisy najciekawszych miejsc w województwie Zachodniopomorskim</strong></h1>

	<section id="Atrakcje">
		<?php

            $query = "SELECT * FROM wpisy WHERE id={$_GET['idAtrakcje']}";
            $result = mysqli_query($conn, $query);

            while($row = mysqli_fetch_array($result)) {
                echo
                '<h1>'. $row[1] . '</h2>'.
                '<img id="ZdjeciaWpis" src="./Zdjecia/'.$row[3].'">'.
                "<br><br>".
                $row[2];
            }

            mysqli_close($conn);
	  		
	  	 ?>
	  	
	</section>
</nav>