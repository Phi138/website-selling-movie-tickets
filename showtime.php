<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>5thWonder.</title>
    <link rel="icon" type="image/x-icon" href="./assets/img/favicon.svg">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="./assets/css/main.css">
    <link rel="stylesheet" href="./assets/fonts/stylesheet.css">
     <link rel="stylesheet" href="./assets/css/_showtime.css">
     <link rel="stylesheet" href="./assets/css/_branch.css">
    
</head>

<body>
    <?php
session_start();
include "./components/header.php" ?>
   <form action="" method="get">
   <div class="calendar-container">
  <div class="calendar">
    <div class="month">
      <a href="#" class="prev-button" id="prevButton">&lt;</a>
      <div class="date">
        <span class="month-text"></span>
        <div class="days"></div>
      </div>
      <a href="#" class="next-button" id="nextButton">&gt;</a>
    </div>
  </div>
</div>
    
    
        <?php include "./CSQL/date.php"?>;
        <input type="hidden" name="tenphim" value="<?php echo $tenPhim ?>">
        <input type="hidden" name="tenphong" value="<?php echo $tenPhong ?>">
        <input type="hidden" name="malichphim" value="<?php echo $MalichPhim ?>">
    </div>
   </form>
    <?php
  include "./components/footer.php";
  ?>

</body>

</html>