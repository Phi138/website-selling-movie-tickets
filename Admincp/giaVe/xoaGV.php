<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>XÓA GIÁ VÉ</title>
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
                // Kết nối csdl
                require("../connect.php");
                if (isset($_GET['MaGiaVe'])) {
                    $MaGiaVe = $_GET['MaGiaVe'];
                    // Kiểm tra xem phim có tồn tại trong CSDL không
                    $result = mysqli_query($conn, "SELECT * FROM giave, loaive WHERE giave.Maloaive=loaive.Maloaive and MaGiaVe = '$MaGiaVe'");
                    if (mysqli_num_rows($result) > 0) {
                        $row = mysqli_fetch_assoc($result);
                        $Tenloaive = $row['Tenloaive'];
                        $GiaVe = $row['GiaVe'];
                        // Xóa phim khỏi CSDL nếu người dùng xác nhận
                        if (isset($_POST['confirmDelete']) && $_POST['confirmDelete'] == 'yes') {
                            mysqli_query($conn, "DELETE FROM giave WHERE MaGiaVe = '$MaGiaVe'");
                            $deleted=true;
                        }
                    } else {
                        echo "<p>Không tìm thấy giá vé.</p>";
                    }
                }
            ?>
            <?php if (isset($deleted) && $deleted) : ?>
                <script>
                    alert("Xóa giá vé thành công. Vui lòng bấm OK!!!");
                    setTimeout(function() {
                        window.location.href = "./hienThiGV.php";
                    }, 500);
                </script>
            <?php else : ?>
                <h2>Bạn có chắc chắn muốn xóa giá vé <span style="color: #FF2A2A;"><?php echo $Tenloaive; ?></span> 
                 có giá là <span style="color: #FF2A2A;"><?php echo $GiaVe; ?></span> không?</h2>
                <form method="POST" onsubmit="return confirmDelete();">
                    <input type="hidden" name="confirmDelete" value="yes">
                    <input type="submit" value="Xóa">
                </form>
                <p>
                    <a href="hienThiGV.php">Quay lại danh sách giá vé</a>
                </p>
            <?php endif; ?> 
        </div>
    </div>
</body>
</html>