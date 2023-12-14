<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thêm Quốc gia</title>
    <link rel="stylesheet" href="../css/admin.css">
    <style>
        h1{
            color: #FF2A2A;
        }
        .them {
            background-color: white;
            color: #FF2A2A;
            border: 1px solid #FF2A2A;
            cursor: pointer;
            font-weight: bold;
            transition: background-color 0.3s ease;
            text-decoration: none;
            margin: 0px 100px;
        }
        .them:hover {
            background-color: #FF2A2A;
            color: white;
        }
    </style>
</head>
<body>
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
    // Xử lý khi người dùng nhấn nút "Thêm quốc gia"
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Lấy thông tin từ form
    $country_code = $_POST['country_code'];
    $country_name = $_POST['country_name'];
    // Thêm quốc gia vào bảng quốc gia
    $insert_query = "INSERT INTO quocgia (MaQuocgia, TenQuocGia) VALUES ('$country_code', '$country_name')";
    mysqli_query($conn, $insert_query);
    // Lấy ID của Quốc gia vừa được thêm
    $country_id = mysqli_insert_id($conn);
    // Điều hướng về trang danh sách phòng
    header("Location: details.php");
    exit();
}
    mysqli_close($conn);
    ?>
    <form action="" method="POST">
    <h1>Thêm quốc gia</h1>
  <label for="country_code">Mã Quốc gia:</label>
  <input type="text" id="country_code" name="country_code" required><br><br>
  <label for="country_name">Tên Quốc Gia:</label>
  <input type="text" id="country_name" name="country_name" required><br><br>
  <input class="them" type="submit" value="Thêm quốc gia">
</form>
        </div>
    </div>
</body>
</body>
</html>