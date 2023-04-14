<?php
require_once('../../ClassLibraries/AdminClass.php');
$adminPlug = new adminClass();


// Quizz Questions & and Options
$fetchQuestionAndOptions = $adminPlug->fetchQuestionAndOptions();

// $fetchMonthlyUsers = $adminPlug->fetchMonthlyUsers();
// echo $fetchMonthlyUsers;
// die();

if(!isset($_SESSION['log']))
{
	header('Location: ../../Login');
}else{
	$now = time(); // Checking the time now when home page starts.

	if ($now > $_SESSION['expire']) {
		session_destroy();
		header('Location: ../../Login/index.php?status=expired');
	}
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Acacia Quiz Dashboard</title>
  <!-- base:css -->
  <link rel="stylesheet" href="../../vendors/mdi/css/materialdesignicons.min.css">
  <link rel="stylesheet" href="../../vendors/feather/feather.css">
  <link rel="stylesheet" href="../../vendors/base/vendor.bundle.base.css">
  <!-- endinject -->
  <!-- plugin css for this page -->
  <link rel="stylesheet" href="../../vendors/select2/select2.min.css">
  <link rel="stylesheet" href="../../vendors/select2-bootstrap-theme/select2-bootstrap.min.css">
  <!-- End plugin css for this page -->
  <!-- inject:css -->
  <link rel="stylesheet" href="../../css/style.css">
  <!-- endinject -->
  <link rel="shortcut icon" href="../../images/acacialogo_mini.png" />

            <!-- Notification -->
    <!-- jQuery -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <!-- Toastr -->
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css">
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
</head>
    
<?php

        if(isset($_GET['status']) && $_GET['status'] == 'updated'){
          ?>

        <script type='text/javascript'>   
        $(document).ready(function() {      
        toastr.options.positionClass = "toast-top-right";
        toastr.options.closeButton = true;
        toastr.options.closeDuration = 5000;
        toastr.success('Questionnaire Updated', 'Awesome!!');
        });
        </script>

        <?php
                    // header("Refresh:10; url=questionnaire_edit.php");
                    echo "<script>         
                    setTimeout(myURL, 10000);
                    function myURL(){
                      location='questionnaire_edit.php';
                    }
                    </script>";
          }




        if(isset($_POST['submit']) && $_POST['submit'] == 'submit' && isset($_POST['id'])){
          $updateQnA = $adminPlug->updateQnA($_POST);

          // print_r($updateQnA);
          // print_r($_POST['option1_value']);
          // die();

          if($updateQnA == 'good'){
            // header("Refresh:0; url=questionnaire_edit.php?status=updated");
            echo "<script>location='questionnaire_edit.php?status=updated'</script>";
          }
        }
?>

<body>
  <div class="container-scroller">
    <!-- partial:../../partials/_navbar.html -->
    <nav class="navbar col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
      <div class="text-center navbar-brand-wrapper d-flex align-items-center justify-content-center">
        <a class="navbar-brand brand-logo" href="index.html"><img src="../../images/acacia.png" alt="logo"/></a>
        <a class="navbar-brand brand-logo-mini" href="index.html"><img src="../../images/acacialogo_mini.png" alt="logo"/></a>
      </div>
      <div class="navbar-menu-wrapper d-flex align-items-center justify-content-end">
        <button class="navbar-toggler navbar-toggler align-self-center" type="button" data-toggle="minimize">
          <span class="icon-menu"></span>
        </button>
        <ul class="navbar-nav mr-lg-2">
          <li class="nav-item nav-search d-none d-lg-block">
            <div class="input-group">
              <div class="input-group-prepend">
                <span class="input-group-text" id="search">
                  <i class="icon-search"></i>
                </span>
              </div>
              <input type="text" class="form-control" placeholder="Search Projects.." aria-label="search" aria-describedby="search">
            </div>
          </li>
        </ul>
        <ul class="navbar-nav navbar-nav-right">
                
          <li class="nav-item dropdown d-flex mr-4 ">
            <a class="nav-link count-indicator dropdown-toggle d-flex align-items-center justify-content-center" id="notificationDropdown" href="#" data-toggle="dropdown">
              <i class="icon-cog"></i>
            </a>
            <div class="dropdown-menu dropdown-menu-right navbar-dropdown preview-list" aria-labelledby="notificationDropdown">
              <!-- <p class="mb-0 font-weight-normal float-left dropdown-header">Settings</p>
              <a class="dropdown-item preview-item">               
                  <i class="icon-head"></i> Profile
              </a> -->
              <a class="dropdown-item preview-item" href="../../logout.php">
                  <i class="icon-circle-cross"></i> Logout
              </a>
            </div>
          </li>

        </ul>
        <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button" data-toggle="offcanvas">
          <span class="icon-menu"></span>
        </button>
      </div>
    </nav>
    <!-- partial -->
    <div class="container-fluid page-body-wrapper">
      <!-- partial:../../partials/_sidebar.html -->
      <nav class="sidebar sidebar-offcanvas" id="sidebar">
        <div class="user-profile">
          <div class="user-image">
            <img src="../../images/faces/dr_acacia.png">
          </div>
          <div class="user-name">
              Acacia Quiz Dashboard
          </div>
          <div class="user-designation">
              Admin
          </div>
        </div>
        <ul class="nav">
          <li class="nav-item">
            <a class="nav-link" href="../../index.php">
              <i class="icon-box menu-icon"></i>
              <span class="menu-title">Dashboard</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="../../pages/forms/questionnaire_edit.php">
              <i class="icon-file menu-icon"></i>
              <span class="menu-title">Edit Questionnaire</span>
            </a>
          </li>

          
          <li class="nav-item">
            <a class="nav-link" href="../blog_cms.php">
              <i class="icon-layout menu-icon"></i>
              <span class="menu-title">Post Blog</span>
            </a>
          </li>

          
          <li class="nav-item">
            <a class="nav-link" href="../blogs.php">
              <i class="icon-align-justify menu-icon"></i>
              <span class="menu-title">Blog List</span>
            </a>
          </li>

        </ul>
      </nav>
      <!-- partial -->
      <div class="main-panel">        
        <div class="content-wrapper">
          <div class="row">
          <?php
								while($quizzResult = mysqli_fetch_array($fetchQuestionAndOptions))
										{
                      $_SESSION['id'] = $quizzResult['id'];
              ?>
            <div class="col-md-6 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">QUESTION <?php echo $_SESSION['id']; ?></h4>
                  <p class="card-description">
                    Form layout
                  </p>
                  <form class="forms-sample" method="POST">
                    <div class="form-group">
                      <label for="exampleInputUsername1">Question</label>
                      <input type="text" class="form-control" id="exampleInputUsername1" placeholder="" value="<?php echo $quizzResult['question']; ?>" name="question">

                      <input type="text" class="form-control" id="exampleInputUsername1" placeholder="" value="<?php echo $quizzResult['id']; ?>" name="id" style="display:none;">

                    </div>
                    <div class="form-group">
                      <label for="exampleInputEmail1">Option 1</label>
                      <div class="input-group">
                        <div class="input-group-prepend">
                          <span class="input-group-text">Score:</span>
                        </div>
                        <div class="input-group-prepend">
                        <select class="btn btn-sm score-dropdown dropdown-toggle" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" name="option1_value">
                        <div class="dropdown-menu">
                          <?php
                          $show = FALSE;
                          if($quizzResult['option1_value'] == 0){?>
                            <option class="dropdown-item" value="0" selected>0</option>
                          <?php }else{ ?>
                            <option class="dropdown-item" value="0">0</option>
                          <?php } ?>

                            <?php
                          if($quizzResult['option1_value'] == 1){?>
                            <option class="dropdown-item" value="1" selected>1</option>
                          <?php }else{ ?>
                            <option class="dropdown-item" value="1">1</option>
                          <?php } ?>

                          <?php
                          if($quizzResult['option1_value'] == 2){?>
                            <option class="dropdown-item" value="2" selected>2</option>
                          <?php }else{ ?>
                            <option class="dropdown-item" value="2">2</option>
                          <?php } ?>
                        </div>
                        </select>
                      </div>
                        <input type="text" class="form-control" aria-label="Amount (to the nearest dollar)" value="<?php echo $quizzResult['option1']; ?>" name="option1">
                      </div>
                    </div>
                    <div class="form-group">
                      <label for="exampleInputPassword1">Option 2</label>
                      <div class="input-group">
                        <div class="input-group-prepend">
                          <span class="input-group-text">Score:</span>
                        </div>
                        <div class="input-group-prepend">
                        <select class="btn btn-sm score-dropdown dropdown-toggle" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" name="option2_value">
                        <div class="dropdown-menu">
                          <?php
                          $show = FALSE;
                          if($quizzResult['option2_value'] == 0){?>
                            <option class="dropdown-item" value="0" selected>0</option>
                          <?php }else{ ?>
                            <option class="dropdown-item" value="0">0</option>
                          <?php } ?>

                            <?php
                          if($quizzResult['option2_value'] == 1){?>
                            <option class="dropdown-item" value="1" selected>1</option>
                          <?php }else{ ?>
                            <option class="dropdown-item" value="1">1</option>
                          <?php } ?>

                          <?php
                          if($quizzResult['option2_value'] == 2){?>
                            <option class="dropdown-item" value="2" selected>2</option>
                          <?php }else{ ?>
                            <option class="dropdown-item" value="2">2</option>
                          <?php } ?>
                        </div>
                        </select>
                      </div>
                          <input type="text" class="form-control" aria-label="Option 3" value="<?php echo $quizzResult['option2']; ?>" name="option2">
                        </div>
                    </div>
                    <div class="form-group">
                      <label for="exampleInputConfirmPassword1">Option 3</label>
                      <div class="input-group">
                        <div class="input-group-prepend">
                          <span class="input-group-text">Score:</span>
                        </div>
                        <div class="input-group-prepend">
                        <select class="btn btn-sm score-dropdown dropdown-toggle" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" name="option3_value">
                        <div class="dropdown-menu">
                          <?php
                          $show = FALSE;
                          if($quizzResult['option3_value'] == 0){?>
                            <option class="dropdown-item" value="0" selected>0</option>
                          <?php }else{ ?>
                            <option class="dropdown-item" value="0">0</option>
                          <?php } ?>

                            <?php
                          if($quizzResult['option3_value'] == 1){?>
                            <option class="dropdown-item" value="1" selected>1</option>
                          <?php }else{ ?>
                            <option class="dropdown-item" value="1">1</option>
                          <?php } ?>

                          <?php
                          if($quizzResult['option3_value'] == 2){?>
                            <option class="dropdown-item" value="2" selected>2</option>
                          <?php }else{ ?>
                            <option class="dropdown-item" value="2">2</option>
                          <?php } ?>
                        </div>
                        </select>
                      </div>
                          <input type="text" class="form-control" aria-label="Option 3" value="<?php echo $quizzResult['option3']; ?>" name="option3">
                        </div>
                      </div>
                      <div class="form-group">
                      <label for="exampleInputConfirmPassword1">Option 4</label>
                      <div class="input-group">
                        <div class="input-group-prepend">
                          <span class="input-group-text">Score:</span>
                        </div>
                        <div class="input-group-prepend">
                        <select class="btn btn-sm score-dropdown dropdown-toggle" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" name="option4_value">
                        <div class="dropdown-menu">
                          <?php
                          $show = FALSE;
                          if($quizzResult['option4_value'] == 0){?>
                            <option class="dropdown-item" value="0" selected>0</option>
                          <?php }else{ ?>
                            <option class="dropdown-item" value="0">0</option>
                          <?php } ?>

                            <?php
                          if($quizzResult['option4_value'] == 1){?>
                            <option class="dropdown-item" value="1" selected>1</option>
                          <?php }else{ ?>
                            <option class="dropdown-item" value="1">1</option>
                          <?php } ?>

                          <?php
                          if($quizzResult['option4_value'] == 2){?>
                            <option class="dropdown-item" value="2" selected>2</option>
                          <?php }else{ ?>
                            <option class="dropdown-item" value="2">2</option>
                          <?php } ?>
                        </div>
                        </select>
                      </div>
                          <input type="text" class="form-control" aria-label="Option 3" value="<?php echo $quizzResult['option4']; ?>" name="option4">
                        </div>
                      </div>
                    <button type="submit" name="submit" value="submit" class="btn btn-primary mr-2" onclick="return confirm('Are you sure you want to update?');">Update Question <?php echo $_SESSION['id']; ?></button>
                    <button class="btn btn-light">Cancel</button>
                  </form>
                </div>
              </div>
            </div>

              <?php
                }
              ?>


          </div>
        </div>
        <!-- content-wrapper ends -->
        <!-- partial:../../partials/_footer.html -->
        <footer class="footer">
          <div class="d-sm-flex justify-content-center justify-content-sm-between">
            <span class="text-muted d-block text-center text-sm-left d-sm-inline-block">Copyright © Acacia Health Insurnce</span>
          </div>
        </footer>
        <!-- partial -->
      </div>
      <!-- main-panel ends -->
    </div>
    <!-- page-body-wrapper ends -->
  </div>
  <!-- container-scroller -->
  <!-- base:js -->
  <script src="../../vendors/base/vendor.bundle.base.js"></script>
  <!-- endinject -->
  <!-- inject:js -->
  <script src="../../js/off-canvas.js"></script>
  <script src="../../js/hoverable-collapse.js"></script>
  <script src="../../js/template.js"></script>
  <!-- endinject -->
  <!-- plugin js for this page -->
  <script src="../../vendors/typeahead.js/typeahead.bundle.min.js"></script>
  <script src="../../vendors/select2/select2.min.js"></script>
  <!-- End plugin js for this page -->
  <!-- Custom js for this page-->
  <script src="../../js/file-upload.js"></script>
  <script src="../../js/typeahead.js"></script>
  <script src="../../js/select2.js"></script>
  <!-- End custom js for this page-->
</body>

</html>
