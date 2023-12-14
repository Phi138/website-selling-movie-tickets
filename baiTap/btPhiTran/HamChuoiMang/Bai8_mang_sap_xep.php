<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BÀI 8 - MẢNG SẮP XẾP</title>
    <style>
        body{
            display: flex;
            justify-content: center;
        }
        table {
            border-collapse: collapse;
            width: 100%;
            background-color: #E9B824;
        }
        
        /* Áp dụng kiểu cho tiêu đề bảng */
        th {
            background-color: #D83F31;
            color: #fff;
            padding: 10px;
        }
        
        /* Áp dụng kiểu cho các ô dữ liệu */
        td{
            padding: 10px;
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
        input[type="text"]{
            width: 370px;
            color: #D83F31;
        }
    </style>
</head>
<body>
    <?php
        function hoan_vi(&$a, &$b){
            $tam=$a;
            $a=$b;
            $b=$tam;
        }
        function sap_tang(&$arr){
            for($i=0; $i<count($arr)-1; $i++){
                for($j=$i+1; $j<count($arr); $j++){
                    if($arr[$i]>$arr[$j])
                        hoan_vi($arr[$i], $arr[$j]);
                }
            }
            return $arr;
        }
        function sap_giam(&$arr){
            for($i=0; $i<count($arr)-1; $i++){
                for($j=$i+1; $j<count($arr); $j++){
                    if($arr[$i]<$arr[$j])
                        hoan_vi($arr[$i], $arr[$j]);
                }
            }
            return $arr;
        }
        function xuatMang($arr){
            $kq="";
            $kq=implode(", ",$arr);
            return $kq;
        }
        $tangDan="";
        $giamDan="";
        if(isset($_POST['mang']))
            $mang=$_POST['mang'];
        else
            $mang="";
        if(isset($_POST['sapXep'])){
            $arr=explode(",", $mang);
            sap_tang($arr);
            $tangDan=xuatMang($arr);
            sap_giam($arr);
            $giamDan=xuatMang($arr);
        }
    ?>
    <form action="Bai8_mang_sap_xep.php" method="post">
        <table>
            <thead><th colspan="3" align="center">SẮP XẾP MẢNG</th></thead>
            <tr>
                <td>Nhập mảng:</td>
                <td>
                    <textarea name="mang" id="" cols="50" rows="2"><?php echo $mang ?></textarea>
                </td>
                <td><span style="color: #D83F31; font-weight: bold">(*)</span></td>
            </tr>
            <tr>
                <td></td>
                <td><input type="submit" value="Sắp xếp tăng/giảm" name="sapXep"></td>
            </tr>
            <tr><td style="color: #219C90; font-weight: bold">Sau khi sắp xếp:</td></tr>
            <tr>
                <td>Tăng dần:</td>
                <td>
                    <input type="text" name="tangDan" value="<?php echo $tangDan ?>" disabled="disabled">
                </td>
            </tr>
            <tr>
                <td>Giảm dần:</td>
                <td>
                    <input type="text" name="gỉamDan" value="<?php echo $giamDan ?>" disabled="disabled">
                </td>
            </tr>
            <tr><td colspan="2" align="center"><span style="color: #D83F31; font-weight: bold">(*)</span> Các số được nhập cách nhau bằng dấu ","</td></tr>   
        </table>
    </form>
</body>
</html>