<?php
	session_start();
	session_unset(); // Afin de libérer tout les variables de la session
	session_destroy(); // Afin de détruire la session

	header("Location: accueil.php");
	exit();
?>
