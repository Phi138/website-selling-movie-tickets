<?php 
$random = rand(-50,50);
echo "Số ngẫu nhiên là : ".$random ;
echo "<br>" ;
if ($random > 0 ){
    echo "Số này đã là số nguyên dương : " ;
}
else {
    echo "Số này không phải số nguyên dương và được đổi như sau : " ;
   $radomN = abs($random);
   echo $radomN ;
} 
$list = range(1,$random) ;
echo "<pre>";
print_r($list);
echo "</pre>";
$sum = 0 ; 
$isoddIndex = false ;

foreach ($list as $num) {
    if ($isoddIndex){
        $sum += $num ;
    } 
    $isoddIndex = !$isoddIndex;
}
echo "Tổng  số vị trí lẻ trong mảng là :".$sum ;
?>