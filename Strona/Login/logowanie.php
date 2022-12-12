<?php
	@include 'connect.php';

	if(isset($_POST['sub'])){

		$name = $_POST['name'];
		$password = md5($_POST['password']);

		$select = " SELECT * FROM users WHERE name = '$name' AND password = '$password' ";

		if ($result = mysqli_query($conn, $select)) {
			if ($result->num_rows > 0){
				echo "Zalogowano";
				$row = mysqli_fetch_array($result);

				$_SESSION['id'] = $row['id'];
				$_SESSION['name'] = $row['name'];
				$_SESSION['password'] = $_POST['password'];
				$_SESSION['email'] = $row['email'];
				$_SESSION['privileges'] = $row['Uprawnienia'];

				header('location:StronaPoczatkowa.php?page=glowna&nfolder=Glowna');
	    	}
			else{
	    		//echo "Istnieje wiecej niz jeden uzytkownik"
	    	}
		}
		else{
	    	$error = 'Nie prawidłowa nazwa lub hasło!';
		}
	}
?>

<!DOCTYPE html>
<html>
<head>
</head>
<body>
	<?php
		echo "Logowanie";
	?>

	<section id="login-box">

		<form method="post">
			<h2>Zaloguj się</h2>

			<?php
				if (isset($error)) {
					echo '<span class="error-msg">'. $error .'</span>';	
				}
			?>
			
			<div class="text-box">
				<input class="usr-pas" type="text" placeholder="Name" name="name" value="">
			</div>

			<div class="text-box">
				<input class="usr-pas" type="password" placeholder="Password" name="password" value="">
			</div>

			<br>
			<input class="sub" type="submit" name="sub" value="Zaloguj się">

			<p id="login-p">Nie masz jeszcze konta? <a href="StronaPoczatkowa.php?page=register&nfolder=Register" value="Zaloguj">Zarejestruj się</a></p>
		</form>
		
	</section>
<br>

</body>
</html>