<?php
session_start();
// define('DB_SERVER','localhost');
// define('DB_USER','root');
// define('DB_PASS' ,'');
// define('DB_NAME', 'acacia.quizz');


define('DB_SERVER','localhost');
define('DB_USER','mcgnuser');
define('DB_PASS' ,'mcgnroot');
define('DB_NAME', 'acacia');


// define('DB_HOST','ahighana.com');
// define('DB_PORT','3306');
// define('DB_SERVER','localhost');
// define('DB_USER','acaciah1_hquizuser');
// define('DB_PASS' ,'dNVnY?mp5?9CZd!9');
// define('DB_NAME', 'acaciah1_hquiz');

class DataBase
{
  // public static $con;
 function __construct()
 {
$con = mysqli_connect(DB_SERVER,DB_USER,DB_PASS,DB_NAME);
$this->dbh=$con;
// Check connection
if (mysqli_connect_errno())
{
echo "Failed to connect to MySQL: " . mysqli_connect_error();
 }
 }
}