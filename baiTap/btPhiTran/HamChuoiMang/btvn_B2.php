<style>
    td{
        width: 40px;
        text-align: center;
    }
</style>
<?php
    $m = rand(2, 5);
    $n = rand(2, 5);
    echo "m là $m, n là $n";
    echo "<br>Ma trận $m * $n:<br>";
    $a0=[];

    for($i=0;$i<$m;$i++){
        $a1=[];
        for($j=0;$j<$n;$j++){
            $a1[]=rand(-100,100);
        }
        $a0[]=$a1;
    }

    echo "<table>";
    for($i=0;$i<$m;$i++){
        echo "<tr>";
        for($j=0;$j<$n;$j++){
            echo "<td>{$a0[$i][$j]}</td> ";
        }
        echo "</tr>";
    }
    echo "</table>";

    echo "Ma trận sau khi thay thế các phần tử âm thành 0:";
    echo "<table>";
    for($i=0;$i<$m;$i++){
        echo "<tr>";
        for($j=0;$j<$n;$j++){
            if($a0[$i][$j]<0){
                echo "<td>0</td>";
            }
            else{
                echo "<td>{$a0[$i][$j]}</td>";
            }
        }
        echo "</tr>";
    }
    echo "</table>";
?>