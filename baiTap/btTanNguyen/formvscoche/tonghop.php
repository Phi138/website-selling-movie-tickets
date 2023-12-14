<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php 
    $randomNumber = mt_rand(1, 4);
    $randomNumber1 = mt_rand(10,100);
    $PI = 3.14 ;
    switch($randomNumber){
        case 1 :  $ketqua = $randomNumber1 *4;
        $ketqua2 = $randomNumber1 *$randomNumber1;
        echo "Chu vi hình vuông là :".$ketqua."\n";
        echo "Diện tích hình vuông là :".$ketqua2."<br>";
        break;
        case 2 :
        $ketqua = ($randomNumber1 *2)*$PI;
        $ketqua2 = ($randomNumber1 *$randomNumber1)*$PI;
        echo "Chu vi hình tròn là :".$ketqua."\n";
        echo "Diện tích hình tròn là :".$ketqua2."<br>"; 
        break;
        case 3 :
            $ketqua = $randomNumber1*3;
            $ketqua2 = ($randomNumber1 *$randomNumber1 *sqrt(3))/4;
            echo "Chu vi tam giác đều là :".$ketqua."\n";
            echo "Diện tích tam giác đều là :".$ketqua2."<br>"; 
            break;
        case 4 :
        $ketqua = ($randomNumber1+$randomNumber)*2;
        $ketqua2 = $randomNumber1*$randomNumber;
        echo "Chu vi hình chữ nhật là :".$ketqua."\n";
        echo "Diện tích hình chữ nhật là :".$ketqua2."<br>"; 
        break;
    }
    ?> 
    <form action="" method="post">
     <table>
        <tr>
            <td>Số a:</td>
            <td><input type="text" name="soa" id="" value="<?php echo $randomNumber;?>"></td>
        </tr>
  <tr>
    <td>Số b :</td>
    <td><input type="text" name="sob" id="" value="<?php echo $randomNumber1;?>"></td>
  </tr>
     </table>


    </form>
</body>
</html>