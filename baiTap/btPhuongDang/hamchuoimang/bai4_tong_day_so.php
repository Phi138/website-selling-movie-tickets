<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tính tổng dãy số</title>
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

        th {
            background-color: #6499E9;
            color: white;
            padding: 10px;
        }

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
    $dayso = "";
    $kq = "";

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $dayso = $_POST["dayso"];
        $mang = explode(",", $dayso);
        $tong = 0;

        foreach ($mang as $value) {
            $tong += intval($value);
        }

        $kq = $tong;
    }
    ?>
    <form action="" method="post">
        <table>
            <thead>
                <th>Nhập và tính trên dãy số</th>
            </thead>
            <tr>
                <td>
                    Nhập dãy số: <input type="text" name="dayso" id="" value="<?php echo $dayso ?>">(*)
                </td>
            </tr>
            <tr>
                <td>
                    <input type="submit" name="submit" value="Tổng dãy số">
                </td>
            </tr>
            <tr>
                <td>
                    Tổng dãy số: <input type="text" name="kq" id="" disabled="disabled" value="<?php echo $kq ?>">
                </td>
            </tr>
            <tr>
                <td>(*)Các số được nhập cách nhau bằng dấu ","</td>
            </tr>
        </table>
    </form>
</body>

</html>