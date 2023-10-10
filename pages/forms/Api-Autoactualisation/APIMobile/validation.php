<?php
// Connexion à la base de données
include '../../../../connexion/connexion.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Récupérer la clé unique de la requête POST
    $keyUnique = isset($_POST['keyunique']) ? $_POST['keyunique'] : null;

    if ($keyUnique !== null) {
        // Rechercher l'enregistrement correspondant dans la table "donneur"
        $sqlDonneur = "SELECT id FROM donneur WHERE uniquekkey = ?";
        $stmtDonneur = $conn->prepare($sqlDonneur);
        $stmtDonneur->bind_param("s", $keyUnique);
        $stmtDonneur->execute();
        $resultDonneur = $stmtDonneur->get_result();

        if ($resultDonneur->num_rows > 0) {
            // Récupérer l'ID du donneur
            $rowDonneur = $resultDonneur->fetch_assoc();
            $donneurId = $rowDonneur['id'];

            // Rechercher le dernier enregistrement de la table "prelever" correspondant au donneur
            $sqlPrelever = "SELECT * FROM prelever WHERE iddonneur = ? ORDER BY datep DESC LIMIT 1";
            $stmtPrelever = $conn->prepare($sqlPrelever);
            $stmtPrelever->bind_param("i", $donneurId);
            $stmtPrelever->execute();
            $resultPrelever = $stmtPrelever->get_result();

            if ($resultPrelever->num_rows > 0) {
                // Validation du prélèvement
                $rowPrelever = $resultPrelever->fetch_assoc();
                $preleverId = $rowPrelever['id'];
                $currentDate = $rowPrelever['datep'];
                $id_centre = $rowPrelever['idcentre'];
                $etatvalider = 3;
                session_start();

                // Récupérer l'ID du centre effectif pour comparaison avec l'ID où devrait se faire le don
                $id_centreeffectis = $_SESSION['idcentre'];

                $sqlUpdate = ($id_centre != $id_centreeffectis) ?
                    "UPDATE prelever SET etat = ?, idcentre = ? WHERE id = ?" :
                    "UPDATE prelever SET etat = ? WHERE id = ?";

                $stmtUpdate = $conn->prepare($sqlUpdate);
                $stmtUpdate->bind_param(($id_centre != $id_centreeffectis) ? "iii" : "ii", $etatvalider, $id_centreeffectis, $preleverId);
                $stmtUpdate->execute();
                $stmtUpdate->close();

                // Retourner l'ID du donneur au format JSON
                echo json_encode(array('donneurId' => $donneurId));
            } else {
                echo "Aucun enregistrement trouvé dans la table 'prelever' pour le donneur avec l'ID : $donneurId";
            }
        } else {
            echo "Aucun enregistrement trouvé dans la table 'donneur' pour la clé unique : $keyUnique";
        }

        // Fermer les connexions à la base de données
        $stmtDonneur->close();
        $stmtPrelever->close();
    } else {
        echo "Clé unique non fournie.";
    }

    $conn->close();
}
?>