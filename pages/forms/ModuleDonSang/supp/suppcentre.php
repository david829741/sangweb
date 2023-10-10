<?php
include '../../../../connexion/connexion.php';

if (isset($_GET['suppid'])) {
    $id = $_GET['suppid'];

    // Prépare la requête de suppression avec un paramètre
    $sql = "DELETE FROM `centre` WHERE centre=?";
    $stmt = $conn->prepare($sql);

    // Lie le paramètre à la requête
    $stmt->bind_param("i", $id);

    // Exécute la requête préparée
    $result = $stmt->execute();

    if ($result) {
        echo 'successes';
        $pages = "../data/datacentre.php";
        header('location:' . $pages);
    } else {
        die("Could not connect to database because: " . mysqli_error($conn));
    }

    // Ferme la requête préparée
    $stmt->close();
}
?>