
<?php
include"pages/login/root.php";


$root=$_GET['root'];
$mod = isset($_GET['mod']) ? $_GET['mod'] : '';
$suppid = isset($_GET['suppid']) ? $_GET['suppid'] : '';

if ($root==""){
    
    header('Location: ' . $page);
    
    exit;
}else
{

 
    $chemins = array(
        "adddonneurapi.php" => "pages/forms/Api-Autoactualisation/APIMobile/adddonneurapi.php",
        "centreapi.php" => "pages/forms/Api-Autoactualisation/APIMobile/centreapi.php",
        "changecentre.php" => "pages/forms/Api-Autoactualisation/APIMobile/changecentre.php",
        "miseajour.php" => "pages/forms/Api-Autoactualisation/APIMobile/miseajour.php",
        "newdonnation.php" => "pages/forms/Api-Autoactualisation/APIMobile/newdonnation.php",
        "reporogram.php" => "pages/forms/Api-Autoactualisation/APIMobile/reporogram.php",
        "aujourd.php" => "pages/forms/Api-Autoactualisation/APIweb/aujourd.php",
        "aujourd2.php" => "pages/forms/Api-Autoactualisation/APIweb/aujourd2.php",
        "centre.php" => "pages/forms/Api-Autoactualisation/APIweb/centre.php",
        "centre2.php" => "pages/forms/Api-Autoactualisation/APIweb/centre2.php",
        "desistements.php" => "pages/forms/Api-Autoactualisation/APIweb/desistements.php",
        "desistements2.php" => "pages/forms/Api-Autoactualisation/APIweb/desistements2.php",
        "effectifs.php" => "pages/forms/Api-Autoactualisation/APIweb/effectifs.php",
        "effectifs2.php" => "pages/forms/Api-Autoactualisation/APIweb/effectifs2.php",
        "participant.php" => "pages/forms/Api-Autoactualisation/APIweb/participant.php",
        "participant2.php" => "pages/forms/Api-Autoactualisation/APIweb/participant2.php",
        "Potentiels.php" => "pages/forms/Api-Autoactualisation/APIweb/Potentiels.php",
        "Potentiels2.php" => "pages/forms/Api-Autoactualisation/APIweb/Potentiels2.php",
        "table.php" => "pages/forms/Api-Autoactualisation/APIweb/table.php",
        "TEMPSREEL copy.php" => "pages/forms/Api-Autoactualisation/APIweb/TEMPSREEL copy.php",
        "TEMPSREEL.php" => "pages/forms/Api-Autoactualisation/APIweb/TEMPSREEL.php",
        "actualisation.js" => "pages/forms/Api-Autoactualisation/js/actualisation.js",
        "aujourd.js" => "pages/forms/Api-Autoactualisation/js/aujourd.js",
        "aujourd2.js" => "pages/forms/Api-Autoactualisation/js/aujourd2.js",
        "centre.js" => "pages/forms/Api-Autoactualisation/js/centre.js",
        "centre2.js" => "pages/forms/Api-Autoactualisation/js/centre2.js",
        "desistements.js" => "pages/forms/Api-Autoactualisation/js/desistements.js",
        "desistements2.js" => "pages/forms/Api-Autoactualisation/js/desistements2.js",
        "Effectifs.js" => "pages/forms/Api-Autoactualisation/js/Effectifs.js",
        "Effectifs2.js" => "pages/forms/Api-Autoactualisation/js/Effectifs2.js",
        "miseajour.js" => "pages/forms/Api-Autoactualisation/js/miseajour.js",
        "participant.js" => "pages/forms/Api-Autoactualisation/js/participant.js",
        "participant2.js" => "pages/forms/Api-Autoactualisation/js/participant2.js",
        "Potentiels.js" => "pages/forms/Api-Autoactualisation/js/Potentiels.js",
        "Potentiels2.js" => "pages/forms/Api-Autoactualisation/js/Potentiels2.js",
        "table.js" => "pages/forms/Api-Autoactualisation/js/table.js",
        "testte.js" => "pages/forms/Api-Autoactualisation/js/testte.js",
        "basic_elements.html" => "pages/forms/basic_elements.html",
        "addanalyse.php" => "pages/forms/ModuleAnalyse/add/addanalyse.php",
        "lotatester.php" => "pages/forms/ModuleAnalyse/add/lotatester.php",
        "index.php" => "pages/forms/ModuleAnalyse/index.php",
        "modresultateste.php" => "pages/forms/ModuleAnalyse/mod/modresultateste.php",
        "suppanalyse.php" => "pages/forms/ModuleAnalyse/supp/suppanalyse.php",
        "addcentre.php" => "pages/forms/ModuleDonSang/add/addcentre.php",
        "adddonneur.php" => "pages/forms/ModuleDonSang/add/adddonneur.php",
        "datacentre.php" => "pages/forms/ModuleDonSang/data/datacentre.php",
        "datadonneur.php" => "pages/forms/ModuleDonSang/data/datadonneur.php",
        "dataprelever.php" => "pages/forms/ModuleDonSang/data/dataprelever.php",
        "modecentre.php" => "pages/forms/ModuleDonSang/mod/modecentre.php",
        "update.php" => "pages/forms/ModuleDonSang/mod/update.php",
        "modeuser.php" => "pages/forms/ModuleLogin/mod/modeuser.php",
        "suppcentre.php" => "pages/forms/ModuleDonSang/supp/suppcentre.php",
        "addutilisateur.php" => "pages/forms/ModuleLogin/add/addutilisateur.php",
        "datautilisateur.php" => "pages/forms/ModuleLogin/data/datautilisateur.php",
        "datetypeutilisateur.php" => "pages/forms/ModuleLogin/data/datetypeutilisateur.php",
        "suppuser.php" => "pages/forms/ModuleLogin/supp/suppuser.php",
        "reprogrammet.php" => "pages/forms/reprogrammet.php",
        "Dashbord.php" => "Dashbord.php",
        "dashbordccentre.php" => "dashbordccentre.php",
                             
    );
    
    if (isset($chemins[$root])) {
        $chemin = $chemins[$root];
        


        // Vérifier si une valeur mod est présente dans l'URL
if (!empty($mod)) {
    // Faire quelque chose lorsque la valeur de mod est présente
    $chemin = $chemin."?mod=".$mod;
} elseif (!empty($suppid)) {
    // Vérifier si une valeur suppid est présente dans l'URL
    // Faire quelque chose lorsque la valeur de suppid est présente
    $chemin = $chemin."?suppid=".$suppid;
} 
       header("Location: $chemin");
        exit;
    } else {


        $chemin="pages/login/error-404.php";
       
        header("Location: $chemin");
    }
     
}
?>