<?php
	include ('connect.php');

	function aktualizacja_uzytkownika($id, $name, $email, $password){
		$update = "UPDATE `users` SET `id`='$id',`name`='$name',`email`='$email',`password`='$password',`Uprawnienia`='User' WHERE `id` = '$id'";

		$query = mysqli_query($GLOBALS['conn'], $update);

		echo "Uaktualniono dane";
	}

?>