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

$search = $_GET['search'];

$sql = "SELECT ID_Médecin, Nom, Prénom, Spécialité FROM Médecin WHERE Nom LIKE '%$search%' OR Prénom LIKE '%$search%'";
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