<?php
require_once('../BlogClassLibraries/MainClass.php');
$mainPlug = new mainClass();


if(!isset($_SESSION['log']))
{
	header('Location: ../Login');
}else{
	$now = time(); // Checking the time now when home page starts.

	if ($now > $_SESSION['expire']) {
		session_destroy();
		header('Location: ../Login/index.php?status=expired');
	}
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Acacia Blog Admin</title>
  <!-- base:css -->
  <link rel="stylesheet" href="../vendors/mdi/css/materialdesignicons.min.css">
  <link rel="stylesheet" href="../vendors/feather/feather.css">
  <link rel="stylesheet" href="../vendors/base/vendor.bundle.base.css">
  <!-- endinject -->
  <!-- plugin css for this page -->
  <link rel="stylesheet" href="../vendors/select2/select2.min.css">
  <link rel="stylesheet" href="../vendors/select2-bootstrap-theme/select2-bootstrap.min.css">
  <!-- End plugin css for this page -->
  <!-- inject:css -->
  <link rel="stylesheet" href="../css/style.css">
  <!-- endinject -->
  <link rel="shortcut icon" href="../images/acacialogo_mini.png" />
  <!-- JQuery  -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="jquery-3.6.0.min.js"></script>
  <!-- WYSIWYG Editor  -->
  <script src="../vendors/tinymce/tinymce/tinymce.min.js" referrerpolicy="origin"></script>
  <script>
    tinymce.init({
      selector: '#mytextarea'
    });
  </script>

    	<!-- Notification -->
	<!-- jQuery -->
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
	<!-- Toastr -->
	<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css">
	<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
</head>

<?php
if(isset($_POST['blog_submit']))
{
  $uploadStatus = $mainPlug->uploadBlog($_POST);
}


$blog_result = $mainPlug->fetchBlogs();

?>



<body onload="notification();">
<p id="status" style="display: none;"><?php echo $uploadStatus ?></p>
  <div class="container-scroller">
    <!-- partial:../partials/_navbar.html -->
    <nav class="navbar col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
      <div class="text-center navbar-brand-wrapper d-flex align-items-center justify-content-center">
        <a class="navbar-brand brand-logo" href="index.html"><img src="../images/acacia.png" alt="logo"/></a>
        <a class="navbar-brand brand-logo-mini" href="index.html"><img src="../images/acacialogo_mini.png" alt="logo"/></a>
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
              <a class="dropdown-item preview-item" href="../logout.php">
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
      <!-- partial:../partials/_sidebar.html -->
      <nav class="sidebar sidebar-offcanvas" id="sidebar">
        <div class="user-profile">
          <div class="user-image">
            <img src="../images/faces/dr_acacia.png">
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
            <a class="nav-link" href="../index.php">
              <i class="icon-box menu-icon"></i>
              <span class="menu-title">Dashboard</span>
            </a>
          </li>
        <li class="nav-item">
            <a class="nav-link" href="forms/questionnaire_edit.php">
              <i class="icon-box menu-icon"></i>
              <span class="menu-title">Edit Questionnaire</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="blog_cms.php">
              <i class="icon-layout menu-icon"></i>
              <span class="menu-title">Post Blog</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="blogs.php">
              <i class="icon-align-justify menu-icon"></i>
              <span class="menu-title">Blog List</span>
            </a>
          </li>
        </ul>
      </nav>
      <!-- partial -->
      <div class="main-panel">        
        <div class="content-wrapper">

        <div class="col-lg-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Blog List Table</h4>
                  <p class="card-description">
                    Uploaded Blogs
                  </p>
                  <div class="table-responsive">
                    <table class="table table-striped">
                      <thead>
                        <tr>
                          <th>
                            ID
                          </th>
                          <th>
                            Blog Title
                          </th>
                          <th>
                            Date
                          </th>
                          <th>
                            Action
                          </th>
                        </tr>
                      </thead>
                      <?php
                        $id = 0;
                        while($row = mysqli_fetch_assoc($blog_result)){
                            $date = substr_replace($row['date_added'] ,"", -9);
                          $id++;
                            ?>
                        <tbody>
                        <tr id="row<?php echo $row['id']; ?>">
                          <td class="py-1">
                          <?php echo $id; ?>
                          </td>
                          <td>
                          <?php echo $row['blog_title']; ?>
                          </td>
                          <td>
                          <?php echo $date; ?>
                          </td>
                          <td>
                            <button class="btn btn-danger" onclick="deleteBlog(<?php echo $row['id']; ?>)">Delete</button>
                          </td>
                        </tr>
                      </tbody>
                      <?php
                        }
                      ?>

                    </table>
                  </div>
                </div>
              </div>
            </div>
        <!-- content-wrapper ends -->
        <!-- partial:../partials/_footer.html -->
        <footer class="footer">
          <div class="d-sm-flex justify-content-center justify-content-sm-between">
            <span class="text-muted d-block text-center text-sm-left d-sm-inline-block">Copyright © Acacia</span>
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
  <script src="../vendors/base/vendor.bundle.base.js"></script>
  <!-- endinject -->
  <!-- inject:js -->
  <script src="../js/off-canvas.js"></script>
  <script src="../js/hoverable-collapse.js"></script>
  <script src="../js/template.js"></script>
  <!-- endinject -->
  <!-- plugin js for this page -->
  <script src="../vendors/typeahead.js/typeahead.bundle.min.js"></script>
  <script src="../vendors/select2/select2.min.js"></script>
  <!-- End plugin js for this page -->
  <!-- Custom js for this page-->
  <script src="../js/file-upload.js"></script>
  <script src="../js/typeahead.js"></script>
  <script src="../js/select2.js"></script>
  <!-- End custom js for this page-->
</body>
<script>
function deleteBlog(blogID){
  // alert(id);
    // alert($('#row'+id).val());
    // die();
    let text = "Are you sure you want to delete this Blog Post? \n This action can't be undone.";
    if (confirm(text) == true) {
    document.getElementById("row"+blogID).remove();
    var action = 'delete';
    $.get("deleteBlog.php", {blogID: blogID, action: action}, 
    function(){
        // $('#row'+voucher_code).remove();
        // toastr.options.closeButton = true;
        // toastr.options.timeOut = 50;
        // toastr.options.closeButton = true;
        // toastr.options.progressBar = true;
        // toastr.options.timeOut = 30000;
        // toastr.options.positionClass = "toast-top-left";
        toastr.options.positionClass = 'toast-top-center';
        toastr.options.closeButton = true;
        toastr.options.progressBar = true;
        toastr.options.timeOut = 30000;
        toastr.success('Blog Deleted', 'Success');
    });
  }
}
</script>


</html>
