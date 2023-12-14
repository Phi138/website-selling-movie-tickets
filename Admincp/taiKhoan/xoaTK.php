<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>XÓA NGƯỜI DÙNG</title>
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
            if (isset($_GET['username'])) {
                $username = $_GET['username'];
                // Kiểm tra xem username có tồn tại trong CSDL không
                $result = mysqli_query($conn, "SELECT * FROM nguoidung WHERE username = '$username'");
                if (mysqli_num_rows($result) > 0) {
                    $row = mysqli_fetch_assoc($result);
                    $username = $row['username'];
                    // Xóa người dùng khỏi CSDL nếu người dùng xác nhận
                    if (isset($_POST['confirmDelete']) && $_POST['confirmDelete'] == 'yes') {
                        mysqli_query($conn, "DELETE FROM nguoidung WHERE username = '$username'");
                        $deleted = true;
                    }
                } else {
                    echo "<p>Không tìm thấy người dùng.</p>";
                }
            }
            ?>
            <?php if (isset($deleted) && $deleted) : ?>
                <script>
                    alert("Xóa người dùng thành công. Vui lòng bấm OK!!!");
                    setTimeout(function() {
                        window.location.href = "./hienThiTK.php";
                    }, 500);
                </script>
            <?php else : ?>
                <h2>Bạn có chắc chắn muốn xóa người dùng <span style="color: #FF2A2A;"><?php echo $username; ?></span>
                    không?</h2>
                <form method="POST" onsubmit="return confirmDelete();">
                    <input type="hidden" name="confirmDelete" value="yes">
                    <input type="submit" value="Xóa">
                </form>
                <p>
                    <a href="hienThiTK.php">Quay lại danh sách người dùng</a>
                </p>
            <?php endif; ?>
        </div>
    </div>
</body>

</html>