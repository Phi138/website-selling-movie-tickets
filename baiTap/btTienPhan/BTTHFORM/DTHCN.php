<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php 
        if(isset($_POST['chieudai'])){
            $chieudai = trim($_POST['chieudai']);
        }
        else $chieudai = 0;
        if(isset($_POST['chieurong'])){
            $chieurong = trim($_POST['chieurong']);
        }
        else $chieurong = 0;
       if(isset($_POST['tinh']))
        if(is_numeric($chieudai) && is_numeric($chieurong))
            $dientich = $chieudai * $chieurong;
            else{
                echo"<font color ='red'>Vui lòng nhập số! </font>";
                $dientich ="";
            }
            else $dientich = 0;
    ?>
<form action="" method="post">
      <table>
        <h1>Diện tích hình chữ nhật</h1>
      <tr>
         <td>Chiều dài: </td>
         <td><input type="text" name="chieudai" id="" value="<?php echo $chieudai;?>"></td>
      </tr>
      <tr>
         <td>Chiều rộng:</td>
         <td><input type="text" name="chieurong" id="" value="<?php echo $chieurong;?>"></td>
      </tr>
      <tr>
         <td>Diện tích hình chữ nhật:</td>
         <td><input type="text" name="dientich" id="" value="<?php echo $dientich;?>"></td>
      </tr>
      <tr>
            <td></td>
            <td><input type="submit" value="Tính" name="tinh"></td>
         </tr>
      </table>    
   </form>
</body>
</html>