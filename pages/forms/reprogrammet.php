<?php
include "../../connexion/connexion.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Récupérer l'ID du donneur depuis le formulaire soumis
    $id = $_POST["id"];

    // Calculer la date actuelle
    $currentDate = date('Y-m-d');

    do {
        // Comptez le nombre d'enregistrements pour la date actuelle
        $sqlCount = "SELECT COUNT(*) as count FROM donneur WHERE date_colonne = ?";
        $stmtCount = mysqli_prepare($conn, $sqlCount);

        mysqli_stmt_bind_param($stmtCount, "s", $currentDate);
        mysqli_stmt_execute($stmtCount);
        mysqli_stmt_bind_result($stmtCount, $count);
        mysqli_stmt_fetch($stmtCount);
        mysqli_stmt_close($stmtCount);

        // Si le nombre d'enregistrements est supérieur ou égal à 10, passez au jour suivant
        if ($count >= 10 || date('w', strtotime($currentDate)) == 0) {
            $currentDate = date('Y-m-d', strtotime($currentDate . ' +1 day'));
        } else {
            break;
        }
    } while (true);

    // Préparer la requête de mise à jour
    $sqlUpdate = "UPDATE donneur SET date_colonne = ? WHERE id = ?";
    $stmtUpdate = mysqli_prepare($conn, $sqlUpdate);

    // Exécuter la requête de mise à jour
    mysqli_stmt_bind_param($stmtUpdate, "si", $currentDate, $id);
    $resultUpdate = mysqli_stmt_execute($stmtUpdate);

    // Vérifier si la mise à jour a réussi
    if ($resultUpdate) {
        echo "Mise à jour réussie.";
    } else {
        echo "Erreur lors de la mise à jour : " . mysqli_error($conn);
    }

    // Fermer la connexion
    $conn->close();
}
?>