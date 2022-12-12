<?php
	@include 'connect.php';
	include ('DodajWpis.php');

	if(isset($_POST['sub'])){

		$id = $_SESSION['id'];
		$nazwa = $_POST['nazwa'];
		$opis = $_POST['opis'];

		$select = " SELECT * FROM wpisy ";

		$result = mysqli_query($conn, $select);
	}
?>

<!DOCTYPE html>
<html>
<head>
</head>
<body>
	<?php
		echo "Moje Konto";
	?>
	<section id="MojeKonto">

		<form id="MojeKonto-box" method="post">
			<h2>Dodawanie Wpisów</h2>

			<?php
				if (isset($error)) {
					foreach ($error as $error) {
						echo '<span class="error-msg">'.$error.'</span>';
					}
				}
			?>
			<article class="text-box">
				<input class="usr-pas" type="text" required placeholder="Nazwa" name="nazwa" value="">

				<input class="usr-pas" type="text" required placeholder="Opis" name="opis" value="">

				<input class="sss" type="file" required name="zdjecie" value="">

			</article>
			
			<br>
			
			<input class="sub" type="submit" name="sub" value="Dodaj Wpis">
			<?php
				if (isset($_POST['sub'])) {
					
					DodajWpis($_SESSION['id'], $_POST['nazwa'], $_POST['opis'], $_POST['zdjecie']);
				}
			?>
		</form>
		
	</section>
	<br>
</body>
</html>