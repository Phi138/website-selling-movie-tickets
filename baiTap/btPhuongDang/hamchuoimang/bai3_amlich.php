<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        body {
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

            background-color: #6499E9;
            color: white;
            padding: 10px;
        }

        /* Áp dụng kiểu cho các ô dữ liệu */
        td {
            text-align: center;
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
    </style>
</head>

<body>
    <?php
    $hinh_anh = "";
    $nam_al = "";
    if (isset($_POST['namduong']))
        $namduong = trim($_POST['namduong']);
    else $namduong = "";
    if (isset($_POST['doi'])) {
        if (is_numeric($namduong)) {
            $mang_can = array("Qúy", "Giáp", "Ất", "Bính", "Đinh", "Mậu", "Kỷ", "Canh", "Tân", "Nhâm");
            $mang_chi = array("Hợi", "Tý", "Sửu", "Dần", "Mão", "Thìn", "Tỵ", "Ngọ", "Mùi", "Thân", "Dậu", "Tuất");
            $mang_hinh = array("hoi.jpg", "chuot.jpg", "suu.jpg", "dan.jpg", "meo.jpg", "thin.jpg", "ty.jpg", "ngo.jpg", "mui.jpg", "than.jpg", "dau.jpg", "tuat.jpg");
            $nam = $namduong - 3;

            $can = $nam % 10;
            $chi = $nam % 12;
            $nam_al = $mang_can[$can];
            $nam_al = $nam_al . "" . $mang_chi[$chi];
            $hinh = $mang_hinh[$chi];
            $hinh_anh = "<img src = 'images/$hinh'>";
        } else $namduong = "";
    }
    ?>
    <form action="" method="post">
        <table>
            <thead>
                <th colspan="3">TÍNH NĂM ÂM LỊCH</th>
            </thead>
            <tr>
                <td>Năm dương lịch</td>
                <td></td>
                <td>Năm âm lịch</td>
            </tr>
            <tr>
                <td>
                    <input type="text" name="namduong" id="" placeholder="Vui lòng nhập số" value="<?php echo $namduong; ?>">
                </td>
                <td>
                    <input type="submit" name="doi" id="" value="=>">
                </td>
                <td>
                    <input type="text" name="nam_al" id="" disabled="disabled" value="<?php echo $nam_al; ?>">
                </td>
            </tr>
            <tr>
                <td colspan="3"><?php echo $hinh_anh; ?></td>

            </tr>
        </table>
    </form>
</body>

</html>