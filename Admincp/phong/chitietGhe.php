<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chi Tiết Ghế</title>
    <link rel="stylesheet" href="../css/admin.css">
    <style>
        table {
            border-collapse: collapse;
            width: 100%;
            background-color: #EEEDED;
        }
        /* Áp dụng kiểu cho tiêu đề bảng */
        th {
            background-color: #FF2A2A;
            color: #fff;
            padding: 10px;
        }
        /* Áp dụng kiểu cho các ô dữ liệu */
        td {
            text-align: center;
            padding: 10px;
        }
        .so {
  width: 100%;
  text-align: center;
  margin-top: 20px;
}

.so a {
  display: inline-block;
  padding: 5px 10px;
  margin-right: 5px;
  background-color: #FF2A2A;
  color: #fff;
  text-decoration: none;
  border-radius: 5px;
  transition: background-color 0.3s ease;
}

.so a:hover {
  background-color: #fff;
  color: #FF2A2A;
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
                die("Kết nối database thất bại: " . $conn->connect_error);
            }
            echo "";
            // Lấy mã phòng từ URL
            $maPhong = $_GET['id'];
            // Lấy thông tin phòng từ cơ sở dữ liệu
            $query = "SELECT * FROM phong WHERE MaPhong = '$maPhong'";
            $result = mysqli_query($conn, $query);
            $row = mysqli_fetch_assoc($result);
            // Kiểm tra nếu không tìm thấy phòng
            if (!$row) {
                echo "<p class='tieuDe' align='left'><font face='Verdana, Geneva, sans-serif' size='5'>Không tìm thấy phòng.</font></p>";
            } else {
                // Hiển thị thông tin phòng
                echo "<p class='tieuDe' align='left'><font face='Verdana, Geneva, sans-serif' size='5'>Chi tiết ghế của phòng $row[TenPhong]</font></p>";
                echo "<table align='center' width='1200' border='1' cellpadding='2' cellspacing='2' style='border-collapse:collapse'>";
                echo '<tr>
                    <th width="50">STT</th>
                    <th width="150">Mã Ghế</th>
                    <th width="520">Tên Ghế</th>
                   
                </tr>';
                // Lấy tổng số ghế từ cơ sở dữ liệu
                $queryTotal = "SELECT COUNT(*) AS total FROM ghe WHERE MaPhong = '$maPhong'";
                $resultTotal = mysqli_query($conn, $queryTotal);
                $rowTotal = mysqli_fetch_assoc($resultTotal);
                $totalGhe = $rowTotal['total'];

                $limit = 10; // Số ghế hiển thị trên mỗi trang
                $totalPages = ceil($totalGhe / $limit); // Tổng số trang

                if (!isset($_GET['page'])) {
                    $page = 1; // Trang hiện tại
                } else {
                    $page = $_GET['page'];
                }

                $offset = ($page - 1) * $limit; // Vị trí bắt đầu của dữ liệu trong database

                // Lấy danh sách ghế từ cơ sở dữ liệu dựa trên trang hiện tại và số ghế hiển thị trên mỗi trang
                $queryGhe = "SELECT * FROM ghe WHERE MaPhong = '$maPhong' LIMIT $limit OFFSET $offset";
                $resultGhe = mysqli_query($conn, $queryGhe);
                if (mysqli_num_rows($resultGhe) <> 0) {
                    $stt = $offset + 1;
                    while ($rowsGhe = mysqli_fetch_row($resultGhe)) {
                        echo '<tr>';
                        echo "<td>$stt</td>";
                        echo "<td>$rowsGhe[0]</td>";
                        echo "<td>$rowsGhe[1]</td>";
                        
                        echo '</tr>';
                        $stt += 1;
                    }
                } else {
                    echo '<tr><td colspan="4">Không có thông tin ghế.</td></tr>';
                }
                echo "</table>";

                // Hiển thị phân trang
echo '<div class="so">';
if ($page > 1) {
    echo '<a href="chitietGhe.php?id=' . $maPhong . '&page=1'. '">&lt;&lt</a>';
    echo '<a href="chitietGhe.php?id=' . $maPhong . '&page=' . ($page - 1) . '">&lt</a>';
}
for ($i = 1; $i <= $totalPages; $i++) {
    echo '<a href="chitietGhe.php?id=' . $maPhong . '&page=' . $i . '">' . $i . '</a>';
}
if ($page < $totalPages) {
    echo '<a href="chitietGhe.php?id=' . $maPhong . '&page=' . ($page + 1) . '">&gt</a>';
    echo '<a href="chitietGhe.php?id=' . $maPhong . '&page=' . $totalPages . '">&gt;&gt;</a>';
    
}
echo '</div>';
            }
            // Đóng kết nối đến cơ sở dữ liệu
            mysqli_close($conn);
            ?>
        </div>
    </div>
</body>
</html>