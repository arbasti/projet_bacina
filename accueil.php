<?php
	session_start();
?>

<!DOCTYPE html>
<html lang="fr">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Medicare: Services Médicaux</title>
	<link rel="stylesheet" href="https://unpkg.com/leaflet/dist/leaflet.css" />
	<link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700&display=swap" rel="stylesheet">
	<link rel="stylesheet" href="accueil.css">
	<link rel="stylesheet" href="squelette.css">
	<link rel="stylesheet" href="rechercheCSS.css"> <!-- Inclusion du nouveau fichier CSS  ODRE DES CSS IMPORTANT-->
</head>
<body>
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
	<script src="carousel.js"></script>
	<script src="https://unpkg.com/leaflet/dist/leaflet.js"></script>
	<script>
		var map = L.map('map').setView([48.85117091598405, 2.2885323073959074], 15); // Coordinates for 10 Rue Sextius Michel, 75015 Paris

		L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
			attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
		}).addTo(map);

		L.marker([48.85117091598405, 2.2885323073959074]).addTo(map)
			.bindPopup('10 Rue Sextius Michel, 75015 Paris')
			.openPopup();

		// Show/hide search bar
		$('#search-button').click(function() {
			$('#search-bar').toggle();
		});

		// Search functionality
		$('#search-input').on('input', function() {
			var query = $(this).val();
			if (query.length > 2) {
				$.ajax({
					url: 'search.php',
					method: 'GET',
					data: { search: query },
					success: function(data) {
						$('#search-results').html(data);
					}
				});
			} else {
				$('#search-results').empty();
			}
		});
	</script>
</body>
</html>
