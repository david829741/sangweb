<?php
// Connexion à la base de données
include '../../../../connexion/connexion.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Récupérer la clé unique de la requête POST
    $keyUnique = isset($_POST['keyunique']) ? $_POST['keyunique'] : null;

    // Rechercher l'enregistrement correspondant dans la table "donneur"
    $sqlDonneur = "SELECT id, idcentre FROM donneur WHERE uniquekkey = ?";
    $stmtDonneur = $conn->prepare($sqlDonneur);
    $stmtDonneur->bind_param("s", $keyUnique);
    $stmtDonneur->execute();
    $resultDonneur = $stmtDonneur->get_result();

    if ($resultDonneur->num_rows > 0) {
        // Récupérer l'ID du donneur et le centre associé
        $rowDonneur = $resultDonneur->fetch_assoc();
        $donneurId = $rowDonneur['id'];
        $id_centre = $rowDonneur['idcentre'];

        // Rechercher le dernier enregistrement de la table "prelever" correspondant au donneur
        $sqlPrelever = "SELECT id, datep FROM prelever WHERE iddonneur = ? ORDER BY datep DESC LIMIT 1";
        $stmtPrelever = $conn->prepare($sqlPrelever);
        $stmtPrelever->bind_param("i", $donneurId);
        $stmtPrelever->execute();
        $resultPrelever = $stmtPrelever->get_result();

        if ($resultPrelever->num_rows > 0) {
            // Modifier la date de l'enregistrement trouvé
            $rowPrelever = $resultPrelever->fetch_assoc();
            $preleverId = $rowPrelever['id'];
            $currentDate = $rowPrelever['datep'];

            // Proposer une nouvelle date
            $nextDate = date('Y-m-d', strtotime($currentDate . ' +1 day')); // Date du jour +1
            do {
                // Compter le nombre d'enregistrements pour la nouvelle date et le centre actuellement programmé
                $sqlCount = "SELECT COUNT(*) as count FROM prelever WHERE datep = ? and idcentre = ?";
                $stmtCount = $conn->prepare($sqlCount);
                $stmtCount->bind_param("si", $nextDate, $id_centre);
                $stmtCount->execute();
                $resultCount = $stmtCount->get_result();
                $rowCount = $resultCount->fetch_assoc();
                $count = $rowCount['count'];

                // Récupérer le nombre maximum depuis la table "centre"
                $sqlNbrMax = "SELECT nbr_max FROM centre WHERE centre = ?";
                $stmtNbrMax = $conn->prepare($sqlNbrMax);
                $stmtNbrMax->bind_param("i", $id_centre);
                $stmtNbrMax->execute();
                $resultNbrMax = $stmtNbrMax->get_result();
                $rowNbrMax = $resultNbrMax->fetch_assoc();
                $nbr_max = $rowNbrMax['nbr_max'];

                // Si le nombre d'enregistrements est supérieur ou égal à nombre max pour le centre, passez au jour suivant
                if ($count >= $nbr_max || date('w', strtotime($nextDate)) == 0) {
                    $nextDate = date('Y-m-d', strtotime($nextDate . ' +1 day'));
                } else {
                    break;
                }
            } while (true);

            // Mettre à jour la date dans la table "prelever" en utilisant une requête préparée
            $sqlUpdatePrelever = "UPDATE prelever SET datep = ? WHERE id = ?";
            $stmtUpdatePrelever = $conn->prepare($sqlUpdatePrelever);
            $stmtUpdatePrelever->bind_param("si", $nextDate, $preleverId);
            $stmtUpdatePrelever->execute();
            $stmtUpdatePrelever->close();

            // Convertir $nextDate en format JSON
            $nextDateJson = json_encode($nextDate);
            // Retourner $nextDate au format JSON
            // Retourner $nextDate avec la clé eventDate
            echo json_encode(array('eventDate' => $nextDate));
        } else {
            echo "Aucun enregistrement trouvé dans la table 'prelever' pour le donneur avec l'ID : $donneurId";
        }
    } else {
        echo "Aucun enregistrement trouvé dans la table 'donneur' pour la clé unique : $keyUnique";
    }

    // Fermer les connexions à la base de données
    $stmtDonneur->close();
    $stmtPrelever->close();
    $stmtCount->close();
    $stmtNbrMax->close();
    $conn->close();
}
?>