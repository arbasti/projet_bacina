<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "medicare_BDD";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$search = isset($_GET['search']) ? $_GET['search'] : '';
$specialization = isset($_GET['specialization']) ? $_GET['specialization'] : '';

$sql = "SELECT ID_Médecin, Nom, Prénom, Spécialité FROM Médecin WHERE 1=1";

if ($search) {
    $sql .= " AND (Nom LIKE '%$search%' OR Prénom LIKE '%$search%')";
}

if ($specialization) {
    $sql .= " AND Spécialité = '$specialization'";
}

$result = $conn->query($sql);

$output = '';

if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        $output .= '<div class="search-result">';
        $output .= '<h3><a href="medecin.php?id=' . $row['ID_Médecin'] . '">' . $row['Prénom'] . ' ' . $row['Nom'] . '</a></h3>';
        $output .= '<p>' . $row['Spécialité'] . '</p>';
        $output .= '</div>';
    }
} else {
    $output = '<p>Aucun résultat trouvé</p>';
}

echo $output;

$conn->close();
?>