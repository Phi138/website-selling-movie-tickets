<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
    $sothunhat = $_POST['sothunhat'];
    $sothuhai = $_POST['sothuhai'];
    if($_POST['cong']=="Cộng")
        $ketqua=$sothunhat+$sothuhai;
    elseif($_POST['cong']=="Trừ")
        $ketqua=$sothunhat-$sothuhai;
    elseif($_POST['cong']=="Nhân")
        $ketqua=$sothunhat*$sothuhai;
    else{
        if($sothuhai==0)
            $ketqua="error";
        else $ketqua=$sothunhat/$sothuhai;
    }
    
    ?>
    <form action="" method="post">
        <table>
            <thead>
                <td>PHÉP TÍNH TRÊN HAI CHỮ SỐ</td>
            </thead>
            <tr>
                <td>Chọn phép tính: </td>
                <td>
                    <?php 
                    echo $_POST['cong'];
                    ?>
                </td>
            </tr>
            <tr>
                <td>Số 1: </td>
                <td>
                    <input type="text" name="sothunhat" id="" value="<?php echo $sothunhat?>">
                </td>
            </tr>
            <tr>
                <td>Số 2: </td>
                <td>
                    <input type="text" name="sothuhai" id="" value="<?php echo $sothuhai; ?>">
                </td>
            </tr>
            <tr>
                <td>Kết quả: </td>
                <td>
                    <input type="text" name="ketqua" id="" disabled="disabled" value="<?php echo $ketqua?>">
                </td>
            </tr>
            <tr><td><a href="javascript:window.history.back(-1);">Tro ve trang truoc</a></td></tr>
            
        </table>
    </form>
</body>
</html>