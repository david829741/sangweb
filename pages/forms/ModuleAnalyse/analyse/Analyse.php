

<?php
include '../../../../connexion/connexion.php';


if (isset($_GET['id']) && isset($_GET['date']) && isset($_POST['submit'])) {
    $id = $_GET['id'];
    $date = $_GET['date'];
    echo $id;

    // Vérifiez si des options ont été sélectionnées
    if (isset($_POST["choix"]) && is_array($_POST["choix"])) {
        foreach ($_POST["choix"] as $valeur) {
            echo "Option sélectionnée : " . $valeur . "<br>";

            // Vérifier si l'enregistrement existe déjà dans analyseeffectuer
            $verifSql = "SELECT idprelever FROM analyseeffectuer WHERE idprelever = '$id' AND idanalyse = '$valeur'";
            $verifResult = mysqli_query($conn, $verifSql);

            if (mysqli_num_rows($verifResult) == 0) {
                // L'enregistrement n'existe pas, effectuer l'insertion
                $insertSql = "INSERT INTO analyseeffectuer (idprelever, idanalyse, etat) VALUES ('$id', '$valeur', 1)";
                $insertResult = mysqli_query($conn, $insertSql);
            }
        }

        $sql = "UPDATE `prelever` SET `etatanalyse` = '1' WHERE `prelever`.`id` = $id";
        $result = mysqli_query($conn, $sql);
        $chemin = "../data/Aanalyser.php?date=" . $date;

        header("Location: $chemin");
    } else {
        echo "Aucune option sélectionnée.";
    }
}
?>


<!DOCTYPE html>
<html lang="fr" >
<head>
  <meta charset="UTF-8">
  <title>CodePen - Bootstrap select with live search</title>
 <link rel='stylesheet' href='https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css'>
 <link rel="stylesheet" href="style.css">
 <style>


.select-box {
  width: 20%;
  margin: 100px auto;
}

.bs-searchbox .form-control {
background-image: url("data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABAAAAAQCAYAAAAf8/9hAAAAGXRFWHRTb2Z0d2FyZQBBZG9iZSBJbWFnZVJlYWR5ccllPAAAAyZpVFh0WE1MOmNvbS5hZG9iZS54bXAAAAAAADw/eHBhY2tldCBiZWdpbj0i77u/IiBpZD0iVzVNME1wQ2VoaUh6cmVTek5UY3prYzlkIj8+IDx4OnhtcG1ldGEgeG1sbnM6eD0iYWRvYmU6bnM6bWV0YS8iIHg6eG1wdGs9IkFkb2JlIFhNUCBDb3JlIDUuNi1jMTExIDc5LjE1ODMyNSwgMjAxNS8wOS8xMC0wMToxMDoyMCAgICAgICAgIj4gPHJkZjpSREYgeG1sbnM6cmRmPSJodHRwOi8vd3d3LnczLm9yZy8xOTk5LzAyLzIyLXJkZi1zeW50YXgtbnMjIj4gPHJkZjpEZXNjcmlwdGlvbiByZGY6YWJvdXQ9IiIgeG1sbnM6eG1wPSJodHRwOi8vbnMuYWRvYmUuY29tL3hhcC8xLjAvIiB4bWxuczp4bXBNTT0iaHR0cDovL25zLmFkb2JlLmNvbS94YXAvMS4wL21tLyIgeG1sbnM6c3RSZWY9Imh0dHA6Ly9ucy5hZG9iZS5jb20veGFwLzEuMC9zVHlwZS9SZXNvdXJjZVJlZiMiIHhtcDpDcmVhdG9yVG9vbD0iQWRvYmUgUGhvdG9zaG9wIENDIDIwMTUgKFdpbmRvd3MpIiB4bXBNTTpJbnN0YW5jZUlEPSJ4bXAuaWlkOjREMTA3MzIzRjZCODExRTg5ODU5RThGOUE5MjEzQTkxIiB4bXBNTTpEb2N1bWVudElEPSJ4bXAuZGlkOjREMTA3MzI0RjZCODExRTg5ODU5RThGOUE5MjEzQTkxIj4gPHhtcE1NOkRlcml2ZWRGcm9tIHN0UmVmOmluc3RhbmNlSUQ9InhtcC5paWQ6NEQxMDczMjFGNkI4MTFFODk4NTlFOEY5QTkyMTNBOTEiIHN0UmVmOmRvY3VtZW50SUQ9InhtcC5kaWQ6NEQxMDczMjJGNkI4MTFFODk4NTlFOEY5QTkyMTNBOTEiLz4gPC9yZGY6RGVzY3JpcHRpb24+IDwvcmRmOlJERj4gPC94OnhtcG1ldGE+IDw/eHBhY2tldCBlbmQ9InIiPz6SGakMAAABBUlEQVR42mJgQABGII4B4n1A/AGIfwDxPSCeAsTqDASAABBvBuL/QPwGiNcB8XwgPgEV+w7E0bg0MwPxVqjCZiDmR5O3AOKrUHlXbAZEQSVb8LhQGohfAvEtIOZAlzwExK+BmIuAN/OwuYIJiA2A+CAQfyNgwB4obYpuACcQv2cgDGAWcKMb8ByI9YgwQAFK30eXmAb1mwkBA1YD8U8gVkKXUIE6DxRVsjg050AtWY3L9GioAlBUFUC9pAwN8ZVQORB+B8QpuAzxBOJrSIqR8WqoK2H8VFyGsAOxCxCXA3ETECdBvcgAtfk/MYbgA6lohiRRasgnZjIMOAfET4DYEIg3AQQYAKvpRrTzVBWuAAAAAElFTkSuQmCC");
background-position: right 10px center;
background-repeat: no-repeat;
border-radius: 50px;
height: 50px;
width: 100%;
padding: 0 10px;
border: 1px ;
font-size: 12px;
}
.tag {
        background-color: #007bff; /* Fond bleu */
        color: white; /* Texte blanc */
        padding: 3px 10px; /* Marge de 3px en haut et en bas, 10px à gauche et à droite */
        margin: 3px 0 3px 3px; /* Marge de 3px en haut, 0 à droite, 3px en bas, 3px à gauche */
        border-radius: 5px; /* Coins arrondis */
        display: inline-block; /* Pour que les tags apparaissent sur la même ligne */


    }

    

</style>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.14.0/css/bootstrap-select.min.css">

</head>
<body>
<!-- partial:index.partial.html -->

<form method="post" class="form-control">
<div id="selected-tags">
        <!-- Les tags sélectionnés seront affichés ici -->
    </div>
<div class="select-box" width="100%">

  <select class="selectpicker"  multiple="" data-live-search="true" data-live-search-placeholder="Search" tabindex="-98" name="choix[] " >
  <optgroup label="Driver Groups">
        <?php
include '../../../../connexion/connexion.php';

$sql = "SELECT * FROM `analyse`";
$stmt = $conn->prepare($sql);

if ($stmt) {
    // Exécution de la requête
    $stmt->execute();
    
    // Liaison des résultats
    $stmt->bind_result($id, $libellet);

    while ($stmt->fetch()) {
        echo '<option value="' . $id . '">' . $libellet . '</option>';
    }

    // Fermer le statement
    $stmt->close();
} else {
    echo "Erreur de préparation de la requête : " . $conn->error;
}

// Fermer la connexion
$conn->close();
?>
             </optgroup>
          </select>
        <input type="submit" value="valider" name="submit"> 
        <button class="btn btn-dark">Retour</button>
    

</div>


</form>


    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.14.0/js/bootstrap-select.min.js"></script>
    <script>
        $(document).ready(function () {
            // Initialiser le plugin Bootstrap Select
            $('.selectpicker').selectpicker();

            // Gérer la sélection des éléments
            $('.selectpicker').on('changed.bs.select', function (e, clickedIndex, isSelected, previousValue) {
                // Récupérer la valeur de l'option sélectionnée
                var selectedValue = $(this).find('option').eq(clickedIndex).val();
                // Récupérer le texte de l'option sélectionnée
                var selectedText = $(this).find('option').eq(clickedIndex).text();

                // Vérifier si l'élément a été sélectionné ou désélectionné
                if (isSelected) {
                    // Créer un tag et l'ajouter à la zone des tags sélectionnés
                    var tag = '<span class="tag">' + selectedText + '</span>';
                    $('#selected-tags').append(tag);
                } else {
                    // Si l'élément est désélectionné, supprimer le tag correspondant
                    $('#selected-tags .tag:contains("' + selectedText + '")').remove();
                }
            });
        });
    </script>
<!-- partial -->
  <script src='https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js'></script>
<script src='https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js'></script><script  src="./script.js"></script>

</body>
</html>
