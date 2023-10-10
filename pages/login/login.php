

<!DOCTYPE html>
<html lang="fr">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>SangPourTous</title>
  <!-- plugins:css -->
  <link rel="stylesheet" href="../../assets/vendors/mdi/css/materialdesignicons.min.css">
  <link rel="stylesheet" href="../../assets/vendors/css/vendor.bundle.base.css">
  <!-- endinject -->
  <!-- Plugin css for this page -->
  <!-- End plugin css for this page -->
  <!-- inject:css -->
  <!-- endinject -->
  <!-- Layout styles -->
  <link rel="stylesheet" href="../../assets/css/style.css">
  <!-- End layout styles -->
  <link rel="shortcut icon" href="../../assets/images/favicon.png" />
</head>

<body>
  <div class="container-scroller">
    <div class="container-fluid page-body-wrapper full-page-wrapper">
      <div class="row w-100 m-0">
        <div class="content-wrapper full-page-wrapper d-flex align-items-center auth login-bg">
          <div class="card col-lg-4 mx-auto">
            <div class="card-body px-5 py-5">
              <h3 class="card-title text-left mb-3">Identidication</h3>
              <?php
              include '../../connexion/connexion.php';

              if (isset($_POST['submit'])) {
                  $login = $_POST['login'];
                  $code = $_POST['code'];
    
                  // Utilisation de requêtes préparées
                  $sql = "SELECT * FROM `utilisateur` WHERE login = ?";
                  $stmt = $conn->prepare($sql);
                  $stmt->bind_param("s", $login);
                  $stmt->execute();
                  $result = $stmt->get_result();
                  if ($result) {
                      $user = $result->fetch_assoc();
                      $code = md5($code);
                      if ($user && $code==$user['code']) {
                          // Démarrer la session
                          session_start();

                          $_SESSION['login'] = $login;
                          $_SESSION['id_type_utilisateur'] = $user['id_type_utilisateur'];
                          $_SESSION['idcentre'] = $user['idcentre'];

                          $idcentre = $user['idcentre'];
                          $sqlRegion = "SELECT idregion FROM `centre` WHERE centre = ?";
                          $stmtRegion = $conn->prepare($sqlRegion);
                          $stmtRegion->bind_param("s", $idcentre);
                          $stmtRegion->execute();
                          $resultRegion = $stmtRegion->get_result();

                          if ($resultRegion) {
                              $centre = $resultRegion->fetch_assoc();
                              $_SESSION['idregion'] = $centre['idregion'];
                          } else {
                              $_SESSION['idregion'] = "";
                          }

                          if ($user['id_type_utilisateur'] == 1) {
                              header('Location:../../Dashbord.php?id=' . $user['idcentre']);
                          } elseif ($user['id_type_utilisateur'] == 2) {
                              header('Location:../../dashbordccentre.php?id=' . $user['idcentre']);
                          } else {
                              header('Location:../forms/ModuleAnalyse/data/Aanalyser.php?id=' . $user['idcentre']);
                          }
                      } else {
                          echo '<h3 class="card-title text-left mb-3">Nom d\'utilisateur ou mot de passe incorrect.</h3>';
                      }
                  } else {
                      echo '<h3 class="card-title text-left mb-3">Erreur lors de la vérification du nom d\'utilisateur.</h3>';
                  }
              }
              ?>
              <form method="POST">
                <div class="form-group">
                  <label>Nom d'utilissatateur *</label>
                  
                  <input type="text" class="form-control p_input" name='login'>
                </div>
                <div class="form-group">
                  <label>Mot de passe *</label>
                  <input type="text" class="form-control p_input" name='code'>
                </div>
                <div class="form-group d-flex align-items-center justify-content-between">
                  <!-- <div class="form-check">
                      <label class="form-check-label">
                        <input type="checkbox" class="form-check-input"> Remember me </label>
                    </div> -->
                  <a href="#" class="forgot-pass">Forgot password</a>
                </div>
                <div class="text-center">
                  <button type="submit" name="submit" class="btn btn-primary btn-block enter-btn">Login</button>
                </div>
                <!-- <div class="d-flex">
                    <button class="btn btn-facebook mr-2 col">
                      <i class="mdi mdi-facebook"></i> Facebook </button>
                    <button class="btn btn-google col">
                      <i class="mdi mdi-google-plus"></i> Google plus </button>
                  </div> -->
                <!-- <p class="sign-up">Don't have an Account?<a href="#"> Sign Up</a></p> -->
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
  <script src="../../assets/vendors/js/vendor.bundle.base.js"></script>
  <!-- endinject -->
  <!-- Plugin js for this page -->
  <!-- End plugin js for this page -->
  <!-- inject:js -->
  <script src="../../assets/js/off-canvas.js"></script>
  <script src="../../assets/js/hoverable-collapse.js"></script>
  <script src="../../assets/js/misc.js"></script>
  <script src="../../assets/js/settings.js"></script>
  <script src="../../assets/js/todolist.js"></script>
  <!-- endinject -->
</body>

</html>