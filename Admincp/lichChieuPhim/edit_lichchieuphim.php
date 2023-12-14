<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sửa lịch chiếu phim</title>
    <link rel="stylesheet" href="../css/admin.css">
    <style>
    /* Quy tắc CSS */
     /* Quy tắc CSS */
     h1 {
        color: #FF2A2A;
        text-align: center;
    }
    label {
        font-weight: bold;
        display: block; /* Hiển thị dạng block */
        margin-bottom: 10px; /* Khoảng cách giữa các label */
    }
    input[type="submit"] {
        background-color: #FF2A2A;
        color: white;
        padding: 10px 20px;
        border: none;
        cursor: pointer;
        display: block;
    margin: 0 auto;
    text-align: center;
    margin-top: 20px;

    }
    form {
        width: 400px;
        margin: 0 auto; /* Đặt form ở giữa */
        padding: 20px;
        border: 1px solid black; /* Tạo border xung quanh form */
        border-radius: 5px;
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
$database = "web_cinema";
$conn = new mysqli($servername, $username, $password, $database);
if ($conn->connect_error) {
    die("Kết nối cơ sở dữ liệu thất bại: " . $conn->connect_error);
}
// Kiểm tra xem có dữ liệu được gửi từ form hay không
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Lấy dữ liệu từ form
    $malichphim = $_POST['malichphim'];
    $malichchieu = $_POST['malichchieu'];
    $maphong = $_POST['maphong'];
    $maphim = $_POST['maphim'];
    $thoigianketthuc = $_POST['thoigianketthuc'];
    // Cập nhật dữ liệu trong bảng lichchieuphim
    $updateQuery = "UPDATE lichchieuphim SET MaLichChieu='$malichchieu', MaPhong='$maphong', MaPhim='$maphim', thoigianketthuc='$thoigianketthuc' WHERE MaLichPhim='$malichphim'";
    if ($conn->query($updateQuery) === TRUE) {
        echo '<div id="overlay">
        <div id="notification">
            <span id="message">Cập nhật thành công </span>
            <button id="closeButton" onclick="closeNotification()">Đóng</button>
        </div>
    </div>';
    } else {
        echo "Lỗi: " . $conn->error;
    }
}
// Lấy thông tin lịch chiếu phim từ cơ sở dữ liệu
$malichphim = $_GET['id'];
$query = "SELECT lichchieuphim.MaLichPhim, lichchieuphim.MaLichChieu, phong.TenPhong, phim.TenPhim, lichchieuphim.thoigianketthuc
FROM lichchieuphim
JOIN phong ON lichchieuphim.MaPhong = phong.MaPhong
JOIN phim ON lichchieuphim.MaPhim = phim.MaPhim
WHERE lichchieuphim.MaLichPhim='$malichphim'";
$result = $conn->query($query);
if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $malichchieu = $row['MaLichChieu'];
    $tenphong = $row['TenPhong'];
    $tenphim = $row['TenPhim'];
    $thoigianketthuc = $row['thoigianketthuc'];
    // Hiển thị form chỉnh sửa
    echo "<h1>Chỉnh sửa lịch chiếu phim</h1>";
    echo "<form action='' method='POST'>";
    echo "<label for='malichphim'>Mã lịch phim:</label>";
    echo "<input type='text' name='malichphim' id='malichphim' value='" . $malichphim . "' readonly><br>";
    echo "<label for='malichchieu'>Lịch chiếu:</label>";
    echo "<select name='malichchieu' id='malichchieu'>";
    $query = "SELECT * FROM lichchieu";
    $result = $conn->query($query);
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $selected = ($row['MaLichChieu'] == $malichchieu) ? "selected" : "";
            echo "<option value='" . $row['MaLichChieu'] . "' " . $selected . ">" . $row['GioChieu'] . "</option>";
        }
    }
    echo "</select>";
    
   // Hiển thị TenPhong (danh sách tên phòng)
echo "<label for='maphong'>Tên phòng:</label>";
echo "<select name='maphong' id='maphong'>";
$query = "SELECT * FROM phong";
$result = $conn->query($query);
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $selected = ($row['TenPhong'] == $tenphong) ? "selected" : "";
        echo "<option value='" . $row['MaPhong'] . "' " . $selected . ">" . $row['TenPhong'] . "</option>";
    }
}
echo "</select>";

// Hiển thị TenPhim (danh sách tên phim)
echo "<label for='maphim'>Tên phim:</label>";
echo "<select name='maphim' id='maphim'>";
$query = "SELECT * FROM phim";
$result = $conn->query($query);
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $selected = ($row['TenPhim'] == $tenphim) ? "selected" : "";
        echo "<option value='" . $row['MaPhim'] . "' " . $selected . ">" . $row['TenPhim'] . "</option>";
    }
}
echo "</select>";
    echo "<label for='thoigianketthuc'>Thời gian kết thúc:</label>";
    echo "<input type='text' name='thoigianketthuc' id='thoigianketthuc' value='" . $thoigianketthuc . "'><br>";
    echo "<input type='submit' value='Cập nhật'>";
    echo "</form>";
} else {
    echo "Không tìm thấy lịch chiếu phim";
}
// Đóng kết nối
$conn->close();
?>
<script>
  function closeNotification() {
    var overlay = document.getElementById("overlay");
    if (overlay) {
      overlay.style.display = "none";
    }
    window.location.href = "detail_lichchieuphim.php";
  }
</script>
        </div>
    </div>
</body>
</html>