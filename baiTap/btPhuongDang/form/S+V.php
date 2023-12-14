<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php 
     if (isset($_POST['chieudai']))
     $chieudai=trim($_POST['chieudai']);
     else $chieudai=0;
     if (isset($_POST['chieurong']))
     $chieurong=trim($_POST['chieurong']);
     else $chieurong=0;
     if (isset($_POST['tinh'])){
        if (is_numeric($chieudai) && is_numeric($chieurong)){
            $dientich = $chieudai*$chieurong;
            $chuvi = ($chieudai+$chieurong)*2;
            
        }
        else {
            echo "Vui long nhap day du du lieu";
            $dientich="";
            $chuvi="";
        }
     }
     else {
        $dientich=0;
        $chuvi=0;
     }
    
    ?>
    <form action="" method="post">
        <table>
            <thead>
                <tr>Tinh dien tich hinh chu nhat</tr>
            </thead>
            <tr>
                <td>Chieu dai: </td>
                <td>
                    <input type="text" name="chieudai" id="" value="<?php echo $chieudai; ?>">
                </td>
            </tr>
            <tr>
                <td>Chieu rong: </td>
                <td><input type="text" name="chieurong" id="" value="<?php echo $chieurong; ?>"></td>
            </tr>
            <tr>
                <td>Ket qua: </td>
                <td>
                    <input type="text" name="ketqua" id="" disabled="disabled" value="<?php echo $dientich; ?>">
                </td>
            </tr>
            <tr>
                <td>Ket qua chu vi: </td>
                <td>
                    <input type="text" name="ketquachuvi" id="" disabled="disabled" value="<?php echo $chuvi; ?>">
                </td>
            </tr>
            <tr>
                <td><input type="submit" value="tinh" name="tinh"></td>
            </tr>
        </table>
    </form>
</body>
</html>