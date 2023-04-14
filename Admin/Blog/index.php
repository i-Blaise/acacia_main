<?php
require_once('ClassLibraries/MainClass.php');
$mainPlug = new mainClass();
?>
<!DOCTYPE html>
<html lang="en" >
<head>
  <meta charset="UTF-8">
  <title>Acacia Blog</title>
  <link rel="shortcut icon" href="images/acacialogo_mini.png" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css">
<link rel='stylesheet' href='https://maxcdn.bootstrapcdn.com/font-awesome/4.6.3/css/font-awesome.min.css'>
<link rel="stylesheet" href="style.css">

</head>
<body>
<?php
if($_GET['unique_code'])
{
  $dataResult = $mainPlug->fetchBlogs($_GET['unique_code']);
  $row = mysqli_fetch_assoc($dataResult);
  $date1 = substr_replace($row['date_added'] ,"", -9);
  $day = substr($date1, -2);
  $month_num = substr($date1,5,-3);
  switch ($month_num){
    case '01':
      $month = 'Jan';
      break;
    case '02':
      $month = 'Feb';
      break;
    case '03':
      $month = 'Mar';
      break;
    case '04':
      $month = 'Apr';
      break;
    case '05':
      $month = 'May';
      break;
    case '06':
      $month = 'Jun';
      break;
    case '07':
      $month = 'Jul';
      break;
    case '08':
      $month = 'Aug';
      break;
    case '09':
      $month = 'Sep';
      break;
    case '10':
      $month = 'Oct';
      break;
    case '11':
      $month = 'Nov';
      break;
    case '12':
      $month = 'Dec';
      break;
  }
  $year = substr($date1,0,4);
  // echo $year;
  // die();

if($row['slider'] == 1){

?>
<div class="wrapper">
  <input checked type=radio name="slider" id="slide1" />
  <input type=radio name="slider" id="slide2" />
  <input type=radio name="slider" id="slide3" />
  <input type=radio name="slider" id="slide4" />
  <input type=radio name="slider" id="slide5" />

  <div class="slider-wrapper">
    <div class=inner>
      <article>
        <div class="info top-left"></div>
        <img src="<?php echo $row['blog_slider1'] ?>" />
      </article>

      <article>
        <div class="info bottom-right"></div>
        <img src="<?php echo $row['blog_slider2'] ?>" />
      </article>

      <article>
        <div class="info bottom-left"></div>
        <img src="<?php echo $row['blog_slider3'] ?>" />
      </article>

      <article>
        <div class="info top-right"></div>
        <img src="<?php echo $row['blog_slider4'] ?>" />
      </article>

      <article>
        <div class="info bottom-left"></div>
        <img src="<?php echo $row['blog_slider5'] ?>" />
      </article>
    </div>
    
  </div>
  

  <div class="slider-prev-next-control">
    <label for=slide1></label>
    <label for=slide2></label>
    <label for=slide3></label>
    <label for=slide4></label>
    <label for=slide5></label>
  </div>
  

  <div class="slider-dot-control">
    <label for=slide1></label>
    <label for=slide2></label>
    <label for=slide3></label>
    <label for=slide4></label>
    <label for=slide5></label>
  </div>
  
</div>
<?php
}elseif($row['single'] == 1){
//   echo $row['blog_single_img'];
//   die();
?>
<div class="wrapper">
<div class="slider-wrapper">
  <div class=inner>
    <article>
      <div class="info top-left"></div>
      <img src="<?php echo $row['blog_single_img'] ?>" />
    </article>
  </div>
  </div>
</div>

<?php
}elseif($row['video'] == 1){
  
?>

  <div class="container">
  <iframe class="responsive-iframe" src="https://www.youtube.com/embed/<?php echo $row['blog_video'] ?>" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
  </div>

<?php
}
?>

  <script  src="./script.js"></script>

<div class="blog">
  <h1 class="blog_caption"><?php echo $row['blog_title']; ?></h1>
  <!-- <p class="blog_date">18, Nov 2020</p> -->
  <p class="blog_date"><?php echo $day .', '. $month . ' '. $year ?></p>

  <p class="blog_main">
  <?php echo $row['blog_body'] ?>
  </p>
</div>
<?php
}else{
?>
<h1>No Post Selected</h1>
<?php
}
?>
</body>
</html>
