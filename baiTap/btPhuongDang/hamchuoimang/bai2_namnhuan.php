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
    //nho hon 2000
    $nam_nhuan1 = [];

    function nam_nhuan($nam)
    {
        if ($nam % 400 == 0 || ($nam % 4 == 0 && $nam % 100 != 0)) {
            return 1;
        }
        return 0;
    }
    if (isset($_POST['nam1']))
        $nam1 = trim($_POST['nam1']);
    else {
        $nam1 = "";
    }
    $kq1 = "";

    if (isset($_POST['submit']) ||  isset($_POST['submit2'])) {
        if (is_numeric($nam1)) {
            for ($i = $nam1; $i <= 2000; $i++) {
                if (nam_nhuan($i) == 1)
                    $nam_nhuan1[] = $i;
            }
            $kq1 = implode(" ", $nam_nhuan1);
            if ($kq1 != " ")
                $kq1 .= "  Là năm nhuận";
            else
                $kq1 .= "không là năm nhuận";
        } else $nam1 = "";
    }
    //lon hon 2000
    $nam_nhuan2 = [];
    $kq2 = "";
    if (isset($_POST['nam2']))
        $nam2 = trim($_POST['nam2']);
    else {
        $nam2 = "";
    }
    if (isset($_POST['submit2']) || isset($_POST['submit'])) {
        if (is_numeric($nam2)) {
            for ($i = 2000; $i <= $nam2; $i++) {
                if (nam_nhuan($i) == 1)
                    $nam_nhuan2[] = $i;
            }
            $kq2 = implode(" ", $nam_nhuan2);
            if ($kq2 != " ")
                $kq2 .= "  Là năm nhuận";
            else
                $kq2 .= "không là năm nhuận";
        } else $nam2 = "";
    }


    ?>
    <form action="" method="post">
        <table>
            <thead>
                <th>Nhập vào năm nhỏ hơn 2000</th>
            </thead>
            <tr>
                <td>Tìm năm nhuận</td>
            </tr>
            <tr>

                <td>
                    Năm: <input type="text" name="nam1" id="" value="<?php echo $nam1 ?>">
                </td>
            </tr>
            <tr>
                <td><?php
                    echo $kq1;
                    ?></td>

            </tr>
            <tr>
                <td>
                    <input type="submit" name="submit" value="Tìm năm nhuận">
                </td>
            </tr>
        </table>
        <table>
            <thead>
                <th>Nhập vào năm lớn hơn 2000</th>
            </thead>
            <tr>
                <td>Tìm năm nhuận</td>
            </tr>
            <tr>

                <td>
                    Năm: <input type="text" name="nam2" id="" value="<?php echo $nam2 ?>">
                </td>
            </tr>
            <tr>
                <td><?php
                    echo $kq2;
                    ?></td>
            </tr>
            <tr>
                <td>
                    <input type="submit" name="submit2" value="Tìm năm nhuận">
                </td>
            </tr>
        </table>
    </form>
</body>

</html>
