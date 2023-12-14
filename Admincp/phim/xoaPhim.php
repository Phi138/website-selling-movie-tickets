<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>XÓA PHIM</title>
    <link rel="stylesheet" href="../css/admin.css">
    <script>
        function confirmDelete() {
            return confirm("Bạn có chắc chắn muốn xóa phim này?");
        }
    </script>
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

                if (isset($_GET['MaPhim'])) {
                    $MaPhim = $_GET['MaPhim'];

                    // Kiểm tra xem phim có tồn tại trong CSDL không
                    $result = mysqli_query($conn, "SELECT * FROM phim WHERE MaPhim = '$MaPhim'");
                    if (mysqli_num_rows($result) > 0) {
                        $row = mysqli_fetch_assoc($result);
                        $tenPhim = $row['TenPhim'];
                        // Xóa phim khỏi CSDL nếu người dùng xác nhận
                        if (isset($_POST['confirmDelete']) && $_POST['confirmDelete'] == 'yes') {
                            mysqli_query($conn, "DELETE FROM phim WHERE MaPhim = '$MaPhim'");
                            $deleted=true;
                        }
                    } else {
                        echo "<p>Không tìm thấy phim.</p>";
                    }
                }
            ?>
            <?php if (isset($deleted) && $deleted) : ?>
                <p>Phim đã được xóa thành công.</p>
                <p>
                    <a href="phim.php">Quay lại danh sách phim</a>
                </p>
            <?php else : ?>
                <h2>Bạn có chắc chắn muốn xóa phim <span style="color: #FF2A2A;"><?php echo $tenPhim; ?></span> không?</h2>
                <form method="POST" onsubmit="return confirmDelete();">
                    <input type="hidden" name="confirmDelete" value="yes">
                    <input type="submit" value="Xóa">
                </form>
                <p>
                    <a href="phim.php">Quay lại danh sách phim</a>
                </p>
            <?php endif; ?> 
        </div>
    </div>
</body>
</html>