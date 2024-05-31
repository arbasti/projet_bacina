<?php

	// On démarre la session
	session_start();
	if (!isset($_SESSION['id']))
	{
		$_SESSION['id'] = NULL; // Définir la valeur par défaut (NULL) si elle n'est pas définie
	}
	if (!isset($_SESSION['erreur']))
	{
		$_SESSION['erreur'] = NULL; // Définir la valeur par défaut (NULL) si elle n'est pas définie
    }

    // identifierBDD utilisée
    $database = "medicare_bdd";
    $database = "medicare";

    // Connexion à notre BDD
    $db_handle = mysqli_connect('localhost', 'root', '');
    $db_found = mysqli_select_db($db_handle, $database);

    // verif connexion
    if (!$db_found) {
        die("Database not found");
    }
?>