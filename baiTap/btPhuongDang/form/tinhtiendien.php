<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=foe, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php 
    if (isset($_POST['chuho']))
    $chuho=$_POST['chuho'];
    else $chuho="";
    if (isset($_POST['chisocu']))
    $chisocu=trim($_POST['chisocu']);
    else $chisocu=0;
    if (isset($_POST['chisomoi']))
    $chisomoi=trim($_POST['chisomoi']);
    else $chisomoi=0;
    if (isset($_POST['dongia']))
    $dongia=$_POST['dongia'];
    else $dongia=20000;
    if (isset($_POST['tinh'])){
        if (is_numeric($chisocu) && is_numeric($chisomoi) && $chisomoi>=$chisocu){
            $tienthanhtoan=($chisomoi - $chisocu)*$dongia;
        }
        else {
            echo "Chi so khong hop le";
            $tienthanhtoan="";
        }
    }
    else {
        $tienthanhtoan=0;
    }

    ?>
    <form action="" method="post">
        <table>
            
            <thead>
                <th colspan='3' align='center'>THANH TOÁN TIỀN ĐIỆN</th>
            </thead>
            <tr>
                <td>Tên chủ hộ</td>
                <td>
                    <input type="text" name="chuho" id="" value="<?php echo $chuho; ?>">
                </td>
            </tr>
            <tr>
                <td>Chỉ số cũ: </td>
                <td><input type="text" name="chisocu" id="" value="<?php echo $chisocu; ?>"></td>
                <td>(Kw)</td>
            </tr>
            <tr>
                <td>Chỉ số mới: </td>
                <td>
                    <input type="text" name="chisomoi" id="" value="<?php echo $chisomoi; ?>">
                </td>
                <td>(Kw)</td>
            </tr>
            <tr>
                <td>Đơn giá: </td>
                <td><input type="text" name="dongia" id="" value="<?php echo $dongia; ?>"></td>
                <td>(VNĐ)</td>
            </tr>
            <tr>
                <td>Số tiền thanh toán: </td>
                <td><input type="text" name="tienthanhtoan" id="" disabled="disabled" value="<?php echo $tienthanhtoan; ?>"></td>
                <td>(VNĐ)</td>
            </tr>
            <tr>
                <td colspan='3' align='center'>
                    <input type="submit" value="tinh" name="tinh">
                </td>
            </tr>
        </table>
    </form>
</body>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <style type="text/css">
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

</html>