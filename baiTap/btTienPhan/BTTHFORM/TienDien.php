<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php 
         if(isset($_POST['cscu'])){
            $cscu = trim($_POST['cscu']);
         }
         else $cscu = 0;
         if(isset($_POST['csmoi'])){
            $csmoi = trim($_POST['csmoi']);
         }
         else $csmoi = 0;
         $dongia = 2000;
         $dongia = isset($_POST['dongia'])?$_POST['dongia'] : 2000;
         $tenchuho = isset($_POST['tenchuho'])?$_POST['tenchuho'] : '';
         if(isset($_POST['tinh']))
            if(is_numeric($cscu) && is_numeric($csmoi)){
                $thanhtoan = ($csmoi - $cscu) * $dongia;
                
            }
            else{
                echo"<font color ='red'>Vui lòng nhập số! </font>";
                $thanhtoan ="";
            }
            else $thanhtoan = 0;
    ?>
<form action="" method="post">
      <table>
        <h1>Thanh Toán Tiền điện</h1>
      <tr>
         <td>Tên chủ hộ: </td>
         <td><input type="text" name="tenchuho" id="" value="<?php echo $tenchuho;?>"></td>
      </tr>
      <tr>
         <td>Chỉ số cũ:</td>
         <td><input type="text" name="cscu" id="" value="<?php echo $cscu;?>"></td>
      </tr>
      <tr>
         <td>Chỉ số mới:</td>
         <td><input type="text" name="csmoi" id="" value="<?php echo $cscu;?>"></td>
      </tr>
      <tr>
         <td>Đơn giá:</td>
         <td><input type="text" name="dongia" id="" value="<?php echo $dongia;?>"></td>
      </tr>
      <tr>
         <td>Số tiền thanh toán:</td>
         <td><input type="text" name="thanhtoan" id="" value="<?php echo $thanhtoan;?>"></td>
      </tr>
      <tr>
            <td></td>
            <td><input type="submit" value="Tính" name="tinh"></td>
         </tr>
      </table>    
   </form>
</body>
</html>
