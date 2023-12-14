<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BAI 4 - NHAP VA TINH TREN DAY SO</title>
    <style>
        body{
            display: flex;
            justify-content: center;
        }
        table {
            border-collapse: collapse;
            width: 100%;
            background-color: #9EDDFF;
        }
        
        /* Áp dụng kiểu cho tiêu đề bảng */
        th {
            background-color: #793FDF;
            color: white;
            padding: 10px;
        }
        
        /* Áp dụng kiểu cho các ô dữ liệu */
        td{
            padding: 10px;
        }
        .do{
            font-weight: bold;
            color: #B0578D;
        }
        input[type="submit"] {
            background-color: #fff;
            color: #007bff;
            border: 1px solid blue;
            cursor: pointer;
            font-weight: bold;
            transition: background-color 0.3s ease;
        }
        input[type="submit"]:hover {
            background-color: #0056b3;
            color: #fff;
        }
        .tong{
            color: #FF3FA4;
            font-weight: bold;
        }
    </style>
</head>
<body>
    <?php
        if(isset($_POST['daySo'])){
            $daySo=$_POST['daySo'];
        }
        else
            $daySo="";
        $tong="";
        if(isset($_POST['tinh'])){
            $arr = array();
            $arr = explode(",", $daySo);
            $tong = array_sum($arr);
            $arr = implode(" ", $arr);
            $file=fopen("duLieu_bai4.txt", "w");
            fwrite($file, $arr);
            fclose($file);
        }
        
    ?>
    <form action="Bai4_tong_day_so.php" method="post">
        <table>
            <thead><th colspan="3" align="center">NHẬP VÀ TÍNH TRÊN DÃY SỐ</th></thead>
            <tr>
                <td>Nhập dãy số:</td>
                <td>
                    <input type="text" name="daySo" id="" value="<?php echo $daySo; ?>">
                </td>
                <td class="do">(*)</td>
            </tr>
            <tr>
                <td></td>
                <td>
                    <input type="submit" value="Tổng dãy số" name="tinh">
                </td>
            </tr>
            <tr>
                <td>Tổng dãy số:</td>
                <td>
                    <input class="tong" type="text" name="tong" id="" value="<?php echo $tong; ?>" disabled="disabled">
                </td>
            </tr>
            <tr><td class="do" colspan="3" align="center">(*) Các số được nhập cách nhau bằng dấu ","</td></tr>
        </table>
    </form>
</body>
</html>