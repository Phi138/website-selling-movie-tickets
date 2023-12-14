
<!DOCTYPE html> 
<html lang="vi"> 
<head> 
    <meta charset="UTF-8"> 
    <meta name="viewport" content="width=device-width, initial-scale=1.0"> 
    <title>Chi tiết lịch chiếu phim</title> 
    <link rel="stylesheet" href="../css/admin.css">
    <style> 
        /* CSS cho bảng */ 
        h1 { 
          text-align: center; 
        } 
        table { 
            width: 100%; 
            border-collapse: collapse; 
        } 
        th, td { 
            padding: 8px; 
            text-align: left; 
            border-bottom: 1px solid #ddd; 
        } 
        th { 
            background-color: #ff2a2a; 
            color: white; 
        } 
        /* CSS cho nút thêm */ 
        .add-button { 
            display: inline-block; 
            padding: 8px 16px; 
            background-color: #ff2a2a; 
            color: white; 
            text-decoration: none; 
            border-radius: 4px; 
            margin-bottom: 30px; 
        } 
        /* CSS cho liên kết trong bảng */ 
        .edit-link, .delete-link { 
          display: inline-block; 
            padding: 8px 16px; 
            background-color: #ff2a2a; 
            color: white; 
            text-decoration: none; 
            border-radius: 4px; 
        } 
        .edit-link:hover, .delete-link:hover { 
            color: red; 
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
        <h1>Chi tiết lịch chiếu phim</h1> 
    <a href="add_lichchieuphim.php" class="add-button">Thêm lịch chiếu phim</a> 
    <table> 
        <tr> 
            <th>Mã lịch phim</th> 
            <th>Lịch chiếu</th> 
            <th>Phòng chiếu</th> 
            <th>Tên phim</th> 
            <th>Thời gian kết thúc phim</th> 
            <th></th> 
            <th></th> 
        </tr> 
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
// Truy vấn dữ liệu 
$query = "SELECT lichchieuphim.MaLichPhim, lichchieuphim.MaLichChieu, phong.TenPhong, phim.TenPhim, lichchieuphim.thoigianketthuc, lichchieu.GioChieu
FROM lichchieuphim
JOIN lichchieu ON lichchieuphim.MaLichChieu = lichchieu.MaLichChieu
JOIN phong ON lichchieuphim.MaPhong = phong.MaPhong
JOIN phim ON lichchieuphim.MaPhim = phim.MaPhim"; 
$result = mysqli_query($conn, $query); 
        // Kiểm tra và hiển thị dữ liệu 
        if (mysqli_num_rows($result) > 0) { 
            while ($row = mysqli_fetch_assoc($result)) { 
                echo "<tr>"; 
                echo "<td>" . $row['MaLichPhim'] . "</td>"; 
                echo "<td>" . $row['MaLichChieu'] . "</td>"; 
                echo "<td>" . $row['TenPhong'] . "</td>"; 
                echo "<td>" . $row['TenPhim'] . "</td>"; 
                echo "<td>" . $row['thoigianketthuc'] . "</td>"; 
                echo "<td><a href='edit_lichchieuphim.php?id=" . $row['MaLichPhim'] . " ' class='edit-link' >Sửa</a></td>"; 
                echo "<td><a href='delete_lichchieuphim.php?id=" . $row['MaLichPhim'] ."' onclick='return confirm(\"Bạn có chắc chắn muốn xóa không?\")' class='delete-link' >Xóa</a></td>";                echo "</tr>"; 
            } 
        } else { 
            echo "<tr>"; 
            echo "<td colspan='7'>Không có dữ liệu</td>"; 
            echo "</tr>"; 
        } 
        // Đóng kết nối 
        mysqli_close($conn); 
        ?> 
    </table> 
        </div>
    </div>
</body>
</html>