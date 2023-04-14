<?php
require_once('constants.php');

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
class DataBase
{
 function __construct()
 {
$dbCon = mysqli_connect(DB_SERVER,DB_USER,DB_PASS,DB_NAME);
$this->db=$dbCon;
// Check connection
if (mysqli_connect_errno())
{
echo "Failed to connect to MySQL: " . mysqli_connect_error();
 }
 }
}