<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BAI 3 - MANG NAM AM LICH</title>
    <style>
        /* Áp dụng kiểu cho bảng */
        table {
            border-collapse: collapse;
            width: 100%;
            background-color: #93B1A6;
        }
        
        /* Áp dụng kiểu cho tiêu đề bảng */
        th {
            background-color: #183D3D;
            color: white;
            padding: 10px;
        }
        
        /* Áp dụng kiểu cho các ô dữ liệu */
        td {
            padding: 10px;
            text-align: center;
        }
        .amLich{
            color: #183D3D;
            font-weight: bold;
        }
        .tinh{
            color: #183D3D;
            font-size: 17px;
            font-weight: bold;
        }
    </style>
</head>
<body>
    <?php
        $nam_al = "";
        $hinh_anh = "";
        if(isset($_POST['nam'])){
            $nam=trim($_POST['nam']);
        }
        else
            $nam="";
        //Tạo ra 3 mảng: $mang_can, $mang_chi và $mang_hinh để lưu giá trị can, chi, hình ảnh
        $mang_can = array("Quý", "Giáp", "Ất", "Bính", "Đinh", "Mậu", "Kỷ", "Canh",
         "Tân", "Nhâm");
        $mang_chi = array("Hợi", "Tý", "Sửu", "Dần", "Mão", "Thìn", "Tỵ", "Ngọ",
         "Mùi", "Thân", "Dậu", "Tuất");
        $mang_hinh = array("hoi.jpg", "chuot.jpg", "suu.jpg", "dan.jpg", "meo.jpg", 
         "thin.jpg", "ty.jpg", "ngo.jpg", "mui.jpg", "than.jpg", "dau.jpg", "tuat.jpg");
        //Tính can, chi và lấy hình ảnh cho năm được nhập
        if(isset($_POST['tinh'])){
            if(is_numeric($nam)){
                $namTam = $nam - 3;
                $can = $namTam%10;
                $chi = $namTam%12;
                $nam_al = $mang_can[$can];
                $nam_al = $nam_al." ".$mang_chi[$chi];
                $hinh = $mang_hinh[$chi];
                $hinh_anh = "<img src = 'images/$hinh'>";
            }
        }
    ?>

    <form action="Bai3_mang_nam_am_lich.php" method="post">
        <table>
            <thead><th colspan="3" align="center">TÍNH NĂM ÂM LỊCH</th></thead>
            <tr>
                <td>Năm dương lịch</td>
                <td></td>
                <td>Năm âm lịch</td>
            </tr>
            <tr>
                <td>
                    <input type="text" name="nam" id="" value="<?php echo $nam ?>">
                </td>
                <td>
                    <input class="tinh" type="submit" name="tinh" value="=>">
                </td>
                <td>
                    <input class="amLich" type="text" name="nam_al" id="" value="<?php echo $nam_al ?>" disabled="disabled">
                </td>
            </tr>
            <tr>
                <td colspan="3" align="center"><?php echo $hinh_anh ?></td>
            </tr>
        </table>
    </form>
</body>
</html>