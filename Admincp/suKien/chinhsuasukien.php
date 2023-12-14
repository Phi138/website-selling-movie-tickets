<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chỉnh sửa sự kiện</title>
    <link rel="stylesheet" href="../css/admin.css">
    <style>
        /* Áp dụng kiểu cho form chỉnh sửa sự kiện */
        form {
            width: 400px;
            margin: 0 auto;
            padding: 20px;
            background-color: #EEEDED;
        }

        input[type="text"],
        input[type="file"] {
            width: 100%;
            padding: 10px;
            margin-bottom: 10px;
        }

        input[type="submit"] {
            background-color: #FF2A2A;
            color: #fff;
            padding: 10px 20px;
            border: none;
            cursor: pointer;
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

        // Kiểm tra xem có tham số ID được truyền vào không
        if (isset($_GET['id'])) {
            $id = $_GET['id'];

            // Lấy thông tin sự kiện từ cơ sở dữ liệu
            $query = "SELECT * FROM quangcao WHERE MaQC='$id'";
            $result = mysqli_query($conn, $query);
            $row = mysqli_fetch_assoc($result);
            // Kiểm tra xem sự kiện có tồn tại không
            if ($row) {
                $tenqc = $row['Tenquangcao'];
                $hinhAnh = $row['Anhminhhoa'];
                // Hiển thị form chỉnh sửa thông tin sự kiện
                echo "
                    <h1>Chỉnh sửa sự kiện</h1>
                    <form action='' method='POST' enctype='multipart/form-data'>
                        <input type='hidden' name='id' value='$id'>
                        <label for='tenqc'>Tên sự kiện:</label>
                        <input type='text' id='tenqc' name='tenqc' value='$tenqc' required><br><br>
                        <label for='hinhAnh'>Ảnh sự kiện:</label>
                        <input type='file' id='hinhAnh' name='hinhAnh' required><br><br>
                        <input class='them' type='submit' name='update_event' value='Cập nhật sự kiện'>
                    </form>
                ";
                if (isset($_POST['update_event'])) {
                    // Lấy thông tin từ form
                    $id = $_POST['id'];
                    $tenqc = $_POST['tenqc'];

                    // Kiểm tra và lưu file ảnh mới
                    if (isset($_FILES['hinhAnh']) && $_FILES['hinhAnh']['error'] == UPLOAD_ERR_OK) {
                        $hinhAnh = $_FILES['hinhAnh']['name'];
                        $tempFile = $_FILES['hinhAnh']['tmp_name'];
                        $targetDirectory = "../hinhPhim/"; // Thay đổi đường dẫn thư mục nếu cần thiết

                        // Di chuyển file ảnh từ thư mục tạm vào thư mục đích
                        if (move_uploaded_file($tempFile, $targetDirectory . $hinhAnh)) {
                            // Cập nhật thông tin sự kiện trong cơ sở dữ liệu
                            $update_query = "UPDATE quangcao SET Tenquangcao='$tenqc', Anhminhhoa='$hinhAnh' WHERE MaQC='$id'";
                            mysqli_query($conn, $update_query);
                            echo "Cập nhật sự kiện thành công.";
                            exit();
                        } else {
                            echo "Không thể upload file ảnh.";
                        }
                    } else {
                        echo "Vui lòng chọn một file ảnh mới.";
                    }                
                }
            } else {
                echo "Sự kiện không tồn tại.";
            }
        } else {
            echo "Mã sự kiện không được cung cấp.";
        }

        // Đóng kết nối đến cơ sở dữ liệu
        mysqli_close($conn);
        ?>
    </div>
</div>
</body>

</html>