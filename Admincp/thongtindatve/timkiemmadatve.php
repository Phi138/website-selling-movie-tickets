<head>
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
// Tạo kết nối
$conn = new mysqli($servername, $username, $password, $account);
// Kiểm tra kết nối
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Kiểm tra nếu có giá trị mã đặt vé được truyền vào từ form tìm kiếm
if (isset($_POST['MaDatVe'])) {
    $madatve = $_POST['MaDatVe'];

    // Truy vấn dữ liệu từ bảng ttdatve theo mã đặt vé
    $sql = "SELECT MaDatVe, MaLichPhim, NgayDat FROM ttdatve WHERE MaDatVe = '$madatve'";
    $result = $conn->query($sql);

    // Kiểm tra và hiển thị dữ liệu
    if ($result->num_rows > 0) {
        echo "<style>
                table {
                    border-collapse: collapse;
                    width: 100%;
                }
                th, td {
                    padding: 8px;
                    text-align: left;
                    border-bottom: 1px solid #ddd;
                }
                tr:nth-child(even) {
                    background-color: #f2f2f2;
                }
                a {
                    display: inline-block;
                    padding: 5px 10px;
                    color: #fff;
                    text-decoration: none;
                    border-radius: 4px;
                }
                .search-bar {
                    text-align: right;
                    margin-bottom: 10px;
                }
                .search-bar input[type=text] {
                    padding: 5px;
                    border: 1px solid #ccc;
                    border-radius: 4px;
                    box-sizing: border-box;
                }
               h2{
                text-align:center;
               }
               .back-button{
                text-align:center;
               }
            </style>";
        echo "<div class='search-bar'>
                <form method='post' action='timkiemmadatve.php'>
                    <input type='text' name='MaDatVe' placeholder='Nhập mã đặt vé...' value='$madatve'>
                    <input type='submit' value='Tìm kiếm'>
                </form>
            </div>";
        echo "<h2>Thông tin các vé đã mua</h2>";
        echo "<table>";
        echo "<tr><th>Mã đặt vé</th><th>Mã lịch phim</th><th>Ngày đặt</th><th></th></tr>";
        while ($row = $result->fetch_assoc()) {
            echo "<tr>";
            echo "<td>" . $row["MaDatVe"] . "</td>";
            echo "<td>" . $row["MaLichPhim"] . "</td>";
            echo "<td>" . $row["NgayDat"] . "</td>";
            echo "<td><a class='xemChiTiet' href='chitietve.php?MaDatVe=" . $row["MaDatVe"] . "'>Xem chi tiết vé</a></td>";
            echo "</tr>";
        }
        echo "</table>";
    } else {
        echo "<div class='search-bar'>
                <form method='post' action='timkiem.php'>
                    <input type='text' name='MaDatVe' placeholder='Nhập mã đặt vé...' value='$madatve'>
                    <input type='submit' value='Tìm kiếm'>
                </form>
            </div>";
        echo "<h2>Không có dữ liệu trong bảng thông tin đặt vé.</h2>";
    }
}
echo "<div class='back-button'><a href='detail_thongtindatve.php'>Quay lại</a></div>";

// Đóng kết nối
$conn->close();
?>
        </div>
    </div>
</body>