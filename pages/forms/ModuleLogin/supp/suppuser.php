<?php
include '../../../../connexion/connexion.php';




$id=$_GET['suppid'];



$sql="DELETE FROM `utilisateur` where id=$id";
$result=mysqli_query($conn,$sql);
if ($result){

        echo 'successes';
        $pages="../data/datautilisateur.php" ;
        header('location:'.$pages);

   
}
else{
    die("Could not connect to database becose:".mysqli_error($conn));
}


?>