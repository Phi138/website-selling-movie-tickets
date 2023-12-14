<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Xóa phòng chiếu</title>
    <link rel="stylesheet" href="../css/admin.css">
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
    die("Kết nối database thất bại: " . $conn->connect_error);
}

// Kiểm tra xem có tham số "id" được truyền vào hay không
if(isset($_GET['MaPhong'])) {
    $MaPhong = $_GET['MaPhong'];

    // Truy vấn thông tin phòng từ cơ sở dữ liệu
    $query = "SELECT * FROM phong WHERE MaPhong = $MaPhong";
    $result = mysqli_query($conn, $query);
    $row = mysqli_fetch_assoc($result);

    // Kiểm tra xem phòng có tồn tại hay không
    if ($row) {
        // Hiển thị thông tin phòng
        echo "Thông tin phòng:<br>";
        echo "Mã Phòng: " . $row['MaPhong'] . "<br>";
        echo "Tên phòng: " . $row['TenPhong'] . "<br>";
        echo "Số chỗ ngồi: " . $row['SoChoNgoi'] . "<br>";
        echo "Số hàng: " . $row['SoHang'] . "<br>";
        echo "Số cột: " . $row['sôct'] . "<br>";

        // Hiển thị nút xác nhận xóa phòng
        echo "<form action='delete_room.php' method='POST'>";
        echo "<input type='hidden' name='MaPhong' value='$MaPhong'>";
        echo "<input type='submit' name='confirm_delete' value='Đồng ý'>";
        echo "</form>";
    } else {
        echo "Phòng không tồn tại.";
    }
} else {
    echo "Không xác định phòng cần xóa.";
}

// Xử lý khi người dùng nhấn nút "Đồng ý"
if (isset($_POST['confirm_delete'])) {
    $id = $_POST['id'];

    // Xóa phòng từ cơ sở dữ liệu
    $delete_query = "DELETE FROM phong WHERE id = $id";
    if(mysqli_query($conn, $delete_query)) {
        echo "Xóa phòng thành công.";
    } else {
        echo "Lỗi xóa phòng: " . mysqli_error($conn);
    }
}

// Đóng kết nối đến cơ sở dữ liệu
mysqli_close($conn);
?>
        </div>
    </div>
</body>
</html>