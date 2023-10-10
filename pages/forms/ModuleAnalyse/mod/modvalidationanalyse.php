<?php
include '../../../../connexion/connexion.php';




$id=$_GET['id'];
$date=$_GET['date'];



$sql="UPDATE `prelever` SET `etatanalyse`=1  WHERE id='$id'";
$result=mysqli_query($conn,$sql);
if ($result){

        echo 'successes';
        $pages="../data/Aanalyser.php?date=".$date ;
        header('location:'.$pages);

   
}
else{
    die("Could not connect to database becose:".mysqli_error($conn));
}


?>