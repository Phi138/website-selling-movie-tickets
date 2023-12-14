<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $servername = "localhost";
  $username = "root";
  $password = "";
  $account = "web_cinema";
  $connection = mysqli_connect($servername, $username, $password, $account);

  if (!$connection) {
    die("Lỗi kết nối cơ sở dữ liệu: " . mysqli_connect_error());
  }

  $username = $_POST["username"];
  $password = $_POST["registerPassword"];
  $confirmPassword = $_POST["confirm-registerPassword"];
  $nhanVien = $_POST['nhanVien'];
  $email = $_POST['email'];
  if ($password !== $confirmPassword) {
    echo '<script>
    alert("Mật khẩu và xác nhận mật khẩu không khớp. Vui lòng bấm OK!!!");
    setTimeout(function() {
        window.location.href = "../";
    }, 1000); // Thời gian chờ trước khi tự động quay lại, đơn vị là mili giây (ở đây là 1 giây)
</script>';
  }

  // Thực hiện truy vấn để chèn người dùng mới vào cơ sở dữ liệu
  $query = "INSERT INTO nguoidung (username, password, email, role, MaNhanVien) VALUES ('$username', '$password', '$email', 0, '$nhanVien')";

  if (mysqli_query($connection, $query)) {
    header("Location: ../");
  } else {
    echo "Lỗi đăng ký: " . mysqli_error($connection);
  }

  // Đóng kết nối cơ sở dữ liệu
  mysqli_close($connection);
}
