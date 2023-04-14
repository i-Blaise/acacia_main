<?php

// require_once('MainClass.php');
// $testDBcon = new mainClass();

require_once('AdminClass.php');
$testDBcon = new adminClass();


// $result = $testDBcon->checkResultEmailed('AQA453');
$result = $testDBcon->fetchQuizAnswers();
// $result = $testDBcon->updateResults($unique_code, $finalResult);
// $row = json_encode($result);
// foreach ($result as $port) 
// 		{
//             echo $port['question'];
//         }
while($row = mysqli_fetch_array($result))
{
    echo $row['unique_code'];

}
// echo $result;
// $row = mysqli_fetch_array($result);
// echo $row['q1'];
// print_r($row);
// var_dump($result);
?>