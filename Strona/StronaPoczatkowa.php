<?php
	session_start();
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="StronaPoczatkowa.css">
	<title>OG Project</title>
</head>
<body>
	<header id="header">
		<img src="./Zdjecia/logo.png">
		<h1>Atrakcje Zachodniopomorskie</h1><hr>
		
		<nav id="Bar">
			<a href="StronaPoczatkowa.php?page=glowna&nfolder=Glowna"><b>Strona gówna</b></a>
			<a href="StronaPoczatkowa.php?page=atrakcje&nfolder=Atrakcje"><b>Atrakcje</b></a>
			<?php
			
				if(isset($_SESSION['id'])) {
					echo '<a href="StronaPoczatkowa.php?page=DodawanieAtrakcji&nfolder=DodawanieAtrakcji"><b>Dodaj Atrakcje</b></a>';
				}
			
			?>
			<a href="StronaPoczatkowa.php?page=ofirmie&nfolder=Ofirmie"><b>O firmie</b></a>
			<a href="StronaPoczatkowa.php?page=kontakt&nfolder=Kontakt"><b>Kontakt</b></a>

			<?php
				if(isset($_SESSION['privileges']) && $_SESSION['privileges'] == "Admin") {
					echo '<a href="StronaPoczatkowa.php?page=AdminPanel&nfolder=AdminPanel"><b>Admin Panel</b></a>';
				}
			
				if(isset($_SESSION['id'])) {
					echo '
						<a href="StronaPoczatkowa.php?page=MojeKonto&nfolder=MojeKonto"><b>Moje Konto</b></a>
					';
				}
			
			?>
		</nav>

		<?php
			if(isset($_SESSION['name'])){
				echo "<b>" . "Witaj " . $_SESSION['name'] . "</b>";
			// }else{
			// 	echo "<b id='Nzalogowany'>" . "Jestes niezalogowany" . "</b>";
			}
		?>

		<nav id="Login">
			<?php
				if(!isset($_SESSION['id'])) {
					echo '
						<button><a href="StronaPoczatkowa.php?page=logowanie&nfolder=Login" value="Zaloguj"><b>Zaloguj</b></a></button>
						<button><a href="StronaPoczatkowa.php?page=register&nfolder=Register" value="Zarejestruj"><b>Zarejestruj</b></a></button>
					';
				}
			
			?>
			<!-- style="display: none; -->
		</nav>
	</header>

	<?php
		//Strona glowna
		if (isset($_GET['page']) && isset($_GET['nfolder'])) {
			$strona = $_GET['page'];
			$nfolder = $_GET['nfolder'];
		}
		else{
			$strona = "glowna";
			$nfolder = "Glowna";
		}

	?>

	<section id="central-box">
		<?php if(($strona)!=null) include($nfolder."/".$strona.".php"); ?>
		
		

	</section>

	<footer id="footer">
		
	</footer>
	

</body>
</html>