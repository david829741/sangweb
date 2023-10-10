<?php
// Connexion à la base de données
include '../../../../connexion/connexion.php';

// Effectuer la requête préparée pour obtenir le nombre total de centres
$sql = "SELECT COUNT(*) as total FROM centre";
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