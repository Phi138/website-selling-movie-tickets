<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thêm lịch chiếu phim</title>
    <style>
        
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
// Kết nối đến cơ sở dữ liệu
$servername = "localhost";
$username = "root";
$password = "";
$database = "web_cinema";
$conn = new mysqli($servername, $username, $password, $database);
if ($conn->connect_error) {
    die("Kết nối cơ sở dữ liệu thất bại: " . $conn->connect_error);
}

// Lấy dữ liệu từ form
$malichphim = $_POST['malichphim'];
$malichchieu = $_POST['malichchieu'];
$maphong = $_POST['maphong'];
$maphim = $_POST['maphim'];


// Truy vấn để lấy thông tin thời lượng và giờ chiếu từ bảng phim và bảng lichchieu
$query = "SELECT phim.thoiluong, lichchieu.GioChieu
FROM phim
JOIN lichchieuphim ON phim.MaPhim = lichchieuphim.MaPhim
JOIN lichchieu ON lichchieuphim.MaLichChieu = lichchieu.MaLichChieu
";
$result = $conn->query($query);
if ($result->num_rows > 0) { 
    $row = $result->fetch_assoc(); 
    $giochieu = strtotime($row['GioChieu']); // Chuyển đổi chuỗi thời gian thành dạng Unix timestamp 
    $thoiluong = strtotime($row['thoiluong']); // Chuyển đổi chuỗi thời lượng thành dạng Unix timestamp 
 
    // Tính toán thời gian kết thúc 
    $thoigianketthuc = date('H:i:s', $giochieu + $thoiluong); // Thêm thời lượng (đơn vị là giây) vào thời gian bắt đầu 
 
    // Thêm dữ liệu vào bảng lichchieuphim 
    $insertQuery = "INSERT INTO lichchieuphim (MaLichPhim, MaLichChieu, MaPhong, MaPhim, thoigianketthuc) VALUES ('$malichphim', '$malichchieu', '$maphong', '$maphim', '$thoigianketthuc')"; 
    if ($conn->query($insertQuery) === TRUE) { 
        echo '<div id="overlay">
        <div id="notification">
            <span id="message">Thêm thành công </span>
            <button id="closeButton" onclick="closeNotification()">Đóng</button>
        </div>
    </div>'; 
    } else { 
        echo "Lỗi: " . $conn->error; 
    } 
} else { 
    echo "Không tìm thấy thông tin lịch chiếu"; 
} 

// Đóng kết nối
$conn->close();
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
</body>
</html>