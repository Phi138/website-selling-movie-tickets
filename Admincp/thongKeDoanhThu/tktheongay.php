
<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title>Bảng Thống kê theo ngày</title>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <link rel="stylesheet" href="../css/admin.css">
    <style>
        h2{
            text-align: center;
            color: #ff2a2a;
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
        .btns {
            display: flex;
            justify-content: center;
            
        }
        .back-button {
            display: inline-block;
            padding: 8px 16px;
            background-color: #ff2a2a;
            color: white;
            text-decoration: none;
            border-radius: 4px;
            
            margin: 0 auto;
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
// Tạo kết nối
$conn = new mysqli($servername, $username, $password, $account);
// Kiểm tra kết nối
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
// Truy vấn SQL để lấy dữ liệu thống kê theo ngày
$sql = "SELECT ngaythanhtoan, SUM(tongtienthanhtoan) AS tongtien FROM thanhtoan GROUP BY ngaythanhtoan";
$result = $conn->query($sql);
// Lưu trữ dữ liệu vào mảng
$data = array();
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $data[] = $row;
    }
}
// Đóng kết nối
$conn->close();
?>
    <h2>Bảng Thống kê theo ngày</h2>
    <table>
        <tr>
            <th>Ngày Thanh toán</th>
            <th>Tổng tiền thanh toán</th>
        </tr>
        <?php foreach ($data as $row) { ?>
            <tr>
                <td><?php echo $row['ngaythanhtoan']; ?></td>
                <td><?php echo number_format($row['tongtien'], 0, ',', '.'); ?> vnđ</td>
            </tr>
        <?php } ?>
        
    </table>
    <canvas id="myChart"></canvas>
  
    <script>
        var labels = [];
        var data = [];

        <?php foreach ($data as $row) { ?>
            labels.push('<?php echo $row['ngaythanhtoan']; ?>');
            data.push(<?php echo $row['tongtien']; ?>);
        <?php } ?>

        var ctx = document.getElementById('myChart').getContext('2d');
        var myChart = new Chart(ctx, {
    type: 'bar',
    data: {
        labels: labels,
        datasets: [{
            label: 'Tổng tiền thanh toán',
            data: data,
            backgroundColor: '#ff2a2a',
            borderColor: '#ff2a2a',
            borderWidth: 1
        }]
    },
    options: {
        aspectRatio: 3.5, // Điều chỉnh tỷ lệ khung hình của biểu đồ
        scales: {
            y: {
                beginAtZero: true,
                ticks: {
                    callback: function(value, index, values) {
                        return value.toLocaleString('vi', { style: 'currency', currency: 'VND' });
                    }
                }
            }
        }
    }
});
    </script>
   <div class="btns">
   <a href="detail_thongke.php" class="back-button">Quay lại</a>
   </div>
        </div>
    </div>
</body>
</html>