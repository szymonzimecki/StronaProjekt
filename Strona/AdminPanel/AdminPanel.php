<?php
	@include 'connect.php';


	if($_SESSION['privileges'] != "Admin"){
		header('location:StronaPoczatkowa.php?page=glowna&nfolder=Glowna');
	}

?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Logowanie</title>
</head>
<body>
	<?php
		echo "Admin Panel";
	?>
	<section id="AdminPanel">

		<form method="post">
			<h2>AdminPanel</h2>

			<article>

				<table>
				  <tr>
				  	<th>Id</th>
				    <th>Użytkownik</th>
				    <th>Email</th>
				    <th>Hasło</th>
				    <th>Uprawnienia</th>
				    <th>Usuwanie</th>
				  </tr>
				  
			  	<?php

					if(isset($_POST['delete'])) {
						$sql = "DELETE FROM users WHERE id={$_POST['delete']}";
						$query = mysqli_query($conn, $sql);
					}

			  		$query = "SELECT * FROM users";
					$result = mysqli_query($conn, $query);

			  		while($row = mysqli_fetch_array($result)){
			  			echo "<tr>";
					    echo
						"<td>". 
					    $row[0].
					    "</td>". 
					    "<td>".
					    $row[1].
					    "</td>".
					    "<td>". 
					    $row[2].
					    "</td>".
					    "<td>".
					    $row[3].
					    "</td>".
					    "<td>".
					    $row[4].
					    "</td>".
						"<td>
							<button type='submit' name='delete' value={$row[0]}>Usuń</button>
						</td>" .
						"</tr>";
					}
			  	 ?>
				  
				</table>
			</article>
		</form>
		
	</section>
	<br>
</body>
</html>