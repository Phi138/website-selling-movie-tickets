<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php 
    if (isset($_POST['bankinh']))
    $bankinh = trim($_POST['bankinh']);
    else $bankinh = 0;
    if (isset($_POST['tinh'])){
        if(is_numeric($bankinh)){
            $dientich = 3.14*pow($bankinh,2);
            $chuvi = 3.14*2*$bankinh;
        }
        else{
            echo "Vui long nhap du lieu";
            $dientich="";
            $chuvi="";
        }
    
    }
    else{
        $dientich=0;
        $chuvi=0;
    }
    ?>
    <form action="" method="post">
            <table>
                <thead>
                Chu vi dien tich hinh tron
                </thead>
                <tr>
                     <td>Ban kinh: </td>
                <td>
                    <input type="text" name="bankinh" id="" value="<?php echo $bankinh; ?>">
                </td>
            </tr>
            <tr>
                    <td>Ket qua: </td>
            <td><input type="text" name="ketqua" id="" disabled="disabled" value=" <?php echo $dientich; ?>"></td>
            </tr>
            <tr>
                    <td>Ket qua chu vi: </td>
            <td><input type="text" name="ketqua" id="" disabled="disabled" value=" <?php echo $chuvi; ?>"></td>
            </tr>
            <tr>
                <td>
                <input type="submit" value="tinh" name="tinh">
                </td>
                
            </tr>
            </table>
           
    </form>
</body>
</html>