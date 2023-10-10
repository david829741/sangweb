<?php
// Connexion à la base de données
include '../../../../connexion/connexion.php';

// Effectuer la requête préparée pour obtenir le nombre d'enregistrements avec état égal à 2
$sql = "SELECT COUNT(*) as total FROM prelever WHERE etat = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $etat);
$etat = 2;
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