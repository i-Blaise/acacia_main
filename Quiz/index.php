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
      echo 'oops';
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
           <!-- <fieldset>
              <h2 class="q1-type">What is your go-to work out routine</h2>
              <div class="row">
                 <div class="col-md-6 my-2">
                    <div class='btns'>
                       <label>
                       <input name="q2" type='radio'>
                       <span class='btn first'>Go hard (hiking, aerobics, jogging, running, cycling, weightlifting, etc.)</span>
                       </label>
                    </div>
                 </div>
                 <div class="col-md-6 my-2">
                    <div class='btns'>
                       <label>
                       <input name="q2" type='radio'>
                       <span class='btn'>Sweat enough (brisk walks, heavy cleaning, tennis doubles, lap swimming etc.)</span>
                       </label>
                    </div>
                 </div>
                 <div class="col-md-6 my-2">
                    <div class='btns'>
                       <label>
                       <input name="q2" type='radio'>
                       <span class='btn'>I take it easy (walking, dancing, yoga, etc.)</span>
                       </label>
                    </div>
                 </div>
                 <div class="col-md-6 my-2">
                    <div class='btns'>
                       <label>
                       <input name="q2" type='radio'>
                       <span class='btn'>Not for me. I’ll pass. </span>
                       </label>
                    </div>
                 </div>
              </div>
              <input type="button" name="previous" class="previous action-button" value="&larr; Previous" />
              <input type="button" name="next" class="next action-button" value="Next &rarr;" />
           </fieldset>
           <fieldset>
            <h2 class="q1-type">To exercise my brain, I...</h2>
            <div class="row">
               <div class="col-md-6 my-2">
                  <div class='btns'>
                     <label>
                     <input name="q3" type='radio'>
                     <span class='btn first'>Read or play lots of games, puzzles, and quizzes</span>
                     </label>
                  </div>
               </div>
               <div class="col-md-6 my-2">
                  <div class='btns'>
                     <label>
                     <input name="q3" type='radio'>
                     <span class='btn'>Listen to music and/or dance</span>
                     </label>
                  </div>
               </div>
               <div class="col-md-6 my-2">
                  <div class='btns'>
                     <label>
                     <input name="q3" type='radio'>
                     <span class='btn'>Sleep </span>
                     </label>
                  </div>
               </div>
               <div class="col-md-6 my-2">
                  <div class='btns'>
                     <label>
                     <input name="q3" type='radio'>
                     <span class='btn'>Don't intentionally exercise my brain  </span>
                     </label>
                  </div>
               </div>
            </div>
            <input type="button" name="previous" class="previous action-button" value="&larr; Previous" />
            <input type="button" name="next" class="next action-button" value="Next &rarr;" />
         </fieldset>
         <fieldset>
            <h2 class="q1-type">How many hours do you sleep in a day? </h2>
            <div class="row">
               <div class="col-md-6 my-2">
                  <div class='btns'>
                     <label>
                     <input name="q4" type='radio'>
                     <span class='btn first'>I go by the books [7-9 hours] </span>
                     </label>
                  </div>
               </div>
               <div class="col-md-6 my-2">
                  <div class='btns'>
                     <label>
                     <input name="q4" type='radio'>
                     <span class='btn'>Sleep is for the weak [less than 7 hours] </span>
                     </label>
                  </div>
               </div>
               <div class="col-md-6 my-2">
                  <div class='btns'>
                     <label>
                     <input name="q4" type='radio'>
                     <span class='btn'>Dreamland is my happy place [more than 9 hours]  </span>
                     </label>
                  </div>
               </div>
               <div class="col-md-6 my-2">
                  <div class='btns'>
                     <label>
                     <input name="q4" type='radio'>
                     <span class='btn'>Well, I am not sure; I do not keep tabs [between 6 to 10 hours]  </span>
                     </label>
                  </div>
               </div>
            </div>
            <input type="button" name="previous" class="previous action-button" value="&larr; Previous" />
            <input type="button" name="next" class="next action-button" value="Next &rarr;" />
         </fieldset>
         <fieldset>
            <h2 class="q1-type">How many meals do you eat daily?  </h2>
            <div class="row">
               <div class="col-md-6 my-2">
                  <div class='btns'>
                     <label>
                     <input name="q5" type='radio'>
                     <span class='btn first'>1-1-1. Three whole meals every day.  </span>
                     </label>
                  </div>
               </div>
               <div class="col-md-6 my-2">
                  <div class='btns'>
                     <label>
                     <input name="q5" type='radio'>
                     <span class='btn'>0-1-1. Two standard meals: breakfast or lunch and dinner.  </span>
                     </label>
                  </div>
               </div>
               <div class="col-md-6 my-2">
                  <div class='btns'>
                     <label>
                     <input name="q5" type='radio'>
                     <span class='btn'>Bring it on! I'm a foodie all day, any day!  </span>
                     </label>
                  </div>
               </div>
               <div class="col-md-6 my-2">
                  <div class='btns'>
                     <label>
                     <input name="q5" type='radio'>
                     <span class='btn'>I don't eat much; depends on my mood.  </span>
                     </label>
                  </div>
               </div>
            </div>
            <input type="button" name="previous" class="previous action-button" value="&larr; Previous" />
            <input type="button" name="next" class="next action-button" value="Next &rarr;" />
         </fieldset>
         <fieldset>
            <h2 class="q1-type">Do you care much about balanced diets?   </h2>
            <div class="row">
               <div class="col-md-6 my-2">
                  <div class='btns'>
                     <label>
                     <input name="q6" type='radio'>
                     <span class='btn first'>Yes, healthy eating all the way.   </span>
                     </label>
                  </div>
               </div>
               <div class="col-md-6 my-2">
                  <div class='btns'>
                     <label>
                     <input name="q6" type='radio'>
                     <span class='btn'>Yes, but I don't always get it.  </span>
                     </label>
                  </div>
               </div>
               <div class="col-md-6 my-2">
                  <div class='btns'>
                     <label>
                     <input name="q6" type='radio'>
                     <span class='btn'>Not for me; anything goes.  </span>
                     </label>
                  </div>
               </div>
            </div>
            <input type="button" name="previous" class="previous action-button" value="&larr; Previous" />
            <input type="button" name="next" class="next action-button" value="Next &rarr;" />
         </fieldset>
         <fieldset>
            <h2 class="q1-type">When are you most productive at work? </h2>
            <div class="row">
               <div class="col-md-6 my-2">
                  <div class='btns'>
                     <label>
                     <input name="q7" type='radio'>
                     <span class='btn first'>I go all out in the mornings.</span>
                     </label>
                  </div>
               </div>
               <div class="col-md-6 my-2">
                  <div class='btns'>
                     <label>
                     <input name="q7" type='radio'>
                     <span class='btn'>Always. I need to get results. </span>
                     </label>
                  </div>
               </div>
               <div class="col-md-6 my-2">
                  <div class='btns'>
                     <label>
                     <input name="q7" type='radio'>
                     <span class='btn'>At night when it's all quiet. </span>
                     </label>
                  </div>
               </div>
            </div>
            <input type="button" name="previous" class="previous action-button" value="&larr; Previous" />
            <input type="button" name="next" class="next action-button" value="Next &rarr;" />
         </fieldset>
         <fieldset>
            <h2 class="q1-type">Do you have a good sitting or working posture? </h2>
            <div class="row">
               <div class="col-md-6 my-2">
                  <div class='btns'>
                     <label>
                     <input name="q8" type='radio'>
                     <span class='btn first'>Yes, I use a standard worktable and a chair that supports my back. </span>
                     </label>
                  </div>
               </div>
               <div class="col-md-6 my-2">
                  <div class='btns'>
                     <label>
                     <input name="q8" type='radio'>
                     <span class='btn'>I work from my couch or bed. </span>
                     </label>
                  </div>
               </div>
               <div class="col-md-6 my-2">
                  <div class='btns'>
                     <label>
                     <input name="q8" type='radio'>
                     <span class='btn'>Not really, I have back injuries. </span>
                     </label>
                  </div>
               </div>
            </div>
            <input type="button" name="previous" class="previous action-button" value="&larr; Previous" />
            <input type="button" name="next" class="next action-button" value="Next &rarr;" />
         </fieldset>
         <fieldset>
            <h2 class="q1-type">Do you think mental health is just as important as physical health?  </h2>
            <div class="row">
               <div class="col-md-6 my-2">
                  <div class='btns'>
                     <label>
                     <input name="q9" type='radio'>
                     <span class='btn first'>Yes, I use a standard worktable and a chair that supports my back. </span>
                     </label>
                  </div>
               </div>
               <div class="col-md-6 my-2">
                  <div class='btns'>
                     <label>
                     <input name="q9" type='radio'>
                     <span class='btn'>Yes, mental health matters.</span>
                     </label>
                  </div>
               </div>
               <div class="col-md-6 my-2">
                  <div class='btns'>
                     <label>
                     <input name="q9" type='radio'>
                     <span class='btn'>No, it's just overrated.</span>
                     </label>
                  </div>
               </div>
            </div>
            <input type="button" name="previous" class="previous action-button" value="&larr; Previous" />
            <input type="button" name="next" class="next action-button" value="Next &rarr;" />
            <button class="next" type="submit">SUBMIT</button>
         </fieldset> -->
           <!-- <fieldset>
              <h5 class="concierge-mobile desktop-view">Celeb Concierge</h5>
              <h2 class="q1-type">Type of q2</h2>
              <div class="row">
                 <div class="col-md-12 my-2">
                    <h6 class="budget">Budget</h6>
                    <div class="rangeslider">
                       <input class="min" name="range_1" type="range" min="1" max="100" value="10" />
                       <input class="max" name="range_1" type="range" min="1" max="100" value="90" />
                       <span class="range_min light left">10.000</span>
                       <span class="range_max light right">90.000</span>
                    </div>
                 </div>
                 <div class="col-md-6 my-2">
                    <input type="text" name="location" id="location" class="q2-details" placeholder="q2 Location" />
                 </div>
                 <div class="col-md-6 my-2">
                    <input type="text" name="date" id="date" class="q2-details" placeholder="q2 Date" />
                 </div>
                 <div class="col-md-6 my-2">
                    <input type="text" name="name" id="name" class="q2-details" placeholder="Name" />
                 </div>
                 <div class="col-md-6 my-2">
                    <input type="text" name="email" id="email" class="q2-details" placeholder="Email Id" />
                 </div>
                 <div class="col-md-6 my-2">
                    <input type="text" name="phone" id="phone" class="q2-details" placeholder="Phone Number" />
                 </div>
              </div>
              <input type="button" name="previous" class="previous action-button" value="Previous" />
              <button class="next" type="submit">SUBMIT</button>
           </fieldset> -->
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

