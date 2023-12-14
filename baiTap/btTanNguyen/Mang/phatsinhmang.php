<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tài liệu</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f2f2f2;
            padding: 20px;
        }

        form {
            width: 300px;
            margin: 0 auto;
            background-color: #fff;
            padding: 20px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }

        table {
            width: 100%;
        }

        thead {
            background-color: #27D5CC;
            font-weight: bold;
            text-align: center;
            color: #333;
        }

        td {
            padding: 5px;
        }

        input[type="text"],
        input[type="submit"] {
            padding: 5px;
            width: 100%;
            box-sizing: border-box;
        }

        input[type="submit"] {
            background-color: #4CAF50;
            color: #fff;
            border: none;
            cursor: pointer;
            margin-top: 10px;
        }

        input[type="submit"]:hover {
            background-color: #45a049;
        }

        input[type="text"][disabled] {
            background-color: #f2f2f2;
            cursor: not-allowed;
        }

        th[colspan="2"] {
            font-size: 18px;
        }

        th[colspan="2"]:not(:first-child) {
            padding-top: 10px;
        }

        th[colspan="2"]:last-child {
            padding-bottom: 10px;
        }

        th[colspan="2"]:last-child,
        thead th[colspan="2"] {
            color: #666;
        }
    </style>
</head>

<body>
    <?php
    if (isset($_POST['nhapphantu'])) {
        $nhapphantu = trim($_POST['nhapphantu']);
    } else {
        $nhapphantu = 0;
    }

    function randomN($nhapphantu)
    {
        $arr = array();
        foreach (range(0, $nhapphantu - 1) as $sopt) {
            $Numberan = rand(0, 20);
            $arr[] = $Numberan;
        }
        return $arr;
    }

    if (isset($_POST['tinh'])) {
        if ($nhapphantu <= 0) {
            echo "$nhapphantu Không tính toán được";
        } else {
            $arr = randomN($nhapphantu);
            $maxValue = max($arr);
            $minValue = min($arr);
            $sum = array_sum($arr);
        }
    }
    ?>

    <form action="" method="post">
        <table>
            <thead>
               <tr>
                <th colspan="2">Phát sinh mảng và tính toán</th>
               </tr>
            </thead>
            <tbody>
                <tr>
                    <td>Số phần tử:</td>
                    <td>
                        <input type="number" name="nhapphantu" value="<?php echo $nhapphantu; ?>">
                    </td>
                </tr>
                <tr>
                    <td colspan="2"><input type="submit" name="tinh" value="Phát sinh và tính toán"></td>
                </tr>
                <tr>
                    <td>Mảng:</td>
                    <td>
                        <input type="text" name="mang" id="" disabled="disabled"  value="<?php
                         $nun=implode(', ', $arr)  ;
                         echo $nun ;
                        
                        ?>">
                    </td>
                </tr>
                <tr>
                    <td>GTLN(MAX) trong mảng:</td>
                    <td>
                        <input type="text" name="GTLN" id="" disabled="disabled" value="<?php echo isset($maxValue) ? $maxValue : ''; ?>">
                    </td>
                </tr>
                <tr>
                    <td>TTNN(MIN) trong mảng:</td>
                    <td>
                        <input type="text" name="TTNN" id="" disabled="disabled" value="<?php echo isset($minValue) ? $minValue : ''; ?>">
                    </td>
                </tr>
                <tr>
                    <td>Tổng mảng:</td>
                    <td>
                        <input type="text" name="tongmang" id="" disabled="disabled" value="<?php echo isset($sum) ? $sum : ''; ?>">
                    </td>
                </tr>
                <tr>
                    <th colspan="2">(Ghi chú: Các phần tử trong mảng có giá trị từ 0 đến 20)</th>
                </tr>
                
            </tbody>
        </table>
    </form>
</body>

</html>