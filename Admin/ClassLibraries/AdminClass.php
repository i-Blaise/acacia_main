<?php

require_once('DatabaseCon.php');

class adminClass extends DataBase{


    function countUsersByYearAndMonth($year, $month){
        $month_padded = sprintf("%02d", $month);
        
        $myQuery = "SELECT * FROM quizz_answers
        WHERE date_added LIKE '%$year-%'
          AND date_added LIKE '%-$month_padded-%'";
        $result = mysqli_query($this->dbh, $myQuery);
        $num = mysqli_num_rows($result);
        return $num;
    }
    function fetchQuizAnswers(){
        $myQuery = "SELECT * FROM quizz_answers";
        $result = mysqli_query($this->dbh, $myQuery);
        return $result;
    }

    function fetchResultLessThan30(){
        $myQuery = "SELECT results FROM quizz_answers WHERE results < 30";
        $result = mysqli_query($this->dbh, $myQuery);
        $num = mysqli_num_rows($result);
        return $num;
    }

    function fetchResult30To50(){
        $myQuery = "SELECT results FROM quizz_answers WHERE results > 30 AND results <= 50";
        $result = mysqli_query($this->dbh, $myQuery);
        $num = mysqli_num_rows($result);
        return $num;
    }

    function fetchResult50To70(){
        $myQuery = "SELECT results FROM quizz_answers WHERE results > 50 AND results <= 70";
        $result = mysqli_query($this->dbh, $myQuery);
        $num = mysqli_num_rows($result);
        return $num;
    }

    function fetchResultGreaterThan70(){
        $myQuery = "SELECT results FROM quizz_answers WHERE results >= 70";
        $result = mysqli_query($this->dbh, $myQuery);
        $num = mysqli_num_rows($result);
        return $num;
    }

    function checkAdminCred($username, $password){
        $encrypted_pass = md5($password);
        $myQuery = "SELECT * FROM admin_cred WHERE username = '$username' AND pass = '$encrypted_pass'" ;
        $result = mysqli_query($this->dbh, $myQuery);
        $num = mysqli_num_rows($result);
        if($num == 1){
            return 'good';
        }else{
            return 'error';
        }
    }


    function fetchMonthlyUsers(){
        $myQuery = "SELECT date_added FROM quizz_answers WHERE DATE(date_added) >= (DATE(NOW()) - INTERVAL 2 MONTH)";
        $result = mysqli_query($this->dbh, $myQuery);
        $num = mysqli_num_rows($result);
        return $num;
    }

    function fetchAllUsersDashboard(){
        $myQuery = "SELECT * FROM quizz_answers ORDER BY id DESC LIMIT 10";
        $result = mysqli_query($this->dbh, $myQuery);
        return $result;
    }

    function fetchAllUsersTable(){
        $myQuery = "SELECT * FROM quizz_answers ORDER BY id DESC";
        $result = mysqli_query($this->dbh, $myQuery);
        return $result;
    }

    function fetchQuestionAndOptions() {
        $myQuery = "SELECT * FROM quizz_questions";
        $result = mysqli_query($this->dbh, $myQuery);
        return $result;
    }


    function updateQnA($QnAupdates)
    {

        if(is_object($QnAupdates) || is_array($QnAupdates))
        {
            $id = isset($QnAupdates['id']) ? $QnAupdates['id'] : NULL;
            $question = isset($QnAupdates['question']) ? mysqli_real_escape_string($this->dbh, $QnAupdates['question']) : NULL;
            $option1 = isset($QnAupdates['option1']) ? mysqli_real_escape_string($this->dbh, $QnAupdates['option1']) : NULL;
            $option1_value = isset($QnAupdates['option1_value']) ? $QnAupdates['option1_value'] : NULL;
            $option2 = isset($QnAupdates['option2']) ? mysqli_real_escape_string($this->dbh, $QnAupdates['option2']) : NULL;
            $option2_value = isset($QnAupdates['option2_value']) ? $QnAupdates['option2_value'] : NULL;
            $option3 = isset($QnAupdates['option3']) ? mysqli_real_escape_string($this->dbh, $QnAupdates['option3']) : NULL;
            $option3_value = isset($QnAupdates['option3_value']) ? $QnAupdates['option3_value'] : NULL;
            $option4 = isset($QnAupdates['option4']) ? mysqli_real_escape_string($this->dbh, $QnAupdates['option4']) : NULL;
            $option4_value = isset($QnAupdates['option4_value']) ? $QnAupdates['option4_value'] : NULL;

            $myQuery = "UPDATE quizz_questions
            SET question = '$question', 
            option1 = '$option1', 
            option1_value = '$option1_value',
            option2 = '$option2',
            option2_value = '$option2_value',
            option3 = '$option3',
            option3_value = '$option3_value',
            option4 = '$option4',
            option4_value = '$option4_value'
            WHERE id = '$id'";

            $result = mysqli_query($this->dbh, $myQuery);
            if(!$result){
            return "Error: " .mysqli_error($this->dbh);
            }else{
            return "good";
            }

        }
    }


}