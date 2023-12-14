<?php
$random=rand(-50,50);
if($random<0){
    $random1=$random*(-1);
    echo "So doi cua $random la $random1";
}
elseif($random>0){
    $mang=[];
    echo " $random la  so duong<br>";
    for($i=0;$i<$random;$i++){
        $mang[]=rand(-100,100);
    }
    echo "Mang duoc tao la: ";
    for($i=0;$i<$random;$i++){
        echo "$mang[$i] ";
    }
    $tong=0;
    for($i=0;$i<$random;$i++){
        if($i%2!=0){
            $tong+=$mang[$i];
        }
    }
    echo "<br>Tong cac phan tu o vi tri le: $tong";
}


?>