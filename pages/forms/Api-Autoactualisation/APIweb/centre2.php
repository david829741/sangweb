<?php
// Connexion à la base de données
include '../../../../connexion/connexion.php';

// Démarrer la session
session_start();

// Récupérer l'ID du centre depuis la session
$id_centre = $_SESSION['idcentre'];

// Effectuer la requête préparée pour obtenir le nombre d'enregistrements pour le centre spécifié
$sql = "SELECT COUNT(*) as total FROM centre WHERE centre = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $id_centre);
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