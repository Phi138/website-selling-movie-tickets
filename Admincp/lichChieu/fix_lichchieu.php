<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../css/admin.css">
    <style>
        h2 {
            text-align: center;
            color: #ff2a2a;
        }

        table {
            border-collapse: collapse;
            width: 100%;
        }

        th,
        td {
            padding: 8px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }

        th {
            background-color: #ff2a2a;
            color: #fff;
        }

        tr:hover {
            background-color: #f5f5f5;
        }

        .form-group {
            margin-bottom: 10px;
        }

        .form-group td {
            padding: 5px;
        }

        input[type="time"] {
            width: 100%;
            padding: 5px;
            border: 1px solid #ddd;
            border-radius: 4px;
        }

        input[type="date"] {
            width: 100%;
            padding: 5px;
            border: 1px solid #ddd;
            border-radius: 4px;
        }

        input[type="submit"] {
            padding: 8px 12px;
            background-color: #ff2a2a;
            color: #fff;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            display: block;
            margin: 0 auto;
        }

        input[type="submit"]:hover {
            background-color: #f00;
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
// Kiểm tra xem có tham số id được truyền vào không
if (isset($_GET['id'])) {
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

    // Kiểm tra xem có dữ liệu được gửi từ biểu mẫu không
    if (isset($_POST['submit'])) {
        // Lấy giá trị từ biểu mẫu
        $ngayChieu = $_POST['ngaychieu'];
        $gioChieu = $_POST['giochieu'];

        // Cập nhật dữ liệu vào bảng lịch chiếu
        $sql = "UPDATE lichchieu SET NgayChieu='$ngayChieu', GioChieu='$gioChieu' WHERE MaLichChieu='$id'";
        if ($conn->query($sql) === TRUE) {
            echo '<div id="overlay">
            <div id="notification">
                <span id="message">Cập nhật lịch chiếu thành công </span>
                <button id="closeButton" onclick="closeNotification()">Đóng</button>
            </div>
        </div>';
        } else {
            echo "Lỗi: " . $conn->error;
        }
    }

    // Truy vấn dữ liệu từ bảng lịch chiếu dựa trên id
    $sql = "SELECT * FROM lichchieu WHERE MaLichChieu='$id'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        // Hiển thị biểu mẫu sửa lịch chiếu
        echo "<h2>Sửa lịch chiếu</h2>";
        echo "<form method='POST'>";
        echo "<table>";
        while ($row = $result->fetch_assoc()) {
            echo "<div class ='form-group'>";
            echo "<tr><td>Ngày chiếu:</td></tr>";
            echo "<tr><td><input type='date' name='ngaychieu' value='" . $row["NgayChieu"] . "'></td></tr>";
            echo "</div>";

            echo "<div class ='form-group'>";
            echo "<tr><td>Giờ chiếu:</td></tr>";
            echo "<tr><td><input type='time' name='giochieu' value='" . $row["GioChieu"] . "'> </td></tr>";
            echo "</div>";
        }

        echo "</table>";
        echo "<input type='submit' name='submit' value='Lưu'>";
        echo "</form>";
      
    } else {
        echo "Không tìm thấy lịch chiếu";
    }

    // Đóng kết nối
    $conn->close();
} else {
    echo "Không có thông tin lịch chiếu để sửa";
}
?>
<script>
  function closeNotification() {
    var overlay = document.getElementById("overlay");
    if (overlay) {
      overlay.style.display = "none";
    }
    window.location.href = "detail_lichchieu.php";
  }
</script>
        </div>
    </div>
</body>
</body>
</html>