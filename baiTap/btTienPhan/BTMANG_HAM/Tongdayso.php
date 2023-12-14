<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tính tổng dãy số</title>
</head>
    <style>
        body {
            font-family: Arial, sans-serif;
        }

        form {
            background-color: #f0f0f0;
            padding: 20px;
            border-radius: 10px;
            max-width: 300px;
            margin: 0 auto;
            text-align: center;
        }
        h3{
            color: #B2533E;
        }
        label {
            display: block;
            margin-bottom: 10px;
            font-weight: bold;
        }

        #dayso {
            width: 100%;
            padding: 10px;
            margin-bottom: 10px;
        }

        button {
            padding: 10px 20px;
            background-color: #3498db;
            border: none;
            color: white;
            font-size: 16px;
            border-radius: 5px;
            cursor: pointer;
        }

        button:hover {
            background-color: #2980b9;
        }

        #tong {
            width: 100%;
            padding: 10px;
            font-weight: bold;
            text-align: center;
            border: 1px solid #ccc;
            border-radius: 5px;
        }
    </style>
<body>
    <?php
        if (isset($_POST['dayso'])){
            $daySo = trim($_POST['dayso']);
        }else $dayso = 0;
        $kq = "";
        if (isset($_POST['tinh'])) {
            $mangso = explode(",", $daySo);
            $tong = 0;
            foreach ($mangso as $so) {
                $tong += intval($so);
                $kq = $tong;
            }
        }
    ?>
    <form action="" method="post">
    <table border="0" cellpadding="0">
    <tr>
      <td colspan="2" align="center">
        <h2>Một số thao tác trên mảng</h2>
      </td>
    </tr>
    <tr>
      <td>Nhập dãy số:</td>
      <td><input type="text" name="dayso" size="30" value="<?php echo $dayso; ?>"></td>
    </tr>
    <tr>
      <td colspan="2" align="center">
        <input type="submit" name="tinh" value="Tổng dãy số">
      </td>
    </tr>
    <tr>
      <td colspan = "2">
        <input type="text" name ="ketqua" value="<?php echo $kq;?>">
      </td>
    </tr>
  </table>
    </form>
    

</body>
</html>
