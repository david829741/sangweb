<?php
include '../../../../connexion/connexion.php';

$id = $_GET['id'];
$date = $_GET['date'];

// Préparer la requête avec des paramètres
$sql = "UPDATE `prelever` SET `etatanalyse` = 1 WHERE id = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $id);
$stmt->execute();
$stmt->close();

if ($stmt) {
    echo 'success';
    $pages = "../data/Aanalyser.php?date=" . $date;
    header('location:' . $pages);
} else {
    die("Could not connect to database because: " . mysqli_error($conn));
}
?>