<?php
require_once('../ClassLibraries/MainClass.php');
$mainPlug = new mainClass();


if(isset($_GET['code']))
{
  $code_result = $mainPlug->fetchLastUserUniqueCode();
  $uCode = mysqli_fetch_array($code_result);
  if($_GET['code'] != $uCode['unique_code'])
  {
    header('Location: https://ahighana.com/quiz/');
  }else{
    $unique_code = $_GET['code'];
  }
}else{
  header('Location: https://ahighana.com/quiz/');
}



if(isset($_POST['submit']) && $_POST['submit'] == 'Submit')
{
   $result = $mainPlug->saveBrandQuestionInput($_POST, $unique_code);
   if(isset($result) && $result == 'good')
   {
   header('Location: https://ahighana.com/quiz/Results/index.php?code='.$unique_code);
   // print_r($result);
   die();
   }else{
      // echo 'oops';
      print_r($result);
      die();
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
    <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="style.css">
    <title>Acacia Health Quizz-Cont.</title>
</head>
<body>
    <div id="svg_wrap"></div>

 <h1 id="header">You are almost done! <br> <span class="h1-child">We would like to know your take on a few brand-related questions.</span> </h1>
 <form name="healthQuizz" onsubmit="return validateForm()" method="POST">

 <?php

$result = $mainPlug->fetchFirstSurvey();
$s1 = mysqli_fetch_array($result);
?>
   <section>
     <h2 class="quiz_h2"><?php echo $s1['question']; ?></h2>
     <p class="quiz_p">Just a little more information and you are out. Thanks.</p>
     <div class="quiz_inner-wrapper">
        <input type="radio" id="sleep" name="s1" value="<?php echo $s1['option1']; ?>"/>
        <label for=""><?php echo $s1['option1']; ?></label>
     </div> 
    <div class="quiz_inner-wrapper">
        <input type="radio" id="hit" name="s1" value="<?php echo $s1['option2']; ?>" /> 
        <label for=""><?php echo $s1['option2']; ?></label>
    </div> 
   </section>
 

   <?php

$result = $mainPlug->fetchSecondSurvey();
$s2 = mysqli_fetch_array($result);
?>
   <section>
     <h2 class="quiz_h2"><?php echo $s2['question']; ?></h2>
     <div class="quiz_inner-wrapper">
        <input type="checkbox" id="behind" name="s2_option1" value="<?php echo $s2['option1']; ?>"/>
        <label for=""><?php echo $s2['option1']; ?></label>
     </div> 
    <div class="quiz_inner-wrapper">
        <input type="checkbox" id="bent" name="s2_option2" value="<?php echo $s2['option2']; ?>"  /> 
        <label for=""><?php echo $s2['option2']; ?></label>
    </div> 
    <div class="quiz_inner-wrapper">
        <input type="checkbox" id="bent" name="s2_option3" value="<?php echo $s2['option3']; ?>"  /> 
        <label for=""><?php echo $s2['option3']; ?></label>
    </div> 
    <div class="quiz_inner-wrapper">
        <input type="checkbox" id="bent" name="s2_option4" value="<?php echo $s2['option4']; ?>"  /> 
        <label for=""><?php echo $s2['option4']; ?></label>
    </div> 
    <div class="quiz_inner-wrapper">
        <label style="margin-left: 0;" for=""><?php echo $s2['option5']; ?></label>
        <input style="margin-left: 15px; height: 45px; margin-top: 0; border: 1.5px solid #683191;" type="text" id="bent" name="s2_option5" value="" placehoslder="<?php echo $s2['option5']; ?>"  /> 
    </div>
    <span style="color: #332A86; font-size: 14px; opacity: 0.5;">(tick multiple boxes that applies to you) </span> 
   </section>
 

   <?php

$result = $mainPlug->fetchThirdSurvey();
$s3 = mysqli_fetch_array($result);
?>
   <section>
    <h2 class="quiz_h2"><?php echo $s3['question']; ?>"</h2>
    <div class="quiz_inner-wrapper">
       <input type="checkbox" id="screen" name="s3_option1" value="<?php echo $s3['option1']; ?>"/>
       <label for=""><?php echo $s3['option1']; ?></label>
    </div> 
   <div class="quiz_inner-wrapper">
       <input type="checkbox" id="close" name="s3_option2" value="<?php echo $s3['option2']; ?>"  /> 
       <label for=""><?php echo $s3['option2']; ?></label>
   </div>
   <div class="quiz_inner-wrapper">
    <input type="checkbox" id="bent" name="s3_option3" value="<?php echo $s3['option3']; ?>"  /> 
    <label for=""><?php echo $s3['option3']; ?></label>
   </div>
   <span style="color: #332A86; font-size: 14px; opacity: 0.5;">(tick multiple boxes that applies to you) </span>  
  </section>
    
      <div class="button" id="prev">&larr; Previous</div>
    <div class="button" id="next">Next &rarr;</div>
    <!-- <div class="button" type="submit" id="submit" value="sumbit">Submit answers</div> -->
    <div>
       <input  class="button" id="submit" type="submit" name="submit" value="Submit">
    </div>
 </form>

</body>
<script>
    $( document ).ready(function() {
var base_color = "rgb(230,230,230)";
var active_color = "rgb(237, 40, 70)";



var child = 1;
var length = $("section").length - 1;
$("#prev").addClass("disabled");
$("#submit").addClass("disabled");

$("section").not("section:nth-of-type(1)").hide();
$("section").not("section:nth-of-type(1)").css('transform','translateX(100px)');

var svgWidth = length * 200 + 24;
$("#svg_wrap").html(
  '<svg version="1.1" id="svg_form_time" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 ' +
    svgWidth +
    ' 24" xml:space="preserve"></svg>'
);

function makeSVG(tag, attrs) {
  var el = document.createElementNS("http://www.w3.org/2000/svg", tag);
  for (var k in attrs) el.setAttribute(k, attrs[k]);
  return el;
}

for (i = 0; i < length; i++) {
  var positionX = 12 + i * 200;
  var rect = makeSVG("rect", { x: positionX, y: 9, width: 200, height: 6 });
  document.getElementById("svg_form_time").appendChild(rect);
  // <g><rect x="12" y="9" width="200" height="6"></rect></g>'
  var circle = makeSVG("circle", {
    cx: positionX,
    cy: 12,
    r: 12,
    width: positionX,
    height: 6
  });
  document.getElementById("svg_form_time").appendChild(circle);
}

var circle = makeSVG("circle", {
  cx: positionX + 200,
  cy: 12,
  r: 12,
  width: positionX,
  height: 6
});
document.getElementById("svg_form_time").appendChild(circle);

$('#svg_form_time rect').css('fill',base_color);
$('#svg_form_time circle').css('fill',base_color);
$("circle:nth-of-type(1)").css("fill", active_color);

 
$(".button").click(function () {
  $("#svg_form_time rect").css("fill", active_color);
  $("#svg_form_time circle").css("fill", active_color);
  var id = $(this).attr("id");
  if (id == "next") {
    $("#header").addClass("disabled");
    $("#prev").removeClass("disabled");
    if (child >= length) {
      $(this).addClass("disabled");
      $('#submit').removeClass("disabled");
    }
    if (child <= length) {
      child++;
    }
  } else if (id == "prev") {
    $("#next").removeClass("disabled");
    $('#submit').addClass("disabled");
    if (child <= 2) {
      $(this).addClass("disabled");
    }
    if (child > 1) {
      child--;
    }
  }
  var circle_child = child + 1;
  $("#svg_form_time rect:nth-of-type(n + " + child + ")").css(
    "fill",
    base_color
  );
  $("#svg_form_time circle:nth-of-type(n + " + circle_child + ")").css(
    "fill",
    base_color
  );
  var currentSection = $("section:nth-of-type(" + child + ")");
  currentSection.fadeIn();
  currentSection.css('transform','translateX(0)');
 currentSection.prevAll('section').css('transform','translateX(-100px)');
  currentSection.nextAll('section').css('transform','translateX(100px)');
  $('section').not(currentSection).hide();
});

});
</script>
</html>