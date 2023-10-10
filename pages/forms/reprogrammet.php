<?php
include "../../connexion/connexion.php";

// Vérifier si le formulaire a été soumis
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Récupérer les valeurs soumises du formulaire
    $id = $_POST["id"];


    // Obtenez la date actuelle
    $currentDate = date('Y-m-d');

    do {
        // Comptez le nombre d'enregistrements pour la date actuelle
        $sql = "SELECT COUNT(*) as count FROM donneur WHERE date_colonne = '$currentDate'";
        $result = mysqli_query($conn, $sql);
        $row = mysqli_fetch_assoc($result);
        $count = $row['count'];

        // Si le nombre d'enregistrements est supérieur ou égal à 10, passez au jour suivant
        if ($count >= 10 || date('w', strtotime($currentDate)) == 0) {
            $currentDate = date('Y-m-d', strtotime($currentDate . ' +1 day'));
        } else {
            break;
        }
    } while (true);

    // Préparer la requête de mise à jour
    $sql = "UPDATE donneur SET  date_colonne = '$currentDate' WHERE id = $id";

    // Exécuter la requête de mise à jour
    $result = mysqli_query($conn, $sql);

    // Vérifier si la mise à jour a réussi
    if ($result) {
        echo "Mise à jour réussie.";
    } else {
        echo "Erreur lors de la mise à jour : " . $conn->error;
    }

    // Fermer la connexion
    $conn->close();
}
?>