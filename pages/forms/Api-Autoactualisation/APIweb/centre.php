<?php
// Connexion à la base de données
include '../../../../connexion/connexion.php';

// Effectuer la requête pour obtenir le nombre total de centres
$sql = "SELECT COUNT(*) as total FROM centre";
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