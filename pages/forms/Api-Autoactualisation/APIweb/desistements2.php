<?php
// Connexion à la base de données
include '../../../../connexion/connexion.php';

// Démarrer la session
session_start();

// Récupérer l'ID du centre depuis la session
$id_centre = $_SESSION['idcentre'];

// Effectuer la requête pour obtenir le nombre d'enregistrements avec état égal à 2 et ID de centre spécifique
$sql = "SELECT COUNT(*) as total FROM prelever WHERE etat = 2 AND idcentre = $id_centre";
$result = mysqli_query($conn, $sql);

if ($result) {
    // Récupérer le total directement
    $row = mysqli_fetch_assoc($result);
    $total = $row['total'];

    echo $total;
} else {
    echo "0"; // Si aucune donnée n'est trouvée ou s'il y a une erreur
}

// Fermer la connexion
$conn->close();
?>