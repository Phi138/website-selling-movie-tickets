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
  <style>
    .button-container {
      display: flex;
      justify-content: center;
      align-items: center;
      height: 230px;
    }
    .button-container a.button {
      display: inline-block;
      padding: 10px 20px;
      margin: 5px;
      background-color: white;
      color: #ff2a2a;
      border: 1px solid #FF2A2A;
      text-align: center;
      text-decoration: none;
      font-size: 16px;
      border-radius: 20px;
    }
    .button-container a.button:hover{
        background-color: #FF2A2A;
        color: white;
    }
    .line {
      width: 100%;
      height: 3px;
      background-color: gray;
    }
  </style>
</head>
<body>
  <?php
  include "./components/header.php";
  ?>

<main class="movie">
    <div class="line"></div>
    <div class="button-container">
        <a href="./baiTap/btPhiTran/form" class="button">FORM</a>
        <a href="./baiTap/btPhiTran/HamChuoiMang" class="button">HÀM CHUỖI MẢNG</a>
        <a href="./baiTap/btPhiTran/OOP" class="button">OOP</a>
        <a href="./baiTap/btPhiTran/sql" class="button">SQL</a>
    </div>
  </main>

  <?php
  include "./components/footer.php";
  ?>

  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.js"></script>
  <script src="./assets/js/language.js"></script>
  <script src="./assets/js/slider.js"></script>
</body>

</html>