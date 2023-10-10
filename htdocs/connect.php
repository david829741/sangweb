<?php
$servername = "localhost";
$username = "epiz_34228313";
$password = "bCBjtu4hVgRc";
$dbname = "epiz_34228313_shop";

// Créer la connexion
$conn = new mysqli($servername, $username, $password, $dbname);

// Vérifier la connexion
if ($conn->connect_error) {
    die("La connexion a échoué : " . $conn->connect_error);
}
?>