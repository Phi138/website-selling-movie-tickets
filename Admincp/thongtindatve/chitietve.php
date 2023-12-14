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
if (isset($_GET['MaDatVe'])) {
    $madatve = $_GET['MaDatVe'];
    // Truy vấn dữ liệu từ bảng ctdatve
    $sql = "SELECT ctdatve.MaDatVe, GROUP_CONCAT(ctdatve.MaGhe) AS MaGhe, ctdatve.GiaVe, COUNT(ctdatve.MaGhe) AS SoLuongVe, ctdatve.GiaVe AS GiaVeGhe
            FROM ctdatve
            WHERE ctdatve.MaDatVe = '$madatve'
            GROUP BY ctdatve.MaDatVe, ctdatve.GiaVe";
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
                .ctdatve{
                    background-color: #ff2a2a;
                }
                .back-button {
                    text-align: center;
                    margin-bottom: 20px;
                }
                .back-button a {
                    display: inline-block;
                    padding: 10px 20px;
                    background-color: #ff2a2a;
                    color: #fff;
                    text-decoration: none;
                    border-radius: 4px;
                }
                h2{
                    text-align : center;
                }
            </style>";
          echo "<h2>Chi tiết vé $madatve</h2>";
        echo "<table>";
        echo "<tr><th class ='ctdatve'>Mã đặt vé</th><th class ='ctdatve'>Ghế</th><th class ='ctdatve'>Giá vé</th><th class ='ctdatve'>Số lượng vé</th></tr>";
        while ($row = $result->fetch_assoc()) {
            $soluongve = $row["SoLuongVe"];
            $maghe_arr = explode(",", $row["MaGhe"]); // Mảng để lưu trữ tất cả các mã ghế
            echo "<tr>";
            echo "<td>" . $row["MaDatVe"] . "</td>";
            foreach ($maghe_arr as $maghe) {
                echo "<td>" . $maghe . "</td>";
            }
            echo "<td>" . $row["GiaVeGhe"] . "</td>";
            echo "<td>$soluongve</td>";
            echo "</tr>";
        }
        echo "</table>";
    } else {
        echo "Không có dữ liệu trong bảng này.";
    }
} else {
    echo "Không có dữ liệu trong bảng này.";
}
echo "<div class='back-button'><a href='javascript:history.back()'>Quay lại</a></div>";
?>
        </div>
    </div>
</body>