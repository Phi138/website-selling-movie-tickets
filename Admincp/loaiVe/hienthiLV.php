<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Frameset//EN">

<html>

<head>

    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">

    <title>Thông tin loại vé</title>
    <link rel="stylesheet" href="../css/admin.css">
    <style>
    button {
        width: 100px;
        color: #FF2A2A;
        background-color: #FFFF;
        border-radius: 5px;
        border-color: #FF2A2A;
        margin-left: 500px;
    }

    button:hover {
        background-color: #FF2A2A;
        color: #ffff;
    }

    th {
        color: #FF2A2A;
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
    // Ket noi CSDL
    require("../connect.php");
    
    $sql = 'select Maloaive,Tenloaive from loaive';
    $result = mysqli_query($conn, $sql);
    echo "<p align='center'><font size='5' color='#FF2A2A'> THÔNG TIN VÉ</font></P>";
    echo "<a href='themVe.php'>
    <button>Thêm mới</button>
  </a>";
    echo "<table align='center' width='350' border='1' cellpadding='2' cellspacing='2' style='border-collapse:collapse'>";
    echo '<tr>
    <th width="150">Mã loại vé</th>
     <th width="100">Tên loại vé</th>
</tr>';
    if (mysqli_num_rows($result) <> 0) {
        $stt = 1;

        while ($rows = mysqli_fetch_row($result)) {
            if ($stt % 2 == 0) {
                echo "<tr>";

                echo "<td>$rows[0]</td>";

                echo "<td>$rows[1]</td>";

                echo "<td><a href='suaLV.php?Maloaive=" . $rows[0] . "'>Sửa</a></td>";
                echo "<td><a href='xoaLV.php?Maloaive=" . $rows[0] . "'>Xóa</a></td>";

                echo "</tr>";

                $stt += 1;
            } else {
                echo "<tr>";

                echo "<td>$rows[0]</td>";

                echo "<td>$rows[1]</td>";

                echo "<td><a href='suaLV.php?Maloaive=" . $rows[0] . "'>Sửa</a></td>";
                echo "<td><a href='xoaLV.php?Maloaive=" . $rows[0] . "'>Xóa</a></td>";

                echo "</tr>";

                $stt += 1;
            }
        }
    }
    echo "</table>";
    ?>
        </div>
    </div>
</body>

</html>