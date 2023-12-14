<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DANH SÁCH PHIM</title>
    <link rel="stylesheet" href="../css/admin.css">
    <style>

/* Thiết lập các phần tử trong form */
form {
  margin-bottom: 20px;
}

label {
  display: block;
  margin-bottom: 5px;
}

input[type="text"],
input[type="number"] {
  width: 100%;
  padding: 5px;
  margin-bottom: 10px;
}

input[type="submit"] {
  background-color: #FF2A2A;
  color: white;
  padding: 10px 20px;
  border: none;
  cursor: pointer;
}

input[type="submit"]:hover {
  background-color: #FF2A2A;
}

h1 {
    color:#FF2A2A;
  font-size: 24px;
  margin-bottom: 20px;
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
echo "";
// Xử lý khi người dùng nhấn nút "Thêm phòng"
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Lấy thông tin từ form
    $room_code = $_POST['room_code'];
    $room_name = $_POST['room_name'];
    $num_columns = $_POST['num_columns'];
    $num_rows = $_POST['num_rows'];
    $total_seats = $_POST['plus_seat'];
    // Thêm phòng vào bảng phòng
    $insert_query = "INSERT INTO phong (MaPhong, TenPhong, SoChoNgoi, socot, SoHang) VALUES ('$room_code', '$room_name', $total_seats, $num_columns, $num_rows)";
    mysqli_query($conn, $insert_query);
    // Lấy ID của phòng vừa được thêm
    $room_id = mysqli_insert_id($conn);
    // Tạo ghế cho phòng và ghi vào bảng ghế với trạng thái mặc định là 0
    $seat_counter = 1;
    for ($row = 1; $row <= $num_rows; $row++) {
        for ($column = 1; $column <= $num_columns; $column++) {
            $seat_name = $row . '-' . $column;
            $seat_code = $room_code . '-' . $seat_counter;
            $insert_seat_query = "INSERT INTO ghe (maGhe, TenGhe, TrangThai, MaPhong) VALUES ('$seat_code', '$seat_name', 0, '$room_code')";
            mysqli_query($conn, $insert_seat_query);
            $seat_counter++;
        }
    }
    // Điều hướng về trang danh sách phòng
    header("Location: room_list.php");
    exit();
}
// Đóng kết nối đến cơ sở dữ liệu
mysqli_close($conn);
?>
          <form action="" method="POST">
    <h1>Thêm phòng mới</h1>
  <label for="room_code">Mã phòng:</label>
  <input type="text" id="room_code" name="room_code" required><br><br>
  <label for="room_name">Tên phòng:</label>
  <input type="text" id="room_name" name="room_name" required><br><br>
  <label for="plus_seat">Tổng số ghế:</label>
  <input type="number" id="plus_seat" name="plus_seat" required oninput="calculateRowsColumns()"><br><br>
  <label for="num_columns">Số cột:</label>
  <input type="number" id="num_columns" name="num_columns" required><br><br>
  <label for="num_rows">Số hàng:</label>
  <input type="number" id="num_rows" name="num_rows" required><br><br>
  <input type="submit" value="Thêm phòng">
</form>
</body>
<script>
    function calculateRowsColumns() {
        var totalSeats = document.getElementById('plus_seat').value;
        var numColumns = Math.ceil(Math.sqrt(totalSeats));
        var numRows = Math.ceil(totalSeats / numColumns);
        document.getElementById('num_columns').value = numColumns;
        document.getElementById('num_rows').value = numRows;
    }
</script>  
        </div>
    </div>

</body>
</html>
