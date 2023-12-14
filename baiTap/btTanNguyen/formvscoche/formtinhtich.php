<!DOCTYPE html>
<html>
<head>
    <title>Tính tích dãy số</title>
</head>
<body>
    <h1>Tính tích dãy số</h1>

    <?php
    function calculateProduct($numbers) {
        // Tách chuỗi thành mảng các số
        $numberArray = explode(";", $numbers);

        // Tính tích các phần tử của mảng
        $product = 1;
        foreach ($numberArray as $number) {
            $number = floatval($number);
            if (is_numeric($number)) {
                $product *= $number;
            }
        }

        return $product;
    }

    $product = "";

    if (isset($_POST["calculateButton"])) {
        $numbers = $_POST["numberInput"];
        $product = calculateProduct($numbers);
    }
    ?>

    <form method="POST">
        <label for="numberInput">Nhập dãy số (các số cách nhau bởi dấu chấm phẩy):</label><br>
        <input type="text" id="numberInput" name="numberInput"><br><br>

        <input type="submit" name="calculateButton" value="Tính tích"><br><br>

        <label for="productOutput">Tích dãy số:</label><br>
        <input type="text" id="productOutput" readonly value="<?php echo $product; ?>">
    </form>
</body>
</html>