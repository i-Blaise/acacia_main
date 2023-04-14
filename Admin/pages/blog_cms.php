<?php
require_once('../BlogClassLibraries/MainClass.php');
$mainPlug = new mainClass();
$uploadStatus = 'none';


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
  <!-- WYSIWYG Editor  -->
  <script src="../vendors/tinymce/tinymce/tinymce.min.js" referrerpolicy="origin"></script>
  <script>
    tinymce.init({
      selector: 'textarea#default-editor',
      plugins: 'code'
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
  // print_r($uploadStatus);
  // die();
}
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

        <form method="POST" action="" enctype="multipart/form-data">
          <div class="row">


            <div class="col-md-12 grid-margin">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Checkbox Controls</h4>
                  <p class="card-description">Checkbox and radio controls (default appearance is in primary color)</p>
                    <div class="row">
                      <div class="col-md-6">
                        <div class="form-group">

                          <div class="form-check form-check-primary">
                            <label class="form-check-label">
                              <input type="radio" class="form-check-input" name="radio" value="video"  id="video_radio" onclick="selectMedia()">
                              Video
                            </label>
                          </div>

                          <div class="form-check form-check-primary">
                            <label class="form-check-label">
                              <input type="radio" class="form-check-input" name="radio" value="slider"  id="slider_radio" onclick="selectMedia()">
                              Corousel
                            </label>
                          </div>
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group">
                          <div class="form-check form-check-primary">
                            <label class="form-check-label">
                              <input type="radio" class="form-check-input" name="radio" value="single" id="single_radio" onclick="selectMedia()">
                              Single Image
                            </label>
                          </div>
                        </div>
                      </div>
                    </div>
                  <!-- </form> -->
                </div>
              </div>
            </div>



            <div class="col-md-12 grid-margin">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Preview Image</h4>
                  <!-- <p class="card-description">
                  Preview Image
                  </p> -->

                  <div class="row">
                </div>
                    <div class="form-group">
                      <div class="mb-3">
                      <label for="formFile" class="form-label">Preview Image</label>
                      <input class="form-control" type="file" id="preview_input" name="preview_img">
                      </div>
                      <p style="color:red">Slide should be above 800 x 500 dimension</p>
                    </div>
                </div>
              </div>
            </div>

            

            <div class="col-md-6 grid-margin">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Video Link</h4>
                  <h5 style="color: red; font-weight: 700;" class="video_disabled_text">Disabled</h5>
                  <p class="card-description">
                    Video
                  </p>

                  <div class="row">
                </div>
                  <!-- <form class="forms-sample" method="POST" action="" enctype="multipart/form-data"> -->
                    <div class="form-group">
                    <div class="form-group">
                      <label for="exampleInputUsername1">Video Link</label>
                      <input type="text" class="form-control" id="video_input" name="video_link" required disabled>
                    </div>
                      <p style="color:red">Slide should be above 800 x 500 dimension</p>
                    </div>
                    <!-- <button type="submit" class="btn btn-primary mr-2" id="video_submit_btn" name="homepage_section1" disabled>Submit</button>
                    <button class="btn btn-light">Cancel</button>
                  </form> -->
                </div>
              </div>
            </div>



            <div class="col-md-6 grid-margin">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Single Image</h4>
                  <h5 style="color: red; font-weight: 700;" class="single_disabled_text">Disabled</h5>
                  <p class="card-description">
                    Single Image
                  </p>

                  <div class="row">
                </div>
                  <!-- <form class="forms-sample" method="POST" action="" enctype="multipart/form-data"> -->
                    <div class="form-group">
                      <div class="mb-3">
                      <label for="formFile" class="form-label">Single Image</label>
                      <input class="form-control" type="file" id="single_input" name="single_img" disabled>
                      </div>
                      <p style="color:red">Slide should be above 800 x 500 dimension</p>
                    </div>
                    <!-- <button type="submit" class="btn btn-primary mr-2" id="single_submit_btn" name="homepage_section1" disabled>Submit</button>
                    <button class="btn btn-light">Cancel</button>
                  </form> -->
                </div>
              </div>
            </div>





            <div class="col-md-6 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Carousel</h4>
                  <h5 style="color: red; font-weight: 700;" class="carousel_disabled_text">Disabled</h5>
                  <p class="card-description">
                    Up to 6 Images
                  </p>

                  <div class="row">
                </div>
                  <!-- <form class="forms-sample" method="POST" action="" enctype="multipart/form-data"> -->
                    <div class="form-group">
                      <div class="mb-3">
                      <label for="formFile" class="form-label">Upload Image Slide 1</label>
                      <input class="form-control" type="file" id="slider_input1" name="slider-img1" disabled>
                      </div>
                      <div class="mb-3">
                      <label for="formFile" class="form-label">Upload Image Slide 2</label>
                      <input class="form-control" type="file" id="slider_input2" name="slider-img2" disabled>
                      </div>
                      <div class="mb-3">
                      <label for="formFile" class="form-label">Upload Image Slide 3</label>
                      <input class="form-control" type="file" id="slider_input3" name="slider-img3" disabled>
                      </div>
                      <div class="mb-3">
                      <label for="formFile" class="form-label">Upload Image Slide 4</label>
                      <input class="form-control" type="file" id="slider_input4" name="slider-img4" disabled>
                      </div>
                      <div class="mb-3">
                      <label for="formFile" class="form-label">Upload Image Slide 5</label>
                      <input class="form-control" type="file" id="slider_input5" name="slider-img5" disabled>
                      </div>
                      <p style="color:red">Slide should be above 800 x 500 dimension</p>
                    </div>
                    <!-- <button type="submit" class="btn btn-primary mr-2" id="slider_submit_btn" name="homepage_section1" disabled>Submit</button>
                    <button class="btn btn-light">Cancel</button>
                  </form> -->
                </div>
              </div>
            </div>


            <div class="col-md-6 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Blog form</h4>
                  <p class="card-description">
                    Blog
                  </p>
                  <!-- <form class="forms-sample"> -->
                    <div class="form-group">
                      <label for="exampleInputUsername1">Title</label>
                      <input type="text" class="form-control" name="blog_title" id="exampleInputUsername1" required>
                      <input type="hidden" class="form-control" name="unique_code" value="<?php echo uniqid('aca_blog'); ?>" id="exampleInputUsername1" required>
                    </div>
                    <div class="form-group">
                      <label>Blog</label>
                        <textarea class="form-control" id="default-editor" rows="4" name="blog_body" required> </textarea>
                    </div>

                </div>
              </div>
            </div>



        </div>
        <div class="btn_style">
        <button type="submit" class="btn btn-primary mr-2" id="final_submit" name="blog_submit" disabled>Submit</button>
        <button class="btn btn-light">Cancel</button>
      </div>
      </form>
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

function notification() {
  var status = $('#status').text(); 
  // alert(status);
    if(status == 'good'){
      toastr.options.positionClass = 'toast-top-center';
      toastr.options.closeButton = true;
      toastr.options.progressBar = true;
      toastr.options.timeOut = 30000;
      toastr.success('Blog Added', 'Success');
      die();
    }else if(status == 'ext_err'){
      toastr.options.positionClass = 'toast-top-center';
      toastr.options.closeButton = true;
      toastr.options.progressBar = true;
      toastr.options.timeOut = 30000;
      toastr.error('Please check file extemsion acceptable extensions are: jpg, jpeg and png', 'Invalid File');
      die();
    }else if(status == 'size_err'){
      toastr.options.positionClass = 'toast-top-center';
      toastr.options.closeButton = true;
      toastr.options.progressBar = true;
      toastr.options.timeOut = 30000;
      toastr.error('All files must be less than 1MB', 'Invalid File');
      die();
    }else if(status == 'dimension_err'){
      toastr.options.positionClass = 'toast-top-center';
      toastr.options.closeButton = true;
      toastr.options.progressBar = true;
      toastr.options.timeOut = 30000;
      toastr.error('Dimensions can be between 800x500 and 1920x1080', 'Invalid File');
      die();
    }

    var slide_no = status.slice(-1);
    var slider_status = status.slice(0, -1);
    if(slider_status == 'ext_err'){
      toastr.options.positionClass = 'toast-top-center';
      toastr.options.closeButton = true;
      toastr.options.progressBar = true;
      toastr.options.timeOut = 30000;
      toastr.error('Please check file extemsion acceptable extensions are: jpg, jpeg and png', 'Invalid File On Slide '+slide_no);
    }else if(slider_status == 'size_err'){
      toastr.options.positionClass = 'toast-top-center';
      toastr.options.closeButton = true;
      toastr.options.progressBar = true;
      toastr.options.timeOut = 30000;
      toastr.error('All files must be less than 1MB', 'Invalid File On Slide '+slide_no);
    }else if(slider_status == 'dimension_err'){
      toastr.options.positionClass = 'toast-top-center';
      toastr.options.closeButton = true;
      toastr.options.progressBar = true;
      toastr.options.timeOut = 30000;
      toastr.error('Dimensions can be between 800x500 and 1920x1080', 'Invalid File On Slide '+slide_no);
    }
  }
</script>




<script>
  function selectMedia() {
  // alert('hi');
  if(document.getElementById('video_radio').checked) {
    // TEXT 
    $('.video_disabled_text').addClass("text_disable"); 
    $('.carousel_disabled_text').removeClass("text_disable");
    $('.single_disabled_text').removeClass("text_disable");

    // INPUT 
    $('#video_input').removeAttr("disabled");
    $('#single_input').prop('disabled', true);
    $('#slider_input1').prop('disabled', true);
    $('#slider_input2').prop('disabled', true);
    $('#slider_input3').prop('disabled', true);
    $('#slider_input4').prop('disabled', true);
    $('#slider_input5').prop('disabled', true);

    // BUTTON 
    $('#final_submit').removeAttr("disabled");
    $('#slider_submit_btn').prop('disabled', true);
    $('#single_submit_btn').prop('disabled', true);

}else if(document.getElementById('slider_radio').checked) {
    // TEXT 
    $('.carousel_disabled_text').addClass("text_disable"); 
    $('.video_disabled_text').removeClass("text_disable");
    $('.single_disabled_text').removeClass("text_disable");

    // INPUT 
    $('#slider_submit_btn').removeAttr("disabled");
    $('#single_input').prop('disabled', false);
    $('#slider_input1').prop('disabled', false);
    $('#slider_input2').prop('disabled', false);
    $('#slider_input3').prop('disabled', false);
    $('#slider_input4').prop('disabled', false);
    $('#slider_input5').prop('disabled', false);
    $('#video_input').prop('disabled', true);
    $('#single_input').prop('disabled', true);

    // BUTTON 
    $('#final_submit').removeAttr("disabled");
    $('#slider_submit_btn').removeAttr("disabled");
    $('#video_submit_btn').prop('disabled', true);
    $('#single_submit_btn').prop('disabled', true);
}else if(document.getElementById('single_radio').checked) {
    // TEXT 
    $('.single_disabled_text').addClass("text_disable");
    $('.video_disabled_text').removeClass("text_disable");
    $('.carousel_disabled_text').removeClass("text_disable");

    // INPUT 
    $('#single_input').removeAttr("disabled");
    $('#single_input').prop('disabled', false);
    $('#slider_input1').prop('disabled', true);
    $('#slider_input2').prop('disabled', true);
    $('#slider_input3').prop('disabled', true);
    $('#slider_input4').prop('disabled', true);
    $('#slider_input5').prop('disabled', true);
    $('#video_input').prop('disabled', true);

    // BUTTON 
    $('#final_submit').removeAttr("disabled");
    $('#single_submit_btn').removeAttr("disabled");
    $('#video_submit_btn').prop('disabled', true);
    $('#slider_submit_btn').prop('disabled', true);
}
  }


</script>

</html>
