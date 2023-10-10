<?php
// Connexion à la base de données et récupération du nombre de centres
// Remplacez les valeurs ci-dessous par vos propres informations de base de données
include '../../../../connexion/connexion.php';

// Effectuez ici la requête pour obtenir le nombre de centres
// Par exemple :
session_start();

// Récupérer les valeurs de session

$id_centre = $_SESSION['idcentre'];

$sql = "SELECT * from `prelever` WHERE etat = 3 and idcentre=$id_centre";
$result = mysqli_query($conn, $sql);
                                       
if ($result) {
    $total=0;
    while($row = mysqli_fetch_assoc($result)){

        $total=$total+1;
         
    }
   
    echo $total;
} else {
    echo "0"; // Si aucun centre n'est trouvé
}

$conn->close();
?>
