<?php 
function tong ($a,&$b) {
    $b = $a*2;
}
$x=15 ;$y=5;
tong($x,$y);
echo "x=$x,y=$y";

?>