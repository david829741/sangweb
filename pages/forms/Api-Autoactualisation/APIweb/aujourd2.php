<?php
// Connexion à la base de données
include '../../../../connexion/connexion.php';

// Démarrer la session
session_start();

// Récupérer l'ID du centre depuis la session
$id_centre = $_SESSION['idcentre'];

// Effectuer la requête préparée pour obtenir le nombre de prélevés pour la date actuelle, l'état 1, et l'ID du centre
$sql = "SELECT COUNT(*) as total FROM `prelever` WHERE DATE(datep) = CURDATE() AND etat = 1 AND idcentre = ?";

// Préparer la requête préparée
$stmt = $conn->prepare($sql);

// Lier les paramètres
$stmt->bind_param("i", $id_centre);

// Exécuter la requête
$stmt->execute();

// Récupérer le résultat
$stmt->bind_result($total);

if ($stmt->fetch()) {
    echo $total;
} else {
    echo "0"; // Si aucune donnée n'est trouvée ou s'il y a une erreur
}

// Fermer le statement
$stmt->close();

// Fermer la connexion
$conn->close();
?>