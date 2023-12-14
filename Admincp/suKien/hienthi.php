
</html>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DANH SÁCH PHÒNG CHIẾU</title>
    <link rel="stylesheet" href="../css/admin.css">
    <style>
        table {
            border-collapse: collapse;
            width: 100%;
            background-color: #EEEDED;
        }

        /* Áp dụng kiểu cho tiêu đề bảng */
        th {
            background-color: #FF2A2A;
            color: #fff;
            padding: 10px;
        }

        /* Áp dụng kiểu cho các ô dữ liệu */
        td {
            text-align: center;
            padding: 10px;
        }
        .tieuDe{
            color:#FF2A2A;
            font-weight: bold;
        }
        .so{
            width: 100%;
            text-align: center;
        }
        .so a{
            padding: 0px 10px;
        }
        .aleft{
            text-align: left;
        }
        .them a {
  background-color: white;
  color: #FF2A2A;
  border: 1px solid #FF2A2A;
  cursor: pointer;
  font-weight: bold;
  transition: background-color 0.3s ease;
  text-decoration: none;
  margin: 0px 100px;
}

.them a:hover {
  background-color: #FF2A2A;
  color: white;
}
        .a {  -webkit-transition-duration: 0.4s; /* Safari */  transition-duration: 0.4s;}.button:hover {  background-color: crimson;  color: white;}
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
echo "";
// Lấy danh sách phòng từ cơ sở dữ liệu
$query = "SELECT * FROM quangcao";
$result = mysqli_query($conn, $query);
 echo "<table align='center' width='1200' border='1' cellpadding='2' cellspacing='2' style='border-collapse:collapse'>";
 
 echo '<tr>
    <th width="50">STT</th>
    <th width="150">Mã Phòng</th>
    <th width="520">Tên Phòng</th>
    <th width="270">Ảnh sự kiện</th>
    <th width="100">Sửa</th>
    <th width="100">Xóa</th>
</tr>';
// Lặp qua từng phòng và hiển thị thông tin
if(mysqli_num_rows($result)<>0)
 {   $stt=1;
    while($rows=mysqli_fetch_row($result))
    {          echo '<tr>';
             echo "<td>$stt</td>";
             echo "<td>$rows[0]</td>";
             echo "<td>$rows[1]</td>";
             echo "<td>$rows[2]</td>";
             echo "<td><a href='chinhsuasukien.php?id=$rows[0]'>Sửa</a></td>";
             echo "<td><a href='delete_room.php?id=$rows[0]'>Xóa</a></td>";
             echo "</tr>";
                 $stt+=1;
    }
    echo "<p class='tieuDe' align='left'><font face= 'Verdana, Geneva, sans-serif' size='5'><span class='them' align='left' style='font-size: 27px'><a href='themsukien.php'>Thêm mới</a></span>DANH SÁCH SỰ KIỆN</font></p>";
 }
 echo "</table>";
 echo '<p colspan="8" align="center">
 
</p>';



// Đóng kết nối đến cơ sở dữ liệu
mysqli_close($conn);
?>
        </div>
    </div>
</body>
</html>
