<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chỉnh sửa Quốc gia</title>
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
    die("Connection failed: " . $conn->connect_error);
}

// Kiểm tra xem Mã Quốc gia đã được truyền qua từ trang danh sách Quốc gia hay chưa
if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Truy vấn thông tin phòng từ cơ sở dữ liệu
    $query = "SELECT * FROM quocgia WHERE MaQuocgia='$id'";
    $result = mysqli_query($conn, $query);
    $row = mysqli_fetch_assoc($result);

    // Kiểm tra xem Quốc gia có tồn tại hay không
    if ($row) {

        $country_name = $row['TenQuocGia'];
        // Hiển thị form chỉnh sửa thông tin Quốc gia
        echo "
        <h1>Chỉnh sửa Quốc gia</h1>
        <form action='' method='POST'>
            <input type='hidden' name='id' value='$id'>
            <label for='country_name'>Tên quốc gia:</label>
            <input type='text' id='country_name' name='country_name' value='$country_name' required><br><br>
            <input class='them' type='submit' name='update_country' value='Cập nhật phòng'>
            </form>
            ";
    } else {
        echo "Quốc gia không tồn tại.";
    }
} else {
    echo "Mã Quốc gia không được cung cấp.";
}

// Xử lý khi người dùng nhấn nút "Cập nhật Quốc gia"
if (isset($_POST['update_country'])) {
    // Lấy thông tin từ form
    $id = $_POST['id'];
    $country_name = $_POST['country_name'];
    // Cập nhật thông tin Quốc gia trong cơ sở dữ liệu
    $update_query = "UPDATE quocgia SET TenQuocGia='$country_name' WHERE MaQuocgia='$id'";
    mysqli_query($conn, $update_query);
    // Điều hướng về trang danh sách Quốc gia
    header("Location: details.php");
    exit();
}
?>
        </div>
    </div>
</body>
</html>