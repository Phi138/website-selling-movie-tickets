<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tìm năm nhuận</title>
    <style type="text/css">
        table {
            color: #ffff00;
            background-color: gray;
        }

        table th {
            background-color: blue;
            font-style: vni-times;
            color: yellow;
        }
    </style>
</head>
<body>
    <?php  
    function nam_nhuan($nhapnam) { 
        $result = 0; 
        if (is_numeric($nhapnam)) {
            if ($nhapnam % 400 == 0 || ($nhapnam % 4 == 0 && $nhapnam % 100 != 0)) {
                $result = 1;
            }
        }
        return $result;
    }

    $nhapnam = 0; // Đặt giá trị mặc định cho $nhapnam
    if (isset($_POST['nhapnam'])) {
        $nhapnam = trim($_POST['nhapnam']);
    }
    $kq = "";
    if (isset($_POST['tinh'])) {
        $kq = nam_nhuan($nhapnam);
    }

    $nhapnam2 = 0; // Đặt giá trị mặc định cho $nhapnam2
    if (isset($_POST['nhapnam2'])) {
        $nhapnam2 = trim($_POST['nhapnam2']);
    }
    $kq2 = "";
    if (isset($_POST['tinh2'])) {
        $kq2 = nam_nhuan($nhapnam2);
    }
    ?>

    <form action="" method="post"> 
        <h2>TÌM NĂM NHUẬN</h2>
        <table>
            <thead>
                <tr>
                    <th colspan="2">Năm nhập vào:</th>
                </tr>
            </thead>
            <tr>
                <td><input type="text" name="nhapnam" id="" value="<?php echo $nhapnam; ?>"></td>
                <td><input type="submit" value="Tìm năm nhuận" name="tinh"></td>
            </tr>
            <tr>
                <td colspan="2">
                    <?php
                    if ($kq == 1) {
                        echo "<h3>Các năm nhuận từ năm $nhapnam đến năm 2000:</h3>";
                        echo "<ul>";
                        foreach (range(2000, $nhapnam) as $year) {
                            $kq = nam_nhuan($year);
                            if ($kq == 1) {
                                echo "<li>$year</li>";
                            }
                        }
                        echo "</ul>";
                    }
                    ?>
                </td>
            </tr>
        </table>
    </form>

    <h2>TÌM NĂM NHUẬN</h2>
    <form action="" method="post"> 
        <table>
            <thead>
                <tr>
                    <th colspan="2">Năm nhập vào:</th>
                </tr>
            </thead>
            <tr>
                <td><input type="text" name="nhapnam2" id="" value="<?php echo $nhapnam2; ?>"></td>
                <td><input type="submit" value="Tìm năm nhuận" name="tinh2"></td>
            </tr>
            <tr>
                <td colspan="2">
                    <?php
                    if ($kq2 == 1) {
                        echo "<h3>Các năm nhuận từ năm $nhapnam2 đến năm 2000:</h3>";
                        echo "<ul>";
                        foreach (range(2000, $nhapnam2) as $year) {
                            $kq2 = nam_nhuan($year);
                            if ($kq2 == 1) {
                                echo "<li>$year</li>";
                            }
                        }
                        echo "</ul>";
                    }
                    ?>
                </td>
            </tr>
        </table>
    </form>
</body>
</html>