<?php

require_once('DatabaseCon.php');

class adminClass extends DataBase{

    function fetchQuizAnswers(){
        $myQuery = "SELECT * FROM quizz_answers";
        $result = mysqli_query($this->dbh, $myQuery);
        return $result;
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

}