<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tính diện tích</title>
    <style>
      body{
        background-color: bisque;
      }
      
      table{

background: blueviolet;

border: 0 solid yellow;

} 
thead{

background: #FF33CC	;    

}

td {

color: white;

}

h3{

font-family: verdana;

text-align: center;

/* text-anchor: middle; */

color: #ff8100;

font-size: medium;

} 
th {
    text-align: center;
  }

    </style>
</head>
<body>
    <?php 
    if(isset($_POST['chieudai']))
    $chieudai = trim($_POST['chieudai']);
    else $chieudai = 0 ; 
    if(isset($_POST['chieurong']))
    $chieurong = trim($_POST['chieurong']);
    else $chieurong = 0 ;

    if(isset($_POST['tinh']))
    if(is_numeric($chieudai)&&is_numeric($chieurong))
    $dientinh = $chieudai *$chieurong ;
    else{
        echo"<font color ='red'> Vui lòng nhập số </font> "; 
        $dientinh="";
    } 
    else $dientinh=0;
    ?>
    <form align='center' action="" method="post">
        <table>
            <thead>
                <th colspan="2" align="center"><h3>Diện tích hình chữ nhật</th>
            </thead>
            <tr>
                <td>chiều dài :</td>
                <td><input type="text" name="chieudai" id="chieudai" value="<?php echo $chieudai;?>"></td>
            </tr>
            <tr>
                <td>Chiều rộng :</td>
                <td><input type="text" name="chieurong" id="chieurong" value="<?php echo $chieurong;?>"></td>
            </tr> 
            <tr>
                <td>Diện tích :</td>
                <td><input type="text" name="dientich" disabled="disabled" value="<?php echo $dientinh;?>"></td>
            </tr>
            <tr>
                <td colspan="2" align="center"><input type="submit" value="Tính" name="tinh"></td>
            </tr>
        </table>
    </form>
    
</body>
</html>