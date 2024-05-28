<?php
	session_start();
	session_unset(); // Libère toutes les variables de session
	session_destroy(); // Détruit la session

	header("Location: accueil.php");
	exit();
?>
