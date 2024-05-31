<?php
include '../fichier_php/config.php';  // Assurez-vous de remplacer par le fichier de connexion à la base de données

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $slot = $_POST['slot'];
    $medecin_id = $_POST['medecin_id'];

    // Insérer le rendez-vous dans la table `rdvmedecin`
    $sql = "INSERT INTO rdvmedecin (datee, heure, ID_Medecin, statut, note) VALUES (?, ?, ?, 'Confirmé', 'Rendez-vous en ligne')";
    if ($stmt = $db_handle->prepare($sql)) {
        list($jour, $heure) = explode(' ', $slot);
        $date = date('Y-m-d', strtotime("next $jour"));
        $stmt->bind_param("ssi", $date, $heure, $medecin_id);
        if ($stmt->execute()) {
            // Mettre à jour les disponibilités du médecin
            $sql_update = "UPDATE medecin SET Disponibilité = JSON_REMOVE(Disponibilité, '$[\"$slot\"]') WHERE ID_Medecin = ?";
            if ($stmt_update = $db_handle->prepare($sql_update)) {
                $stmt_update->bind_param("i", $medecin_id);
                $stmt_update->execute();
                $stmt_update->close();
            }
            echo "success";
        } else {
            echo "error";
        }
        $stmt->close();
    }
    $db_handle->close();
}
?>
