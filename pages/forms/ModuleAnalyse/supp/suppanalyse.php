<?php
include ' ../../../../../../connexion/connexion.php ';

$id=$_GET['suppid'];
$sql="DELETE FROM `analyse` where id=$id";
$result=mysqli_query($con,$sql);
if ($result){
    if($prov==0){
        echo 'successes';
        header('location:data.php');
    }else{
        echo 'successes';
        header('location:../../index.php');
    }
}
else{
    die("Could not connect to database becose:".mysqli_error($con));
}
?>