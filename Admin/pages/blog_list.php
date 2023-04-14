<?php
require_once('../BlogClassLibraries/MainClass.php');
$mainPlug = new mainClass();


$blog_result = $mainPlug->fetchBlogListMobile();

    $result_array = [];
while($row = mysqli_fetch_assoc($blog_result)){
    array_push($result_array, $row);
}
$object = json_encode($result_array, JSON_UNESCAPED_SLASHES);
print_r($object);

