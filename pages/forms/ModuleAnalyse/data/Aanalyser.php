<?PHP
include '../../../../connexion/connexion.php';

session_start();

// Récupérer les valeurs de session

$id_centre = $_SESSION['idcentre'];
?>
<!DOCTYPE html>
<html lang="fr">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>SangPourTous</title>
    <!-- plugins:css -->
    <link rel="stylesheet" href="../../../../assets/vendors/mdi/css/materialdesignicons.min.css">
    <link rel="stylesheet" href="../../../../assets/vendors/css/vendor.bundle.base.css">
    <!-- endinject -->
    <!-- Plugin css for this page -->
    <link rel="stylesheet" href="../../../../assets/vendors/jvectormap/jquery-jvectormap.css">
    <link rel="stylesheet" href="../../../../assets/vendors/flag-icon-css/css/flag-icon.min.css">
    <link rel="stylesheet" href="../../../../assets/vendors/owl-carousel-2/owl.carousel.min.css">
    <link rel="stylesheet" href="../../../../assets/vendors/owl-carousel-2/owl.theme.default.min.css">
    <!-- End plugin css for this page -->
    <!-- inject:css -->
    <!-- endinject -->
    <!-- Layout styles -->
    <link rel="stylesheet" href="../../../../assets/css/style.css">
    <!-- End layout styles -->
    <link rel="shortcut icon" href="../../../../assets/images/favicon.png" />
    <style>

    </style>
</head>

<body>
    <div class="container-scroller">
        <!-- partial:partials/_sidebar.html -->

        <!-- partial -->
        <div class="container-fluid page-body-wrapper">
            <!-- partial:partials/_navbar.html -->
            <div class="container-fluid page-body-wrapper">
                <!-- partial:partials/_navbar.html -->
                <nav class="navbar p-0 fixed-top d-flex flex-row">
                    <div class="navbar-brand-wrapper d-flex d-lg-none align-items-center justify-content-center">
                        <a class="navbar-brand brand-logo-mini" href="index.html"><img src="assets/images/logo-mini.svg" alt="logo" /></a>
                    </div>
                    <div class="navbar-menu-wrapper flex-grow d-flex align-items-stretch">
                        <button class="navbar-toggler navbar-toggler align-self-center" type="button" data-toggle="minimize">
                            <span class="mdi mdi-menu"></span>
                        </button>
                        <ul class="navbar-nav w-100">
                            <li class="nav-item w-100">

                            </li>
                        </ul>
                        <ul class="navbar-nav navbar-nav-right">
                            <li class="nav-item dropdown d-none d-lg-block">
                                <a class="nav-link btn btn-success create-new-button" id="createbuttonDropdown" data-toggle="dropdown" aria-expanded="false" href="#">+ </a>
                                <div class="dropdown-menu dropdown-menu-right navbar-dropdown preview-list" aria-labelledby="createbuttonDropdown">
                                    <h6 class="p-3 mb-0">Projects</h6>
                                    <div class="dropdown-divider"></div>
                                    <a class="dropdown-item preview-item" href="pages/forms/addcentre.php">
                                        <div class="preview-thumbnail">
                                            <div class="preview-icon bg-dark rounded-circle">
                                                <i class="mdi mdi-file-outline text-primary"></i>
                                            </div>
                                        </div>
                                        <div class="preview-item-content">
                                            <p class="preview-subject ellipsis mb-1">Créer un nouveau Centre</p>
                                        </div>
                                    </a>
                                    <div class="dropdown-divider"></div>
                                    <a class="dropdown-item preview-item">
                                        <div class="preview-thumbnail">
                                            <div class="preview-icon bg-dark rounded-circle">
                                                <i class="mdi mdi-web text-info"></i>
                                            </div>
                                        </div>
                                        <div class="preview-item-content">
                                            <p class="preview-subject ellipsis mb-1">Nouvel utilisateur</p>
                                        </div>
                                    </a>
                                    <div class="dropdown-divider"></div>
                                    <a class="dropdown-item preview-item">
                                        <div class="preview-thumbnail">
                                            <div class="preview-icon bg-dark rounded-circle">
                                                <i class="mdi mdi-layers text-danger"></i>
                                            </div>
                                        </div>
                                        <div class="preview-item-content">
                                            <p class="preview-subject ellipsis mb-1">liste donateur</p>
                                        </div>
                                    </a>
                                    <div class="dropdown-divider"></div>
                                    <p class="p-3 mb-0 text-center">...</p>
                                </div>
                            </li>
                            <li class="nav-item nav-settings d-none d-lg-block">
                                <a class="nav-link" href="#">
                                    <i class="mdi mdi-view-grid"></i>
                                </a>
                            </li>
                            <li class="nav-item dropdown border-left">
                                <a class="nav-link count-indicator dropdown-toggle" id="messageDropdown" href="#" data-toggle="dropdown" aria-expanded="false">
                                    <i class="mdi mdi-email"></i>
                                    <span class="count bg-success"></span>
                                </a>
                                <div class="dropdown-menu dropdown-menu-right navbar-dropdown preview-list" aria-labelledby="messageDropdown">
                                    <h6 class="p-3 mb-0">Messages</h6>
                                    <div class="dropdown-divider"></div>
                                    <a class="dropdown-item preview-item">
                                        <div class="preview-thumbnail">
                                            <img src="assets/images/faces/face4.jpg" alt="image" class="rounded-circle profile-pic">
                                        </div>
                                        <div class="preview-item-content">
                                            <p class="preview-subject ellipsis mb-1">Mark send you a message</p>
                                            <p class="text-muted mb-0"> 1 Minutes ago </p>
                                        </div>
                                    </a>
                                    <div class="dropdown-divider"></div>
                                    <a class="dropdown-item preview-item">
                                        <div class="preview-thumbnail">
                                            <img src="assets/images/faces/face2.jpg" alt="image" class="rounded-circle profile-pic">
                                        </div>
                                        <div class="preview-item-content">
                                            <p class="preview-subject ellipsis mb-1">Cregh send you a message</p>
                                            <p class="text-muted mb-0"> 15 Minutes ago </p>
                                        </div>
                                    </a>
                                    <div class="dropdown-divider"></div>
                                    <a class="dropdown-item preview-item">
                                        <div class="preview-thumbnail">
                                            <img src="assets/images/faces/face3.jpg" alt="image" class="rounded-circle profile-pic">
                                        </div>
                                        <div class="preview-item-content">
                                            <p class="preview-subject ellipsis mb-1">Profile picture updated</p>
                                            <p class="text-muted mb-0"> 18 Minutes ago </p>
                                        </div>
                                    </a>
                                    <div class="dropdown-divider"></div>
                                    <p class="p-3 mb-0 text-center">4 new messages</p>
                                </div>
                            </li>

                            <li class="nav-item dropdown">
                                <a class="nav-link" id="profileDropdown" href="#" data-toggle="dropdown">
                                    <div class="navbar-profile">
                                        <i class="mdi mdi-settings "></i>
                                        <p class="mb-0 d-none d-sm-block navbar-profile-name"></p>
                                        <i class="mdi mdi-menu-down d-none d-sm-block"></i>
                                    </div>
                                </a>
                                <div class="dropdown-menu dropdown-menu-right navbar-dropdown preview-list" aria-labelledby="profileDropdown">
                                    <h6 class="p-3 mb-0">Profile</h6>
                                    <div class="dropdown-divider"></div>

                                    <div class="dropdown-divider"></div>
                                    <a class="dropdown-item preview-item" href="index.php">
                                        <div class="preview-thumbnail">
                                            <div class="preview-icon bg-dark rounded-circle">
                                                <i class="mdi mdi-logout text-danger"></i>
                                            </div>
                                        </div>
                                        <div class="preview-item-content">
                                            <p class="preview-subject mb-1">Déconnexion</p>
                                        </div>
                                    </a>
                                    <div class="dropdown-divider"></div>
                                    <p class="p-3 mb-0 text-center">...</p>
                                </div>
                            </li>
                        </ul>
                        <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button" data-toggle="offcanvas">
                            <span class="mdi mdi-format-line-spacing"></span>
                        </button>
                    </div>
                </nav>
                <!-- partial -->
                <div class="main-panel">
                    <div class="content-wrapper">
                        <div class="row">
                            <div class="col-12 grid-margin stretch-card">
                                <div class="card corona-gradient-card">
                                    <div class="card-body py-0 px-0 px-sm-3">
                                        <div class="row align-items-center">
                                            <div class="col-4 col-sm-3 col-xl-2">
                                                <img src="../../../../assets/images/dashboard/Group126@2x.gif" class="gradient-corona-img img-fluid" alt="">
                                            </div>
                                            <div class="col-5 col-sm-7 col-xl-8 p-0">

                                                <h4 class="card-title">
                                                    <?php
                                                    if (isset($_POST['recherche'])||isset($_GET['date'])) {

                                                        if(isset($_GET['date'])&& !isset($_POST['recherche'])){
                                                            $date_jour =  $_GET['date'];
                                                        }else{    
                                                            $date_jour = $_POST['date'];
                                                       }
                                                       

                                                        if ($date_jour) {
                                                            // Convertir la date en format "jour mois année"
                                                            $date_formattee = "Analyses"." ".date('j M Y', strtotime($date_jour));
                                                            echo $date_formattee;
                                                        } else {
                                                            echo "Analyses";
                                                        }
                                                    } else {
                                                        $date_jour = date('Y-m-d');
                                                        $date_formattee = "Analyses"." ".date('j M Y', strtotime($date_jour));
                                                        echo $date_formattee;
                                                    }
                                                    ?>
                                                </h4>
                                                <p class="mb-0 font-weight-normal d-none d-sm-block"></p>
                                            </div>
                                            <div class="col-3 col-sm-2 col-xl-2 pl-0 text-center">
                                                <span>

                                                    <a href="<?php $param = "Dashbord.php";
                                                                echo "../../../../index.php?root=" . $param . ""; ?>" class="btn btn-outline-light btn-rounded get-started-btn">Tableau de Bord</a>


                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>





                 <div class="row ">
                            <div class="col-12 grid-margin">
                                <div class="card">
                                    <div class="card-body">

                                        <form class="nav-link mt-2 mt-md-0 d-none d-lg-flex search" method="post">

                                            <input type="date" class="form-control" placeholder="" name="date">

                                            <input type="submit" class="" placeholder="Search products" name="recherche">
                                        </form>
                                        <div class="table-responsive">
                                            <table class="table">
                                                <thead>
                                                    <tr>
                                                        <th></th>
                                                        <th>Code Dossier</th>
                                                        <th></th>
                                                        <th> </th>
                                                     

                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php

                                                    if (isset($_POST['recherche'])||isset($_GET['date'])) {
                                                        // Récupérer les valeurs de session
                                                        //$id_centre = $_SESSION['idcentre'];
                                                        $id_centre = 7;

                                                        // Récupérer la date du jour
                                                          if(isset($_GET['date'])&& !isset($_POST['recherche'])){$date_jour =  $_GET['date'];}else{ $date_jour = $_POST['date'];}
                                                       
                                                        //   nom	region	tel
                                                        $sql = "SELECT p.id, d.nom, d.tel ,p.datep
                                                        FROM donneur d
                                                        INNER JOIN prelever p ON d.id = p.iddonneur
                                                        WHERE p.etat = 3 AND p.datep = ? and p.idcentre=? AND P.etatanalyse	=0 ";
                                                        $stmt = mysqli_prepare($conn, $sql);
                                                        mysqli_stmt_bind_param($stmt, "si", $date_jour, $id_centre);
                                                        mysqli_stmt_execute($stmt);
                                                        $result = mysqli_stmt_get_result($stmt);
                                                        if ($result) {
                                                            $K = 1;
                                                            while ($row = mysqli_fetch_assoc($result)) {
                                                                $id = $row['id'];
                                                                $nom = $row['nom'];
                                                                //   $region=$row['region'];                                               
                                                                $tel = $row['tel'];

                                                                $nd = "DN_00000000" . $K;
                                                                echo '
                                    <tr>
                                    <td>
                                      <div class="form-check form-check-muted m-0">
                                        <label class="form-check-label">
                                        ' . $id . '
                                        </label>
                                      </div>
                                    </td>
                                    <td>' . $nd . '</td>
                                    <td><div class="badge btn-inverse-success
                                    "><a href="../analyse/Analyse.php?id=' . $id . '&date='.$date_jour.'">Editer</a></div></td> 
                                    <td><div class="badge btn-inverse-success
             "><a href="../mod/modvalidationanalyse.php?id=' . $id . '&date='.$date_jour.'">Aucun Teste Positif</a></div></td>

                                  
                                  </tr>';
                              
                                                                $K = $K + 1;
                                                            }
                                                        }
                                                    } else {

                                                        // Récupérer les valeurs de session
                                                        //$id_centre = $_SESSION['idcentre'];
                                                        $id_centre = 7;

                                                        // Récupérer la date du jour
                                                        $date_jour = date('Y-m-d');
                                                        //   nom	region	tel
                                                        $sql = "SELECT p.id, d.nom, d.tel ,p.datep
                            FROM donneur d
                            INNER JOIN prelever p ON d.id = p.iddonneur
                            WHERE p.etat = 3 AND p.datep = ? and p.idcentre=? AND P.etatanalyse	=0 ";
                                                        $stmt = mysqli_prepare($conn, $sql);
                                                        mysqli_stmt_bind_param($stmt, "si", $date_jour, $id_centre);
                                                        mysqli_stmt_execute($stmt);
                                                        $result = mysqli_stmt_get_result($stmt);

                                                        if ($result) {
                                                            $K = 1;
                                                            while ($row = mysqli_fetch_assoc($result)) {
                                                                $id = $row['id'];
                                                                $nom = $row['nom'];
                                                                //   $region=$row['region'];                                               
                                                                $tel = $row['tel'];

                                                                $nd = "DN_00000000" . $K;
                                                                echo '
                                    <tr>
                                    <td>
                                      <div class="form-check form-check-muted m-0">
                                        <label class="form-check-label">
                                        ' . $id . '
                                        </label>
                                      </div>
                                    </td>
                                    <td>' . $nd . '</td>
                                    <td>' . $tel . '</td>
                                    <td><div class="badge btn-inverse-success
             "><a href="../analyse/Analyse.php?id=' . $id . '&date='.$date_jour.'">Editer</a></div></td>
             <td><div class="badge btn-inverse-success
             "><a href="../mod/modvalidationanalyse.php?mod=' . $id . '&date='.$date_jour.'">Aucun Teste Positif</a></div></td>
                                  </tr>';

                                                                $K = $K + 1;
                                                            }
                                                        }
                                                    }
                                                    ?>
                                                    <!-- popup -->
                                                    <!-- popup -->
                                                    <tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>





                        
                 <div class="row ">
                            <div class="col-12 grid-margin">
                                <div class="card">
                                    <div class="card-body">
                                    <h4 class="card-title">
                                        Dossier  traité
                                                </h4>
                                    
                                        <div class="table-responsive">
                                            <table class="table">
                                                <thead>
                                                    <tr>
                                                        <th></th>
                                                        <th>Code Dossier</th>
                                                       
                                                        <th> </th>
                                                        <th> </th>

                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php

                                                    if (isset($_POST['recherche'])||isset($_GET['date'])) {
                                                        // Récupérer les valeurs de session
                                                        //$id_centre = $_SESSION['idcentre'];
                                                        $id_centre = 7;

                                                        // Récupérer la date du jour
                                                          if(isset($_GET['date'])&& !isset($_POST['recherche'])){
                                                              $date_jour =  $_GET['date'];
                                                          }else{
                                                              $date_jour = $_POST['date'];
                                                          }
                                                       
                                                        //   nom	region	tel
                                                        $sql = "SELECT p.id, d.nom, d.tel ,p.datep
                                                        FROM donneur d
                                                        INNER JOIN prelever p ON d.id = p.iddonneur
                                                        WHERE p.etat = 3 AND p.datep = ? and p.idcentre=? AND P.etatanalyse	=1";
                                                        $stmt = mysqli_prepare($conn, $sql);
                                                        mysqli_stmt_bind_param($stmt, "si", $date_jour, $id_centre);
                                                        mysqli_stmt_execute($stmt);
                                                        $result = mysqli_stmt_get_result($stmt);

                                                        if ($result) {
                                                            $K = 1;
                                                            while ($row = mysqli_fetch_assoc($result)) {
                                                                $id = $row['id'];
                                                                $nom = $row['nom'];
                                                                //   $region=$row['region'];                                               
                                                                $tel = $row['tel'];

                                                                $nd = "DN_00000000" . $K;
                                                                echo '
                                    <tr>
                                    <td>
                                      <div class="form-check form-check-muted m-0">
                                        <label class="form-check-label">
                                        ' . $id . '
                                        </label>
                                      </div>
                                    </td>
                                    <td>' . $nd . '</td>
                                    <td><div class="badge btn-inverse-success
                                    "><a href="../analyse/Analyse.php?id=' . $id . '&date='.$date_jour.'">Editer</a></div></td> 
                            </tr>';

                                                                $K = $K + 1;
                                                            }
                                                        }
                                                    } else {

                                                        // Récupérer les valeurs de session
                                                        //$id_centre = $_SESSION['idcentre'];
                                                        $id_centre = 7;

                                                        // Récupérer la date du jour
                                                        $date_jour = date('Y-m-d');
                                                        //   nom	region	tel
                                                        $sql = "SELECT p.id, d.nom, d.tel ,p.datep
                                                        FROM donneur d
                                                        INNER JOIN prelever p ON d.id = p.iddonneur
                                                        WHERE p.etat = 3 AND p.datep = ? and p.idcentre=? AND P.etatanalyse	=1 ";
                                                        $stmt = mysqli_prepare($conn, $sql);
                                                        mysqli_stmt_bind_param($stmt, "si", $date_jour, $id_centre);
                                                        mysqli_stmt_execute($stmt);
                                                        $result = mysqli_stmt_get_result($stmt);

                                                        if ($result) {
                                                            $K = 1;
                                                            while ($row = mysqli_fetch_assoc($result)) {
                                                                $id = $row['id'];
                                                                $nom = $row['nom'];
                                                                //   $region=$row['region'];                                               
                                                                $tel = $row['tel'];

                                                                $nd = "DN_00000000" . $K;
                                                                echo '
                                    <tr>
                                    <td>
                                      <div class="form-check form-check-muted m-0">
                                        <label class="form-check-label">
                                        ' . $id . '
                                        </label>
                                      </div>
                                    </td>
                                    <td>' . $nd . '</td>
                                   
                                    <td><div class="badge btn-inverse-success
             "><a href="../analyse/Analyse.php?id=' . $id . '&date='.$date_jour.'">Editer</a></div></td>
                                
                                  </tr>';

                                                                $K = $K + 1;
                                                            }
                                                        }
                                                    }
                                                    ?>
                                                    <!-- popup -->
                                                    <!-- popup -->
                                                    <tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- content-wrapper ends -->
                    <!-- partial:partials/_footer.html -->
                    <footer class="footer">
                        <div class="d-sm-flex justify-content-center justify-content-sm-between">
                            <span class="text-muted d-block text-center text-sm-left d-sm-inline-block"></span>
                        </div>
                    </footer>
                    <!-- partial -->
                </div>
                <!-- main-panel ends -->
            </div>
            <!-- page-body-wrapper ends -->
        </div>
        <!-- container-scroller -->
        <!-- plugins:js -->
        <script src="../../../../assets/vendors/js/vendor.bundle.base.js"></script>
        <!-- endinject -->
        <!-- Plugin js for this page -->
        <script src="../../../../assets/vendors/chart.js/Chart.min.js"></script>
        <script src="../../../../assets/vendors/progressbar.js/progressbar.min.js"></script>
        <script src="../../../../assets/vendors/jvectormap/jquery-jvectormap.min.js"></script>
        <script src="../../../../assets/vendors/jvectormap/jquery-jvectormap-world-mill-en.js"></script>
        <script src="../../../../assets/vendors/owl-carousel-2/owl.carousel.min.js"></script>
        <!-- End plugin js for this page -->
        <!-- inject:js -->
        <script src="../../../../assets/js/off-canvas.js"></script>
        <script src="../../../../assets/js/hoverable-collapse.js"></script>
        <script src="../../../../assets/js/misc.js"></script>
        <script src="../../../../assets/js/settings.js"></script>
        <script src="../../../../assets/js/todolist.js"></script>
        <!-- endinject -->
        <!-- Custom js for this page -->
        <script src="../../../../assets/js/dashboard.js"></script>
        <!-- End custom js for this page -->
</body>

</html>