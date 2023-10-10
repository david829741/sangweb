<?php
// Connexion à la base de données et récupération du nombre de centres
// Remplacez les valeurs ci-dessous par vos propres informations de base de données
include '../../../../connexion/connexion.php';

// Effectuez ici la requête pour obtenir le nombre de centres
// Par exemple :
$sql = "SELECT *  FROM centre";
$result = mysqli_query($conn, $sql);

// Préparer la requête préparée
$stmt = $conn->prepare($sql);

// Vérifier si la préparation a réussi
if ($stmt) {
    // Exécution de la requête
    $stmt->execute();

    // Liaison des résultats
    $stmt->bind_result($id, $nom, $tel);

    $total = 0;

    // Parcourir les résultats et compter le nombre de centres
    while ($stmt->fetch()) {
        $total++;
    }

    // Afficher le total
    echo $total;

    // Fermer le statement
    $stmt->close();
} else {
    echo "Erreur de préparation de la requête : " . $conn->error;
}

// Fermer la connexion à la base de données
$conn->close();
?>