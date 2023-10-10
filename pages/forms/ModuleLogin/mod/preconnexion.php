
<?php
include '../../../../connexion/connexion.php';


if (isset($_POST['submit'])) {
    $code = $_POST['code'];
    $id = $_GET['mod'];
//    $code = password_hash($_POST['code'], PASSWORD_DEFAULT); // Crypter le mot de passe
    $confcode = $_POST['confcode'];
if ($code==$confcode)
{
    $code = md5($code);
        // Requête de mise à jour
$sql = "UPDATE `utilisateur` SET code = '$code',preconnexion=1 WHERE id =$id";
$result = mysqli_query($conn, $sql);



    if (!$result) {
        die("Could not connect to database because:" . mysqli_error($conn));
    }
}

}
?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title></title>
    <!-- plugins:css -->
    <link rel="stylesheet" href="../../../../assets/vendors/mdi/css/materialdesignicons.min.css">
    <link rel="stylesheet" href="../../../../assets/vendors/css/vendor.bundle.base.css">
    <!-- endinject -->
    <!-- Plugin css for this page -->
    <!-- End plugin css for this page -->
    <!-- inject:css -->
    <!-- endinject -->
    <!-- Layout styles -->
    <link rel="stylesheet" href="../../../../assets/css/style.css">
    <!-- End layout styles -->
    <link rel="shortcut icon" href="../../../../assets/images/favicon.png" />
    <style>
        .floating-button {
            position: fixed;
            top: 20px;
            right: 20px;
        }

        .btn {
            background-color: #007bff;
            color: #fff;
            border: none;
            padding: 10px 20px;
            border-radius: 5px;
            cursor: pointer;
        }

        .menu {
            display: none;
            position: absolute;
            top: 40px;
            right: 0;
            background-color: #fff;
            padding: 10px;
            border-radius: 5px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.3);
        }

        .menu li {
            list-style: none;
            margin-bottom: 10px;
        }

        .floating-button:hover .menu {
            display: block;
        }
    </style>
</head>

<body>

    <div class="container-scroller">
        <div class="container-fluid page-body-wrapper full-page-wrapper">
            <div class="floating-button">
                <div class="col-3 col-sm-2 col-xl-2 pl-0 text-center">
                    <span>
                        <a href="<?php $param = "Dashbord.php";
                                    echo "../../../../index.php?root=" . $param . ""; ?>" class="btn btn-outline-light btn-rounded get-started-btn">Tableau de Bord</a>

                    </span>
                </div>
                <div id="monElement">Contenu initial</div>
            
                ?>

            </div>

            <div class="row w-100 m-0">
                <div class="content-wrapper full-page-wrapper d-flex align-items-center auth login-bg">
                    <div class="card col-lg-4 mx-auto">
                        <div class="card-body px-5 py-5">
                            <h3 class="card-title text-left mb-3">Preconnexion</h3>
                            <p>Merci de renseigner votre mot de passe personnel en remplacement du mot de passe par défaut.</p> <form method="POST">

                                <div class="form-group">
                                    <label>Mot de passe</label>
                                    <input type="password" class="form-control p_input" name='code' >
                                </div>
                                
                             
           
                                <div class="form-group">
                                    <label>Confirmation</label>
                                    <input type="password" class="form-control " name='confcode' ">
                                </div>
                             
                         
                               

                                <div class="text-center">
                                    <button type="submit" class="btn btn-primary btn-block enter-btn" name='submit'>Valider</button>
                                </div>


                            </form>
                        </div>
                    </div>
                </div>
                <!-- content-wrapper ends -->
            </div>
            <!-- row ends -->
        </div>
        <!-- page-body-wrapper ends -->
    </div>
    <!-- container-scroller -->
    <!-- plugins:js -->
    <script src="../../../../assets/vendors/js/vendor.bundle.base.js"></script>
    <!-- endinject -->
    <!-- Plugin js for this page -->
    <!-- End plugin js for this page -->
    <!-- inject:js -->
    <SCript>
        // Fonction pour mettre à jour le champ libellé
        // Fonction pour mettre à jour le champ libellé
        function updateLibelle() {
            // Création d'une instance de l'objet XMLHttpRequest
            var xhr = new XMLHttpRequest();

            // Configuration de la requête AJAX
            xhr.open('GET', 'TEMPREEL/TEMPSREEL.php', true);

            // Gestionnaire d'événement pour la réponse de la requête AJAX
            xhr.onload = function() {
                if (xhr.status === 200) {
                    // Mise à jour du champ libellé avec la réponse de la requête
                    document.getElementById('libelle').textContent = xhr.responseText;
                }
            };

            // Envoi de la requête AJAX
            xhr.send();
        }

        // Appeler la fonction updateLibelle() au chargement de la page
        window.onload = function() {
            updateLibelle();
            // Mettre à jour le champ libellé toutes les 10 secondes
            setInterval(updateLibelle, 10000);
        };
    </SCript>


    <p>Nombre de centres : <span id="libelle"></span></p>
    <script src="../../../../assets/js/off-canvas.js">

    </script>
    <script src="../../../../assets/js/hoverable-collapse.js"></script>
    <script src="../../../../assets/js/misc.js"></script>
    <script src="../../../../assets/js/settings.js"></script>
    <script src="../../../../assets/js/todolist.js"></script>
    <!-- endinject -->
</body>

</html>