<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tính chu vi diện tích hình tròn</title> 
    <style>
        body {
            background-color:#66FF00;
        } 
        form{
            background-color: #FF66FF	;
        } 
        table{

background: blueviolet;

border: 0 solid yellow;
} 
        thead{

background: #FF33CC	;    

} 

    </style>
</head>
<body>
    <?php  
    $PI = 3.14 ;
    if(isset($_POST ['bankinh']))
    $bankinh = trim($_POST ['bankinh']); 
    else $bankinh = 0 ;
    if(isset($_POST['tinh']))
    if(is_numeric($bankinh)){ 
        $dientich = $PI * ($bankinh * $bankinh);
        $chuvi = $PI * 2 * $bankinh ;}
   

    else {
        echo "<font color ='red'>Vui lòng nhập bán kính</font>"; 
        $dientich="";
        $chuvi="";
    } 
    else {
        $dientich= 0 ;
        $chuvi=0;
    }
      
    ?>
    <form action="" method="post">
        <table>
            <thead><th colspan="2" align="center"><h3>Diện tích và chu vi hình tròn</th> </thead>
            <tr>
                <td>Bán kính </td>
                <td><input type="text" name="bankinh" id="bankinh" value="<?php echo $bankinh;?>"></td>

            </tr> 
            <tr>
                <td>Diện tích :</td>
                <td><input type="text" name="dientich" disabled = "disabled" style="color: red;" value="<?php echo $dientich;?>"></td>
            </tr>
            <tr>
                <td>Chu vi :</td>
                <td><input type="text" name="chuvi" disabled = "disabled" style="color:red" value="<?php echo $chuvi;?>"></td>
            </tr> 
            <tr>
                <td><input aria-colspan="2" align = "center" type="submit" value="Tính" name="tinh"></td>
            </tr>
        </table>
    </form>
</body>
</html>