<?php
include('config.php'); // ce fichier contient la connexion à la base de données

$search = isset($_GET['search']) ? $_GET['search'] : '';
$specialization = isset($_GET['specialization']) ? $_GET['specialization'] : '';

$sql = "SELECT ID_Médecin, Nom, Prénom, Spécialité, Photo, Bureau, Téléphone, Email FROM Médecin WHERE 1=1";

// condition de recherche par nom/prénom/spécialisation
if ($search) {
    $sql .= " AND (Nom LIKE '%$search%' OR Prénom LIKE '%$search%' OR Spécialité LIKE '%$search%')";
}

// condition de spécialisation
if ($specialization) {
    $sql .= " AND Spécialité = '$specialization'";
}

// tri par ordre croissant du prénom
$sql .= " ORDER BY Prénom ASC";

// executer la requête SQL
$result = mysqli_query($db_handle, $sql);

$output = '';

if (mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
        $output .= '<div class="search-result">';
        if ($row['Photo']) {
            // chemin pour les PDP des médecins
            $output .= '<img src="../images/' . $row['Photo'] . '" alt="Photo de ' . $row['Prénom'] . ' ' . $row['Nom'] . '" style="float: left; margin-right: 20px;" height="100" width="100">';
        }
        $output .= '<div style="display: flex; flex-direction: column; justify-content: center;">';
        $output .= '<h3><a href="medecin.php?id=' . $row['ID_Médecin'] . '">' . $row['Prénom'] . ' ' . $row['Nom'] . '</a></h3>';
        $output .= '<p>' . $row['Spécialité'] . '</p>';
        $output .= '<p>Bureau: ' . $row['Bureau'] . '</p>';
        $output .= '<p>Téléphone: ' . $row['Téléphone'] . '</p>';
        $output .= '<p>Email: ' . $row['Email'] . '</p>';
        $output .= '</div>';
        $output .= '</div>';
    }
} else {
    $output = '<p>Aucun résultat trouvé</p>';
}

echo $output;

// Fermeture de la connexion
mysqli_close($db_handle);
?>
