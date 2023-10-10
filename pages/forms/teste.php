
<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Vérifiez si l'option a été sélectionnée
    if (isset($_POST["option"])) {
        $optionSelectionnee = $_POST["option"];
        echo "Vous avez sélectionné : " . $optionSelectionnee;
    } else {
        echo "Aucune option sélectionnée.";
    }
}
$sql = "SELECT p.id, d.nom, d.tel ,p.datep
FROM donneur d
INNER JOIN prelever p ON d.id = p.iddonneur
WHERE p.etat = 3 AND  p.datep = '$date_jour' and p.idcentre=$id_centre AND NOT EXISTS (
          SELECT *
          FROM analyseeffectuer ae
          WHERE ae.idprelever = p.id
            
      ) ";
?>
<!DOCTYPE html>
<html>
<head>
    <title>Exemple de formulaire avec boutons radio</title>
</head>
<body>
    <form  method="post">
        <label for="option1">Option 1</label>
        <input type="radio" name="option" id="option1" value="Option 1">
        
        <label for="option2">Option 2</label>
        <input type="radio" name="option" id="option2" value="Option 2">
        
        <label for="option3">Option 3</label>
        <input type="radio" name="option" id="option3" value="Option 3">
        
        <input type="submit" value="Valider" name="submit">
    </form>
</body>
</html>


