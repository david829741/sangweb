

<?php
if (isset($_GET['mod']) && $_SERVER["REQUEST_METHOD"] == "POST") {
  $id = $_GET['id'];
    // Vérifiez si des options ont été sélectionnées
    if (isset($_POST["choix"]) && is_array($_POST["choix"])) {
        // Parcours des options sélectionnées
        foreach ($_POST["choix"] as $valeur) {
            echo "Option sélectionnée : " . $valeur . "<br>";
            // Préparer la requête d'insertion
$sql = "INSERT INTO analyseeffectuer (nom, email, tel,uniquekkey,groupe)
VALUES ('$nom', '$region', '$tel','$uniqueCode','$groupesang')";

// Exécuter la requête d'insertion
$result = mysqli_query($conn, $sql);
        }
    } else {
        echo "Aucune option sélectionnée.";
    }
}
?>


<!DOCTYPE html>
<html lang="en" >
<head>
  <meta charset="UTF-8">
  <title>CodePen - Bootstrap select with live search</title>
 <link rel='stylesheet' href='https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css'>
 <link rel="stylesheet" href="style.css">
 <style>


.select-box {
  width: 600px;
  margin: 100px auto;
}
.bs-searchbox .form-control {
background-image: url("data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABAAAAAQCAYAAAAf8/9hAAAAGXRFWHRTb2Z0d2FyZQBBZG9iZSBJbWFnZVJlYWR5ccllPAAAAyZpVFh0WE1MOmNvbS5hZG9iZS54bXAAAAAAADw/eHBhY2tldCBiZWdpbj0i77u/IiBpZD0iVzVNME1wQ2VoaUh6cmVTek5UY3prYzlkIj8+IDx4OnhtcG1ldGEgeG1sbnM6eD0iYWRvYmU6bnM6bWV0YS8iIHg6eG1wdGs9IkFkb2JlIFhNUCBDb3JlIDUuNi1jMTExIDc5LjE1ODMyNSwgMjAxNS8wOS8xMC0wMToxMDoyMCAgICAgICAgIj4gPHJkZjpSREYgeG1sbnM6cmRmPSJodHRwOi8vd3d3LnczLm9yZy8xOTk5LzAyLzIyLXJkZi1zeW50YXgtbnMjIj4gPHJkZjpEZXNjcmlwdGlvbiByZGY6YWJvdXQ9IiIgeG1sbnM6eG1wPSJodHRwOi8vbnMuYWRvYmUuY29tL3hhcC8xLjAvIiB4bWxuczp4bXBNTT0iaHR0cDovL25zLmFkb2JlLmNvbS94YXAvMS4wL21tLyIgeG1sbnM6c3RSZWY9Imh0dHA6Ly9ucy5hZG9iZS5jb20veGFwLzEuMC9zVHlwZS9SZXNvdXJjZVJlZiMiIHhtcDpDcmVhdG9yVG9vbD0iQWRvYmUgUGhvdG9zaG9wIENDIDIwMTUgKFdpbmRvd3MpIiB4bXBNTTpJbnN0YW5jZUlEPSJ4bXAuaWlkOjREMTA3MzIzRjZCODExRTg5ODU5RThGOUE5MjEzQTkxIiB4bXBNTTpEb2N1bWVudElEPSJ4bXAuZGlkOjREMTA3MzI0RjZCODExRTg5ODU5RThGOUE5MjEzQTkxIj4gPHhtcE1NOkRlcml2ZWRGcm9tIHN0UmVmOmluc3RhbmNlSUQ9InhtcC5paWQ6NEQxMDczMjFGNkI4MTFFODk4NTlFOEY5QTkyMTNBOTEiIHN0UmVmOmRvY3VtZW50SUQ9InhtcC5kaWQ6NEQxMDczMjJGNkI4MTFFODk4NTlFOEY5QTkyMTNBOTEiLz4gPC9yZGY6RGVzY3JpcHRpb24+IDwvcmRmOlJERj4gPC94OnhtcG1ldGE+IDw/eHBhY2tldCBlbmQ9InIiPz6SGakMAAABBUlEQVR42mJgQABGII4B4n1A/AGIfwDxPSCeAsTqDASAABBvBuL/QPwGiNcB8XwgPgEV+w7E0bg0MwPxVqjCZiDmR5O3AOKrUHlXbAZEQSVb8LhQGohfAvEtIOZAlzwExK+BmIuAN/OwuYIJiA2A+CAQfyNgwB4obYpuACcQv2cgDGAWcKMb8ByI9YgwQAFK30eXmAb1mwkBA1YD8U8gVkKXUIE6DxRVsjg050AtWY3L9GioAlBUFUC9pAwN8ZVQORB+B8QpuAzxBOJrSIqR8WqoK2H8VFyGsAOxCxCXA3ETECdBvcgAtfk/MYbgA6lohiRRasgnZjIMOAfET4DYEIg3AQQYAKvpRrTzVBWuAAAAAElFTkSuQmCC");
background-position: right 10px center;
background-repeat: no-repeat;
border-radius: 50px;
height: 28px;
padding: 0 10px;
border: 1px solid #ccc;
font-size: 12px;
}
</style>
</head>
<body>
<!-- partial:index.partial.html -->

<form method="post" >
<div class="select-box">

  <select class="selectpicker"  multiple="" data-live-search="true" data-live-search-placeholder="Search" tabindex="-98" name="choix[]">
  <optgroup label="Driver Groups">
            <?php
            include '../../../../connexion/connexion.php';
            $sql = "SELECT * from `analyse` ";
            $result = mysqli_query($conn, $sql);
            if ($result) {
                while ($row = mysqli_fetch_assoc($result)) {
                    $id = $row["id"];
                    $denominaion = $row["libellet"];
                   
                        echo '<option value="' . $id . '" >' . $denominaion . '</option>'
                        ;
                     
                     
                    
                }
               }
            ?>
             </optgroup>
          </select>


</div>

<input type="submit" value="Envoyer">
</form>
<!-- partial -->
  <script src='https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js'></script>
<script src='https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js'></script><script  src="./script.js"></script>

</body>
</html>
