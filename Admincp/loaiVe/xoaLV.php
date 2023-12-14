<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>XÓA LOẠI VÉ</title>
    <link rel="stylesheet" href="../css/admin.css">
    <script>
    function confirmDelete() {
        return confirm("Bạn có chắc chắn muốn xóa loại vé này?");
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
    
    if (isset($_GET['Maloaive'])) {
        $Maloaive = $_GET['Maloaive'];

        // Kiểm tra xem nhân viên có tồn tại trong CSDL không
        $result = mysqli_query($conn, "SELECT * FROM loaive WHERE Maloaive = '$Maloaive'");
        if (mysqli_num_rows($result) > 0) {
            $row = mysqli_fetch_assoc($result);
            $tenLoaiVe = $row['Tenloaive'];
            // Xóa phim khỏi CSDL nếu người dùng xác nhận
            if (isset($_POST['confirmDelete']) && $_POST['confirmDelete'] == 'yes') {
                mysqli_query($conn, "DELETE FROM loaive WHERE Maloaive = '$Maloaive'");
                $deleted = true;
            }
        } else {
            echo "<p>Không tìm thấy loại vé.</p>";
        }
    }
    ?>
            <?php if (isset($deleted) && $deleted) : ?>
            <p>Loại vé đã được xóa thành công.</p>
            <p>
                <a href="hienthiLV.php">Quay lại danh sách loại vé</a>
            </p>
            <?php else : ?>
            <h2>Bạn có chắc chắn muốn xóa loại vé <span style="color: #FF2A2A;"><?php echo $tenLoaiVe; ?></span> không?
            </h2>
            <form method="POST" onsubmit="return confirmDelete();">
                <input type="hidden" name="confirmDelete" value="yes">
                <input type="submit" value="Xóa">
            </form>
            <p>
                <a href="hienthiLV.php">Quay lại danh sách loại vé</a>
            </p>
            <?php endif; ?>
        </div>
    </div>
</body>

</html>