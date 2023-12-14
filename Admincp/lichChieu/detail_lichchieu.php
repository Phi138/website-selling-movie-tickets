<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../css/admin.css">
    <style>
      table {
  border-collapse: collapse;
  width: 100%;
}

th, td {
  padding: 12px;
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

a {
  text-decoration: none;
  color: #000;
}

.pagination {
  display: flex;
  justify-content: center;
  margin-top: 20px;
}

.pagination a {
  display: inline-block;
  padding: 8px 12px;
  margin-right: 6px;
  background-color: #f2f2f2;
  color: #000;
  border: 1px solid #ddd;
  border-radius: 4px;
}

.pagination a.active {
  background-color: #ff2a2a;
  color: #fff;
}

.pagination a:hover {
  background-color: #ddd;
}

.pagination a:hover {
  background-color: #ddd;
}
.phantrang {
  display: flex;
  justify-content: center;
  margin-top: 20px;
}

.phantrang a {
  display: inline-block;
  width: 30px;
  height: 30px;
  line-height: 30px;
  text-align: center;
  margin-right: 6px;
  background-color: #f2f2f2;
  color: #000;
  border: 1px solid #ddd;
  border-radius: 4px;
}
.them{
  display: inline-block;
  width: 40px;
  height: 30px;
  line-height: 30px;
  text-align: center;
  margin-right: 6px;
  background-color: #ff2a2a;
  color: white;
  border: 1px solid #ddd;
  border-radius: 4px;
}

.phantrang a.active {
  background-color: #ff2a2a;
  color: #fff;
}

.phantrang a:hover {
  background-color: #ddd;
}

.phantrang span {
  display: inline-block;
  width: 30px;
  height: 30px;
  line-height: 30px;
  text-align: center;
  margin-right: 6px;
  background-color: #ccc;
  color: #000;
  border: 1px solid #ddd;
  border-radius: 4px;
}

.phantrang a:hover {
  background-color: #ddd;
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

// Số hàng hiển thị trên mỗi trang
$rowsPerPage = 5;

// Xác định trang hiện tại
if (isset($_GET['page']) && is_numeric($_GET['page'])) {
    $currentPage = $_GET['page'];
} else {
    $currentPage = 1;
}

// Truy vấn dữ liệu từ bảng lịch chiếu
$sql = "SELECT MaLichChieu, NgayChieu, GioChieu FROM lichchieu";
$result = $conn->query($sql);
$totalRows = $result->num_rows;

// Tính tổng số trang
$totalPages = ceil($totalRows / $rowsPerPage);

// Xác định hàng bắt đầu và kết thúc cho trang hiện tại
$startRow = ($currentPage - 1) * $rowsPerPage;
$endRow = $startRow + $rowsPerPage - 1;

// Truy vấn dữ liệu cho trang hiện tại
$sql = "SELECT MaLichChieu, NgayChieu, GioChieu FROM lichchieu LIMIT $startRow, $rowsPerPage";
$result = $conn->query($sql);
echo "<div style='display: flex; justify-content: center; align-items: center;'>";
echo "<a class='them' href='add_lichchieu.php'>Thêm</a>";
echo "<p style='text-align: center;'><font size='5' color='#ff2a2a'>THÔNG TIN LỊCH CHIẾU</font></p>";
echo "</div>";
echo "<table style='margin: 0 auto;' width='600' border='1' cellpadding='2' cellspacing='2' style='border-collapse:collapse'>";
echo "<tr><th>Mã lịch chiếu </th><th>Ngày chiếu </th><th>Giờ chiếu</th><th>Sửa</th><th>Xóa</th></tr>";
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        echo "<tr>";
        echo "<td>" . $row["MaLichChieu"] . "</td>";
        echo "<td>" . $row["NgayChieu"] . "</td>";
        echo "<td>" . $row["GioChieu"] . "</td>";
        echo "<td><a href='fix_lichchieu.php?id=" . $row["MaLichChieu"] . "'>Sửa</a></td>";
        echo "<td><a href='dele_lichchieu.php?id=" . $row["MaLichChieu"] . "' onclick='return confirm(\"Bạn có chắc chắn muốn xóa không?\")'>Xóa</a></td>";
        echo "</tr>";
    }
} else {
    echo "<tr><td colspan='5'>Không có dữ liệu</td></tr>";
}
echo "</table>";

echo "<div class ='phantrang'>";
if ($totalPages > 1) {
    if ($currentPage > 1) {
        $prevPage = $currentPage - 1;
        echo "<a href='?page=$prevPage'>&lt;</a>";
        echo "<a href='?page=1'>&lt;&lt;</a>";
    }
    for ($i = 1; $i <= $totalPages; $i++) {
        if ($i == $currentPage) {
            echo "<span>$i</span>";
        } else {
            echo "<a href='?page=$i'>$i</a>";
        }
    }
    if ($currentPage < $totalPages) {
        $nextPage = $currentPage + 1;
        echo "<a href='?page=$nextPage'>&gt;</a>";
        echo "<a href='?page=$totalPages'>&gt;&gt;</a>";
    }
}
echo "</div>";

// Đóng kết nối
$conn->close();
?>
        </div>
    </div>
</body>
</html>
