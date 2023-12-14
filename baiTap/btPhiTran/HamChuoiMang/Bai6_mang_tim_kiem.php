<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BAI 6 - FORM TIM KIEM</title>
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
        function tim_kiem($mang, $giaTri){
            for($i=0; $i<count($mang); $i++){
                if($mang[$i]==$giaTri)
                    return $i;
            }
            return -1;
        }
        if(isset($_POST['mang'])){
            $mang=$_POST['mang'];
        }
        else $mang="";
        if(isset($_POST['so'])){
            $so=trim($_POST['so']);
        }
        else $so="";
        $kq="";
        $mangTam=array();
        if(isset($_POST['timKiem'])){
            if(is_numeric($so)){
                $mangTam=explode(",", $mang);
                $viTri=tim_kiem($mangTam, $so);
                if($viTri!=-1)
                    $kq="Tìm thấy ".$so." tại vị trí thứ ".$viTri;
                else $kq="Không tìm thấy ".$so." trong mảng";
            }
            else{
                $so="";
            }
        }
    ?>
    <form action="Bai6_mang_tim_kiem.php" method="post">
        <table>
            <thead><th colspan="2" align="center">TÌM KIẾM</th></thead>
            <tr>
                <td>Nhập mảng:</td>
                <td>
                    <textarea name="mang" id="" cols="50" rows="3"><?php echo $mang ?></textarea>
                </td>
            </tr>
            <tr>
                <td>Nhập số cần tìm:</td>
                <td>
                    <input type="text" name="so" value="<?php echo $so ?>" placeholder="Vui lòng nhập số">
                </td>
            </tr>
            <tr>
                <td></td>
                <td><input type="submit" value="Tìm kiếm" name="timKiem"></td>
            </tr>
            <tr>
                <td>Mảng:</td>
                <td>
                    <textarea name="mang" id="" cols="50" rows="3" disabled="disabled"><?php echo $mang ?></textarea>
                </td>
            </tr>
            <tr>
                <td>Kết quả tìm kiếm:</td>
                <td><input style="width: 250px; color: #E55604" type="text" name="kq" id="" value="<?php echo $kq ?>" disabled="disabled"></td>
            </tr>
            <tr><td class="do" colspan="3" align="center">(*) Các số được nhập cách nhau bằng dấu ","</td></tr>
        </table>
    </form>
</body>
</html>