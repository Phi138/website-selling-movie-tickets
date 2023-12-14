<!DOCTYPE html>
<html>
<head>
  <title>Form Điền Thêm Lịch Chiếu</title>
  <link rel="stylesheet" href="../css/admin.css">
  <style>
    .form-container {
      max-width: 400px;
      margin: 0 auto;
    }

    .form-group {
      margin-bottom: 20px;
    }

    .form-group label {
      display: block;
      margin-bottom: 5px;
    }

    .form-group input {
      width: 100%;
      padding: 10px;
    }

    .form-submit {
      text-align: center;
    }

    .form-submit button {
      padding: 10px 20px;
      background-color: #FF2A2A;
      color: #fff;
      border: none;
      cursor: pointer;
    }

    #overlay {
      position: fixed;
      top: 0;
      left: 0;
      width: 100%;
      height: 100%;
      background-color: rgba(0, 0, 0, 0.5);
      justify-content: center;
      align-items: center;
      display: flex;
      z-index: 999;
    }

    #notification {
      background-color: white;
      padding: 20px;
      border-radius: 5px;
      text-align: center;
    }

    #closeButton {
      margin-top: 10px;
      padding: 10px 20px;
      background-color: #FF2A2A;
      color: #fff;
      border: none;
      cursor: pointer;
    }
  </style>
</head>
<body>
    <?php
        include("../adminHeader.php");
    ?>
    <div class="container">
        <?php
            include("../adminMenu.php");
        ?>
        <div class="noiDung">
        <?php
// Kết nối đến cơ sở dữ liệu
$servername = "localhost";
$username = "root";
$password = "";
$account = "web_cinema";
// Create connection
$conn = new mysqli($servername, $username, $password, $account);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  // Lấy giá trị từ form
  $ngayChieu = $_POST["ngay-chieu"];
  $gioChieu = $_POST["gio-chieu"];

  // Truy vấn SQL để lấy mã lịch chiếu cuối cùng
  $sql = "SELECT MaLichChieu FROM lichchieu ORDER BY MaLichChieu DESC LIMIT 1";
  $result = $conn->query($sql);

  if ($result->num_rows > 0) {
    // Lấy mã lịch chiếu cuối cùng
    $row = $result->fetch_assoc();
    $lastMaLichChieu = $row["MaLichChieu"];
    // Tách phần số từ mã lịch chiếu cuối cùng
    $lastNumber = intval(substr($lastMaLichChieu, 2));
    // Tạo mã lịch chiếu mới bằng cách tăng giá trị số lên 1
    $newNumber = $lastNumber + 1;
    if ($newNumber <= 9) {
      $maLichChieu = "LC0" . $newNumber;
    } else {
      $maLichChieu = "LC" . $newNumber;
    }
    // Thực hiện truy vấn INSERT để chèn dữ liệu vào bảng lichchieu
    $insertSql = "INSERT INTO lichchieu (MaLichChieu, NgayChieu, GioChieu) VALUES ('$maLichChieu', '$ngayChieu', '$gioChieu')";
    if ($conn->query($insertSql) === TRUE) {
      echo ' <div id="overlay">
    <div id="notification">
        <span id="message">Thêm thành công </span>
        <button id="closeButton" onclick="closeNotification()">Đóng</button>
    </div>
</div>';
    } else {
      echo "Lỗi: " . $insertSql . "<br>" . $conn->error;
    }

    // Đóng kết nối
    $conn->close();
  }
}
?>
  <div class="form-container">
    <form method="POST" action="<?php echo $_SERVER["PHP_SELF"]; ?>">
      <div class="form-group">
        <label for="ngay-chieu">Ngày chiếu:</label>
        <input type="date" id="ngay-chieu" name="ngay-chieu">
      </div>
      <div class="form-group">
        <label for="gio-chieu">Giờ chiếu:</label>
        <input type="time" id="gio-chieu" name="gio-chieu">
      </div>
      <div class="form-submit">
        <button type="submit">Submit</button>
      </div>
    </form>
  </div>
  <script>
  function closeNotification() {
    var overlay = document.getElementById("overlay");
    if (overlay) {
      overlay.style.display = "none";
      window.location.href = "detail_lichchieu.php";
    }
  }
</script>
        </div>
    </div>
</body>
</html>