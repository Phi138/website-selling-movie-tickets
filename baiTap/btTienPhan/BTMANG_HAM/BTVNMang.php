<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles.css">
    <title>Random Number Operations</title>
</head>
<body>
    <?php
        if(isset($_POST['n'])){
            $n = trim($_POST['n']); // Chuyển đổi giá trị thành số nguyên
            if ($n <= 0) {
                $n = abs($n); // Lấy giá trị tuyệt đối
                echo"N là số âm nên đã đổi thành số đảo của nó $n <br>";
            }
        } else {
            $n = 0;
        }

        $ketqua = "";
        $arr = array();

        if(isset($_POST['hthi'])){
            for ($i = 0; $i < $n; $i++) {
                $x = rand(-100, 100);
                $arr[$i] = $x;
            }
            $ketqua = "Mảng được tạo là: " . implode(" ", $arr) . "&#13;&#10;";
            $tongle = 0;
            for ($i = 0; $i < $n; $i += 2) {
                $tongle += $arr[$i];
            }
            $ketqua.= "Tổng các số lẻ: ". $tongle. "&#13;&#10;";
        }
    ?>

    <form action="" method="post">
        Nhập n: <input type="text" name="n" value="<?php echo $n; ?>"/>

        <input type="submit" name="hthi" value="Hiển thị"/><br>

        Kết quả: <br>

        <textarea cols="70" rows="10" name="ketqua"><?php echo $ketqua; ?></textarea>
    </form>
</body>
</html>
