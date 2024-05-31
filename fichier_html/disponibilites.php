<?php
include '../fichier_php/header.php';  // Inclusion du header
?>
<link rel="stylesheet" href="../fichier_css/profil_med.css">
<?php
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $sql = "SELECT * FROM médecin WHERE ID_Médecin = $id";
    $result = $db_handle->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        echo "<div class='profile-container'>";
        echo "<div class='profile-details'>";
        echo "<h1>Prendre un rendez-vous avec " . $row["Nom"] . " " . $row["Prénom"] . "</h1>";
        echo "</div>";
        echo "</div>";

        // Afficher le calendrier des disponibilités
        $disponibilites = json_decode($row["Disponibilité"], true);
        if (!is_array($disponibilites)) {
            $disponibilites = [];
        }

        // Créneaux horaires AM et PM
        $creneaux_am = ["09:00", "09:20", "09:40", "10:00", "10:20", "10:40", "11:00", "11:20", "11:40", "12:00"];
        $creneaux_pm = ["14:00", "14:20", "14:40", "15:00", "15:20", "15:40", "16:00", "16:20", "16:40", "17:00", "17:20", "17:40", "18:00"];

        echo "<div class='availability-calendar'>";
        echo "<table>";
        echo "<tr>";
        foreach (['Lundi', 'Mardi', 'Mercredi', 'Jeudi', 'Vendredi', 'Samedi'] as $jour) {
            echo "<th colspan='2'>$jour</th>";
        }
        echo "</tr>";
        echo "<tr>";
        foreach (['Lundi', 'Mardi', 'Mercredi', 'Jeudi', 'Vendredi', 'Samedi'] as $jour) {
            echo "<th>AM</th><th>PM</th>";
        }
        echo "</tr>";

        // Maximum nombre de créneaux horaires pour affichage
        $max_creneaux = max(count($creneaux_am), count($creneaux_pm));

        for ($i = 0; $i < $max_creneaux; $i++) {
            echo "<tr>";
            foreach (['Lundi', 'Mardi', 'Mercredi', 'Jeudi', 'Vendredi', 'Samedi'] as $jour) {
                // Créneaux AM
                if (isset($creneaux_am[$i])) {
                    $creneau_am = $creneaux_am[$i];
                    $key_am = "$jour $creneau_am";
                    echo "<td class='" . (in_array($key_am, $disponibilites) ? "indisponible" : "disponible") . "' onclick='" . (!in_array($key_am, $disponibilites) ? "selectSlot(\"$key_am\", $id)" : "") . "'>$creneau_am</td>";
                } else {
                    echo "<td></td>";
                }

                // Créneaux PM
                if (isset($creneaux_pm[$i])) {
                    $creneau_pm = $creneaux_pm[$i];
                    $key_pm = "$jour $creneau_pm";
                    echo "<td class='" . (in_array($key_pm, $disponibilites) ? "indisponible" : "disponible") . "' onclick='" . (!in_array($key_pm, $disponibilites) ? "selectSlot(\"$key_pm\", $id)" : "") . "'>$creneau_pm</td>";
                } else {
                    echo "<td></td>";
                }
            }
            echo "</tr>";
        }

        echo "</table>";
        echo "</div>";
        echo "<div id='reservation-container' style='display:none;'>";
        echo "<button id='reserve-button' class='button' onclick='reserveSlot()'>Réserver ce rendez-vous</button>";
        echo "</div>";
    } else {
        echo "Aucun médecin trouvé";
    }
} else {
    echo "Aucun identifiant de médecin fourni";
}

include '../fichier_php/footer.php';  // Inclusion du footer
?>
<script>
let selectedSlot = null;
let selectedMedecinId = null;

function selectSlot(slot, medecinId) {
    selectedSlot = slot;
    selectedMedecinId = medecinId;
    document.getElementById('reservation-container').style.display = 'block';
}

function reserveSlot() {
    if (selectedSlot && selectedMedecinId) {
        const xhr = new XMLHttpRequest();
        xhr.open('POST', 'reserve_rdv.php', true);
        xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
        xhr.onload = function() {
            if (xhr.status === 200) {
                alert('Le rendez-vous a bien été pris.');
                location.reload();
            } else {
                alert('Une erreur est survenue. Veuillez réessayer.');
            }
        };
        xhr.send('slot=' + encodeURIComponent(selectedSlot) + '&medecin_id=' + selectedMedecinId);
    }
}
</script>