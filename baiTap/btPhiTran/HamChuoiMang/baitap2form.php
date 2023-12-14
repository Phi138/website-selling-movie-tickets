<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BT2 - MA TRAN</title>
</head>
<body>
    <style>
        td{
            width: 40px;
            text-align: center;
        }
    </style>
    <?php
        // $m = rand(2, 5);
        // $n = rand(2, 5);
        // echo "m là $m, n là $n";
        // echo "<br>Ma trận $m * $n:<br>";
        // $a0=[];

        // for($i=0;$i<$m;$i++){
        //     $a1=[];
        //     for($j=0;$j<$n;$j++){
        //         $a1[]=rand(-100,100);
        //     }
        //     $a0[]=$a1;
        // }

        // echo "<table>";
        // for($i=0;$i<$m;$i++){
        //     echo "<tr>";
        //     for($j=0;$j<$n;$j++){
        //         echo "<td>{$a0[$i][$j]}</td> ";
        //     }
        //     echo "</tr>";
        // }
        // echo "</table>";

        // echo "Ma trận sau khi thay thế các phần tử âm thành 0:";
        // echo "<table>";
        // for($i=0;$i<$m;$i++){
        //     echo "<tr>";
        //     for($j=0;$j<$n;$j++){
        //         if($a0[$i][$j]<0){
        //             echo "<td>0</td>";
        //         }
        //         else{
        //             echo "<td>{$a0[$i][$j]}</td>";
        //         }
        //     }
        //     echo "</tr>";
        // }
        // echo "</table>";




        if(isset($_POST['m'])){
            $m=trim($_POST['m']);
        }
        else
            $m=0;
        if(isset($_POST['n'])){
            $n=trim($_POST['n']);
        }
        else
            $n=0;
        if(isset($_POST['hienthi'])){
            $ketqua="";
            if(is_numeric($m) && is_numeric($n) && $m>=2 && $m<=5 && $n>=2 && $n<=5){
                
            }
        }

    ?>
    <form action="" method="post">
        <table>
            <tr>
                <td width:50px;>Nhập m:</td>
                <td>
                    <input type="text" name="m" id="" value="<?php echo $m ;?>">
                </td>
            </tr>
            <tr>
            <td>Nhập n:</td>
                <td>
                    <input type="text" name="n" id="" value="<?php echo $n ;?>">
                </td>
            </tr>
            <tr>
                <td colspan="2" align="center">
                    <input type="submit" value="Hiển thị" name="hienthi">
                </td>
            </tr>
        </table>
        Kết quả:<br>
        <textarea name="ketqua" id="" cols="70" rows="10">
            <?php
                echo $ketqua;
            ?>
        </textarea>
    </form>
</body>
</html>

