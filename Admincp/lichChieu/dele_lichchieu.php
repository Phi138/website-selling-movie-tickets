<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../css/admin.css">
    <style>
        h4{
            font-size: 45px;
            color: #ff2a2a;
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
if(isset($_GET['id'])) {
    $id = $_GET['id'];

    $servername = "localhost";
    $username = "root";
    $password = "";
    $account = "web_cinema";
    $conn = new mysqli($servername, $username, $password, $account);

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Kiểm tra xem có tham chiếu từ bảng lịch chiếu phim tới mã lịch chiếu hiện tại hay không
    $checkSql = "SELECT * FROM lichchieuphim WHERE MaLichChieu='$id'";
    $result = $conn->query($checkSql);

    if ($result->num_rows > 0) {
        echo '<script>
    alert("Không thể xóa lịch chiếu. Vui lòng xóa Lịch chiếu phim có Mã lịch chiếu = '.$id.' ");
    setTimeout(function() {
        window.location.href = "detail_lichchieu.php";
    }, 1000); // Thời gian chờ trước khi tự động quay lại, đơn vị là mili giây (ở đây là 1 giây)
</script>';
    } else {
        $deleteSql = "DELETE FROM lichchieu WHERE MaLichChieu='$id'";
        if ($conn->query($deleteSql) === TRUE) {
            echo "<h4>Xóa lịch chiếu thành công</h4>";
        } else {
            echo "Lỗi: " . $conn->error;
        }
    }
} else {
    echo "Không có thông tin lịch chiếu để xóa";
}
?>
        </div>
    </div>
</body>
</html>
