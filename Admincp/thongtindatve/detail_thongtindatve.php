<head><link rel="stylesheet" href="../css/admin.css"></head>
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

// Số lượng hàng hiển thị trên mỗi trang
$limit = 10;

// Trang hiện tại
$page = isset($_GET['page']) ? $_GET['page'] : 1;

// Vị trí bắt đầu của dữ liệu trong trang hiện tại
$start = ($page - 1) * $limit;

// Truy vấn dữ liệu từ bảng ttdatve với giới hạn và vị trí bắt đầu
$sql = "SELECT MaDatVe, MaLichPhim, NgayDat FROM ttdatve LIMIT $start, $limit";
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
            th {
                color: white;
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
            h2 {
                text-align: center;
            }
            .back-button {
                text-align: center;
                margin-bottom: 20px;
            }
            .pagination {
                text-align: center;
                margin-top: 20px;
            }
            .pagination a {
                display: inline-block;
                padding: 5px 10px;
                background-color: #ff2a2a;
                color: #fff;
                text-decoration: none;
                border-radius: 4px;
                margin-right: 5px;
            }
            .pagination a.active {
                background-color: #000;
            }
        </style>";
    echo "<div class='search-bar'>
            <form method='post' action='timkiemmadatve.php'>
                <input type='text' name='MaDatVe' placeholder='Nhập mã đặt vé...'>
                <input type='submit' value='Tìm kiếm'>
            </form>
        </div>";
    echo "<h2>Thông tin các vé đã mua</h2>";
    
    echo "<table>";
    echo "<tr><th class='ttdatve'>Mã đặt vé</th><th class='ttdatve'>Mã lịch phim</th><th class='ttdatve'>Ngày đặt</th>
    <th class='ttdatve'>Xem chi tiết</th>
    </tr>";
    while ($row = $result->fetch_assoc()) {
        echo "<tr>";
        echo "<td>" . $row["MaDatVe"] . "</td>";
        echo "<td>" . $row["MaLichPhim"] . "</td>";
        echo "<td>" . $row["NgayDat"] . "</td>";
        echo "<td><a class='xemChiTiet' href='chitietve.php?MaDatVe=" . $row["MaDatVe"] . "'>Xem chi tiết vé</a></td>";
        echo "</tr>";
    }
    echo "</table>";

    // Truy vấn tổng số lượng dữ liệu
    $sql_count = "SELECT COUNT(*) AS total FROM ttdatve";
    $result_count = $conn->query($sql_count);
    $row_count = $result_count->fetch_assoc();
    $total_records = $row_count['total'];

    // Tính tổng số trang
    $total_pages = ceil($total_records / $limit);

    // Hiển thị các nút chuyển trang
    echo "<div class='pagination'>";
    if ($page > 1) {
        echo "<a href='detail_thongtindatve.php?page=" . ($page - 1) . "'> < </a>";
    }
    for ($i = 1; $i <= $total_pages; $i++) {
        if ($i == $page) {
            echo "<a href='detail_thongtindatve.php?page=$i' class='active'>$i</a>";
        } else {
            echo "<a href='detail_thongtindatve.php?page=$i'>$i</a>";
        }
    }
    if ($page < $total_pages) {
        echo "<a href='detail_thongtindatve.php?page=" . ($page + 1) . "'> ></a>";
    }
    echo "</div>";
} else {
    echo "<div class='search-bar'>
            <form method='post' action='timkiemmadatve.php'>
                <input type='text' name='MaDatVe' placeholder='Nhập mã đặt vé...'>
                <input type='submit' value='Tìm kiếm'>
            </form>
        </div>";
    echo "<h2>Không có dữ liệu trong bảng ttdatve.</h2>";
}
// Đóng kết nối
$conn->close();
?>
        </div>
    </div>
</body>