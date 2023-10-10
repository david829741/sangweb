<?php
// Connexion à la base de données
include 'connect.php';



session_start();

// Récupérer les valeurs de session

$id_centre = $_SESSION['idcentre'];
//$id_centre = 7;

// Récupérer la clé unique de la requête POST
$keyUnique = $_POST['keyunique'];
//$keyUnique = 'e80b42f9b354db7da4e5a6939bd24673';

// Rechercher l'enregistrement correspondant dans la table "donneur"
$sql = "SELECT id FROM donneur WHERE uniquekkey = '$keyUnique'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // Récupérer l'ID du donneur
    $row = $result->fetch_assoc();
    $donneurId = $row['id'];

    // Rechercher le dernier enregistrement de la table "prelever" correspondant au donneur
    $sql = "SELECT * FROM prelever WHERE iddonneur = '$donneurId' ORDER BY datep DESC LIMIT 1";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        // Modifier la date de l'enregistrement trouvé
        $row = $result->fetch_assoc();
        $preleverId = $row['id'];
        $currentDate = $row['datep'];
      
        // Proposer une date
        $nextDate = date('Y-m-d', strtotime($currentDate . ' +1 day')); // Date du jour +1
        do {
            // Comptez le nombre d'enregistrements pour la date et le centre actuellement programmer
            // Préparation de la requête pour compter le nombre d'enregistrements pour la date et le centre actuellement programmé
            $sql = "SELECT COUNT(*) as count FROM prelever WHERE datep = ? and idcentre = ?";
            $stmt = $conn->prepare($sql);
            $stmt->bind_param("si", $nextDate, $id_centre);
            $stmt->execute();
            $result2 = $stmt->get_result();
            $row2 = $result2->fetch_assoc();
            $count = $row2['count'];


            $sql = "SELECT nbr_max FROM centre WHERE centre =$id_centre";
            $result = mysqli_query($conn, $sql);
            $row3 = mysqli_fetch_assoc($result);
            $nbr_max = $row3['nbr_max'];
            // Si le nombre d'enregistrements est supérieur ou égal à nombre max contenace centre, passez au jour suivant
            if ($count >= $nbr_max || date('w', strtotime($nextDate)) == 0) {
                $nextDate = date('Y-m-d', strtotime($nextDate . ' +1 day'));
            } else {
                break;
            }
        } while (true);
// Nouvelle date à utiliser
        $sql = "UPDATE prelever SET datep = '$nextDate' WHERE id = '$preleverId'";
        if ($conn->query($sql) === TRUE) {
            echo "La date a été modifiée avec succès.";
        } else {
            echo "Erreur lors de la modification de la date : " . $conn->error;
        }
    } else {
        echo "Aucun enregistrement trouvé dans la table 'prelever' pour le donneur avec l'ID : $donneurId";
    }
} else {
    echo "Aucun enregistrement trouvé dans la table 'donneur' pour la clé unique : $keyUnique";
}

$conn->close();
?>