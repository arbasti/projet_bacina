<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laboratoire de Biologie Médicale - Medicare</title>
    <link rel="stylesheet" href="https://unpkg.com/leaflet/dist/leaflet.css" />
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../fichier_css/accueil.css">
    <link rel="stylesheet" href="../fichier_css/labo.css">
	<link rel="stylesheet" href="../fichier_css/recherche.css">
	<link rel="stylesheet" href="../fichier_css/squelette.css">
    
</head>
<body>
    <div class="wrapper">
        <?php include '../fichier_php/header.php'; ?>  <!-- Inclusion du header -->
        <?php include '../fichier_php/navigation.php'; ?>  <!-- Inclusion de la barre de navigation -->

        <div class="content-section">   
            <div class="conteneur3">
                <div class="service">
                    <div id="leftcolumn">
                        <div class="service-image-container">
                            <img src="../images/img-labo.jpg" alt="Laboratoire de biologie médicale" class="service-image">
                        </div>
                    </div>
                    <div id="rightcolumn">
                        <div class="conteneur">
                            <div class="service-details">
                                <h3>Laboratoire de Biologie Médicale</h3>
                                <p><strong>Salle :</strong> SC-101</p>
                                <p><strong>Téléphone :</strong> +33 01 22 33 44 55</p>
                                <p><strong>Email :</strong> labo.biologie@medicare.fr</p>
                                <button class="appointment-btn" onclick="window.location.href='services_labo.php'">Nos services</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

       

        <?php include '../fichier_php/footer.php'; ?>  <!-- Inclusion du footer -->
        <div id="map" class="google-map"></div> <!-- Inclusion de la carte -->
        
    </div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
</body>
</html>