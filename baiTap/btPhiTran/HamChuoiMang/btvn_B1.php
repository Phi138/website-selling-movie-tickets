<?php
    $n=rand(-50,50);
    echo $n;
    if($n>0)
        echo "<br>$n là số dương<br>";
    else{
        $n1=abs($n);
        echo "<br>Số đối của $n: $n1";
    }
    $arr=[];
    if($n>0){
        for($i=0;$i<$n;$i++){
            $arr[]=rand(-100,100);
        }
        echo "Mảng đã tạo là:<br>";
        foreach($arr as $i=>$giatri){
            echo "$giatri ";
        }
        $tongle=0;
        for($i=0;$i<$n;$i++){
            if($i%2!=0)
                $tongle+=$arr[$i];
        }
        echo "<br>Tổng các số ở vị trí lẻ là $tongle";
    }
?>