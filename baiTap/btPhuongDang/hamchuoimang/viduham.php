<?php
    function tong($a,&$b){
        $b=$a*2;
    }
    $x=5;$y=15;
    tong($x,$y);
    echo "x=$x,y=$y";
?>