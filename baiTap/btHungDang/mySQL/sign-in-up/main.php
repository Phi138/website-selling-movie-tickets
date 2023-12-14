<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Đăng nhập đăng ký</title>
  <link rel="stylesheet" href="./main.css">
</head>


<body>

  <?php
  require_once "../sql/connection.php";

  // xử lý đăng ký
  if (isset($_POST["dangky"])) {
    $registerUsername = $_POST['registerUsername'];
    $registerPassword = $_POST['registerPassword'];
    $email = $_POST['email'];
    $confirmPassword = $_POST["confirm-registerPassword"];

    if ($registerPassword !== $confirmPassword) {
      echo '<script>alert("Mật khẩu không khớp, vui lòng nhập lại")</script>';
    } else {
      $querySELECT = "SELECT username, email FROM users WHERE username = '$registerUsername' OR email = '$email'";
      $resultSelect = mysqli_query($conn, $querySELECT);

      if (mysqli_num_rows($resultSelect) > 0) {
        echo '<script>alert("Tên người dùng hoặc email đã tồn tại")</script>';
      } else {
        $queryINSERT = "INSERT INTO users (username, password, email, role) VALUES ('$registerUsername', '$registerPassword', '$email', 1)";

        if (mysqli_query($conn, $queryINSERT)) {
          echo '<script>alert("Đăng ký thành công")</script>';
        } else {
          echo "Lỗi khi thực hiện đăng ký: " . mysqli_error($conn);
        }
      }
    }
  }

  // xử lý đăng nhập
  if (isset($_POST['dangnhap'])) {
    $loginUserName = $_POST["loginUserName"];
    $loginPassword = $_POST["loginPassword"];

    $query = "SELECT username, password FROM users WHERE username = '$loginUserName' AND password = '$loginPassword'";
    $result = mysqli_query($conn, $query);

    if (mysqli_num_rows($result) > 0) {
      header('location: ../baitap/sua/list-card.php');
    } else {
      echo '<script>alert("Tên tài khoản hoặc mật khẩu không đúng")</script>';
    }
  }


  ?>

  <div class="btn">
    <button class="signIn">Đăng nhập</button>
    <button class="signUp">Đăng ký</button>
  </div>
  <!-- đăng ký -->
  <div class=" modal" id="registerModal">
    <div class="container">
      <h1 class="title">Đăng ký</h1>
      <form action="" method="post">
        <div class="form-group">
          <label for="registerUsername">Tên tài khoản</label>
          <input type="text" id="registerUsername" name="registerUsername" required>
        </div>
        <div class="form-group">
          <label for="email">Email</label>
          <input type="email" id="email" name="email">
        </div>
        <div class="form-group">
          <label for="registerPassword">Mật khẩu</label>
          <input type="password" id="registerPassword" name="registerPassword">
        </div>
        <div class="form-group">
          <label for="confirm-registerPassword">Nhập lại mật khẩu</label>
          <input type="password" id="confirm-registerPassword" name="confirm-registerPassword">
        </div>
        <div class="footer">
          <input type="submit" name="dangky" value="Đăng Ký">
          <input type="button" value="Hủy">
        </div>
      </form>
    </div>
  </div>


  <!-- đăng nhập -->
  <div class=" modal" id="loginModal">
    <div class="container">
      <h1 class="title">Đăng nhập</h1>
      <form action="" method="post">
        <div class="form-group">
          <label for="loginUserName">Tên tài khoản</label>
          <input type="text" id="loginUserName" name="loginUserName" required>
        </div>
        <div class="form-group">
          <label for="loginPassword">Mật khẩu</label>
          <input type="password" id="loginPassword" name="loginPassword">
        </div>
        <div class="form-group">
        </div>
        <div class="footer">
          <input type="submit" name="dangnhap" value="Đăng nhập">
          <input type="button" value="Hủy">
        </div>
      </form>
    </div>
  </div>
  <script src="./main.js"></script>
</body>

</html>