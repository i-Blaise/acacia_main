<?php
require_once('ClassLibraries/MainClass.php');
$mainPlug = new mainClass();
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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"/>
    <link rel="stylesheet" href="Home/style.css">
    <title>Live Healthy with Acacia </title>
</head>
<?php
  if(isset($_GET)){
    $_SESSION['phoneNum'] = isset($_GET['phoneNum']) ? $_GET['phoneNum'] : NULL;
    $_SESSION['memberID']  = isset($_GET['memberID']) ? $_GET['memberID'] : NULL;
    $_SESSION['userName']  = isset($_GET['userName']) ? $_GET['userName'] : NULL;
  }
?>
<body>
   <section id="main-wrapper">
    <div class="nav">
        <input type="checkbox" id="nav-check">
        <div class="nav-header">
          <div class="nav-title">
            <a class="nav-logo" href=""><img src="Home/images/acacia.png" alt="" width="170"></a>
          </div>
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
           <div class="left-col_wrapper animate__animated animate__lightSpeedInLeft">
               <h2 class="left-col_h2">A healthy lifestyle is the start of a healthy life.</h2>
               <p class="left-col_p">Building a healthy life requires adapting healthy habits. Studies suggest that minor everyday habits can have great consequences on a person’s general health.</p>
               <p class="left-col_p">Here is a quick test to find out how healthy your lifestyle is. Let’s go!</p>
               <a class="left-col_a" href="Quiz/">Take the quiz</a>
           </div>
           <div class="right-col_wrapper">
               <div class="nav-link-pos">
                  <a href="https://ahighana.com/contact-us.php" target="_blank">Contact Us</a>
                  <a href="https://ahighana.com/faq.php" target="_blank">Help Center</a>
               </div>
               <div class="dr-acacia_wrapper "><img class="dr-acacia animate__animated animate__pulse animate__delay-1s animate__slower	3s animate__repeat-2" src="Home/images/dr_acacia 1.png" alt="" width="350"></div>
               <div class="acacia-card_wrapper"><img class="acacia-card animate__animated animate__pulse animate__delay-1s animate__slower 3s animate__repeat-2" src="Home/images/acacia-card.png" alt=""></div>
               <div class="bottom-image_wrapper"><img class="bottom-image" src="Home/images/bottom-image.png" alt=""></div>
           </div>
       </div>
   </section> 
</body>
</html>