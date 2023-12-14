<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        body {
            background-color: #f5f5f5;
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 20px;
        }

        table {
            border-collapse: collapse;
            width: 100%;
            max-width: 400px;
            background-color: #ffffff;
            border: 1px solid #ccc;
            border-radius: 5px;
        }

        table thead tr {
            background-color: #f0f0f0;
            font-weight: bold;
        }

        table td {
            padding: 10px;
            border-top: 1px solid #ccc;
        }

        input[type="text"],
        input[type="submit"] {
            padding: 5px 10px;
            border-radius: 4px;
            border: 1px solid #ccc;
        }

        input[type="submit"] {
            cursor: pointer;
            background-color: #4caf50;
            color: #ffffff;
            font-weight: bold;
        }

        input[type="submit"]:hover {
            background-color: #45a049;
        }
    </style>
</head>
<body>
    <?php 
    if(isset($_POST['tinh'])){
        $sothunhat = $_POST['sothunhat'];
        $sothuhai=$_POST['sothunhi'];
        $pheptinh = $_POST ['pheptinh'];
        $ketqua = 0;
        if (is_numeric($sothunhat)&& is_numeric($sothuhai))
         {
            switch($pheptinh) {
                case 'Cộng' :
                    $ketqua = $sothunhat + $sothuhai;
                    break ;
                    case 'Trừ' :
                        $ketqua = $sothunhat - $sothuhai;
                        break ;
                        case 'Nhân' :
                            $ketqua = $sothunhat * $sothuhai;
                            break ;
                            case 'Chia' :
                                $ketqua = $sothunhat / $sothuhai;
                                break ;
                                default :
                                echo "phép tính không hợp lệ " ;
            }
         }   
    }
    

    ?>
 <form action="" method="post">
 <table>
    <thead>
        <tr>PHÉP TÍNH TRÊN HAI SỐ</tr>
    </thead>
  <tr>
    <td>Sử dụng phép tính:</td>
    <td><?php echo $pheptinh;?></td>
  </tr>
    <tr>
        <td>Số 1 :</td>
        <td><input type="text" name="sothunhat" id="" value="<?php echo $sothunhat;  ?>"></td>
    </tr>
    <tr>
        <td>Số 2:</td>
        <td><input type="text" name="sothuhai" id="" value="<?php echo $sothuhai; ?>"></td>
    </tr>
    <tr>
        <td>Kết quả là :</td>
        <td><input type="text" name="ketqua" id="" value="<?php echo $ketqua; ?>"  ></td>
    </tr>
 </table>

 </form>
</body>
</html>