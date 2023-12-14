<?php
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $postedUsername = $_POST["username"];
  $postedPassword = $_POST["password"];

  $servername = "localhost";
  $dbUsername = "root";
  $dbPassword = "";
  $dbName = "web_cinema";
  $connection = mysqli_connect($servername, $dbUsername, $dbPassword, $dbName);

  if (!$connection) {
    die("Lỗi kết nối cơ sở dữ liệu: " . mysqli_connect_error());
  }

  $query = "SELECT username, password, role FROM nguoidung WHERE username = ? AND password = ?";
  $stmt = $connection->prepare($query);
  $stmt->bind_param("ss", $postedUsername, $postedPassword);
  $stmt->execute();
  $result = $stmt->get_result();

  if (mysqli_num_rows($result) > 0) {
    $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
    $role = $row['role'];
    if ($role == 1) {
      $_SESSION["username"] = $postedUsername; // Lưu tên người dùng vào session
      header("Location: ../Admincp/");
    } elseif ($role == 0) {
      $_SESSION["username"] = $postedUsername; // Lưu tên người dùng vào session
      header("Location: ../");
    } else {
      echo "Vai trò không hợp lệ.";
    }
  } else {
    echo '<script>
    alert("Đăng nhập không thành công. Vui lòng kiểm tra tên đăng nhập và mật khẩu. Vui lòng bấm OK!!!");
    setTimeout(function() {
        window.location.href = "../";
    }, 1000); // Thời gian chờ trước khi tự động quay lại, đơn vị là mili giây (ở đây là 1 giây)
</script>';
  }

  $stmt->close();
  $connection->close();
}
?>