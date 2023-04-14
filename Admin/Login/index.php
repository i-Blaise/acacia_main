<?php
require_once('../ClassLibraries/AdminClass.php');
$adminPlug = new adminClass();
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<title>Acacia Quiz Admin</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->	
	<link rel="icon" type="image/png" href="../images/acacialogo_mini.png">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/Linearicons-Free-v1.0.0/icon-font.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/animate/animate.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="vendor/css-hamburgers/hamburgers.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/animsition/css/animsition.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/select2/select2.min.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="vendor/daterangepicker/daterangepicker.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="css/util.css">
	<link rel="stylesheet" type="text/css" href="css/main.css">
<!--===============================================================================================-->




      <!-- Notification -->
	<!-- jQuery -->
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
	<!-- Toastr -->
	<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css">
	<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>

    <?php
    if(isset($_GET['status']) && $_GET['status'] == "expired")
    { 
        echo "<script type='text/javascript'>   
        $(document).ready(function() {
        toastr.options.positionClass = 'toast-top-right';
        toastr.options.closeButton = true;
        toastr.options.extendedTimeOut = 0;
        toastr.options.timeOut = 50000;
        toastr.info('Please enter your credentials to log in', 'Session Expired');
    });
    </script>";
    }
       ?>
</head>
<?php
if(isset($_POST['submit']) && $_POST['submit'] == "Submit")
{
    $username = $_POST['username'];
    $password = $_POST['admin_pass'];

	$adminCheck = $adminPlug->checkAdminCred($username, $password);
    if($adminCheck == 'good')
    {
        $_SESSION['log'] = true;
        $_SESSION['start'] = time(); // Taking now logged in time.
            // Ending a session in 30 minutes from the starting time.
		$_SESSION['expire'] = $_SESSION['start'] + (30 * 60);
		echo "<script>location='http://localhost/acacia_full_system/Admin/'</script>";
		// echo "<script>location='https://ahighana.com/quiz/Admin/'</script>";
        die();
    }else
    {
        echo "<script type='text/javascript'>   
        $(document).ready(function() {
        toastr.options.positionClass = 'toast-top-right';
        toastr.options.closeButton = true;
        toastr.options.closeDuration = 300;
        toastr.warning('Wrong Credentials', 'Warning');
    });
    </script>";
    }
}
?>
<body>
	
	<div class="limiter">
		<div class="container-login100">
			<div class="wrap-login100 p-b-160 p-t-50">
			<div class="logo">
            <a class="nav-logo" href=""><img src="../../Home/images/acacia.png" alt="" width="170"></a>
          </div>
				<form class="login100-form validate-form" method="POST">
					<span class="login100-form-title p-b-43">
						Quiz Dashboard Login
					</span>
					
					<div class="wrap-input100 rs1 validate-input" data-validate = "Username is required">
						<input class="input100" type="text" name="username">
						<span class="label-input100">Username</span>
					</div>
					
					
					<div class="wrap-input100 rs2 validate-input" data-validate="Password is required">
						<input class="input100" type="password" name="admin_pass">
						<span class="label-input100">Password</span>
					</div>

					<div class="container-login100-form-btn">
						<button class="login100-form-btn" type="submit" name="submit" value="Submit">
							Sign in
						</button>
					</div>
					
					<!-- <div class="text-center w-full p-t-23">
						<a href="#" class="txt1">
							Forgot password?
						</a>
					</div> -->
				</form>
			</div>
		</div>
	</div>
	
	

	
	
<!--===============================================================================================-->
	<script src="vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/animsition/js/animsition.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/bootstrap/js/popper.js"></script>
	<script src="vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/select2/select2.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/daterangepicker/moment.min.js"></script>
	<script src="vendor/daterangepicker/daterangepicker.js"></script>
<!--===============================================================================================-->
	<script src="vendor/countdowntime/countdowntime.js"></script>
<!--===============================================================================================-->
	<script src="js/main.js"></script>

</body>
</html>