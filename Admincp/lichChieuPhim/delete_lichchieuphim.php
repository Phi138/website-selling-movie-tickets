<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        h2{
            font-size: 100px;
            color: #ff2a2a;
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
    
</body>
</html>
<?php
// Kiểm tra xem có tham số id được truyền vào không
if(isset($_GET['id'])) {
    // Lấy giá trị id từ tham số truyền vào
    $id = $_GET['id'];
    
    // Kết nối đến cơ sở dữ liệu
    $servername = "localhost";
    $username = "root";
    $password = "";
    $account = "web_cinema";
    // Tạo kết nối
    $conn = new mysqli($servername, $username, $password, $account);
    // Kiểm tra kết nối
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    
    // Xóa dữ liệu từ bảng lịch chiếu dựa trên id
    $sql = "DELETE FROM lichchieuphim WHERE MaLichPhim='$id'";
    if ($conn->query($sql) === TRUE) {
      echo '<div id="overlay">
          <div id="notification">
              <span id="message">Xóa thành công </span>
              <button id="closeButton" onclick="closeNotification()">Đóng</button>
          </div>
      </div>';
  } else {
      echo 'Bị lỗi khi xóa';
  } // Dừng kịch bản PHP để tránh chuyển hướng tiếp theo
    // Đóng kết nối
    $conn->close();
} else {
    echo "Không có thông tin lịch chiếu phim để xóa";
}
?>
<script>
     function closeNotification() {
    var overlay = document.getElementById("overlay");
    if (overlay) {
      overlay.style.display = "none";
      window.location.href = "detail_lichchieuphim.php";
    }
  }
</script>