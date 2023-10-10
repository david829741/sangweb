			
<?php
include '../../../../connexion/connexion.php';

if (isset($_POST['submit'])) {
    $valider = 0;
    $libellet = $_POST['libellet'];
    $description = $_POST['description'];

    // Préparer la requête d'insertion avec des paramètres
    $sql = "INSERT INTO `analyse` (`libellet`, `description`) VALUES (?, ?)";
    $stmt = $conn->prepare($sql);

    // Vérifier si la préparation a réussi
    if ($stmt) {
        // Liaison des paramètres
        $stmt->bind_param("ss", $libellet, $description);

        // Exécution de la requête
        $result = $stmt->execute();

        if (!$result) {
            die("Could not connect to database because: " . $stmt->error);
        } else {
            $valider = 1;
        }

        // Fermer le statement
        $stmt->close();
    } else {
        echo "Erreur de préparation de la requête : " . $conn->error;
    }
}

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
  <link rel="stylesheet" href="../../../../assets/css/popup/style.css">
  <link rel="stylesheet" href="../../../../assets/vendors/jvectormap/jquery-jvectormap.css">
  <link rel="stylesheet" href="../../../../assets/vendors/flag-icon-css/css/flag-icon.min.css">
  <link rel="stylesheet" href="../../../../assets/vendors/owl-carousel-2/owl.carousel.min.css">
  <link rel="stylesheet" href="../../../../assets/vendors/owl-carousel-2/owl.theme.default.min.css">
  <!-- End plugin css for this page -->
  <!-- inject:css -->
  <!-- endinject -->
  <!-- Layout styles -->
  <link rel="stylesheet" href="../../../../assets/css/style.css">
  <link rel="stylesheet" href="../../../../assets/css/style.css">
  <!-- End layout styles -->
  <link rel="shortcut icon" href="../../../../assets/images/favicon.png" />

  <style>
  .container {
  cursor: pointer;
}

.container input {
  display: none;
}

.container svg {
  overflow: visible;
}

.path {
  fill: none;
  stroke: white;
  stroke-width: 6;
  stroke-linecap: round;
  stroke-linejoin: round;
  -webkit-transition: stroke-dasharray 0.5s ease, stroke-dashoffset 0.5s ease;
  transition: stroke-dasharray 0.5s ease, stroke-dashoffset 0.5s ease;
  stroke-dasharray: 241 9999999;
  stroke-dashoffset: 0;
}

.container input:checked ~ svg .path {
  stroke-dasharray: 70.5096664428711 9999999;
  stroke-dashoffset: -262.2723388671875;
}

  </style>
  
</head>

<body>
  <div class="container-scroller">
    <!-- partial:partials/_sidebar.html -->

    <!-- partial -->
    <div class="container-fluid page-body-wrapper">
      <!-- partial:partials/_navbar.html -->

      <!-- partial -->
      <div class="main-panel">
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
                        <h4 class="mb-1 mb-sm-0"></h4>
                        <p class="mb-0 font-weight-normal d-none d-sm-block">Centre Ajout</p>
                      </div>
                      <div class="col-3 col-sm-2 col-xl-2 pl-0 text-center">
                        <span>
                           <a href="<?php  $param ="Dashbord.php"  ;echo"../../../../index.php?root=".$param."";?>"  class="btn btn-outline-light btn-rounded get-started-btn">Tableau de Bord</a>
                         
                        </span>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          <form class="forms-sample" method="POST" enctype="multipart/form-data">
            <div class="content-wrapper">
              <div class="row">
                <div class="col-12 grid-margin stretch-card">
                  <div class="card">
                    <div class="card-body">
                   <!-- <button onclick="afficherPopup('success', 'Succès !', 'Votre opération a été réalisée avec succès.')">Afficher un message</button>
                    --><div class="form-group"> 
                    
                        <label for="exampleInputUsername1">Analyse</label>
                        <input name="libellet" type="text" class="form-control" id="exampleInputUsername1" >
                      </div>
                      <div class="form-group">
                        <label for="exampleInputUsername1">Description</label>
                        <input name="description" type="text" class="form-control" id="exampleInputUsername1" >
                      </div>
                      <button class="btn btn-primary mr-2" name='submit' type='submit'>Valider</button>
                      <button class="btn btn-dark">Retour</button>
                      <div class="form-group">
                        <div class="input-group col-xs-12">
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
          </form>
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
  <script>
    const fileInput = document.getElementById('file-input');
    const fileLabel = document.getElementById('file-label');

    //  fileLabel.addEventListener('click', () => {
    //      fileInput.click();
    //  });

    fileInput.addEventListener('change', () => {
      fileLabel.innerText = fileInput.files[0].name;
    });
  </script>
  <script>
    function afficherPopup(type, titre, contenu) {
  // Créer une nouvelle balise div
  const popup = document.createElement("div");
  popup.classList.add("popup");

  // Ajouter un titre à la popup
  const titreDiv = document.createElement("h2");
  titreDiv.textContent = titre;
  popup.appendChild(titreDiv);

  // Ajouter le contenu à la popup
  const contenuDiv = document.createElement("div");
  contenuDiv.textContent = contenu;
  popup.appendChild(contenuDiv);

  // Modifier le style de la popup en fonction du type de message
  if (type === "success") {
    popup.classList.add("popup-success");
  } else if (type === "error") {
    popup.classList.add("popup-error");
  }

  // Afficher la popup
  popup.style.display = "block";
  popup.style.position = "fixed";
  popup.style.top = "50%";
  popup.style.left = "50%";
  popup.style.transform = "translate(-50%, -50%)";
  popup.style.width = "300px";
  popup.style.height = "200px";
  popup.style.background = "#fff";
  popup.style.boxShadow = "0 4px 8px 0 rgba(0, 0, 0, 0.2)";

  // Ajouter la popup au DOM
  document.body.appendChild(popup);
}

  </script>
  <script src="../../../../assets/js/js.js"></script>
  <script>document.getElementById('spinner').style.display = 'none';</script>
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