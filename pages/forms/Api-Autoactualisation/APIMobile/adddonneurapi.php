<?php
include '../../../../connexion/connexion.php';

// Vérifier si le formulaire a été soumis
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Fonction pour générer un code unique
    function generateUniqueCode()
    {
        return md5(uniqid(rand(), true) . microtime(true));
    }

    $uniqueCode = generateUniqueCode();

    // Récupérer les valeurs soumises du formulaire
    $nom = isset($_POST["_nom"]) ? $_POST["nom"] : "teste";
    $email = isset($_POST["email"]) ? $_POST["email"] : "email";
    $tel = isset($_POST["tel"]) ? $_POST["tel"] : "5678";
    $id_centre = isset($_POST["id_centre"]) ? $_POST["id_centre"] : "7";
    $groupesang = isset($_POST["groupesang"]) ? $_POST["groupesang"] : "INCONNU";

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

        // Obtenez le nombre maximal d'enregistrements pour le centre
        $sqlMax = "SELECT nbr_max FROM centre WHERE centre = ?";
        $stmtMax = $conn->prepare($sqlMax);
        $stmtMax->bind_param("i", $id_centre);
        $stmtMax->execute();
        $resultMax = $stmtMax->get_result();
        $rowMax = $resultMax->fetch_assoc();
        $nbr_max = $rowMax['nbr_max'];

        // Si le nombre d'enregistrements est supérieur ou égal à nombre max, passez au jour suivant
        if ($count >= $nbr_max || date('w', strtotime($currentDate)) == 0) {
            $currentDate = date('Y-m-d', strtotime($currentDate . ' +1 day'));
        } else {
            break;
        }
    } while (true);

    // Préparer la requête d'insertion pour la table 'donneur'
    $sqlInsertDonneur = "INSERT INTO donneur (nom, email, tel, uniquekkey, groupe) VALUES (?, ?, ?, ?, ?)";
    $stmtInsertDonneur = $conn->prepare($sqlInsertDonneur);
    $stmtInsertDonneur->bind_param("sssss", $nom, $email, $tel, $uniqueCode, $groupesang);
    $resultInsertDonneur = $stmtInsertDonneur->execute();

    // Vérifier si l'insertion a réussi
    if ($resultInsertDonneur) {
        echo "Insertion réussie.";

        // Récupérer le dernier identifiant inséré dans la table 'donneur'
        $last_id = $stmtInsertDonneur->insert_id;

        // Préparer la requête d'insertion pour la table 'prelever'
        $sqlInsertPrelever = "INSERT INTO prelever (idcentre, iddonneur, etat, datep) VALUES (?, ?, 1, ?)";
        $stmtInsertPrelever = $conn->prepare($sqlInsertPrelever);
        $stmtInsertPrelever->bind_param("iis", $id_centre, $last_id, $currentDate);
        $resultInsertPrelever = $stmtInsertPrelever->execute();

        // Vérifier si l'insertion dans la table 'prelever' a réussi
        if ($resultInsertPrelever) {
            echo json_encode(array('uniqueCode' => $uniqueCode, 'eventDate' => $currentDate));
        } else {
            echo "Erreur lors de l'insertion dans la table 'prelever' : " . $stmtInsertPrelever->error;
        }
    } else {
        echo "Erreur lors de l'insertion dans la table 'donneur' : " . $stmtInsertDonneur->error;
    }

    // Fermer les connexions
    $stmtInsertDonneur->close();
    $stmtInsertPrelever->close();
    $conn->close();
}
?>