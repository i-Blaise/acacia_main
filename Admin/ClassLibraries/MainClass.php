<?php

require_once('DatabaseCon.php');
// use PHPMailer\PHPMailer\PHPMailer;
// use PHPMailer\PHPMailer\SMTP;
// use PHPMailer\PHPMailer\Exception;
// require_once '../vendor/autoload.php';
    use PHPMailer\PHPMailer\PHPMailer;
    require_once('../vendor/autoload.php');

class mainClass extends DataBase{

    function dbtest(){
        $result = $this->dbh;
        return $result;
    }

    function anotherTest(){
        $myQuery = "SELECT * FROM id ORDER BY DESC";
        $result = mysqli_query($this->dbh, $myQuery);
        return $result;
    }

    function saveQuizzInput($quizzAnswers, $unique_code)
    {

        if(is_object($quizzAnswers) || is_array($quizzAnswers))
        {
            $q1 = $quizzAnswers['q1'];
            $q2 = $quizzAnswers['q2'];
            $q3 = $quizzAnswers['q3'];
            $q4 = $quizzAnswers['q4'];
            $q5 = $quizzAnswers['q5'];
            $q6 = $quizzAnswers['q6'];
            $q7 = $quizzAnswers['q7'];
            $q8 = $quizzAnswers['q8'];
            $q9 = $quizzAnswers['q9'];

            $myQuery = "INSERT INTO quizz_answers  (
                unique_code,
                q1,
                q2,
                q3,
                q4,
                q5,
                q6,
                q7,
                q8,
                q9) VALUES (
                '$unique_code',
                '$q1',
                '$q2',
                '$q3',
                '$q4',
                '$q5',
                '$q6',
                '$q7',
                '$q8',
                '$q9')";

            $result = mysqli_query($this->dbh, $myQuery);
            if(!$result){
            return "Error: " .mysqli_error($this->dbh);
            }else{
            return "good";
            }

        }
    }

    function saveBrandQuestionInput($quizzBrandAnswers, $unique_code)
    {

        if(is_object($quizzBrandAnswers) || is_array($quizzBrandAnswers))
        {
            $s1 = $quizzBrandAnswers['s1'];
            $s2_option1 = (!empty($quizzBrandAnswers['s2_option1'])) ? $quizzBrandAnswers['s2_option1'] : NULL;
            $s2_option2 = (!empty($quizzBrandAnswers['s2_option2'])) ? $quizzBrandAnswers['s2_option2'] : NULL;
            $s2_option3 = (!empty($quizzBrandAnswers['s2_option3'])) ? $quizzBrandAnswers['s2_option3'] : NULL;
            $s2_option4 = (!empty($quizzBrandAnswers['s2_option4'])) ? $quizzBrandAnswers['s2_option4'] : NULL;
            $s2_option5 = (!empty($quizzBrandAnswers['s2_option5'])) ? $quizzBrandAnswers['s2_option5'] : NULL;
            $s3_option1 = (!empty($quizzBrandAnswers['s3_option1'])) ? $quizzBrandAnswers['s3_option1'] : NULL;
            $s3_option2 = (!empty($quizzBrandAnswers['s3_option2'])) ? $quizzBrandAnswers['s3_option2'] : NULL;
            $s3_option3 = (!empty($quizzBrandAnswers['s3_option3'])) ? $quizzBrandAnswers['s3_option3'] : NULL;

            $myQuery = "INSERT INTO quizz_brand_answers (
                unique_code,
                s1,
                s2_option1,
                s2_option2,
                s2_option3,
                s2_option4,
                s2_option5,
                s3_option1,
                s3_option2,
                s3_option3) VALUES (
                '$unique_code',
                '$s1',
                '$s2_option1',
                '$s2_option2',
                '$s2_option3',
                '$s2_option4',
                '$s2_option5',
                '$s3_option1',
                '$s3_option2',
                '$s3_option3');";

            $result = mysqli_query($this->dbh, $myQuery);
            if(!$result){
            return "Error: " .mysqli_error($this->dbh);
            }else{
            return "good";
            }

        }
    }


    function fetchQuestionsAndOptions()
    {
        $myQuery = "SELECT * FROM quizz_questions";
        $result = mysqli_query($this->dbh, $myQuery);
        return $result;
    }

    function fetchAnswersWithCode($unique_code)
    {
        $myQuery = "SELECT * FROM quizz_answers WHERE unique_code = '$unique_code'";
        $result = mysqli_query($this->dbh, $myQuery);
        return $result;
    }

    function fetchLastUserUniqueCode()
    {
        $myQuery = "SELECT unique_code FROM quizz_answers ORDER BY id DESC";
        $result = mysqli_query($this->dbh, $myQuery);
        return $result;
    }

    function fetchFirstSurvey()
    {
        $myQuery = "SELECT * FROM quizz_brand_questions WHERE id = 1";
        $result = mysqli_query($this->dbh, $myQuery);
        return $result;
    }

    function fetchSecondSurvey()
    {
        $myQuery = "SELECT * FROM quizz_brand_questions WHERE id = 2";
        $result = mysqli_query($this->dbh, $myQuery);
        return $result;
    }

    function fetchThirdSurvey()
    {
        $myQuery = "SELECT * FROM quizz_brand_questions WHERE id = 3";
        $result = mysqli_query($this->dbh, $myQuery);
        return $result;
    }

    function updateResults($unique_code, $finalResult)
    {
        $myQuery = "UPDATE quizz_answers
        SET results = '$finalResult'
        WHERE unique_code = '$unique_code';";
        $result = mysqli_query($this->dbh, $myQuery);
        if(!$result){
            return "Error: " .mysqli_error($this->dbh);
            }else{
            return "good";
            }
    }

    function updateDBOnResultsEmailed($unique_code)
    {
        $myQuery = "UPDATE quizz_answers
        SET result_emailed = 1
        WHERE unique_code = '$unique_code';";
        $result = mysqli_query($this->dbh, $myQuery);
        if(!$result){
            return "Error: " .mysqli_error($this->dbh);
            }else{
            return "good";
            }
    }

    function checkResultEmailed($unique_code)
    {
        $myQuery = "SELECT * FROM quizz_answers WHERE unique_code = '$unique_code'";
        $result = mysqli_query($this->dbh, $myQuery);
        $row = mysqli_fetch_array($result);            
        // echo 'here';
        // die();
        if($row['result_emailed'] != 1)
        {
            $sendResultEmail = $this->sendResultEmail();
            if($sendResultEmail == 'sent') 
            {
                $dbUpdate = $this->updateDBOnResultsEmailed($unique_code);
                echo $dbUpdate;
            }
        }else{
            echo 'email sent';
        }
    }




    function sendResultEmail()
    {
  
  
    //PHPMailer Object
    // $mail = new PHPMailer(true); //Argument true in constructor enables exceptions
    

    // $mail->isSMTP();
    // $mail->SMTPDebug = 2;
    // $mail->Host = 'smtp.hostinger.com';
    // $mail->Port = 465;
    // $mail->SMTPAuth = true;
    // $mail->Username = 'acaciaquizz@sonzie.online';
    // $mail->Password = 'Mennia123';

    $mail = new PHPMailer;
    $mail->isSMTP();
    $mail->SMTPDebug = 2;
    $mail->Host = 'smtp.hostinger.com';
    $mail->Port = 587;
    $mail->SMTPAuth = true;
    $mail->Username = 'acaciaquizz@sonzie.online';
    $mail->Password = 'Mennia123';
    $mail->setFrom('acaciaquizz@sonzie.online', 'Your Name');
    $mail->addReplyTo('acaciaquizz@sonzie.online', 'Your Name');

    
    
    //From email address and name
    // $mail->From = "acaciaquizz@sonzie.online";
    // $mail->setFrom('test@hostinger-tutorials.com', 'Your Name');
    // $mail->FromName = "Acacia Health Quizz";
    
    //To address and name
    $mail->addAddress('menniablaise@gmail.com', 'Receiver Name');
    // $mail->addAddress("menniablaise@hotmail.com");
    
    //Address to which recipient will reply
    // $mail->addReplyTo("menniablaise@yahoo.com", "Reply");
    
    //CC and BCC
    // $mail->addCC("cc@example.com");
    // $mail->addBCC("bcc@example.com");
    
    //Send HTML or Plain Text email
    $mail->isHTML(true);
    
    $mail->Subject = "Living Healthy with Acacia";
    // $mail->Body = '<h2> '.$scoreHeader.'<h2> <br> <br> <p>'.$scoreMessage.'</p>';
    $mail->Body = 'hi';
    // $mail->AltBody = "This is the plain text version of the email content";
        if($mail->send())
        {
            return 'sent';
        }else{
            echo "Mailer Error: " . $mail->ErrorInfo;
        }
    }

}