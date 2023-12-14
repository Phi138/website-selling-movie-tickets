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

<style>

</style>

<body>
  <?php
  include "./components/header.php";
  ?>

<main class="movie">
    <div class="buttons"></div>
    <div class="container">
      <div class="row">
        <?php
        // Kết nối đến cơ sở dữ liệu và truy vấn dữ liệu
        $servername = "localhost";
        $username = "root";
        $password = "";
        $account = "web_cinema";
        $conn = new mysqli($servername, $username, $password, $account);
        if ($conn->connect_error) {
          die("Kết nối database thất bại: " . $conn->connect_error);
        }

        $query = "SELECT * FROM quangcao";
        $result = mysqli_query($conn, $query);

        if (mysqli_num_rows($result) > 0) {
          // Hiển thị 2 hình ảnh quảng cáo
          $i = 0;
          while ($rows = mysqli_fetch_assoc($result)) {
            if ($i == 0) {
              // Hình ảnh đầu tiên ở bên trái
              echo '<div class="col-md-6">';
            } else {
              // Hình ảnh thứ hai ở bên phải
              echo '<div class="col-md-6">';
            }
            echo '<img src="./Admincp/hinhPhim/' . $rows["Anhminhhoa"] . '" class="card-img-top" alt="Ảnh bìa">';
            echo '</div>';
            $i++;
            if ($i >= 2) {
              break; // Dừng sau khi hiển thị 2 hình ảnh
            }
          }
        }

        // Đóng kết nối đến cơ sở dữ liệu
        mysqli_close($conn);
        ?>
      </div>
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