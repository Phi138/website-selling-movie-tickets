<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thanh toán </title>
    <style type="text/css">
        body {  
            background-color: #d24dff;
        }
        table{
            background: #ffd94d;
            border: 0 solid yellow;
        }
        thead{
            background: #fff14d;    
        }
        td {
            color: blue;
        }
        h3{
            font-family: verdana;
            text-align: center;
            /* text-anchor: middle; */
            color: #ff8100;
            font-size: medium;
        }
    </style>
</head>
<body>
    <?php
    if(isset($_POST['tenChuHo'])){
        $tenChuHo=$_POST['tenChuHo'];
    }
    else $tenChuHo="";

    if(isset($_POST['chiSoCu'])){
        $chiSoCu=trim($_POST['chiSoCu']);
    }
    else $chiSoCu=0;

    if(isset($_POST['chiSoMoi'])){
        $chiSoMoi=trim($_POST['chiSoMoi']);
    }
    else $chiSoMoi=0;

    if(isset($_POST['donGia'])){
        $donGia=trim($_POST['donGia']);
    }
    else $donGia=20000;

    if(isset($_POST['tinh'])){
        if(is_numeric($chiSoCu) && is_numeric($chiSoMoi)&&$chiSoCu<=$chiSoMoi){
            $tien=($chiSoMoi-$chiSoCu)*$donGia;
        }
        else{
            echo "<font color='red'>Chỉ số không hợp lệ!</font>";
            $tien="";
        } 
    }
    else $tien="";
    ?>
    <form action="tiendien.php" method="post">
        <table>
            <thead>
                <th colspan="3" align="center">THANH TOÁN TIỀN ĐIỆN</th>
            </thead>
            <tr>
                <td>Tên chủ hộ:</td>
                <td><input type="text" name="tenChuHo" id="" value="<?php echo $tenChuHo ?>"></td>
            </tr>
            <tr>
                <td>Chỉ số cũ:</td>
                <td><input type="text" name="chiSoCu" id="" value="<?php echo $chiSoCu ?>"></td>
                <td>(Kw)</td>
            </tr>
            <tr>
                <td>Chỉ số mới:</td>
                <td><input type="text" name="chiSoMoi" id="" value="<?php echo $chiSoMoi ?>"></td>
                <td>(Kw)</td>
            </tr>
            <tr>
                <td>Đơn giá:</td>
                <td><input type="text" name="donGia" id="" value="<?php echo $donGia ?>"></td>
                <td>(VND)</td>
            </tr>
            <tr>
                <td>Số tiền thanh toán:</td>
                <td><input type="text" name="tien" id="" disabled="disabled" value="<?php echo $tien ?>"></td>
                <td>(VND)</td>
            </tr>
            <tr>
                <td colspan="3" align="center"><input type="submit" name="tinh" id=""  value="Tính"></td>
            </tr>
        </table>
    </form>
</body>
</html>