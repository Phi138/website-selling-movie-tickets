<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Matrix Operations</title>
</head>
<style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
        }

        form {
            max-width: 400px;
            padding: 20px;
            border: 1px solid #ccc;
            border-radius: 5px;
            background-color: #f9f9f9;
        }

        form input[type="number"] {
            width: 100%;
            padding: 10px;
            margin-bottom: 10px;
        }

        form input[type="submit"] {
            padding: 10px 20px;
            background-color: #4CAF50;
            color: white;
            border: none;
            cursor: pointer;
        }

        form input[type="submit"]:hover {
            background-color: #45a049;
        }

        .matrix {
            display: inline-block;
            padding: 10px;
            border: 1px solid #ccc;
            margin-top: 20px;
        }
    </style>
<body>
    <?php
        $m = isset($_POST['m']) ? (int)$_POST['m'] : 2;
        $n = isset($_POST['n']) ? (int)$_POST['n'] : 2;

        if ($m < 2 || $m > 5) $m = 2;
        if ($n < 2 || $n > 5) $n = 2;

        $matran = [];
        $matran0 = [];

        // Tạo ma trận và thay thế các phần tử âm thành 0
        for ($i = 0; $i < $m; $i++) {
            for ($j = 0; $j < $n; $j++) {
                $x = rand(-100, 100);
                $matran[$i][$j] = $x;
                $matran0[$i][$j] = max(0, $x);
            }
        }
    ?>

    <form action="" method="post">
        Nhập m: <input type="number" name="m" value="<?php echo $m; ?>" min="2" max="5"/><br>
        Nhập n: <input type="number" name="n" value="<?php echo $n; ?>" min="2" max="5"/><br>
        <input type="submit" value="Tạo ma trận và xử lý"/>
    </form>

    <?php if ($matran && $matran) : ?>
        <div class="matrix">
            <p>Ma trận ban đầu:</p>
            <?php
                echo "<table border='1'>";
                for ($i = 0; $i < $m; $i++) {
                    echo "<tr>";
                    for ($j = 0; $j < $n; $j++) {
                        echo "<td>{$matran[$i][$j]}</td>";
                    }
                    echo "</tr>";
                }
                echo "</table>";
            ?>
        </div>

        <div class="matrix">
            <p>Ma trận sau khi thay thế các phần tử âm thành 0:</p>
            <?php
                echo "<table border='1'>";
                for ($i = 0; $i < $m; $i++) {
                    echo "<tr>";
                    for ($j = 0; $j < $n; $j++) {
                        echo "<td>{$matran0[$i][$j]}</td>";
                    }
                    echo "</tr>";
                }
                echo "</table>";
            ?>
        </div>
    <?php endif; ?>
</body>
</html>
