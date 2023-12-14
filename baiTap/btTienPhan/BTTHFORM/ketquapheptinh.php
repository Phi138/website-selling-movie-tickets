<!DOCTYPE html>
<html lang="en">
<head>
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="styles.css">
</head>

<body>
<?php
   if(isset($_POST['tinh'])){
      $pheptinh = $_POST['pheptinh'];
      $sothu1 = $_POST['sothu1'];
      $sothu2 = $_POST['sothu2'];
      if(is_numeric($sothu1) && is_numeric($sothu2)){
         switch ($pheptinh){
            case 'cong';
               $ketqua = $sothu1 + $sothu2;
               $pheptinh = '+';
               break;
            case 'tru';
            $ketqua = $sothu1 - $sothu2;
            $pheptinh = '-';
            break;
            case 'nhan';
            $ketqua = $sothu1 * $sothu2;
            $pheptinh = '*';
            break;
            case 'chia';
            $ketqua = $sothu1 / $sothu2;
            $pheptinh = '/';
            break;
            default:
            echo "Phép tính không hợp lệ.";
            exit();
         }
      }
   }
   ?>
   <form action="" method="post">
      <table>
         <h1>Phép tính trên 2 số</h1>
      <tr>
         <td>Số thứ nhất: </td>
         <td><input type="text" name="sothu1" id="" value="<?php echo $sothu1;?>"></td>
      </tr>
      <tr>
         <td>Số thứ hai:</td>
         <td><input type="text" name="sothu2" id="" value="<?php echo $sothu2;?>"></td>
      </tr>
      <tr>
         <td>Kết quả:</td>
         <td><input type="text" name="ketqua" id="" value="<?php echo $ketqua;?>"></td>
      </tr>
      </table>    
   </form>
   
</body>
</html>
