<?php
include 'connect.php';

// Vérifier si le formulaire a été soumis
//if ($_SERVER["REQUEST_METHOD"] == "POST") {
// Cette fonction génère un code unique en utilisant une combinaison de fonctions PHP.
// Elle utilise uniqid() pour générer un identifiant unique basé sur le temps actuel en microsecondes.
// Elle utilise rand() pour générer un nombre aléatoire.
// Elle utilise microtime(true) pour obtenir le temps actuel en microsecondes.
// Enfin, elle utilise md5() pour créer un hash de 32 caractères de la chaîne résultante.
// Le code unique généré est très probablement unique, mais il est toujours recommandé de vérifier son unicité dans la base de données.

    function generateUniqueCode() {
        return md5(uniqid(rand(), true) . microtime(true));
    }
    $uniqueCode = generateUniqueCode();
    // Récupérer les valeurs soumises du formulaire
    // Récupérer les valeurs soumises du formulaire
    $nom = isset($_POST["nom"]) ? $_POST["nom"] : "teste";
    $region = isset($_POST["region"]) ? $_POST["region"] : "teste";
    $tel = isset($_POST["tel"]) ? $_POST["tel"] : "5678";
    $id_centre = isset($_POST["id_centre"]) ? $_POST["id_centre"] : "7";
    $groupesang = isset($_POST["groupesang"]) ? $_POST["groupesang"] : "INCONNU";
    // Obtenez la date actuelle
    $currentDate = date('Y-m-d');

    do {
        // Comptez le nombre d'enregistrements pour la date actuelle
        // Préparer la requête préparée
        $sql = "SELECT COUNT(*) as count FROM prelever WHERE datep = ? and idcentre = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("si", $currentDate, $id_centre);
        $stmt->execute();
        $result = $stmt->get_result();
        $row = $result->fetch_assoc();
        $count = $row['count'];

        // Préparer la requête préparée
        $sql = "SELECT nbr_max FROM centre WHERE centre = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("i", $id_centre);
        $stmt->execute();
        $result = $stmt->get_result();
        $row = $result->fetch_assoc();
        $nbr_max = $row['nbr_max'];
        // Si le nombre d'enregistrements est supérieur ou égal à nombre max contenace centre, passez au jour suivant
        if ($count >= $nbr_max || date('w', strtotime($currentDate)) == 0) {
            $currentDate = date('Y-m-d', strtotime($currentDate . ' +1 day'));
        } else {
            break;
        }
    } while (true);

    // Préparer la requête d'insertion
    // Préparer la requête préparée
    $sql = "INSERT INTO donneur (nom, region, tel,uniquekkey,groupe)VALUES (?, ?, ?, ?,?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sssss", $nom, $region, $tel, $uniqueCode,$groupesang);

    // Exécuter la requête d'insertion
    $result = $stmt->execute();

    // Vérifier si l'insertion a réussi
    if ($result) {
        echo "Insertion réussie1.";
          // Récupérer le dernier identifiant inséré

          $sql = "SELECT id FROM donneur WHERE uniquekkey = '$uniqueCode'";
          $result2 = $conn->query($sql);
          if ($result2->num_rows > 0) {
            // Récupérer l'ID du donneur
            $row = $result2->fetch_assoc();
            $last_id = $row['id'];
        }


     
          echo $last_id;

   // $sql = "INSERT INTO prelever (idcentre, iddonneur, etat, datep) VALUES ($id_centre, $last_id,1,$currentDate )";
    
    // Exécuter la requête d'insertion
 $result = mysqli_query($conn, $sql);
    // Vérifier si l'insertion a réussi
if ($result) {
    echo json_encode(array('uniqueCode' => $uniqueCode, 'date' => $currentDate));
} else {
    echo "Erreur lors de l'insertion : " . $conn->error;
}
    } else {
        echo "Erreur lors de l'insertion : " . $conn->error;
        
    }

    // Fermer la connexion
    $conn->close();
//}
?>