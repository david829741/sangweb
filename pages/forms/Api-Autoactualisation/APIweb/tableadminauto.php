<?php
include '../../../../connexion/connexion.php';

$sql = "SELECT * FROM `donneur` ORDER BY id DESC LIMIT 5"; // Limite à cinq lignes et tri par ordre décroissant

// Préparer la requête préparée
$stmt = $conn->prepare($sql);

// Vérifier si la préparation a réussi
if ($stmt) {
    // Exécution de la requête
    $stmt->execute();

    $result = $stmt->get_result();

    echo '<table class="table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nom</th>
                    <th>Téléphone</th>
                </tr>
            </thead>
            <tbody>';

    // Parcourir les résultats et les afficher dans le tableau
    while ($row = $result->fetch_assoc()) {
        $id = $row['id'];
        $nom = $row['nom'];
        $tel = $row['tel'];

        echo '
            <tr>
                <td>' . $id . '</td>
                <td>' . $nom . '</td>
                <td>' . $tel . '</td>
            </tr>';
    }

    echo '</tbody></table>';

    // Fermer le statement
    $stmt->close();
} else {
    echo "Erreur de préparation de la requête : " . $conn->error;
}

// Fermer la connexion à la base de données
$conn->close();
?>