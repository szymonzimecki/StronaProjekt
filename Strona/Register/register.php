<?php
	@include 'connect.php';

	if(isset($_POST['sub'])){

		$name = mysqli_real_escape_string($conn, $_POST['name']);
		$email = mysqli_real_escape_string($conn, $_POST['email']);
		$password = md5($_POST['password']);
		$c_password = md5($_POST['c_password']);

		$select = " SELECT * FROM users WHERE email = '$email' && password = '$password' ";

		$result = mysqli_query($conn, $select);

		if (mysqli_num_rows($result) > 0) {
			$error[] = 'Użytkownik już istnieje!';
		}else{
			if ($password != $c_password) {
				$error[] = 'Hasła nie są takie same!';
			}else{
				$insert = "INSERT INTO users(name, email, password) VALUES('$name', '$email', '$password')";
				mysqli_query($conn, $insert);
				//if($result = mysqli_query($conn, $sql))
				header('location:StronaPoczatkowa.php?page=glowna&nfolder=Glowna');
			}
		}
	}

?>

<!DOCTYPE html>
<html>
<head>
</head>
<body>
	<?php
		echo "Rejestracja";
	?>

	<section id="register-box">
		<form action="" method="post">
			<h2>Zarejestruj się</h2>

			<?php
				if (isset($error)) {
					foreach ($error as $error) {
						echo '<span class="error-msg">'.$error.'</span>';
					}
				}
			?>
			
			<article class="text-box">
				<input class="usr-pas" type="text" required placeholder="Name" name="name" value="">
			</article>
			<article class="text-box">
				<input class="usr-pas" type="email" required placeholder="Email" name="email" value="">
			</article>
			<article class="text-box">
				<input class="usr-pas" type="password" placeholder="Password" name="password" value="">
			</article>
			<article class="text-box">
				<input class="usr-pas" type="password" placeholder="Confirm Password" name="c_password" value="">
			</article>

			
			<br>
			<input class="sub" type="submit" name="sub" value="Zarejestruj się">
			<p>Masz już konto? <a href="StronaPoczatkowa.php?page=logowanie&nfolder=Login" value="Zaloguj">Zaloguj się</a></p>
		</form>
		
	</section>
</body>
</html>