<?php
include '../../../../connexion/connexion.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Fetch data from the database.
    $id = isset($_POST["id"]) ? $_POST["id"] : null;

    // Préparer la requête pour sélectionner les données du centre
    $sql = "SELECT * FROM centre WHERE centre = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $result = $stmt->get_result();

    // Vérifier si la requête a réussi
    if ($result) {
        // Créer un tableau pour stocker les données
        $data = array();

        // Boucler à travers les données et les ajouter au tableau
        while ($row = $result->fetch_assoc()) {
            $data[] = $row;
        }

        // Retourner les données au format JSON
        echo json_encode($data);
    } else {
        echo "Erreur : " . $stmt->error;
    }

    // Fermer la connexion à la base de données
    $stmt->close();
    $conn->close();
}
?>