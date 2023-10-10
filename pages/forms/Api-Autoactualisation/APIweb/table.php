<?php
include '../../../../connexion/connexion.php';
session_start();

// Récupérer les valeurs de session
$id_centre = $_SESSION['idcentre'];

// Récupérer la date du jour
$date_jour = date('Y-m-d');

// Préparer la requête préparée
$sql = "SELECT d.id, d.nom, d.tel
        FROM donneur d
        INNER JOIN prelever p ON d.id = p.iddonneur
        WHERE p.etat = 1 AND p.datep = ? AND p.idcentre = ?";

// Initialiser le statement
$stmt = $conn->prepare($sql);

// Vérifier si la préparation a réussi
if ($stmt) {
    // Liaison des paramètres
    $stmt->bind_param("si", $date_jour, $id_centre);

    // Exécution de la requête
    $stmt->execute();

    // Liaison des résultats
    $stmt->bind_result($id, $nom, $tel);

    // Création d'un tableau pour stocker les données
    $data = array();

    // Parcourir les résultats et les ajouter au tableau
    while ($stmt->fetch()) {
        $data[] = array('id' => $id, 'nom' => $nom, 'tel' => $tel);
    }

    // Retourner les données au format JSON
    echo json_encode($data);

    // Fermer le statement
    $stmt->close();
} else {
    echo "Erreur de préparation de la requête : " . $conn->error;
}

// Fermer la connexion à la base de données
$conn->close();
?>