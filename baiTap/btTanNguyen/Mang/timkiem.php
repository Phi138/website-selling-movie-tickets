<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        body {
            background-color: #000;
            color: #fff;
            font-family: Arial, sans-serif;
        }

        table {
            margin: 20px auto;
            border-collapse: collapse;
            width: 400px;
        }

        th {
            background-color: #ff69b4;
            color: #fff;
            padding: 10px;
            font-weight: bold;
            text-align: center;
        }

        td {
            padding: 10px;
        }

        input[type="text"] {
            padding: 5px;
            width: 200px;
        }

        input[type="submit"] {
            padding: 5px 10px;
            background-color: #4caf50;
            color: #fff;
            border: none;
            cursor: pointer;
        }

        input[type="submit"]:hover {
            background-color: #45a049;
        }

        .result {
            font-weight: bold;
            margin-top: 10px;
        }
    </style>
</head>
<body>
    <?php
    $kq ="";
    $n="";
    $sct="";
    function tim_kiem ($sct,$arr){
        $vitri = array_search($sct,$arr);
        return $vitri;
    }
   if(isset($_POST['tinh'])){
    $n = trim($_POST['nhapmang']);
        $arr=[];
        $sct = trim($_POST['socantim']);
        $arr = explode(" ",$n);
        $vitri = tim_kiem($sct,$arr);
    
          
   }
    
    ?>
    <form action="" method="post">
        <table>
            <thead>
                <th colspan="2">TÌM KIẾM</th>
            </thead>
            <tr>
                <td>Nhập mảng :</td>
                <td><input type="text" name="nhapmang" id="" value="<?php echo $n?>"></td>
            </tr>
            <tr>
                <td>Nhập số cần tìm :</td>
                <td><input type="text" name="socantim" id="" value="<?php echo $sct?>"></td>
            </tr>
            <tr>
                <th colspan="2"><input type="submit" value="Tìm kiếm" name="tinh"></th>
            </tr>
            <tr>
                <td>Mảng:</td>
                <td><input type="text" name="mang" id="" value="<?php echo $n?>"></td>
            </tr>
            <tr>
                <td>
                 Kết quả tìm kiếm :
            </td>
            <td>
                <input type="text" name="ketqua" id="" value="<?php
                if(isset($vitri))
                {
                    if($vitri!=false){
                        echo "Số cần tìm ở vị trí ".$vitri;
                    }
                    else echo "không có kết quả ";
                }
                
                ?>">
            </td>
        </tr>
        </table>
    </form>
</body>
</html>