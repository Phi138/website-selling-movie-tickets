<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Danh sách thanh toán</title>
    <link rel="stylesheet" href="../css/admin.css">
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
        }
        h2 {
            text-align: center;
            color: #ff2a2a;
        }
        .add-button {
            display: inline-block;
            padding: 8px 16px;
            background-color: #ff2a2a;
            color: white;
            text-decoration: none;
            border-radius: 4px;
            margin-bottom: 30px;
        }
        .add-button:hover {
            background-color: #e61717;
        }
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
            background-color: #ff2a2a;
            color: white;
        }
        tr:nth-child(even) {
            background-color: #f2f2f2;
        }
        tr:hover {
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
        <h2>Danh sách thanh toán</h2>
    <a href="tktheongay.php" class="add-button">Thống kê theo ngày</a>
    <a href="tktheothang.php" class="add-button">Thống kê theo tháng</a>
    <table>
        <tr>
            <th>Mã thanh toán</th>
            <th>Mã đặt vé</th>
            <th>Mã nhân viên</th>
            <th>Trạng thái thanh toán</th>
            <th>Ngày thanh toán</th>
            <th>Tổng tiền thanh toán</th>
        </tr>
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
            // Truy vấn cơ sở dữ liệu
            $query = "SELECT * FROM thanhtoan";
            $result = mysqli_query($conn, $query);

            // Lặp qua kết quả và hiển thị bảng
            if (mysqli_num_rows($result) > 0) {
                while ($row = mysqli_fetch_assoc($result)) {
                    echo "<tr>";
                    echo "<td>" . $row['MaThanhToan'] . "</td>";
                    echo "<td>" . $row['MaDatVe'] . "</td>";
                    echo "<td>" . $row['MaNhanVien'] . "</td>";
                    echo "<td>" . $row['TrangThaiThanhToan'] . "</td>";
                    echo "<td>" . $row['NgayThanhToan'] . "</td>";
                    echo "<td>" . $row['tongtienthanhtoan'] . "</td>";
                    echo "</tr>";
                }
            } else {
                echo "<tr><td colspan='6'>Không có dữ liệu</td></tr>";
            }
            // Đóng kết nối
            mysqli_close($conn);
        ?>
    </table>
        </div>
    </div>
</body>
</html>