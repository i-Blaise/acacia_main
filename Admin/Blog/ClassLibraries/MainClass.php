<?php

require_once('DB/DB.php');
// require_once('../ClassLibraries/DB/adminCredDB.php');

define('KB', 1024);
define('MB', 1048576);
define('GB', 1073741824);
define('TB', 1099511627776);

class mainClass extends DataBase{




      public function fetchBlogs($code)
      {
          $myQuery = "SELECT * FROM blog WHERE unique_code = '$code'";
          $result = mysqli_query($this->db, $myQuery);
          return $result;
      }
    
    }