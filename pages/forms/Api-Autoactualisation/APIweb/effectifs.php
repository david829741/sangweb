<?php
// Connexion à la base de données et récupération du nombre de centres
// Remplacez les valeurs ci-dessous par vos propres informations de base de données
include '../../../../connexion/connexion.php';

// Effectuez ici la requête préparée pour obtenir le nombre de centres
// Par exemple :
$sql = "SELECT COUNT(*) as total FROM `prelever` WHERE etat = 3";
$stmt = $conn->prepare($sql);
$stmt->execute();
$result = $stmt->get_result();

if ($result) {
    $total = $result->fetch_assoc()['total'];
    echo $total;
} else {
    echo "0"; // Si aucun centre n'est trouvé
}

$stmt->close();
$conn->close();
?>

