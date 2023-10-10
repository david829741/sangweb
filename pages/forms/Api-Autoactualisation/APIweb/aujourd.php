<?php
// Connexion à la base de données
include '../../../../connexion/connexion.php';

// Effectuer la requête préparée pour obtenir le nombre de prélevés pour la date actuelle et l'état 1
$sql = "SELECT COUNT(*) as total FROM `prelever` WHERE DATE(datep) = CURDATE() AND etat = 1";
$stmt = $conn->prepare($sql);
$stmt->execute();
$result = $stmt->get_result();

if ($result) {
    // Récupérer le total directement
    $row = $result->fetch_assoc();
    $total = $row['total'];

    echo $total;
} else {
    echo "0"; // Si aucune donnée n'est trouvée ou s'il y a une erreur
}

// Fermer la connexion
$conn->close();
?>