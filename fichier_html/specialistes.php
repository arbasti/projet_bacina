<?php
include '../fichier_php/config.php'; // Connexion à la base de données

$specialization = isset($_GET['specialization']) ? $_GET['specialization'] : 'Généraliste'; // Valeur par défaut

$sql = "SELECT * FROM medecin WHERE spécialité = ?";
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Medicare: Spécialistes - <?php echo htmlspecialchars($specialization); ?></title>
    <link rel="stylesheet" href="https://unpkg.com/leaflet/dist/leaflet.css" />
    <link rel="stylesheet" href="../fichier_css/accueil.css">
    <link rel="stylesheet" href="../fichier_css/recherche.css">
    <link rel="stylesheet" href="../fichier_css/squelette.css">
</head>



<body>
    <div class="wrapper">
        <div class="header">
            <h1>Medicare</h1>
            <h2>Votre santé, notre priorité</h2>
            <a href="accueil.php"><img src="../images/logo.png" alt="Logo Medicare" class="logo"></a>
        </div>
        <nav class="navigation">
            <a href="accueil.php">Retour à l'accueil</a>
            <a href="#">Médecins Spécialisés</a> <!-- ce bouton est vide mais on peut le remplir -->
            <!-- on peut ajouter d'autres liens de navigation ici -->
        </nav>

        <div class="content">
            <?php
            if ($stmt = $db_handle->prepare($sql)) {
                $stmt->bind_param("s", $specialization);
                $stmt->execute();
                $result = $stmt->get_result();

                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        echo "<div class='search-result'>";
                        echo "<img src='../images/" . $row["photo"] . "' alt='Photo de " . $row["nom"] . "'>";
                        echo "<div class='search-result-details'>";
                        echo "<h3><a href='profil_medecin.php?id=" . $row["ID_Medecin"] . "'>" . $row["nom"] . " " . $row["prenom"] . "</a></h3>";
                        echo "<p>Spécialité: " . $row["spécialité"] . "</p>"; // Ajout de la spécialisation
                        echo "<p>Email: " . $row["email"] . "</p>";
                        echo "<p>Téléphone: " . $row["telephone"] . "</p>";
                        echo "<p>" . $row["bureau"] . "</p>";
                        echo "</div>";
                        echo "</div>";
                    }
                } else {
                    echo "Aucun résultat pour cette spécialisation";
                }
                $stmt->close();
            } else {
                echo "Erreur de préparation de la requête";
            }
            $db_handle->close();
            ?>
        </div>

        <footer class="footer">
            <p>Contactez-nous: email@medicare.com | +33 1 23 45 67 89 | 10 Rue Sextius Michel, 75015 Paris</p>
            <div class="google-map" id="map" style="height: 400px;"></div>
        </footer>
    </div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="../fichier_js/carousel.js"></script>
    <script src="../fichier_js/recherche.js"></script>
    <script src="https://unpkg.com/leaflet/dist/leaflet.js"></script>
    <script src="../fichier_js/map.js"></script>

    <script>
    // Fonction pour initialiser la carte
    function initMap() {
        var map = L.map('map').setView([48.8566, 2.3522], 13); // Coordonnées de Paris

        L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
            attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
        }).addTo(map);
    }

    // Appel de la fonction d'initialisation de la carte après le chargement de la page
    document.addEventListener('DOMContentLoaded', initMap);
</script>


</body>
</html>
