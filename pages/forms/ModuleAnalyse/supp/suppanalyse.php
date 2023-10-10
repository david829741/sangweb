<?php
include '../../../../../../connexion/connexion.php';

$id = $_GET['suppid'];

// Préparer la requête avec des paramètres
$sql = "DELETE FROM `analyse` WHERE id = ?";
$stmt = $con->prepare($sql);
$stmt->bind_param("i", $id);
$stmt->execute();
$stmt->close();

if ($stmt) {
    if ($prov == 0) {
        echo 'success';
        header('location:data.php');
    } else {
        echo 'success';
        header('location:../../index.php');
    }
} else {
    die("Could not connect to database because: " . mysqli_error($con));
}
?>