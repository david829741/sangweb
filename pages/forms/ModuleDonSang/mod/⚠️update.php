<?php
include '../../../page/conn.php';

$id = $_GET['mod'];


$sql = "UPDATE `prelever` SET etat=3 WHERE iddonneur=$id AND id ";
$result = mysqli_query($con, $sql);

if ($result) {
    if ($prov == 0) {
        echo 'successes';
        header('location:data.php');
    } else {
        echo 'successes';
        header('location:../../index.php');
    }
} else {
    die("Could not connect to database because: " . mysqli_error($con));
}
?>