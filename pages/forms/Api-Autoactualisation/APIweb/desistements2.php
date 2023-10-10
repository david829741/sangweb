<?php
// Connexion à la base de données
include '../../../../connexion/connexion.php';

// Démarrer la session
session_start();

// Récupérer l'ID du centre depuis la session
$id_centre = $_SESSION['idcentre'];

// Effectuer la requête préparée pour obtenir le nombre d'enregistrements avec état égal à 2 et ID de centre spécifique
$sql = "SELECT COUNT(*) as total FROM prelever WHERE etat = ? AND idcentre = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("ii", $etat, $id_centre);
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