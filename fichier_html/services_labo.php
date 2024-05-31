<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laboratoire de Biologie Médicale - Medicare</title>
    <link rel="stylesheet" href="https://unpkg.com/leaflet/dist/leaflet.css" />
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../fichier_css/accueil.css">
	<link rel="stylesheet" href="../fichier_css/recherche.css">
    <link rel="stylesheet" href="../fichier_css/labo.css">
    <link rel="stylesheet" href="../fichier_css/squelette.css">
</head>
<body>
	<!-- On ajoute la config.php -->
	<?php include '../fichier_php/config.php'; ?>
	
	<div class="wrapper">
		<div class="header">
			<h1>Medicare</h1>
			<h2>Votre santé, notre priorité</h2>
			<a href="#"><img src="../images/logo.png" alt="Logo Medicare" class="logo"></a>
		</div>

			
		<nav class="navigation">
    <a href="accueil.php">Accueil</a>
    <a href="#" id="search-button">Rechercher</a>  <!-- à remplir si on veut avoir la fonction recherche sur cette page -->


	<!-- Intégration du bouton et des menus déroulants -->
	<div class="dropdown">
    <a href="#" class="dropbtn">Tout Parcourir</a>
    <div class="dropdown-content">
        <a href="specialistes.php?specialization=Généraliste">Médecins Généralistes</a>
		<div class="dropdown-specialized">
    <a href="#" class="dropbtn-specialized">Médecins Spécialisés</a>
    <div class="dropdown-content-specialized">
        <a href="specialistes.php?specialization=Addictologie">Addictologie</a>
        <a href="specialistes.php?specialization=Andrologie">Andrologie</a>
        <a href="specialistes.php?specialization=Cardiologie">Cardiologie</a>
        <a href="specialistes.php?specialization=Dermatologie">Dermatologie</a>
        <a href="specialistes.php?specialization=Gastro-Hépato-Entérologie">Gastro-Hépato-Entérologie</a>
        <a href="specialistes.php?specialization=Gynécologie">Gynécologie</a>
        <a href="specialistes.php?specialization=IST">IST</a>
        <a href="specialistes.php?specialization=Ostéopathie">Ostéopathie</a>
    </div>
</div>

        <a href="laboratoire.php">Laboratoire</a>
    </div>
</div>




    <a href="#">Rendez-vous</a>
    <a href="votre-compte.php">Votre Compte</a>
    <?php if ($_SESSION['id'] != NULL): ?>
        <a href="../fichier_php/logout.php">Déconnexion</a>
    <?php endif; ?>


</nav>

		<!-- <div id="search-bar" class="search-bar">
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
		<div id="search-results" class="search-results"></div> -->


    <div class="wrapper">
        <div class="content-section">
            <div class="conteneur2">
                <div class="service">
                    <div id="leftcolumn">
                        <div class="service-image-container">
                            <img src="../images/imagesservice1.jpg" alt="Service Prise de Sang" class="service-image">
                        </div>
                    </div>
                    <div id="rightcolumn">
                        <div class="conteneur">
                            <div class="service-details">
                                <h3>Service disponible : Prise et examen du sang</h3>
                                <p><strong>Règles avant :</strong> À jeun pendant 12 heures.</p>
                                <p><strong>Règles durant :</strong> Rester calme et détendu.</p>
                                <p><strong>Règles après :</strong> Manger une collation légère.</p>
                                <button class="appointment-btn" onclick="window.location.href='rendez-vous.medicare.html?service=prise-de-sang'">Prendre Rendez-vous</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>


        <div class="content-section">
            <div class="conteneur2">
                <div class="service">
                    <div id="leftcolumn">
                        <div class="service-image-container">
                            <img src="../images/imagesservice2.jpg" alt="Service Examen Urine" class="service-image">
                        </div>
                    </div>
                    <div id="rightcolumn">
                        <div class="conteneur">
                            <div class="service-details">
                                <h3>Service : Examen de l'urine</h3>
                                <p><strong>Règles avant :</strong> Boire de l'eau normalement.</p>
                                <p><strong>Règles durant :</strong> Utiliser le récipient stérile fourni.</p>
                                <p><strong>Règles après :</strong> Apporter l'échantillon rapidement au laboratoire.</p>
                                <button class="appointment-btn" onclick="window.location.href='rendez-vous.medicare.html?service=examen-urine'">Prendre Rendez-vous</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="content-section">
            <div class="conteneur2">
                <div class="service">
                    <div id="leftcolumn">
                        <div class="service-image-container">
                            <img src="../images/imagesservice3.jpg" alt="Service Dépistage COVID-19" class="service-image">
                        </div>
                    </div>
                    <div id="rightcolumn">
                        <div class="conteneur">
                            <div class="service-details">
                                <h3>Service : Dépistage COVID-19</h3>
                                <p><strong>Règles avant :</strong> Éviter de manger ou boire 30 minutes avant.</p>
                                <p><strong>Règles durant :</strong> Suivre les instructions de l'infirmier.</p>
                                <p><strong>Règles après :</strong> Attendre les résultats chez soi.</p>
                                <button class="appointment-btn" onclick="window.location.href='rendez-vous.medicare.html?service=depistage-covid'">Prendre Rendez-vous</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <?php include '../fichier_php/footer.php'; ?>  <!-- Inclusion du footer avec carte -->

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://unpkg.com/leaflet/dist/leaflet.js"></script>
</body>
</html>