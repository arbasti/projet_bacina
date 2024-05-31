<?php
include('config.php'); // ce fichier contient la connexion à la base de données

$search = isset($_GET['search']) ? $_GET['search'] : '';
$specialization = isset($_GET['specialization']) ? $_GET['specialization'] : '';

$sql = "SELECT ID_Médecin, Nom, Prénom, Spécialité, Photo, Bureau, Téléphone, Email FROM Médecin WHERE 1=1";

// condition de recherche par nom/prénom/spécialisation
if ($search) {
    $sql .= " AND (Nom LIKE '%" . mysqli_real_escape_string($db_handle, $search) . "%' OR Prénom LIKE '%" . mysqli_real_escape_string($db_handle, $search) . "%' OR Spécialité LIKE '%" . mysqli_real_escape_string($db_handle, $search) . "%')";
}

// condition de spécialisation
if ($specialization) {
    $sql .= " AND Spécialité = '" . mysqli_real_escape_string($db_handle, $specialization) . "'";
}

// tri par ordre croissant du prénom
$sql .= " ORDER BY Prénom ASC";

// executer la requête SQL
$result = mysqli_query($db_handle, $sql);

$output = '';

if (mysqli_num_rows($result) > 0) {
    while ($row = $result->fetch_assoc()) {
        echo "<div class='search-result'>";
        echo "<img src='../images/" . $row["Photo"] . "' alt='Photo de " . $row["Nom"] . "'>";
        echo "<div class='search-result-details'>";
        echo "<h3><a href='profil_medecin.php?id=" . $row["ID_Médecin"] . "'>" . $row["Nom"] . " " . $row["Prénom"] . "</a></h3>";
        echo "<p>Spécialité: " . $row["Spécialité"] . "</p>"; // Ajout de la spécialisation
        echo "<p>Email: " . $row["Email"] . "</p>";
        echo "<p>Téléphone: " . $row["Téléphone"] . "</p>";
        echo "<p>Bureau: " . $row["Bureau"] . "</p>";
        echo "</div>";
        echo "</div>";
    }
} else {
    $output = '<p>Aucun résultat trouvé</p>';
}

echo $output;

// Fermeture de la connexion
mysqli_close($db_handle);
?>