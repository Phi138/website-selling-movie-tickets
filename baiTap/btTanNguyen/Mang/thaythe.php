<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thay thế</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f2f2f2;
            margin: 0;
            padding: 20px;
        }

        form {
            background-color: #fff;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 0 5px rgba(0, 0, 0, 0.1);
            max-width: 400px;
            margin: 0 auto;
        }

        table {
            width: 100%;
        }

        th,
        td {
            padding: 10px;
        }

        input[type="text"] {
            width: 100%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
            box-sizing: border-box;
        }

        input[type="submit"] {
            background-color: #4caf50;
            color: #fff;
            border: none;
            padding: 10px 20px;
            border-radius: 5px;
            cursor: pointer;
        }
    </style>
</head>

<body>
    <?php 
    $nhappt="";
    $gtctt="";
    $gttt="";
    $mangmoi="";
    function thaythe ($mang,$gtctt,$gttt){
        foreach($mang as $key =>$value){
         if($value == $gtctt){
            $mang[$key]= $gttt;
         }
        }
        return $mang;
    }
    if(isset($_POST['tinh'])){
        $nhappt = isset($_POST['nhappt']) ? trim($_POST['nhappt']) : "";
        $gtctt = isset($_POST['gtctt']) ? trim($_POST['gtctt']) : "";
        $gttt = isset($_POST['gttt']) ? trim($_POST['gttt']) : "";
    
        $mang = [];
        $mang = explode(",", $nhappt);
        $mangmoi = thaythe($mang, $gttt, $gtctt);
        
    }
    ?>
    <form action="" method="post">
        <table>
            <thead>
                <th>THAY THẾ</th>
            </thead>
            <tr>
                <td>Nhập các phần tử :</td>
                <td><input type="text" name="nhappt" id="" value="<?php echo $nhappt;?>"></td>
            </tr>
            <tr>
                <td>Giá trị cần thay thế:</td>
                <td><input type="text" name="gtctt" id="" value="<?php echo $gtctt;?>"></td>
            </tr>
            <tr>
                <td>Giá trị thay thế :</td>
                <td><input type="text" name="gttt" id="" value="<?php echo $gttt;?>"></td>
            </tr>

            <tr>
               <th> <input type="submit" value="Thay Thế" name="tinh"></th>
            </tr>
            <tr>
                <td>Mảng cũ :</td>
                <td><input type="text" name="mangcu" id="" value="<?php echo $nhappt;?>"></td>
            </tr>
            <tr>
                <td>Sau khi thay the :</td>
                <td><input type="text" name="mangmoi" id="" value="<?php foreach ($mangmoi as $value) {
        echo $value . " ";
    }; ?>"></td>
            </tr>
        </table>
    </form>
</body>

</html>