<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>THỂ LOẠI</title>
    <link rel="stylesheet" href="../css/admin.css">
    <style>
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
        //Kết nối csdl
        require("../connect.php");

        $sql = 'select * from theloai';
        $result = mysqli_query($conn, $sql);

        echo "<p align='center'><font size='5' color='#FF2A2A'>THÔNG TIN THỂ LOẠI</font></p>";
        echo "<table align='center' width='600' border='1' cellpadding='2' cellspacing='2' style='border-collapse:collapse; border-color: #FF2A2A'>";
        echo '<tr style="background-color: #FF2A2A; color: white">
            <th width="100">STT</th>
            <th width="150">Mã thể loại</th>
            <th width="350">Tên thể loại</th>
            <th width="150">Thao tác</th> <!-- Cột mới cho nút sửa -->
        </tr>';

        if(mysqli_num_rows($result) <> 0){  
            $stt=1;
            while($rows=mysqli_fetch_row($result))
            {          
                if($stt%2==0){
                    echo '<tr style="background-color: " >';
                    echo "<td align='center'>$stt</td>";
                    echo "<td>$rows[0]</td>";
                    echo "<td>$rows[1]</td>";
                    echo "<td><a href='suaTheLoai.php?id=$rows[0]'>Sửa</a> | <a href='xoaTheLoai.php?id=$rows[0]'>Xóa</a></td>"; // Nút sửa với liên kết đến trang "suaTheLoai.php" và truyền ID làm tham số trong URL
                    echo "</tr>";
                    $stt+=1;
                }
                else{
                    echo '<tr  style="background-color: ">';
                    echo "<td align='center'>$stt</td>";
                    echo "<td>$rows[0]</td>";
                    echo "<td>$rows[1]</td>";
                    echo "<td><a href='suaTheLoai.php?id=$rows[0]'>Sửa</a> | <a href='xoaTheLoai.php?id=$rows[0]'>Xóa</a></td>"; // Nút sửa với liên kết đến trang "suaTheLoai.php" và truyền ID làm tham số trong URL
                    echo "</tr>";
                    $stt+=1;
                }
            }
        }

        // Hiển thị thông tin thể loại đã cập nhật
        if(isset($_GET['updated']) && $_GET['updated'] == 'true') {
            echo "<p align='center'>Cập nhật thành công!</p>";
            echo "<table align='center' width='400' border='1' cellpadding='2' cellspacing='2' style='border-collapse:collapse'>";
            echo '<tr>
                <th width="100">STT</th>
                <th width="150">Mã thể loại</th>
                <th width="150">Tên thể loại</th>
                <th width="150">Sửa</th> <!-- Cột mới cho nút sửa -->
            </tr>';

            if(mysqli_num_rows($result) <> 0){  
                $stt=1;
                while($rows=mysqli_fetch_row($result))
                {          
                    if($stt%2==0){
                        echo '<tr style="background-color: #B6FFFA" >';
                        echo "<td align='center'>$stt</td>";
                        echo "<td>$rows[0]</td>";
                        echo "<td>$rows[1]</td>";
                        echo "<td><a href='suaTheLoai.php?id=$rows[0]'>Sửa</a> | <a href='xoaTheLoai.php?id=$rows[0]'>Xóa</a></td>"; // Nút sửa với liên kết đến trang "suaTheLoai.php" và truyền ID làm tham số trong URL
                        echo "</tr>";
                        $stt+=1;
                    }
                    else{
                        echo '<tr  style="background-color: #80B3FF">';
                        echo "<td align='center'>$stt</td>";
                        echo "<td>$rows[0]</td>";
                        echo "<td>$rows[1]</td>";
                        echo "<td><a href='suaTheLoai.php?id=$rows[0]'>Sửa</a> | <a href='xoaTheLoai.php?id=$rows[0]'>Xóa</a></td>"; // Nút sửa với liên kết đến trang "suaTheLoai.php" và truyền ID làm tham số trong URL
                        echo "</tr>";
                        $stt+=1;
                    }
                }
            }
            echo "</table>";
        }
        else {
            // Hiển thị thông tin thể loại ban đầu
            // ...
        }

        echo"</table>";

    ?>
            <p class="them" align='center'><a href='themTheLoai.php'>Thêm mới</a></p>
        </div>
    </div>
</body>

</html>