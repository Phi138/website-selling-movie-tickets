<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DANH SÁCH PHIM</title>
    <link rel="stylesheet" href="../css/admin.css">
    <style>

/* Thiết lập các phần tử trong form */
form {
  margin-bottom: 20px;
}

label {
  display: block;
  margin-bottom: 5px;
}

input[type="text"],
input[type="number"] {
  width: 100%;
  padding: 5px;
  margin-bottom: 10px;
}

input[type="submit"] {
  background-color: #FF2A2A;
  color: white;
  padding: 10px 20px;
  border: none;
  cursor: pointer;
}

input[type="submit"]:hover {
  background-color: #FF2A2A;
}

h1 {
    color:#FF2A2A;
  font-size: 24px;
  margin-bottom: 20px;
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

// Xử lý khi người dùng nhấn nút "Thêm phòng"
if (isset($_POST['them'])) {
    // Lấy thông tin từ form
    $maqc = $_POST['maqc'];
    $tenqc = $_POST['tenqc'];
    // xử lý ảnh
   // xử lý ảnh
   $hinhAnh = $_FILES['hinhAnh'];
   $file_Name = $hinhAnh['name'];
   $fileSize = $hinhAnh['size'];
   $dirTMP = $hinhAnh['tmp_name']; // khi up file lên sẽ được lưu tạm vào đây
   //Kiểm tra kích thước
   $maxFileSize = 20 * 1024 * 1024;
   if ($fileSize > $maxFileSize) {
     $err = "Kích thước ảnh nên bé hơn hoặc bằng 20 MB";
   }

   // Kiểm tra định dạng
   $fileEx = pathinfo($file_Name, PATHINFO_EXTENSION);
   $acceptedtEx = ['jpg', 'jpeg', 'png', 'gif', 'bmp'];

   move_uploaded_file($dirTMP,"../hinhPhim/". $file_Name);
    $insert_query = "INSERT INTO quangcao (MaQC, Tenquangcao, Anhminhhoa) VALUES ('$maqc', '$tenqc', '$file_Name')";
    mysqli_query($conn, $insert_query);
}

// Đóng kết nối đến cơ sở dữ liệu
mysqli_close($conn);
?>
    <form action="" method="POST" enctype="multipart/form-data">
        <h1>Thêm sự kiện</h1>
    <label for="maqc">Mã sự kiện:</label>
    <input type="text" id="maqc" name="maqc" required><br><br>

    <label for="tenqc">Tên sự kiện:</label>
    <input type="text" id="tenqc" name="tenqc" required><br><br>

    <label for="hinhAnh">Thêm hình ảnh:</label>
    <input type="file" name="hinhAnh" id="hinhAnh" required><br><br>

    <input name="them" type="submit" value="Thêm sự kiện">
    </form>
</body>

        </div>
    </div>

</body>
</html>
