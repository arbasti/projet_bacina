<?php
include('config.php'); // ce fichier contient la connexion à la base de données

$search = isset($_GET['search']) ? $_GET['search'] : '';
$specialization = isset($_GET['specialization']) ? $_GET['specialization'] : '';

$sql = "SELECT ID_Medecin, nom, prenom, spécialité, photo, bureau, telephone, email FROM medecin WHERE 1=1";

// condition de recherche par nom/prénom/spécialisation
if ($search) {
    $sql .= " AND (nom LIKE '%" . mysqli_real_escape_string($db_handle, $search) . "%' OR prenom LIKE '%" . mysqli_real_escape_string($db_handle, $search) . "%' OR spécialité LIKE '%" . mysqli_real_escape_string($db_handle, $search) . "%')";
}

// condition de spécialisation
if ($specialization) {
    $sql .= " AND spécialité = '" . mysqli_real_escape_string($db_handle, $specialization) . "'";
}

// tri par ordre croissant du prénom
$sql .= " ORDER BY prenom ASC";

// executer la requête SQL
$result = mysqli_query($db_handle, $sql);

$output = '';

if (mysqli_num_rows($result) > 0) {
    while ($row = $result->fetch_assoc()) {
        echo "<div class='search-result'>";
        echo "<img src='../images/" . $row["photo"] . "' alt='Photo de " . $row["nom"] . " " . $row["prenom"] . "'>";
        echo "<div class='search-result-details'>";
        echo "<h3><a href='profil_medecin.php?id=" . $row["ID_Medecin"] . "'>" . $row["nom"] . " " . $row["prenom"] . "</a></h3>";
        echo "<p>Spécialité: " . $row["spécialité"] . "</p>"; // Ajout de la spécialisation
        echo "<p>Email: " . $row["email"] . "</p>";
        echo "<p>Téléphone: " . $row["telephone"] . "</p>";
        echo "<p>Bureau: " . $row["bureau"] . "</p>";
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
