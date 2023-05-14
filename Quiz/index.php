<?php
require_once('../ClassLibraries/MainClass.php');
$mainPlug = new mainClass();


if(isset($_POST['submit']) && $_POST['submit'] == 'Submit')
{
   $unique_code = 'AQA'.rand(10,9999);
   $result = $mainPlug->saveQuizzInput($_POST, $unique_code);
   if(isset($result) && $result == 'good')
   {
   // header('Location: https://ahighana.com/quiz/Results/index.php?code='.$unique_code);
   header('Location: ../Results/index.php?code='.$unique_code);
   // print_r($result);\
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
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"/>       
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/1.7/jquery.min.js"></script>
  </head>
    <body>
        <form id="msform" method="POST">
           <!-- progressbar -->
           <ul id="progressbar">
              <li>Q1</li>
              <li>Q2</li>
              <li>Q3</li>
              <li>Q4</li>
              <li>Q5</li>
              <li>Q6</li>
              <li>Q7</li>
              <li>Q8</li>
              <li>Q9</li>
           </ul>
           
           <!-- error messages -->
           <span class="fs-error"></span>
           <?php

            $loopNum = 1;
            $result = $mainPlug->fetchQuestionsAndOptions();
            $QuestionNum = mysqli_num_rows($result);
            // print_r($QuestionNum);
            // die();
            while($row = mysqli_fetch_array($result))
            {?>
           <!-- fieldsets -->
           <fieldset>
               <h2><?php echo $row['question']; ?></h2>
              <div class="row">
                 <div class="col-md-6 my-2">
                    <div class='btns'>
                       <label>
                       <input name="<?php echo $row['code']; ?>" value="<?php echo $row['option1_value']; ?>" type='radio'>
                       <span class='btn first'><?php echo $row['option1']; ?></span>
                       </label>
                    </div>
                 </div>
                 <div class="col-md-6 my-2">
                    <div class='btns'>
                       <label>
                       <input name="<?php echo $row['code']; ?>" value="<?php echo $row['option2_value']; ?>" type='radio'>
                       <span class='btn'><?php echo $row['option2']; ?></span>
                       </label>
                    </div>
                 </div>

                 <?php if(!empty($row['option3'])){ ?>
                 <div class="col-md-6 my-2">
                    <div class='btns'>
                       <label>
                       <input name="<?php echo $row['code']; ?>" value="<?php echo $row['option3_value']; ?>" type='radio'>
                       <span class='btn'><?php echo $row['option3']; ?></span>
                       </label>
                    </div>
                 </div>
                 <?php } ?>

                 <?php if(!empty($row['option4'])){ ?>
                 <div class="col-md-6 my-2">
                    <div class='btns'>
                       <label>
                       <input name="<?php echo $row['code']; ?>" value="<?php echo $row['option4_value']; ?>" type='radio'>
                       <span class='btn'><?php echo $row['option4']; ?></span>
                       </label>
                    </div>
                 </div>
                 <?php } ?>
                 
              </div>
              <?php
              if($loopNum != 1) {?>
               <input type="button" name="previous" class="previous action-button" value="&larr; Previous" />

              <?php }
                 ?>

            

            <?php
            if($loopNum == ($QuestionNum - 1)) {
            ?>
            <button class="next" type="submit" name="submit" value="Submit">SUBMIT</button>
            <?php 
            }else{?>
            <input type="button" name="next" class="next action-button" value="Next &rarr;" />
            <?php
            }
            ?>


           </fieldset>
           <?php
            $loopNum ++;
            }
            ?>
        </form>
    </body>
    <script>
        $(document).ready(function() {
          
          $(".next").click(function(q2) {
            var current_index = $(this).parent().index("fieldset");
            
            if(validateStep(current_index)){
                makeStepActive(current_index+1);
            }else{
                q2.prq2Default();
            }
          });

          $(".previous").click(function() {
            var current_index = $(this).parent().index("fieldset");
            makeStepActive(current_index - 1);
          });

         makeStepActive(0);	
         
        });
    
        function makeStepActive(index){
            var step = $("#progressbar li:eq("+index+")");
            var feildset = $("fieldset:eq("+index+")");
            if(step.length){
                $("#progressbar li").hide();
                $("fieldset").hide();
                step.show();
                feildset.slideToggle(0);
            }
        }
    
        function validateStep(step){
            switch(step){
                case 0:
                    if(($("input[name='q1']:checked").length === 0)){
                        alert('Please select an answer to proceed!');
                        return false;
                    }
                    return true;
                break;
                case 1:
                    if(($("input[name='q2']:checked").length === 0)){
                        alert('Please select an answer to proceed!');
                        return false;
                    }
                    return true;
                break;
                case 2:
                    if(($("input[name='q3']:checked").length === 0)){
                        alert('Please select an answer to proceed!');
                        return false;
                    }
                    return true;
                break;
                case 3:
                    if(($("input[name='q4']:checked").length === 0)){
                        alert('Please select an answer to proceed!');
                        return false;
                    }
                    return true;
                break;
                case 4:
                    if(($("input[name='q5']:checked").length === 0)){
                        alert('Please select an answer to proceed!');
                        return false;
                    }
                    return true;
                break;
                case 5:
                    if(($("input[name='q6']:checked").length === 0)){
                        alert('Please select an answer to proceed!');
                        return false;
                    }
                    return true;
                break;
                case 6:
                    if(($("input[name='q7']:checked").length === 0)){
                        alert('Please select an answer to proceed!');
                        return false;
                    }
                    return true;
                break;
                case 7:
                    if(($("input[name='q8']:checked").length === 0)){
                        alert('Please select an answer to proceed!');
                        return false;
                    }
                    return true;
                break;
                case 8:
                    if(($("input[name='q9']:checked").length === 0)){
                        alert('Please select an answer to proceed!');
                        return false;
                    }
                    return true;
                break;
                default:
//                   form taken out per clients request
                    var ids = ['location', 'date', 'name', 'email', 'phone'];
                    var err = [];
                    ids.forEach(function(id, i){
                        var value = $("#"+id).val();
                        if ($.trim(value).length === 0) {
                          document.getElementById(id).style.borderColor = "#E34234";
                          err.push('Please Enter Your '+id);
                        }
                    });
                    
                    if(err.length > 0){
                        $('.fs-error').html('<span style="color:red;">'+err.join('!<br>')+'</span>');
                        $('.fs-error').show();
                        return false;
                    }else{
                        return true;
                    }
            }
        }
        
    </script>
    
</html>

<!-- end snippet -->

