<!-- login.php -->
<!-- La page de connexion de notre site web Medicare -->

<!DOCTYPE html>
<html lang="fr">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Medicare: Connexion</title>
	<!-- Stylesheet pour la map (footer) -->
	<link rel="stylesheet" href="https://unpkg.com/leaflet/dist/leaflet.css" />

	<!-- à quoi ça sert TIM ? -->
	<link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700&display=swap">

	<!-- Attention l'ordre des fichiers CSS est important-->
	<link rel="stylesheet" href="../fichier_css/squelette.css">
	<link rel="stylesheet" href="../fichier_css/recherche.css">
	<link rel="stylesheet" href="../fichier_css/login-register.css">
</head>
<body>
	<!-- On ajoute la config.php -->
	<?php include '../fichier_php/config.php'; ?>

	<div class="wrapper">
		<div class="header">
			<h1>Medicare</h1>
			<h2>Votre santé, notre priorité</h2>
			<a href="accueil.php"><img src="../images/logo.png" alt="Logo Medicare" class="logo"></a>
		</div>

		<nav class="navigation">
			<a href="accueil.php">Accueil</a>
			<a href="#" id="search-button">Rechercher</a>
			<a href="#">Tout Parcourir</a>
			<a href="#">Rendez-vous</a>
		</nav>

		<div id="search-bar" class="search-bar">
			<input type="text" id="search-input" placeholder="Rechercher un médecin par nom ou prénom...">
			<div class="filter-buttons">
				<button class="filter-button" data-specialization="Généraliste">Généraliste</button>
				<button class="filter-button" data-specialization="Addictologie">Addictologie</button>
				<button class="filter-button" data-specialization="Andrologie">Andrologie</button>
				<button class="filter-button" data-specialization="Cardiologie">Cardiologie</button>
				<button class="filter-button" data-specialization="Dermatologie">Dermatologie</button>
				<button class="filter-button" data-specialization="Gastro-Hépato-Entérologie">Gastro-Hépato-Entérologie</button>
				<button class="filter-button" data-specialization="Gynécologie">Gynécologie</button>
				<button class="filter-button" data-specialization="IST">IST</button>
				<button class="filter-button" data-specialization="Ostéopathie">Ostéopathie</button>
			</div>
		</div>
		<div id="search-results" class="search-results"></div>

		<div class="cadre">
			<h2>Connexion</h2>
			<form action="../fichier_php/process_login.php" method="post">
				<label for="login_user">Utilisateur:</label>
				<input type="text" name="user" placeholder="Identifiant (ID) ou Email" required><br><br>

				<label for="login_password">Mot de passe:</label>
				<input type="password" name="password" required><br><br>

				<button type="submit">Connexion</button>
				<a href="register.php">Créer mon compte</a>
			</form>
			
			<div class="cadre">
				<p>Chaque jour, un million et demi de personnes sont victimes de piratages informatiques. Protégez-vous dès maintenant ! Mettez à jour vos logiciels, utilisez des mots de passe forts et méfiez-vous des demandes d'informations personnelles suspectes.<br>Ensemble, restons vigilants contre les cybermenaces. 🛡️</p>
			</div>
		</div>

		<footer class="footer">
			<p><b>Contactez-nous :</b> email@medicare.com | +33 1 23 45 67 89 | 10 Rue Sextius Michel, 75015 Paris</p>
			<div id="map" class="google-map"></div>
		</footer>
	</div>

	<!-- Script Javascript pour la recherche -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
	<script src="../fichier_js/recherche.js"></script>

	<!-- Script Javascript pour la map -->
	<script src="https://unpkg.com/leaflet/dist/leaflet.js"></script>
	<script src="../fichier_js/map.js"></script>
</body>
</html>
