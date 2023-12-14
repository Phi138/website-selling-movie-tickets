<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Xóa quốc gia</title>
    <link rel="stylesheet" href="../css/admin.css">
    <style>
    p{
        text-align: center;
        box-sizing: border-box;
        font-family: 'Courier New', Courier, monospace;
        color: #C70039;
    }
    /* th, td {
        border: 1px solid black;
        padding: 8px;
        text-align: left;
    } */
    th {
        background-color: blue;
        color: white;
    }
    .image-column {
        text-align: center;
    }
    form {
        width: 400px;
        margin: 0 auto;
        padding: 20px;
        background-color: #FFDFDF;
        border: 1px solid #ccc;
        border-radius: 5px;
    }
    h1{
        color:#CE5A67;
    }
    label {
        display: block;
        margin-bottom: 10px;
        font-weight: bold;
    }
    /* a{
        background-color: #C70039;
        color: white;
        padding: 8px 15px;
        border: none;
        border-radius: 4px;
        cursor: pointer;
        text-decoration: none;
    } */
    input[type="text"],
    textarea {
        width: 100%;
        padding: 10px;
        border: 1px solid #ccc;
        border-radius: 4px;
        box-sizing: border-box;
        margin-bottom: 20px;    
    }
    select {
        width: 100%;
        padding: 10px;
        border: 1px solid #ccc;
        border-radius: 4px;
        box-sizing: border-box;
        margin-bottom: 20px;
    }
    input[type="submit"] {
        margin-top: 10px;
        background-color: #CE5A67;
        color: white;
        padding: 10px 20px;
        border: none;
        border-radius: 4px;
        cursor: pointer;
    }
    input[type="submit"]:hover {
        background-color: #C70039;
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
$servername = "localhost";
$username = "root";
$password = "";
$account = "web_cinema";
$conn = new mysqli($servername, $username, $password, $account);
// Kiểm tra kết nối
if ($conn->connect_error) {
    die("Kết nối database thất bại: " . $conn->connect_error);
}

if (isset($_GET['id'])) { 
    $id = $_GET['id']; 
    // Truy vấn thông tin khách hàng 
    $query = "SELECT * FROM quocgia WHERE MaQuocgia = '$id'"; 
    $result = mysqli_query($conn, $query); 
    $row = mysqli_fetch_assoc($result); 
    if ($row) { 
        $country_name = $row['TenQuocGia'];
        echo " 
        <form action='' method='POST'> 
            <input type='hidden' name='id' value='$id'> 
            <table>
                <h1>Thông tin Quốc Gia</h1> 
                <tr>
                    <td>Mã Quốc Gia:</td>
                    <td>$id</td>
                </tr>
                <tr>
                    <td>Tên Quốc Gia:</td>
                    <td>$country_name</td>
                </tr>
            </table>
            <input type='submit' name='confirm_delete' value='Đồng ý'> 
            <a href='details.php'>Hủy bỏ</a> 
        </form> 
        <p>Bạn có chắc chắn muốn xóa Quốc Gia sau không?</p> 
        "; 
    } else { 
        echo "Quốc Gia không tồn tại."; 
    } 
} else { 
    echo "Mã Quốc Gia không được cung cấp."; 
} 
// Xử lý khi người dùng nhấn nút "Đồng ý" để xóa khách hàng 
if (isset($_POST['confirm_delete'])) { 
    if (isset($_POST['id'])) { 
        // Lấy thông tin từ form 
        $id = $_POST['id']; 
        // Xóa khách hàng từ cơ sở dữ liệu 
        $delete_query = "DELETE FROM quocgia WHERE MaQuocgia = '$id'"; 
        mysqli_query($conn, $delete_query); 
        // Điều hướng về trang danh sách khách hàng 
        header("Location: details.php"); 
        exit(); 
    } else { 
        echo "Mã Quốc Gia không được cung cấp."; 
    } 
} 
?>
        </div>
    </div>
</body>
</html>