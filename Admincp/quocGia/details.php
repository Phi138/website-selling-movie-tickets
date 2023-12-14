<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Danh sách Quốc gia</title>
    <link rel="stylesheet" href="../css/admin.css">
    <style>
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
$servername = "localhost";
$username = "root";
$password = "";
$account = "web_cinema";
$conn = new mysqli($servername, $username, $password, $account);
// Check connection
if ($conn->connect_error) {
    die("Kết nối database thất bại: " . $conn->connect_error);
}
echo "";
$query = ("SELECT * FROM quocgia");
$result = mysqli_query($conn,$query);
// Hiển thị danh sách quốc gia
echo "<p align='center'><font size='5' color='#FF2A2A'> Danh sách quốc gia</font></P>";
 echo "<table align='center' width='1000' border='1' cellpadding='2' cellspacing='2' style='border-collapse:collapse'>";
 echo '<tr style="background-color: #FF2A2A; color: white">
    <th width="50">STT</th>
    <th width="150">Mã Quốc gia</th>
    <th width="520">Tên Quốc gia</th>
    <th>Sửa</th>
    <th>Xóa</th>
</tr>';
if(mysqli_num_rows($result)<>0)
 {   $stt=1;
    while($rows=mysqli_fetch_row($result))
    {         echo '<tr>';
             echo "<td>$stt</td>";
             echo "<td>$rows[0]</td>";
             echo "<td>$rows[1]</td>";
             echo "<td><a href='edit_country.php?id=$rows[0]'>Sửa</a></td>";
             echo "<td><a href='deletecountry.php?id=$rows[0]'>Xóa</a></td>";
             echo "</tr>";
                 $stt+=1;
    }
 }
 echo "</table>";
 echo '<p colspan="8" align="center">
 <input class="them" type="button" value="Thêm" onclick="window.location.href=\'addcountry.php\'" />
</p>';
// Đóng kết nối đến cơ sở dữ liệu
mysqli_close($conn);
?>

        </div>
    </div>
</body>
</html>