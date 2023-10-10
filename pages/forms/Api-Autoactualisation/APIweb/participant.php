<?php
// Connexion à la base de données et récupération du nombre de centres
// Remplacez les valeurs ci-dessous par vos propres informations de base de données
include '../../../../connexion/connexion.php';

// Effectuez ici la requête préparée pour obtenir le nombre de centres
// Par exemple :
session_start();

// Récupérer les valeurs de session

$id_centre = $_SESSION['id_centre'];
$sql = "SELECT COUNT(*) as total from `prelever` where idcentre=?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $id_centre);
$stmt->execute();
$result = $stmt->get_result();

if ($result) {
    $row = $result->fetch_assoc();
    $total = $row['total'];
    echo $total;
} else {
    echo "0"; // Si aucun centre n'est trouvé
}

$stmt->close();
$conn->close();
?>

