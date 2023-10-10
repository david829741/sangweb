<?PHP
include 'connexion/connexion.php';
?>
<!DOCTYPE html>
<html lang="fr">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>SangPourTous</title>
  <!-- plugins:css -->
  <link rel="stylesheet" href="assets/vendors/mdi/css/materialdesignicons.min.css">
  <link rel="stylesheet" href="assets/vendors/css/vendor.bundle.base.css">
  <!-- endinject -->
  <!-- Plugin css for this page -->
  <link rel="stylesheet" href="assets/vendors/jvectormap/jquery-jvectormap.css">
  <link rel="stylesheet" href="assets/vendors/flag-icon-css/css/flag-icon.min.css">
  <link rel="stylesheet" href="assets/vendors/owl-carousel-2/owl.carousel.min.css">
  <link rel="stylesheet" href="assets/vendors/owl-carousel-2/owl.theme.default.min.css">
  <!-- End plugin css for this page -->
  <!-- inject:css -->
  <!-- endinject -->
  <!-- Layout styles -->
  <link rel="stylesheet" href="assets/css/style.css">
  <!-- End layout styles -->
  <link rel="shortcut icon" href="assets/images/favicon.png" />

</head>

<body>
  <div class="container-scroller">
    <!-- partial -->
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
              <form class="nav-link mt-2 mt-md-0 d-none d-lg-flex search">

                <input type="text" class="form-control" placeholder="Search products">
              </form>
            </li>
          </ul>
          <ul class="navbar-nav navbar-nav-right">
           
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
                      <img src="assets/images/dashboard/Group126@2x.gif" class="gradient-corona-img img-fluid" alt="">
                    </div>
                    <div class="col-5 col-sm-7 col-xl-8 p-0">
                      <h4 class="mb-1 mb-sm-0"></h4>
                      <p class="mb-0 font-weight-normal d-none d-sm-block">Statistiques!</p>
                    </div>
                    <div class="col-3 col-sm-2 col-xl-2 pl-0 text-center">
                      <span>
                      </span>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-xl-3 col-sm-6 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <div class="row">
                    <div class="col-9">
                      <div class="d-flex align-items-center align-self-start">
                        <h3 class="mb-0" id='pot'>...</h3>
                        <p class="text-success ml-2 mb-0 font-weight-medium">+3.5%</p>
                      </div>
                    </div>
                    <div class="col-3">
                      <div class="icon icon-box-success ">
                        <span class="mdi mdi-arrow-top-right icon-item"></span>
                      </div>
                    </div>
                  </div>
                  <h6 class="text-muted font-weight-normal">Total des Donneurs Potentiels</h6>
                </div>
              </div>
            </div>
            <div class="col-xl-3 col-sm-6 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <div class="row">
                    <div class="col-9">
                      <div class="d-flex align-items-center align-self-start">


                        <h3 class="mb-0" id="eff">...</h3>


                        <p class="text-success ml-2 mb-0 font-weight-medium">+11%</p>
                      </div>
                    </div>
                    <div class="col-3">
                      <div class="icon icon-box-success">
                        <span class="mdi mdi-arrow-top-right icon-item"></span>
                      </div>
                    </div>
                  </div>
                  <h6 class="text-muted font-weight-normal">Total des Donneurs Effectifs</h6>
                </div>
              </div>
            </div>
            <div class="col-xl-3 col-sm-6 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <div class="row">
                    <div class="col-9">
                      <div class="d-flex align-items-center align-self-start">

                        <h3 class="mb-0" id="desi">...</h3>



                        <p class="text-danger ml-2 mb-0 font-weight-medium">-2.4%</p>
                      </div>
                    </div>
                    <div class="col-3">
                      <div class="icon icon-box-danger">
                        <span class="mdi mdi-arrow-bottom-left icon-item"></span>
                      </div>
                    </div>
                  </div>
                  <h6 class="text-muted font-weight-normal">Total des désistements</h6>
                </div>
              </div>
            </div>
            <div class="col-xl-3 col-sm-6 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <div class="row">
                    <div class="col-9">
                      <div class="d-flex align-items-center align-self-start">


                        <h3 class="mb-0" id="auj">...</h3>





                        <p class="text-success ml-2 mb-0 font-weight-medium">+3.5%</p>
                      </div>
                    </div>
                    <div class="col-3">
                      <div class="icon icon-box-success ">
                        <span class="mdi mdi-arrow-top-right icon-item"></span>
                      </div>
                    </div>
                  </div>
                  <h6 class="text-muted font-weight-normal">Total des donneurs prévus aujourd'hui</h6>
                </div>
              </div>
            </div>
          </div>








          <div class="row">
            <div class="col-xl-3 col-sm-6 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <div class="row">
                    <div class="col-9">
                      <div class="d-flex align-items-center align-self-start">


                      <?php
$sql = "SELECT COUNT(*) as count FROM prelever P WHERE P.etat = ? AND P.etatanalyse = ?";
$stmt = mysqli_prepare($conn, $sql);

$etat = 3;
$etatanalyse = 1;

mysqli_stmt_bind_param($stmt, "ii", $etat, $etatanalyse);
mysqli_stmt_execute($stmt);

$result = mysqli_stmt_get_result($stmt);

if ($result) {
    $totale = 0;
    while ($row = mysqli_fetch_assoc($result)) {
        $totale = $row['count'];
    }
}

echo '<h3 class="mb-0" id=>' . $totale . '</h3>';
?>






                        <p class="text-success ml-2 mb-0 font-weight-medium">+3.5%</p>
                      </div>
                    </div>
                    <div class="col-3">
                      <div class="icon icon-box-success ">
                        <span class="mdi mdi-arrow-top-right icon-item"></span>
                      </div>
                    </div>
                  </div>
                  <h6 class="text-muted font-weight-normal">Total Prelevement Analysé</h6>
                </div>
              </div>
            </div>
            <div class="col-xl-3 col-sm-6 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <div class="row">
                    <div class="col-9">
                      <div class="d-flex align-items-center align-self-start">


                      <?php
$sql = "SELECT COUNT(*) as count FROM prelever P WHERE P.etat = ? AND P.etatanalyse = ?";
$stmt = mysqli_prepare($conn, $sql);

$etat = 3;
$etatanalyse = 0;

mysqli_stmt_bind_param($stmt, "ii", $etat, $etatanalyse);
mysqli_stmt_execute($stmt);

$result = mysqli_stmt_get_result($stmt);

if ($result) {
    $totale = 0;
    while ($row = mysqli_fetch_assoc($result)) {
        $totale = $row['count'];
    }
}

echo '<h3 class="mb-0" id=>' . $totale . '</h3>';
?>



                        <p class="text-success ml-2 mb-0 font-weight-medium">+12%</p>
                      </div>
                    </div>
                    <div class="col-3">
                      <div class="icon icon-box-success">
                        <span class="mdi mdi-arrow-top-right icon-item"></span>
                      </div>
                    </div>
                  </div>
                  <h6 class="text-muted font-weight-normal">Total Prelevement non Analysé</h6>
                </div>
              </div>
            </div>
            <div class="col-xl-3 col-sm-6 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <div class="row">
                    <div class="col-9">
                      <div class="d-flex align-items-center align-self-start">

                      <?php
$sql = "SELECT COUNT(*) as count
        FROM prelever p 
        WHERE p.etat = ? AND p.etatanalyse = 1 AND NOT EXISTS (
            SELECT *
            FROM analyseeffectuer ae
            WHERE ae.idprelever = p.id
        )";

$stmt = mysqli_prepare($conn, $sql);

$etat = 3;

mysqli_stmt_bind_param($stmt, "i", $etat);
mysqli_stmt_execute($stmt);

$result = mysqli_stmt_get_result($stmt);

if ($result) {
    $totale = 0;
    while ($row = mysqli_fetch_assoc($result)) {
        $totale = $row['count'];
    }
}

echo '<h3 class="mb-0" id=>' . $totale . '</h3>';
?>




                        <p class="text-danger ml-2 mb-0 font-weight-medium">-2.4%</p>
                      </div>
                    </div>
                    <div class="col-3">
                      <div class="icon icon-box-danger">
                        <span class="mdi mdi-arrow-bottom-left icon-item"></span>
                      </div>
                    </div>
                  </div>
                  <h6 class="text-muted font-weight-normal">Total Prelevement valide</h6>
                </div>
              </div>
            </div>



            <div class="col-xl-3 col-sm-6 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <div class="row">
                    <div class="col-9">
                      <div class="d-flex align-items-center align-self-start">


                      <?php
$sql = "SELECT COUNT(*) as count
        FROM prelever p 
        WHERE p.etat = ? AND p.etatanalyse = 1 AND EXISTS (
            SELECT *
            FROM analyseeffectuer ae
            WHERE ae.idprelever = p.id
        )";

$stmt = mysqli_prepare($conn, $sql);

$etat = 3;

mysqli_stmt_bind_param($stmt, "i", $etat);
mysqli_stmt_execute($stmt);

$result = mysqli_stmt_get_result($stmt);

if ($result) {
    $totale = 0;
    while ($row = mysqli_fetch_assoc($result)) {
        $totale = $row['count'];
    }
}

echo '<h3 class="mb-0" id=>' . $totale . '</h3>';
?>





                        <p class="text-success ml-2 mb-0 font-weight-medium">+3.5%</p>
                      </div>
                    </div>
                    <div class="col-3">
                      <div class="icon icon-box-success ">
                        <span class="mdi mdi-arrow-top-right icon-item"></span>
                      </div>
                    </div>
                  </div>
                  <h6 class="text-muted font-weight-normal">Total Prelevement non valide</h6>
                </div>
              </div>
            </div>
          </div>





          <div class="row">
            <div class="col-sm-4 grid-margin">
              <div class="card">
                <div class="card-body">
                  <h5>Total participation</h5>
                  <div class="row">
                    <div class="col-8 col-sm-12 col-xl-8 my-auto">
                      <div class="d-flex d-sm-block d-md-flex align-items-center">
                      <?php
$sql = "SELECT COUNT(*) as total FROM prelever";
$result = mysqli_query($conn, $sql);

if ($result) {
    $row = mysqli_fetch_assoc($result);
    $total = $row['total'];
    echo '<h2 class="mb-0">' . $total . '</h2>';
}
?>

                        <p class="text-success ml-2 mb-0 font-weight-medium">+3.5%</p>
                      </div>
                      <h6 class="text-muted font-weight-normal">11.38% Since last month</h6>
                    </div>
                    <div class="col-4 col-sm-12 col-xl-4 text-center text-xl-right">
                      <i class="icon-lg mdi mdi-codepen text-primary ml-auto"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-sm-4 grid-margin">
              <div class="card">
                <div class="card-body">
                  <h5>Centre</h5>
                  <div class="row">
                    <div class="col-8 col-sm-12 col-xl-8 my-auto">
                      <div class="d-flex d-sm-block d-md-flex align-items-center">


                        <h2 class="mb-0" id="nombreDeCentres">...</h2>



                        <p class="text-success ml-2 mb-0 font-weight-medium">+8.3%</p>
                      </div>
                      <h6 class="text-muted font-weight-normal"> 9.61% Since last month</h6>
                    </div>
                    <div class="col-4 col-sm-12 col-xl-4 text-center text-xl-right">
                      <i class="icon-lg mdi mdi-wallet-travel text-danger ml-auto"></i>

                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-sm-4 grid-margin">
              <div class="card">
                <div class="card-body">
                  <h5>Compte</h5>
                  <div class="row">
                    <div class="col-8 col-sm-12 col-xl-8 my-auto">
                      <div class="d-flex d-sm-block d-md-flex align-items-center">
                      <?php
$sql = "SELECT COUNT(*) as total FROM utilisateur";
$result = mysqli_query($conn, $sql);

if ($result) {
    $row = mysqli_fetch_assoc($result);
    $total = $row['total'];
    echo '<h2 class="mb-0">' . $total . '</h2>';
}
?>

                        <p class="text-danger ml-2 mb-0 font-weight-medium">-2.1% </p>
                      </div>
                      <h6 class="text-muted font-weight-normal">2.27% Since last month</h6>
                    </div>
                    <div class="col-4 col-sm-12 col-xl-4 text-center text-xl-right">
                      <i class="icon-lg mdi mdi-monitor text-success ml-auto"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>

          <div class="row">
            <div class="col-md-4 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <div class="chartjs-size-monitor">
                    <div class="chartjs-size-monitor-expand">
                      <div class=""></div>
                    </div>
                    <div class="chartjs-size-monitor-shrink">
                      <div class=""></div>
                    </div>
                  </div>
                  <h4 class="card-title">
                    <font style="vertical-align: inherit;">
                      <font style="vertical-align: inherit;">Prelevement effectif par centre</font>
                    </font>
                  </h4>

                  <?php
$sql = "SELECT idcentre, COUNT(*) AS total_prelevements
        FROM prelever p
        WHERE p.etat = 3
        AND p.idcentre IN (
            SELECT DISTINCT idcentre
            FROM prelever
            ORDER BY datep DESC
        ) AND  EXISTS (
            SELECT *
            FROM centre ae
            WHERE ae.centre = p.idcentre
        ) 
        GROUP BY idcentre";

$result = mysqli_query($conn, $sql);

if ($result) {
    while ($row = mysqli_fetch_assoc($result)) {
        $id = $row['idcentre'];

        $sql2 = "SELECT * FROM centre WHERE centre=?";
        $stmt = mysqli_prepare($conn, $sql2);
        mysqli_stmt_bind_param($stmt, "s", $id);
        mysqli_stmt_execute($stmt);
        $result2 = mysqli_stmt_get_result($stmt);

        if ($result2) {
            $row2 = mysqli_fetch_assoc($result2);
            $denomination  = $row2['denomination'];
            $nbr_max  = $row2['nbr_max'];
            $localisation  = $row2['localisation'];
            $idregion  = $row2['idregion'];
        } else {
            $denomination  = "";
            $nbr_max  = "";
            $localisation  ="";
            $idregion  = "";
        }

        $total = $row['total_prelevements'];

        echo '
            <div class="bg-gray-dark d-flex d-md-block d-xl-flex flex-row py-3 px-4 px-md-3 px-xl-4 rounded mt-3">
                <div class="text-md-center text-xl-left">
                    <h6 class="mb-1"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">'.$denomination.'</font></font></h6>
                    <p class="text-muted mb-0"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Capacite: ' . $nbr_max . '<br>Localisation: ' . $localisation . '</font></font></p>
                </div>
                <div class="align-self-center flex-grow text-right text-md-center text-xl-right py-md-2 py-xl-0">
                    <h6 class="font-weight-bold mb-0"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">' . $total . '</font></font></h6>
                </div>
            </div>';
    }
}
?>



                </div>
              </div>
            </div>
            <div class="col-md-8 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <div class="d-flex flex-row justify-content-between">
                    <h4 class="card-title mb-1">
                      <font style="vertical-align: inherit;">
                        <font style="vertical-align: inherit;">Projets ouverts</font>
                      </font>
                    </h4>
                    <p class="text-muted mb-1">
                      <font style="vertical-align: inherit;">
                        <font style="vertical-align: inherit;" id='temp'></font>
                      </font>
                    </p>
                  </div>
                  <div class="row">
                    <div class="col-12">
                      <div class="preview-list">
                        <div class="preview-item border-bottom">
                          <div class="preview-thumbnail">
                            <div class="preview-icon bg-primary">
                              <i class="mdi mdi-file-document"></i>
                            </div>
                          </div>
                          <div class="preview-item-content d-sm-flex flex-grow">
                            <div class="flex-grow">
                              <h6 class="preview-subject">
                                <font style="vertical-align: inherit;">
                                  <font style="vertical-align: inherit;"><a href=<?php $param = "addcentre.php";
                                                                                  echo "index.php?root=" . $param . ""; ?>> Création de centre </a></font>
                                </font>
                              </h6>
                              <p class="text-muted mb-0">
                                <font style="vertical-align: inherit;">
                                  <font style="vertical-align: inherit;"><a href=<?php $param = "datacentre.php";
                                                                                  echo "index.php?root=" . $param . ""; ?>>Detaill centres <a></font>
                                </font>
                              </p>
                            </div>
                            <div class="mr-auto text-sm-right pt-2 pt-sm-0">
                              <p class="text-muted">
                                <font style="vertical-align: inherit;">
                                  <font style="vertical-align: inherit;"></font>
                                </font>
                              </p>
                              <p class="text-muted mb-0">
                                <font style="vertical-align: inherit;">
                                  <font style="vertical-align: inherit;"></font>
                                </font>
                              </p>
                            </div>
                          </div>
                        </div>
                        <div class="preview-item border-bottom">
                          <div class="preview-thumbnail">
                            <div class="preview-icon bg-success">
                              <i class="mdi mdi-cloud-download"></i>
                            </div>
                          </div>
                          <div class="preview-item-content d-sm-flex flex-grow">
                            <div class="flex-grow">
                              <h6 class="preview-subject">
                                <font style="vertical-align: inherit;">
                                  <font style="vertical-align: inherit;"><a href=<?php $param = "addutilisateur.php";
                                                                                  echo "index.php?root=" . $param . ""; ?>>Création d'utilisateur</a></font>
                                </font>
                              </h6>
                              <p class="text-muted mb-0">
                                <font style="vertical-align: inherit;">
                                  <font style="vertical-align: inherit;"><a href=<?php $param = "datautilisateur.php";
                                                                                  echo "index.php?root=" . $param . ""; ?>>Detaill utilisateurs <a></font>
                                </font>
                              </p>
                            </div>
                            <div class="mr-auto text-sm-right pt-2 pt-sm-0">
                              <p class="text-muted">
                                <font style="vertical-align: inherit;">
                                  <font style="vertical-align: inherit;"></font>
                                </font>
                              </p>
                              <p class="text-muted mb-0">
                                <font style="vertical-align: inherit;">
                                  <font style="vertical-align: inherit;"></font>
                                </font>
                              </p>
                            </div>
                          </div>
                        </div>
                      
                      </div>
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
                  <h4 class="card-title"></h4>
                  <div class="table-responsive">

<!-- Inclure jQuery -->
<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>

<!-- Ajouter une div pour afficher le tableau -->
<div id="table-container"></div>

<!-- Script JavaScript pour charger les données en temps réel -->
<script>
  // Fonction pour charger les données et mettre à jour le tableau
  function loadData() {
    $.ajax({
      url: 'pages/forms/Api-Autoactualisation/APIweb/tableadminauto.php', // Remplacez par le chemin de votre script PHP
      method: 'GET', // Vous pouvez également utiliser 'POST' si nécessaire
      success: function (data) {
        $('#table-container').html(data);
      },
      error: function () {
        console.error('Erreur lors du chargement des données.');
      }
    });
  }

  // Charger les données initiales lors du chargement de la page
  $(document).ready(function () {
    loadData();
  });

  // Actualiser les données toutes les 5 secondes (5000 millisecondes)
  setInterval(function () {
    loadData();
  }, 5000);
</script>



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
    

    <script src="assets/vendors/js/vendor.bundle.base.js"></script>
    <!-- endinject -->
    <!-- Plugin js for this page -->
    <script src="assets/vendors/chart.js/Chart.min.js"></script>
    <script src="assets/vendors/progressbar.js/progressbar.min.js"></script>
    <script src="assets/vendors/jvectormap/jquery-jvectormap.min.js"></script>
    <script src="assets/vendors/jvectormap/jquery-jvectormap-world-mill-en.js"></script>
    <script src="assets/vendors/owl-carousel-2/owl.carousel.min.js"></script>
    <script src="pages/forms/Api-Autoactualisation/js/centre.js"></script>
    <script src="pages/forms/Api-Autoactualisation/js/effectifs.js"></script>
    <script src="pages/forms/Api-Autoactualisation/js/Potentiels.js"></script>
    <script src="pages/forms/Api-Autoactualisation/js/desistements.js"></script>
    <script src="pages/forms/Api-Autoactualisation/js/aujourd.js"></script>
    <script src="pages/forms/Api-Autoactualisation/js/miseajour.js"></script>
    <script src="pages/forms/Api-Autoactualisation/js/testte.js"></script>
    <!-- End plugin js for this page -->
    <!-- inject:js -->
    <script src="assets/js/off-canvas.js"></script>
    <script src="assets/js/hoverable-collapse.js"></script>
    <script src="assets/js/misc.js"></script>
    <script src="assets/js/settings.js"></script>
    <script src="assets/js/todolist.js"></script>
    <!-- endinject -->
    <!-- Custom js for this page -->
    <script src="assets/js/dashboard.js"></script>
    <!-- End custom js for this page -->
</body>

</html>