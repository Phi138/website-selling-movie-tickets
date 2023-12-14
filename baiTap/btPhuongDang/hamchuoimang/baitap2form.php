<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<style>
    td{
        width: 40px;
        text-align: center;
    }
</style>
<?php
    $m=rand(2,5);
    $n=rand(2,5);
    $matran=[];

    echo "Ma tran $m*$n<br>";
    for($i=0;$i<$m;$i++){
        $mang=[];
        for($j=0;$j<$n;$j++){
            $mang[]=rand(-100,100);
            
        }
        $matran[]=$mang;
        
    }
    echo "<table>";
    for($i=0;$i<$m;$i++){
        echo "<tr>";
        for($j=0;$j<$n;$j++){
            
            echo "<td>{$matran[$i][$j]}</td> ";
        }
        echo "</tr>";
    }
    echo "</table>";
    echo "Thay the cac phan tu am trong ma tran thanh so 0";
    echo "<table>";
    for($i=0;$i<$m;$i++){
        echo "<tr>";
        for($j=0;$j<$n;$j++){
            if($matran[$i][$j]<0)
                echo "<td>0</td>";
            else
                echo "<td>{$matran[$i][$j]}</td> ";
        }
        echo "</tr>";
    }
    echo "</table>";

    if (isset($_POST['nhapm']))
     $nhapm=trim($_POST['nhapm']);
     else $nhapm=0;
     if (isset($_POST['nhapn']))
     $nhapn=trim($_POST['nhapn']);
     else $nhapn=0;
    if(isset($_POST['$hienthi'])){
        if(is_numeric($nhapm) && is_numeric($nhapn) ){

        }
    }
        
           
?>  
<form action="" method="post">
    <table>
        <tr>
            <td>Nhập m: </td>
            <td>
                <input type="text" name="nhapm" id="" value="<?php echo $nhapm;?> ">
            </td>
        </tr>
        <tr>
            <td>Nhap n: </td>
            <td>
                <input type="text" name="nhapn" id="" value="<?php echo $nhapn;?>">
            </td>
        </tr>
        <tr>
            <td colspan="2" align="center">
                <input type="submit" value="Hiển thị" name="hienthi">
            </td>
            
        </tr>
    </table>
    Kết quả: <br>
    <textarea name="ketqua" id="" cols="70" rows="10" >
    <?php 
            echo $ketqua;
        ?>
    </textarea>
</form>                
</body>
</html>
