<?php
// Connexion à la base de données et récupération du nombre de centres
// Remplacez les valeurs ci-dessous par vos propres informations de base de données
include '../../../../connexion/connexion.php';

// Effectuez ici la requête préparée pour obtenir le nombre de centres
// Par exemple :
$sql = "SELECT * FROM `prelever` WHERE etat = 1";
$stmt = $conn->prepare($sql);

// Exécution de la requête
$stmt->execute();

// Liaison des résultats
$stmt->bind_result($id, $autre_colonne); // Ajoute les colonnes nécessaires ici

// Initialisation du total
$total = 0;

// Parcours des résultats
while ($stmt->fetch()) {
    $total++;
}

// Fermeture du statement
$stmt->close();

// Affichage du total
echo $total;

// Fermeture de la connexion
$conn->close();
?>