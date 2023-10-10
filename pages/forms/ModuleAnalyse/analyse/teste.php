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
    if (isset($_POST['recherche'])) {
        $date_jour = $_POST['date'];

        if ($date_jour) {
            // Convertir la date en format "jour mois année"
            $date_formattee = date('j M Y', strtotime($date_jour));
            echo $date_formattee;
        } else {
            echo "Analyses";
        }
    } else {
        echo "Analyses";
    }
    ?>
</h4>
                        <p class="mb-0 font-weight-normal d-none d-sm-block"></p>
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
                            <th>localisation</th>
                            <th> </th>
                            <th> </th>
                       
                          </tr>
                          </thead>
                        <tbody>
                        <?php

if (isset($_POST['recherche'])) {
                             // Récupérer les valeurs de session
//$id_centre = $_SESSION['idcentre'];
$id_centre =7;

// Récupérer la date du jour
                       $date_jour = $_POST['date'];
            //   nom	region	tel
                            $sql = "SELECT p.id, d.nom, d.tel 
                            FROM donneur d
                            INNER JOIN prelever p ON d.id = p.iddonneur
                            WHERE p.etat = 1 AND p.datep = '$date_jour' and p.idcentre=$id_centre AND NOT EXISTS (
                                      SELECT *
                                      FROM analyseeffectuer ae
                                      WHERE ae.idprelever = p.id
                                        
                                  ) ";
                            $result = mysqli_query($conn, $sql);
                            if ($result) {
                                $K=1;
                                while($row = mysqli_fetch_assoc($result)){
                                    $id=$row['id'];
                                    $nom=$row['nom'];
                                 //   $region=$row['region'];                                               
                                    $tel=$row['tel'];
                                   
                                    $nd="DN_00000000".$K;
                                    echo'
                                    <tr>
                                    <td>
                                      <div class="form-check form-check-muted m-0">
                                        <label class="form-check-label">
                                        '.$id.'
                                        </label>
                                      </div>
                                    </td>
                                    <td>' .$nd.'</td>
                                    <td><div class="badge btn-inverse-success
                                    "><a href="../analyse/Analyse.php?id='.$id.'">Editer</a></div></td> 
                                    <td><div class="badge btn-inverse-success
             "><a href="pages/forms/">Aucun Teste Positif</a></div></td>
                                  
                                  </tr>';    

                                  $K=$K+1;
                                }
                            }




}else{

// Récupérer les valeurs de session
//$id_centre = $_SESSION['idcentre'];
$id_centre =7;

// Récupérer la date du jour
                       $date_jour =date("yy-mm-dd");
            //   nom	region	tel
                            $sql = "SELECT p.id, d.nom, d.tel ,p.datep
                            FROM donneur d
                            INNER JOIN prelever p ON d.id = p.iddonneur
                            WHERE p.etat = 3 AND p.datep = '$date_jour' and p.idcentre=$id_centre AND NOT EXISTS (
                                      SELECT *
                                      FROM analyseeffectuer ae
                                      WHERE ae.idprelever = p.id
                                        
                                  ) ";
                            $result = mysqli_query($conn, $sql);

                            if ($result) {
                                $K=1;
                                while($row = mysqli_fetch_assoc($result)){
                                    $id=$row['id'];
                                    $nom=$row['nom'];
                                 //   $region=$row['region'];                                               
                                    $tel=$row['tel'];
                                   
                                    $nd="DN_00000000".$K;
                                    echo'
                                    <tr>
                                    <td>
                                      <div class="form-check form-check-muted m-0">
                                        <label class="form-check-label">
                                        '.$id.'
                                        </label>
                                      </div>
                                    </td>
                                    <td>' .$nd.'</td>
                                    <td>' .$tel.'</td>
                                    <td><div class="badge btn-inverse-success
             "><a href="pages/forms/">Valider</a></div></td>
                                  <td><div class="badge btn-inverse-success
             "><a href="">Invalider</a></div></td>  
                                  </tr>';    

                                  $K=$K+1;
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
    <script src=""></script>
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
    <script src='https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js'></script>
<script src='https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js'></script><script  src="./script.js"></script>
    <!-- End custom js for this page -->
  </body>
</html>