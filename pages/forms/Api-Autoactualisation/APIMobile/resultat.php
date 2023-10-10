<?php
// Connexion à la base de données
include '../../../../connexion/connexion.php';

// Vérifier si la requête est de type POST
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Récupérer la clé unique de la requête POST
    $keyUnique = isset($_POST['keyunique']) ? $_POST['keyunique'] : null;

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
        $sqlPrelever = "SELECT * FROM prelever WHERE iddonneur = ? AND uniquekkey = ? ORDER BY datep DESC LIMIT 1";
        $stmtPrelever = $conn->prepare($sqlPrelever);
        $stmtPrelever->bind_param("is", $donneurId, $keyUnique);
        $stmtPrelever->execute();
        $resultPrelever = $stmtPrelever->get_result();

        if ($resultPrelever->num_rows > 0) {
            // Récupérer les données du dernier enregistrement
            $rowPrelever = $resultPrelever->fetch_assoc();
            $preleverId = $rowPrelever['id'];
            $timest = $rowPrelever['timest'];

            // Initialiser la variable $nextDate
            $nextDate = [];

            // Exécuter la requête pour récupérer les données de la table "analyseeffectuer"
            $sqlAnalyseEffectuer = "SELECT * FROM analyseeffectuer WHERE idprelever = ? AND timest <= ?";
            $stmtAnalyseEffectuer = $conn->prepare($sqlAnalyseEffectuer);
            $stmtAnalyseEffectuer->bind_param("is", $preleverId, $timest);
            $stmtAnalyseEffectuer->execute();
            $resultsAnalyseEffectuer = $stmtAnalyseEffectuer->get_result()->fetch_all(MYSQLI_ASSOC);

            // Exécuter la requête pour récupérer les données de la table "analyse"
            $sqlAnalyse = "SELECT * FROM analyse WHERE id = ?";
            $stmtAnalyse = $conn->prepare($sqlAnalyse);
            $stmtAnalyse->bind_param("i", $idAnalyse);

            // Parcourir les résultats de la première requête
            foreach ($resultsAnalyseEffectuer as $result) {
                // Récupérer l'idanalyse du résultat de la première requête
                $idAnalyse = $result['idanalyse'];

                // Exécuter la deuxième requête avec l'idanalyse récupéré
                $stmtAnalyse->execute();
                $result2 = $stmtAnalyse->get_result()->fetch_assoc();

                // Ajouter les résultats des deux requêtes à la variable $nextDate
                $result['libelle'] = $result2['libelle'];
                $result['description'] = $result2['description'];
                $nextDate[] = $result;
            }

            // Convertir $nextDate en format JSON
            $nextDateJson = json_encode($nextDate);

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
    $stmtAnalyseEffectuer->close();
    $stmtAnalyse->close();
    $conn->close();
}
?>