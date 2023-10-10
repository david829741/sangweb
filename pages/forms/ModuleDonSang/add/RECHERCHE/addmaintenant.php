<?php
include '../../../../../connexion/connexion.php';

//if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Récupérer les valeurs soumises du formulaire
    // Démarrer la session
session_start();

// Récupérer l'ID du centre depuis la session
$id_centre = $_SESSION['idcentre'];
   // $id_centre = isset($_POST["id_centre"]) ? $_POST["id_centre"] : null;
    $uniqueCode = isset($_GET["id"]) ? $_GET["id"] : null;

    // Obtenez la date actuelle
    $currentDate = date('Y-m-d');




        // Récupérer le dernier identifiant inséré
        $last_id =$uniqueCode ;
        // Préparer la requête d'insertion pour la table 'prelever'
        $sqlInsertPrelever = "INSERT INTO prelever (idcentre, iddonneur, etat, datep) VALUES (?, ?, 3, ?)";
        $stmtInsertPrelever = $conn->prepare($sqlInsertPrelever);
        $stmtInsertPrelever->bind_param("iis", $id_centre, $last_id, $currentDate);
        $resultInsertPrelever = $stmtInsertPrelever->execute();

        // Vérifier si l'insertion a réussi
        if ($resultInsertPrelever) {
            echo 'success';
            header('location:index.PHP?succes=0');
        } else {
            echo 'success';
            header('location:index.php?succes=1');
        }
   

    // Fermer les connexions
  
    $stmtInsertPrelever->close();
    $conn->close();
//}
?>