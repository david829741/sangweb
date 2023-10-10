<?php
// Connexion à la base de données
include '../../../../connexion/connexion.php';

// Définir la requête SQL à exécuter avec une requête préparée
$query = "UPDATE prelever SET etat = 2 WHERE DATE(datep) = CURDATE() - INTERVAL 1 DAY AND etat = 1;";
$stmt = $conn->prepare($query);

// Exécuter la requête préparée
if ($stmt->execute()) {
    echo "Requête exécutée avec succès !";
} else {
    echo "Erreur lors de l'exécution de la requête : " . $stmt->error;
}

// Fermer la connexion à la base de données
$stmt->close();
$conn->close();
?>