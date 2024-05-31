<?php
	include('config.php'); // ce fichier contient la connexion à la base de données

	// On démarre la session
	session_start();

	// Récupération des données du formulaire
	$identifiant = isset($_POST["identifiant"]) ? $_POST["identifiant"] : "";
	$password = isset($_POST["password"]) ? $_POST["password"] : "";

	// Requêtes SQL afin de vérifier les informations de connexion dans la BDD
	$sql = "SELECT ID_Utilisateur, prenom FROM Utilisateur WHERE (ID_Utilisateur = '$identifiant' OR email = '$identifiant') AND mot_de_passe = '$password'";
	$result = mysqli_query($db_handle, $sql);

	// Vérification si l'utilisateur existe dans la base de données
	if (mysqli_num_rows($result) > 0)
	{
		$data = mysqli_fetch_assoc($result);
		$_SESSION['id'] = $data['ID_Utilisateur']; // Stockage de l'identifiant dans la session
		$_SESSION['prenom'] = $data['prenom']; // Stockage du prenom dans la session
		header("Location: ../fichier_html/votre-compte.php");
		exit();
	}
	else
	{
		$_SESSION['erreur'] = "ID, adresse email ou mot de passe incorrect.";
		header("Location: ../fichier_html/login.php?erreur");
		exit();
	}

	// On ferme la connexion
	mysqli_close($db_handle);
?>
