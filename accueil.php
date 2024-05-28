<!-- La page d'accueil de notre site web Medicare -->

<!DOCTYPE html>
<html lang="fr">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Medicare: Accueil</title>
	<link rel="stylesheet" href="https://unpkg.com/leaflet/dist/leaflet.css" />
	<link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700&display=swap" rel="stylesheet">
	<!-- Attention l'ordre des fichiers CSS est important-->
	<link rel="stylesheet" href="accueil.css">
	<link rel="stylesheet" href="squelette.css">
	<link rel="stylesheet" href="recherche.css">
</head>
<body>
	<?php include 'config.php'; ?> <!-- On ajoute la config -->
	<div class="wrapper">
		<div class="header">
			<h1>Medicare</h1>
			<h2>Votre santé, notre priorité</h2>
			<img src="images/logo.png" alt="Logo Medicare" class="logo">
		</div>
		<nav class="navigation">
			<a href="#">Accueil</a>
			<a href="#" id="search-button">Rechercher</a>
			<a href="#">Tout Parcourir</a>
			<a href="#">Rendez-vous</a>
			<a href="#">Votre Compte</a>
			<?php if (isset($_SESSION['id']) && $_SESSION['id'] != NULL): ?>
				<a href="logout.php">Déconnexion</a>
			<?php endif; ?>
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
		<div class="welcome-section">
			<h2>Bienvenue sur Medicare</h2>
			<p>Votre plateforme en ligne dédiée à votre bien-être et votre santé au sein de la communauté Omnes Education.</p>
			<p>Avec Medicare, accédez facilement à une liste complète de spécialistes de la santé, consultez leurs profils détaillés, prenez rendez-vous en quelques clics et communiquez avec eux facilement par chat, visioconférence ou email !</p>
			<p>Où que vous soyez, Medicare est là pour vous accompagner dans votre parcours de santé.</p>
			<p>En cas de problèmes, n'hésitez pas à contacter notre équipe d'administrateurs !</p>
		</div>
		<div class="event-section">
			<h2>Evènement de la semaine</h2>
			<p>Porte ouverte de Medicare : Venez rencontrer nos spécialistes ce vendredi à 14h00.</p>
		</div>
		<div class="carousel-section">
			<div id="carrousel">
				<ul>
					<li><img src="images/medecinG1.jpg" alt="Spécialiste 1"></li>
					<li><img src="images/medecinG2.jpg" alt="Spécialiste 2"></li>
					<li><img src="images/medecinG3.jpg" alt="Spécialiste 3"></li>
					<li><img src="images/medecinG4.jpg" alt="Spécialiste 4"></li>
					<li><img src="images/medecinG5.jpg" alt="Spécialiste 5"></li>
				</ul>
				<div class="btn-prev">&#10094;</div>
				<div class="btn-next">&#10095;</div>
			</div>
		</div>
		<footer class="footer">
			<p>Contactez-nous : email@medicare.com | +33 1 23 45 67 89 | 10 Rue Sextius Michel, 75015 Paris</p>
			<div id="map" class="google-map"></div>
		</footer>
	</div>

	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
	<script src="accueil_java/carousel.js"></script>
	<script src="https://unpkg.com/leaflet/dist/leaflet.js"></script>
	<script src="map.js"></script>
	<script src="recherche.js"></script>
</body>
</html>