<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>5thWonder.</title>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" />
  <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick-theme.css" />
  <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.css" />
  <link rel="icon" type="image/x-icon" href="./assets/img/favicon.svg">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <link rel="stylesheet" href="./assets/css/main.css">
  <link rel="stylesheet" href="./assets/fonts/stylesheet.css">
  <link rel="stylesheet" href="./assets/css/_mainindex.css">
</head>

<body>
  <?php
session_start();

  include "./components/header.php";
  include "./components/slider.php";

if (isset($_SESSION['message'])) {
    echo '<script>alert("' . $_SESSION['message'] . '")</script>';
    unset($_SESSION['message']);
}
  // Kiểm tra nếu có tham số 'tenPhim' trong URL
  if (isset($_GET['tenPhim'])) {
    // Xử lý tìm kiếm và hiển thị kết quả
    echo '<div class="container">';
    echo '<div class="row">';
    include "./CSQL/timkiem.php";
    echo  '</div>';
    echo '</div>';
  } else {
    echo  '<main class="movie">';
    echo '<div class="buttons">';
    echo ' <a class="button active" href="?type=now_playing">phim đang chiếu</a>';
    echo  '<a class="button" href="?type=upcoming">phim sắp chiếu</a>';
    echo '</div>';
    echo '<div class="container">';
    echo '<div class="row">';
    include "./CSQL/InforpicMovi.php";
    echo  '</div>';
    echo '</div>';
    echo '</div>';
    echo '</main>';
  }
  ?>


  <?php
  include "./components/footer.php";
  ?>
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.js"></script>
  <script src="./assets/js/language.js"></script>
  <script src="./assets/js/slider.js"></script>

</body>

</html>