<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ADMIN</title>
    <style>
        ul {
            list-style-type: none;
            padding: 0;
            width: 200px;
            background-color: #f1f1f1;
        }
        
        li a {
            display: block;
            color: #FF2A2A;
            padding: 8px 16px;
            text-decoration: none;
        }
        li a:hover {
            background-color: #FF2A2A;
            color: white;
        }
        .header table{
            border: 2px solid #FF2A2A;
            width: 100%
        }
        .header td{
            text-align: left;
        }
    </style>
</head>
<body>
    <div class="header">
    <table>
            <tr><td style="text-align: center;"><img src="../hinhPhim/favicon.svg" alt=""></td></tr>
            <tr>
                <?php
                session_start();
                if(isset($_SESSION["username"])){
                    $username = $_SESSION["username"];
                    echo "Xin chào, " . $username . "! ";
                    echo '<form method="post" action="../logout.php">';
                    echo '<input type="submit"  name = "dangxuat" value="Đăng xuất">';
                    echo '</form>';
                }else {
                    echo '<td>Xin chào em</td>';
                }
                ?>
            </tr>
        </table>
    </div>
    <!-- Menu bên trái
    <ul>
        <li><a href="./phim.php">Quản lý phim</a></li>
        <li><a href="./theLoai.php">Quản lý thể loại</a></li>
        <li><a href="#">Quản lý nhân viên</a></li>
        <li><a href="#">Quản lý khách hàng</a></li>
    </ul> -->
</body>
</html>