<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CHỈNH SỬA PHÒNG</title>
    <link rel="stylesheet" href="../css/admin.css">
    <style>
        h1{
            color: #FF2A2A;
        }
        .them {
            background-color: white;
            color: #FF2A2A;
            border: 1px solid #FF2A2A;
            cursor: pointer;
            font-weight: bold;
            transition: background-color 0.3s ease;
            text-decoration: none;
            margin: 0px 100px;
        }
        .them:hover {
            background-color: #FF2A2A;
            color: white;
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

// Kiểm tra xem Mã phòng đã được truyền qua từ trang danh sách phòng hay chưa
if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Truy vấn thông tin phòng từ cơ sở dữ liệu
    $query = "SELECT * FROM phong WHERE MaPhong='$id'";
    $result = mysqli_query($conn, $query);
    $row = mysqli_fetch_assoc($result);

    // Kiểm tra xem phòng có tồn tại hay không
    if ($row) {
        $room_name = $row['TenPhong'];
        $plus_seat = $row['SoChoNgoi'];
        $num_columns = $row['SoHang'];
        $num_rows = $row['socot'];

        // Hiển thị form chỉnh sửa thông tin phòng
        echo "
        <h1>Chỉnh sửa phòng</h1>
        <form action='' method='POST'>
            <input type='hidden' name='id' value='$id'>
            <label for='room_name'>Tên phòng:</label>
            <input type='text' id='room_name' name='room_name' value='$room_name' required><br><br>
            <label for='plus_seat'>Tổng số ghế:</label>
            <input type='number' id='plus_seat' name='plus_seat' value='$plus_seat' required><br><br>
            <label for='num_columns'>Số cột:</label>
            <input type='number' id='num_columns' name='num_columns' value='$num_columns' required><br><br>
            <label for='num_rows'>Số hàng:</label>
            <input type='number' id='num_rows' name='num_rows' value='$num_rows' required><br><br>
            <input class='them' type='submit' name='update_room' value='Cập nhật phòng'>
        </form>
        ";
    } else {
        echo "Phòng không tồn tại.";
    }
} else {
    echo "Mã phòng không được cung cấp.";
}

// Xử lý khi người dùng nhấn nút "Cập nhật phòng"
if (isset($_POST['update_room'])) {
    // Lấy thông tin từ form
    $id = $_POST['id'];
    $room_name = $_POST['room_name'];
    $plus_seat = $_POST['plus_seat'];
    $num_columns = $_POST['num_columns'];
    $num_rows = $_POST['num_rows'];

    // Cập nhật thông tin phòng trong cơ sở dữ liệu
    $update_query = "UPDATE phong SET TenPhong='$room_name', SoChoNgoi=$plus_seat, SoHang=$num_columns, socot=$num_rows WHERE MaPhong='$id'";
    mysqli_query($conn, $update_query);

    // Điều hướng về trang danh sách phòng
    header("Location: room_list.php");
    exit();
}

// Đóng kết nối đến cơ sở dữ liệu
mysqli_close($conn);
?>
        </div>
    </div>
</body>
</html>