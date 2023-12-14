<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 20px;
        }

        table {
            border-collapse: collapse;
            width: 100%;
            max-width: 400px;
        }

        table td {
            padding: 10px;
            border: 1px solid #ccc;
        }

        table thead td {
            font-weight: bold;
            background-color: #f0f0f0;
        }

        input[type="radio"],
        input[type="text"],
        input[type="submit"] {
            margin-top: 5px;
        }
    </style>
</head>
<body>
    <?php
    $selectValue = "" ;
    if(isset ($_POST['pheptinh'])){
        $selectValue=$_POST['pheptinh'];
    }
    if(isset($_POST['sothunhat'])){
        $sothunhat = trim($_POST['sothunhat']);
    }
    else
    $sothunhat = 0 ;
    if(isset($_POST['sothuhai'])){
        $sothuhai = trim($_POST['sothuhai']);
    }
    else
    $sothuhai = 0 ;

    ?>
    <form action="ketquapheptinh.php" method="post">
        <table>
            <thead>
                <td>Phép tính trên hai số</td>
            </thead>
            <tr>
                <td>Chọn phép tính : </td>
                <td><label>
  <input type="radio" name="pheptinh" value="Cộng"<?php if ($selectValue=="Công")?>> Cộng
</label>
<label>
  <input type="radio" name="pheptinh" value="Trừ"<?php if ($selectValue=="Trừ")?>> Trừ
</label>
<label>
  <input type="radio" name="pheptinh" value="Nhân"<?php if ($selectValue=="Nhân")?>> Nhân
</label>
<label>
  <input type="radio" name="pheptinh" value="Chia"<?php if ($selectValue=="Chia")?>> Chia
</label>
</td>
            </tr>
            <tr>
                <td>Số thứ nhất :</td>
                <td><input type="text" name="sothunhat" id="" value="<?php echo $sothunhat; ?>"></td>
            </tr>
            <tr>
                <td>Số thứ nhì :</td>
                <td><input type="text" name="sothunhi" id="" value="<?php  echo $sothuhai;?>"></td>
            </tr>
            <tr>
                <td><input type="submit" value="Tính" name="tinh"></td>
            </tr>
        </table>
    </form>
</body>
</html>