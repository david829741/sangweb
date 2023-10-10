<?php
include '../../../../connexion/connexion.php';

if (isset($_GET['suppid'])) {
    $id = $_GET['suppid'];

    // Requête de suppression avec requête préparée
    $sql = "DELETE FROM `utilisateur` WHERE id = ?";
    $stmt = $conn->prepare($sql);

    if ($stmt) {
        $stmt->bind_param("i", $id);
        $stmt->execute();
        $stmt->close();

        echo 'successes';
        $pages = "../data/datautilisateur.php";
        header('location:' . $pages);
    } else {
        die("Could not connect to database because:" . mysqli_error($conn));
    }
} else {
    // Gérer le cas où 'suppid' n'est pas défini
    // ...
}
?>
