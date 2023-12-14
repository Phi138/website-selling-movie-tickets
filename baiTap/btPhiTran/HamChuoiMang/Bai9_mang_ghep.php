<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BÀI 9 - MẢNG GHÉP</title>
    <style>
        body{
            display: flex;
            justify-content: center;
        }
        table {
            border-collapse: collapse;
            width: 100%;
            background-color: #445D48;
        }
        
        /* Áp dụng kiểu cho tiêu đề bảng */
        th {
            background-color: #001524;
            color: #fff;
            padding: 10px;
        }
        
        /* Áp dụng kiểu cho các ô dữ liệu */
        td{
            padding: 10px;
        }
        input[type="submit"] {
            background-color: #001524;
            color: #FDE5D4;
            border: 1px solid #FDE5D4;
            cursor: pointer;
            font-weight: bold;
            transition: background-color 0.3s ease;
        }
        input[type="submit"]:hover {
            background-color: #FDE5D4;
            color: #001524;
        }
        input[type="text"]{
            width: 370px;
            color: #001524;
        }
        textarea{
            color: #001524;
        }
        .cot1{
            color: #FDE5D4;
        }
    </style>
</head>
<body>
    <?php
        function demSopt($arr){
            return count($arr);
        }
        function ghepMang($a1, $a2){
            $arr=array();
            for($i=0; $i<count($a1); $i++){
                $arr[]=$a1[$i];
            }
            for($i=0; $i<count($a2); $i++){
                $arr[]=$a2[$i];
            }
            return $arr;
        }
        function xuatMang($arr){
            $kq="";
            $kq=implode(", ",$arr);
            return $kq;
        }
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
        $sopta="";
        $soptb="";
        $mangC="";
        $mangCtang="";
        $mangCgiam="";
        if(isset($_POST['mangA']))
            $mangA=$_POST['mangA'];
        else
            $mangA="";
        if(isset($_POST['mangB']))
            $mangB=$_POST['mangB'];
        else
            $mangB="";
        if(isset($_POST['thucHien'])){
            $arra=explode(",", $mangA);
            $arrb=explode(",", $mangB);
            $sopta=demSopt($arra);
            $soptb=demSopt($arrb);
            $arrC=ghepMang($arra, $arrb);
            $mangC=xuatMang($arrC);
            sap_tang($arrC);
            $mangCtang=xuatMang($arrC);
            sap_giam($arrC);
            $mangCgiam=xuatMang($arrC);
        }
    ?>
    <form action="Bai9_mang_ghep.php" method="post">
        <table>
            <thead><th colspan="2" align="center">ĐẾM PHẦN TỬ, GHÉP MẢNG VÀ SẮP XẾP</th></thead>
            <tr>
                <td class="cot1">Mảng A:</td>
                <td>
                    <textarea name="mangA" id="" cols="50" rows="2"><?php echo $mangA ?></textarea>
                </td>
            </tr>
            <tr>
                <td class="cot1">Mảng B:</td>
                <td>
                    <textarea name="mangB" id="" cols="50" rows="2"><?php echo $mangB ?></textarea>
                </td>
            </tr>
            <tr>
                <td></td>
                <td><input type="submit" value="Thực hiện" name="thucHien"></td>
            </tr>
            <tr>
                <td class="cot1">Số phần tử mảng A:</td>
                <td>
                    <input type="text" name="sopta" value="<?php echo $sopta ?>" disabled="disabled">
                </td>
            </tr>
            <tr>
                <td class="cot1">Số phần tử mảng B:</td>
                <td>
                    <input type="text" name="soptb" value="<?php echo $soptb ?>" disabled="disabled">
                </td>
            </tr>
            <tr>
                <td class="cot1">Mảng C:</td>
                <td>
                    <textarea name="mangC" id="" cols="50" rows="2" disabled="disabled"><?php echo $mangC ?></textarea>
                </td>
            </tr>
            <tr>
                <td class="cot1">Mảng C tăng dần:</td>
                <td>
                    <textarea name="mangCtang" id="" cols="50" rows="2" disabled="disabled"><?php echo $mangCtang ?></textarea>
                </td>
            </tr>
            <tr>
                <td class="cot1">Mảng C giảm dần:</td>
                <td>
                    <textarea name="mangCgiam" id="" cols="50" rows="2" disabled="disabled"><?php echo $mangCgiam ?></textarea>
                </td>
            </tr>
            <tr><td class="cot1" colspan="2" align="center">(<span style="color: #D83F31; font-weight: bold">Ghi chú:</span> Các số được nhập cách nhau bằng dấu ","</td></tr>   
        </table>
    </form>
</body>
</html>