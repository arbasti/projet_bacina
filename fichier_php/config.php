<?php
	// On démarre la session
	session_start();
	if (!isset($_SESSION['id']))
	{
		$_SESSION['id'] = NULL; // Définir la valeur par défaut (NULL) si elle n'est pas définie
	}
?>