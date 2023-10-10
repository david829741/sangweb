<?php
include '../../../../connexion/connexion.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Récupérer les valeurs soumises du formulaire
    $id_centre = isset($_POST["id_centre"]) ? $_POST["id_centre"] : null;
    $uniqueCode = isset($_POST["uniqueCode"]) ? $_POST["uniqueCode"] : null;

    // Obtenez la date actuelle
    $currentDate = date('Y-m-d');

    do {
        // Comptez le nombre d'enregistrements pour la date actuelle
        $sqlCount = "SELECT COUNT(*) as count FROM prelever WHERE datep = ? and idcentre = ?";
        $stmtCount = $conn->prepare($sqlCount);
        $stmtCount->bind_param("si", $currentDate, $id_centre);
        $stmtCount->execute();
        $resultCount = $stmtCount->get_result();
        $rowCount = $resultCount->fetch_assoc();
        $count = $rowCount['count'];

        // Préparer la requête préparée
        $sqlNbrMax = "SELECT nbr_max FROM centre WHERE centre = ?";
        $stmtNbrMax = $conn->prepare($sqlNbrMax);
        $stmtNbrMax->bind_param("i", $id_centre);
        $stmtNbrMax->execute();
        $resultNbrMax = $stmtNbrMax->get_result();
        $rowNbrMax = $resultNbrMax->fetch_assoc();
        $nbr_max = $rowNbrMax['nbr_max'];

        // Si le nombre d'enregistrements est supérieur ou égal à nombre max pour le centre, passez au jour suivant
        if ($count >= $nbr_max || date('w', strtotime($currentDate)) == 0) {
            $currentDate = date('Y-m-d', strtotime($currentDate . ' +1 day'));
        } else {
            break;
        }
    } while (true);

    // Préparer la requête d'insertion en utilisant des requêtes préparées
    $sqlInsertDonneur = "SELECT id from donneur where uniquekkey= ?";
    $stmtInsertDonneur = $conn->prepare($sqlInsertDonneur);
    $stmtInsertDonneur->bind_param("s", $uniqueCode);
    $resultInsertDonneur = $stmtInsertDonneur->execute();

    if ($resultInsertDonneur) {
        // Récupérer le dernier identifiant inséré
        $last_id = $stmtInsertDonneur->insert_id;

        // Préparer la requête d'insertion pour la table 'prelever'
        $sqlInsertPrelever = "INSERT INTO prelever (idcentre, iddonneur, etat, datep) VALUES (?, ?, 1, ?)";
        $stmtInsertPrelever = $conn->prepare($sqlInsertPrelever);
        $stmtInsertPrelever->bind_param("iis", $id_centre, $last_id, $currentDate);
        $resultInsertPrelever = $stmtInsertPrelever->execute();

        // Vérifier si l'insertion a réussi
        if ($resultInsertPrelever) {
            echo json_encode(array('message' => 'SUCCES', 'date' => $currentDate));
        } else {
            echo "Erreur lors de l'insertion dans la table 'prelever' : " . $stmtInsertPrelever->error;
        }
    } else {
        echo "Erreur lors de l'insertion dans la table 'donneur' : " . $stmtInsertDonneur->error;
    }

    // Fermer les connexions
    $stmtCount->close();
    $stmtNbrMax->close();
    $stmtInsertDonneur->close();
    $stmtInsertPrelever->close();
    $conn->close();
}
?>