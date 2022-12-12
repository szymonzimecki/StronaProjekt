<?php
	@include 'connect.php';
	include ('DodajAtrakcje.php');

	if($_SESSION['privileges'] != "Admin" && $_SESSION['privileges'] != "User"){
		header('location:StronaPoczatkowa.php?page=glowna&nfolder=Glowna');
	}

	function dodaj_atrakcje() {
		global $conn;

		$sql_check = "SELECT * FROM wpisy WHERE nazwa='{$_POST['Nazwa']}'";
		$query = $conn->query($sql_check);

		if($query->num_rows != 0) {
			echo "Istnieje już atrakcja o tej nazwie";
		}
		else {
			$target_dir = "Zdjecia/";
			$target_file = $target_dir . basename($_FILES["Zdjecie"]["name"]);
			$uploadOk = 1;
			$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

			if(isset($_POST["sub"])) {
				$check = getimagesize($_FILES["Zdjecie"]["tmp_name"]);
				if($check !== false) {
					$uploadOk = 1;
				} else {
					echo "File is not an image.";
					$uploadOk = 0;
				}
			}

			$file_name = explode('.', basename($_FILES["Zdjecie"]["name"]));
			$split_photo_name = explode('.', $_POST['Photo_name']);
			if($file_name[0] != $split_photo_name[0]) {
				echo "Plik nie nazywa się {$_POST['Photo_name']}";
				$uploadOk = 0;
			}

			if (file_exists($target_file)) {
				echo "Sorry, file already exists.";
				$uploadOk = 0;
			}

			if($uploadOk == 1) {
				$sql = "INSERT INTO wpisy(nazwa, opis, zdjecie) VALUES('{$_POST['Nazwa']}', '{$_POST['Opis']}', '{$_POST['Photo_name']}')";
				$query = $conn->query($sql);

				if($query) {
					move_uploaded_file($_FILES["Zdjecie"]["tmp_name"], $target_file);
					echo "Dodano atrakcje";
				}
				else {
					echo "Coś poszło nie tak";
				}
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
		echo "Dodawanie Atrakcji";
	?>
	<section id="DodajAtrakcje">

		<form id="DodajAtrakcje-box" method="post" enctype="multipart/form-data">
			<h2>Dodawanie Atrakcji</h2>

			<?php
				if (isset($error)) {
					foreach ($error as $error) {
						echo '<span class="error-msg">'.$error.'</span>';
					}
				}
			?>
			<article class="text-box">
				<input class="DodajA" type="text" required placeholder="Nazwa" name="Nazwa" value="">

				<input class="DodajA" type="text" required placeholder="Nazwa zdjecia z rozszerzeniem" name="Photo_name" value="">

				<input class="DodajA" type="text" required placeholder="Opis" name="Opis" value="">

				<input class="sss" type="file" required name="Zdjecie" value="">

			</article>
			
			<br>
			
			<input class="sub" type="submit" name="sub" value="Dodaj Wpis">

			<?php
				if(isset($_POST['sub'])) {
					dodaj_atrakcje();
				}
			?>
		</form>
		
	</section>
	<br>
</body>
</html>