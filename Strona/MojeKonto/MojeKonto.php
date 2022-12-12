<?php
	@include 'connect.php';
	@include 'aktualizacja_uzytkownika.php';

	if(($_SESSION['privileges'] != "Admin") && ($_SESSION['privileges'] != "User")){
		header('location:StronaPoczatkowa.php?page=glowna&nfolder=Glowna');
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
			<h2>MojeKonto</h2>

			<?php
				if (isset($error)) {
					foreach ($error as $error) {
						echo '<span class="error-msg">'.$error.'</span>';
					}
				}
			?>
			<article class="text-box">
				<input class="usr-pas" type="text" required placeholder="Name" name="name" value="<?php echo $_SESSION['name'] ?>">

				<input class="usr-pas" type="email" required placeholder="Email" name="email" value="<?php echo $_SESSION['email'] ?>">

				<input class="usr-pas" id="passwd" type="password" placeholder="Restart Password" name="password" value="<?php echo $_SESSION['password'] ?>">
				<input type="button" value="Show password" onclick="show_hide();">

			</article>
			
			<br>
			<article id="wyloguj">
				<a href="StronaPoczatkowa.php?page=logout&nfolder=Logout">Wyloguj</a>
			</article>
			
			<input class="sub" type="submit" name="sub" value="Uaktualnij">
			<?php
				if (isset($_POST['sub'])) {
					if (isset($_POST['password'])) {
						aktualizacja_uzytkownika($_SESSION['id'] ,$_POST['name'], $_POST['email'], $_POST['password']);
					}
				}
			?>
		</form>
		
	</section>
	<br>

	<script>
		function show_hide() {
			let pass = document.querySelector("#passwd");

			if(pass.type == "password") {
				pass.type = "text";
			}
			else {
				pass.type = "password";
			}
		}
	</script>
</body>
</html>