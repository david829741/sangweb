<?php
include '../../../../connexion/connexion.php';




$id=$_GET['suppid'];



$sql="DELETE FROM `centre` where centre=$id";
$result=mysqli_query($conn,$sql);
if ($result){

        echo 'successes';
        $pages="../data/datacentre.php" ;
        header('location:'.$pages);

   
}
else{
    die("Could not connect to database becose:".mysqli_error($conn));
}


?>