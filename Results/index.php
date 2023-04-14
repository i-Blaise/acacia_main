<?php
require_once('../ClassLibraries/MainClass.php');
$mainPlug = new mainClass();
	// For php mailer
	require_once '../vendor/autoload.php';

if(isset($_GET['code']))
{
  // $emailSent = false;
  $unique_code = $_GET['code'];
  $result = $mainPlug->fetchAnswersWithCode($unique_code);
    $row = mysqli_fetch_array($result);
      $sumResult = $row['q1']+$row['q2']+$row['q3']+$row['q4']+$row['q5']+$row['q6']+$row['q7']+$row['q8']+$row['q9'];
      $rawResult = $sumResult/18 * 100;
      $finalResult = round($rawResult, 0);
      // $finalResult = 27;
      
  
  $resultUpdate = $mainPlug->updateResults($unique_code, $finalResult);
  if($resultUpdate != 'good')
  {
    echo 'oopsss';
    // print_r($resultUpdate);
    die();
  }
  // }else{

  //   // Send Results Email to Acacia admins
  //   $emailResults = $mainPlug->checkResultEmailed($unique_code);
  //   if ($emailResults == 'good' || $emailResults == 'email sent'){
  //     $resultEmailed = true;
  //   }else{
  //     $resultEmailed = false;
  //   }
  // }

  if(isset($finalResult) && $finalResult >= '70') {
    $scoreHeader = "You scored ".$finalResult."% Wow! You’re one healthy champ.";
    $scoreMessage = "You’re very intentional about your habits and your great results could mean you’re in good health. We admire your dedication to health and wellness. Keep it up! Follow our social media pages for more health and wellness tips.";
    $gif = "images/account-created.gif";
  
    }elseif(isset($finalResult) && $finalResult >= '50') {
    $scoreHeader = "You scored ".$finalResult."% Kudos! You’re doing well!";
    $scoreMessage = "You are off to a great start and we admire your effort. Learn more ways to improve your habits because a healthy lifestyle promotes a healthy life. Follow our social media pages for more health and wellness tips. ";
    $gif = "https://cdn.dribbble.com/users/1341046/screenshots/14019996/media/83e7d4b66d9a5d888636b19bfd79abbb.gif";
  
    } elseif(isset($finalResult) && $finalResult >= '30') {
    $scoreHeader = "You scored ".$finalResult."% Could be better!";
    $scoreMessage = "Practice more ways to ensure healthy living. Be more intentional about your lifestyle choices so you can live much healthier. Follow our social media pages for more health and wellness tips.";
    $gif = "https://cdn.dribbble.com/users/2422127/screenshots/6609950/ezgif.com-resize__5_.gif";
  
    } elseif(isset($finalResult) && $finalResult < '30') {
    $scoreHeader = "You scored ".$finalResult."% You can still make it!";
    $scoreMessage = "Did you know that your everyday habits go a long way to affect your overall health? You can improve and sustain general wellness by adapting a healthy lifestyle that suits you. Follow our social media pages for more health and wellness tips. You can do this! ";
    $gif = "https://cdn.dribbble.com/users/933425/screenshots/6475835/comp_2.gif";
    }









}
          
?>




<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" integrity="sha512-c42qTSw/wPZ3/5LBzD+Bw5f7bSF2oxou6wEb+I/lqeaKV5FDIfMvvRp772y4jcJLKuGUOpbJMdg/BTl50fJYAw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="popup.css" />

          <!-- Notification -->
    <!-- jQuery -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <!-- Toastr -->
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css">
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
    <title>Live Healthy with Acacia </title>


    <?php
  if(isset($_POST['submit']) && $_POST['submit'] == 'Send results')
  {
    if(isset($_POST['email']))
    {
      $email = $_POST['email'];

      $emailResult = "not ready";
      $emailResult = $mainPlug->sendEmail($email, $scoreHeader, $scoreMessage);
      if($emailResult == 'sent')
      {
        ?>
          <!-- Notification -->
          
  <script src="redirect_history.js"></script>
  
       <script type='text/javascript'>   
      $(document).ready(function() {      
      toastr.options.positionClass = "toast-top-right";
      toastr.options.closeButton = true;
      toastr.options.closeDuration = 300;
      toastr.success('We have emailed you your results!', 'Awesome!!');
  });
  </script>
       
         <?php
      }else{

        ?>
          <!-- Notification -->
          
  <script src="redirect_history.js"></script>
  
       <script type='text/javascript'>   
      $(document).ready(function() {      
      toastr.options.positionClass = "toast-top-right";
      toastr.options.closeButton = true;
      toastr.options.closeDuration = 300;
      toastr.error('There was an issue here, please try again later', 'Oops');
  });
  </script>
       
         <?php
        // print_r($emailResult);
        // die();
      }
    }
  }
?>



</head>
<body>
   <section id="main-wrapper">
    <div class="nav animate__animated animate__slideInDown">
        <input type="checkbox" id="nav-check">
        <div class="nav-header">
            <a class="nav-title" href="https://ahighana.com/quiz">
            <img src="images/acacia.png" alt="" width="200">
          </a>
        </div>  
        <div class="nav-btn">
          <label for="nav-check">
            <span></span>
            <span></span>
            <span></span>
          </label>
        </div>
        <div class="nav-links">
          <a href="https://ahighana.com/contact-us.php" target="_blank">Contact Us</a>
          <a href="https://ahighana.com/faq.php" target="_blank">Help Center</a>
        </div>
      </div>
       <div class="inner-wrapper">
        <div class="left-col_wrapper">        
          <h3 class="left-col_h3 animate__animated animate__lightSpeedInLeft">Your Quiz Results.</h3>
               <h2 class="left-col_h2 animate__animated animate__lightSpeedInLeft"><?php echo $scoreHeader  ?></h2>

               <div style="margin-right: 2px;">
               <p class="left-col_p animate__animated animate__lightSpeedInLeft"><?php echo $scoreMessage  ?> <br>
               <a class="social-icontext" target="_blank" href="https://web.facebook.com/acaciahealthinsurance"><img style="filter: initial;" src="images/facebook-brands.svg" alt="" width="50"></a>
               <a class="social-icontext" target="_blank" href="https://www.instagram.com/acaciahealthinsurance/"><img style="filter: initial;" src="images/instagram-brands.svg" alt="" width="50"></a>
               <a class="social-icontext" target="_blank" href="https://twitter.com/acaciahealth2?s=21"><img style="filter: initial;" src="images/twitter-brands.svg" alt="" width="50"></a>
               </p>
               </div>

               <!-- <h3 class="right-col_h3 animate__animated animate__lightSpeedInLeft" style="color: black; margin: 0;">Take a minute to ....</h3>
                <p class="center-col_p animate__animated animate__lightSpeedInLeft" style="color: black;">
                  Follow our social media pages for more information on our health policies and learn more ways to improve your lifestyle and live a healthier happier life for yourself and your loved ones.
                </p>
                <div class="social-wrapper animate__animated animate__lightSpeedInLeft" style="margin-bottom: 20px;">
                  <a class="social-icon" target="_blank" href="https://web.facebook.com/acaciahealthinsurance"><img style="filter: initial;" src="images/facebook-brands.svg" alt="" width="60"></a>
                  <a class="social-icon" target="_blank" href="https://www.instagram.com/acaciahealthinsurance/"><img style="filter: initial;" src="images/instagram-brands.svg" alt="" width="60"></a>
                  <a class="social-icon" target="_blank" href="https://twitter.com/acaciahealth2?s=21"><img style="filter: initial;" src="images/twitter-brands.svg" alt="" width="60"></a>
                </div> -->
               <img class="gif-img animate__animated animate__lightSpeedInLeft" src="<?php echo $gif  ?>" alt="" width="450">
              </div>
              <div class="right-col_wrapper animate__animated animate__slideInRight">
                <div class="container">
                <div class="row" >
                <!-- <h3 class="right-col_h3">Take a minute to ....</h3>
                <p class="center-col_p">
                  Follow our social media pages for more information on our health policies and learn more ways to improve your lifestyle and live a healthier happier life for yourself and your loved ones.
                </p>
                <div class="social-wrapper">
                  <a class="social-icon" href="https://web.facebook.com/acaciahealthinsurance"><img src="images/facebook-brands.svg" alt="" width="60"></a>
                  <a class="social-icon" href="https://www.instagram.com/acaciahealthinsurance/"><img src="images/instagram-brands.svg" alt="" width="60"></a>
                  <a class="social-icon" href="https://twitter.com/acaciahealth2?s=21"><img src="images/twitter-brands.svg" alt="" width="60"></a>
                </div> -->
                <div class="web-mess">
                  <p>To learn more about Acacia Health Insurance</p>
                  <a href="https://ahighana.com/">Click here.</a>
                </div>
                </div>
                </div>
                <!-- <h3 class="right-col_h3">Ready to see which areas of your health to improve?</h3>
                <form id="results-form" method="POST" action="">
                     <input type="email" id="email" name="email" placeholder="Enter your email">
                    <input type="submit" id="submit" name="submit" value="Send results">
                </form> -->
                <p class="c-ryt"> <span style="color:#fff; font-weight: 500;">Disclaimer :</span> The results of this quiz is not a medical proof of your health status but merely to give you a sense of how healthy your lifestyle is. Make it a point to visit a medical centre regularly for a proper health check.</p>
           </div>
       </div>
       <div class="exit-intent-popup">
        <div class="newsletter">
          <h3 class="right-col_h3">Let’s get social. </h3>
          <p class="center-col_p">
            Follow us for useful health related content tailored for the corporate worker.
          </p>
          <div class="social-wrapper">
            <a class="social-icon" href="https://web.facebook.com/acaciahealthinsurance"><img src="images/facebook-brands.svg" alt="" width="60"></a>
            <a class="social-icon" href="https://www.instagram.com/acaciahealthinsurance/"><img src="images/instagram-brands.svg" alt="" width="60"></a>
            <a class="social-icon" href="https://twitter.com/acaciahealth2?s=21"><img src="images/twitter-brands.svg" alt="" width="60"></a>
          </div>
          <div class="web-mess">
            <p>To learn more about Acacia Health Insurance</p>
            <a href="https://ahighana.com/">Click here.</a>
          </div>
            <span class="close">x</span>
        </div>
    </div>
   </section> 
   <button onclick="topFunction()" id="myBtn" title="Go to top">☝️</button>
   <!-- <a href="#top" id="back-to-top" title="Back to top" class="show"><i class="fa fa-arrow-circle-o-up" style="font-size:22px;"></i></a> -->
   <script src="CookieService.js"></script>
   <script src="popup.js"></script>
   <script>
//Get the button
var mybutton = document.getElementById("myBtn");

// When the user scrolls down 20px from the top of the document, show the button
window.onscroll = function() {scrollFunction()};

function scrollFunction() {
  if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
    mybutton.style.display = "block";
  } else {
    mybutton.style.display = "none";
  }
}

// When the user clicks on the button, scroll to the top of the document
function topFunction() {
  document.body.scrollTop = 0;
  document.documentElement.scrollTop = 0;
}
</script>
</body>
</html>