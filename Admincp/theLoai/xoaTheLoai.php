<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>XÓA THỂ LOẠI</title>
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
            if (isset($_GET['id'])) {
                $id = $_GET['id'];
                // Kiểm tra xem id có tồn tại trong CSDL không
                $result = mysqli_query($conn, "SELECT * FROM theloai WHERE MaTL = '$id'");
                if (mysqli_num_rows($result) > 0) {
                    $row = mysqli_fetch_assoc($result);
                    $id = $row['MaTL'];
                    // Xóa THỂ LOẠI khỏi CSDL nếu THỂ LOẠI xác nhận
                    if (isset($_POST['confirmDelete']) && $_POST['confirmDelete'] == 'yes') {
                        mysqli_query($conn, "DELETE FROM theloai WHERE MaTL = '$id'");
                        $deleted = true;
                    }
                } else {
                    echo "<p>Không tìm thấy THỂ LOẠI.</p>";
                }
            }
            ?>
            <?php if (isset($deleted) && $deleted) : ?>
                <script>
                    alert("Xóa THỂ LOẠI thành công. Vui lòng bấm OK!!!");
                    setTimeout(function() {
                        window.location.href = "./theLoai.php";
                    }, 500);
                </script>
            <?php else : ?>
                <h2>Bạn có chắc chắn muốn xóa THỂ LOẠI <span style="color: #FF2A2A;"><?php echo $id; ?></span>
                    không?</h2>
                <form method="POST" onsubmit="return confirmDelete();">
                    <input type="hidden" name="confirmDelete" value="yes">
                    <input type="submit" value="Xóa">
                </form>
                <p>
                    <a href="theLoai.php">Quay lại danh sách THỂ LOẠI</a>
                </p>
            <?php endif; ?>
        </div>
    </div>
</body>

</html>