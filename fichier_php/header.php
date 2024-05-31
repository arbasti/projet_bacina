<!DOCTYPE html>
<html lang="fr">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Medicare: Accueil</title>
	<!-- Stylesheet pour la map (footer) -->
	<link rel="stylesheet" href="https://unpkg.com/leaflet/dist/leaflet.css" />

	<!-- Style Sheet pour la Google Map, petit rectangle indiquant la localisation -->
	<link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700&display=swap">

	<!-- Attention l'ordre des fichiers CSS est important-->
	
	<link rel="stylesheet" href="../fichier_css/accueil.css">
	<link rel="stylesheet" href="../fichier_css/recherche.css">
	<link rel="stylesheet" href="../fichier_css/squelette.css">
	
</head>
<body>
	<!-- On ajoute la config.php -->
	<?php include '../fichier_php/config.php'; ?>
	
	<div class="wrapper">
		<div class="header">
			<h1>Medicare</h1>
			<h2>Votre santé, notre priorité</h2>
			<a href="../fichier_html/accueil.php"><img src="../images/logo.png" alt="Logo Medicare" class="logo"></a>
		</div>
