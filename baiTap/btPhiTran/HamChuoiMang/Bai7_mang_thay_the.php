<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BAI 7 - MANG THAY THE</title>
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
        function xuatMang($arr){
            $kq="";
            $kq=implode(" ",$arr);
            return $kq;
        }
        function thayThe(&$arr, $cu, $moi){
            for($i=0; $i<count($arr); $i++){
                if($arr[$i]==$cu)
                    $arr[$i]=$moi;
            }
            return $arr;
        }
        if(isset($_POST['mang']))
            $mang=$_POST['mang'];
        else $mang="";
        if(isset($_POST['gtctt']))
            $gtctt=trim($_POST['gtctt']);
        else
            $gtctt="";
        if(isset($_POST['gttt']))
            $gttt=trim($_POST['gttt']);
        else
            $gttt="";
        $mangCu="";
        $mangSau="";
        if(isset($_POST['thayThe'])){
            if(!is_numeric($gtctt))
                $gtctt="";
            if(!is_numeric($gttt))
                $gttt="";
            if(is_numeric($gtctt) && is_numeric($gttt)){
                $arr=explode(",", $mang);
                $mangCu=xuatMang($arr);
                thaythe($arr, $gtctt, $gttt);
                $mangSau=xuatMang($arr);
            }  
        }
    ?>
    <form action="Bai7_mang_thay_the.php" method="post">
        <table>
            <thead><th colspan="2" align="center">THAY THẾ</th></thead>
            <tr>
                <td>Nhập các phần tử:</td>
                <td>
                    <textarea name="mang" id="" cols="50" rows="2"><?php echo $mang ?></textarea>
                </td>
            </tr>
            <tr>
                <td>Giá trị cần thay thế:</td>
                <td>
                    <input type="text" name="gtctt" value="<?php echo $gtctt ?>" placeholder="Vui lòng nhập số">
                </td>
            </tr>
            <tr>
                <td>Giá trị thay thế:</td>
                <td>
                    <input type="text" name="gttt" value="<?php echo $gttt ?>" placeholder="Vui lòng nhập số">
                </td>
            </tr>
            <tr>
                <td></td>
                <td><input type="submit" value="Thay thế" name="thayThe"></td>
            </tr>
            <tr>
                <td>Mảng cũ:</td>
                <td>
                    <textarea name="mangCu" id="" cols="50" rows="2" disabled="disabled"><?php echo $mangCu ?></textarea>
                </td>
            </tr>
            <tr>
                <td>Mảng sau khi thay thế:</td>
                <td>
                    <textarea name="mang" id="" cols="50" rows="2" disabled="disabled"><?php echo $mangSau ?></textarea>
                </td>
            </tr>
            <tr><td class="do" colspan="3" align="center">(*) Các số được nhập cách nhau bằng dấu ","</td></tr>
        </table>
    </form>
</body>
</html>