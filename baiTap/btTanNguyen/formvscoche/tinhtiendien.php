<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title> 
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f2f2f2;
        } 
        
     
        thead{

          background: #FF33CC	;    

         }

        h2 {
            font-family: verdana;

             text-align: center;

            /* text-anchor: middle; */

            color: black;

            font-size: medium;
        }

        table {
            margin: 0 auto; 
            background: blueviolet;

            border: 0 solid yellow;
        }

        table td {
            padding: 5px;
        }

        input[type="text"], input[type="number"] {
            width: 150px;
            padding: 5px;
        }

        input[type="submit"] {
            padding: 5px 15px;
            background-color: #4CAF50;
            color: white;
            border: none;
            cursor: pointer;
        }

        input[type="submit"]:hover {
            background-color: #45a049;
        }

        .error-message {
            color: red;
            text-align: center;
        }
    </style>
</head>
<body>
<?php 
$dongia = 20000;
$dongia = isset($_POST['dongia']) ? $_POST['dongia'] : 20000;
$tenchuho = isset($_POST['Tenchuho']) ? $_POST['Tenchuho'] : '';
if(isset($_POST['Chisocu']))
    $Chisocu = trim($_POST['Chisocu']);
else
    $Chisocu = 0;

if(isset($_POST['chisomoi']))
    $chisomoi= trim($_POST['chisomoi']);
else
    $chisomoi = 0;
if(isset($_POST['tinh'])){
    if (is_numeric($chisomoi) && is_numeric($Chisocu) && is_numeric($dongia)){ 
        if($chisomoi > $Chisocu){
            $thanhtoan = ($chisomoi - $Chisocu) * $dongia; 
        $thanhtoan = number_format($thanhtoan);
        } 
        else {
            echo "<font color='red'>Vui lòng nhập chỉ số mới lớn hơn chỉ số cũ</font>";
            $thanhtoan ="";
        }
        
    } else {
        echo "<font color='red'>Vui lòng nhập thông tin cần thiết</font>";
        $thanhtoan = "";
    } 
} else {
    $thanhtoan = 0;
} 
?>

    <form action="" method="post"> 
        <table>
        <thead>
  <tr>
    <th colspan="2">
      <h2>Thanh toán tiền điện</h2>
    </th>
  </tr>
</thead>
            <tr>
                <td>Tên chủ hộ :</td>
                <td><input type="text" name="Tenchuho" value="<?php echo $tenchuho;?>"></td>
            </tr>
            <tr>
                <td>Chỉ số cũ :</td>
                <td><input type="text" name="Chisocu" id="Chisocu" value="<?php echo $Chisocu; ?>">kWh</td>
            </tr>
            <tr>
         <td>Chỉ số mới :</td>
         <td><input type="text" name="chisomoi" id="chisomoi" value="<?php echo $chisomoi ;?>">kWh</td>       
        </tr>
        <tr>
            <td>Đơn giá :</td>
            <td><input type="number" name="dongia" disabled ="Disabled" id="dongia" value="<?php echo $dongia;?>"  > VND</td>
        </tr>
     <tr>
        <td>Số tiền thanh toán:</td>
        <td><input type="text" name="thanhtoan" id="" disabled ="Disabled" value="<?php echo $thanhtoan; ?>">VND</td>
     </tr>
     <tr>
        <td colspan="2" align="center"><input  type="submit" name="tinh" value="Tính"></td>
     </tr>
        </table>
    </form> 

</body>
</html>