<?php 
$m = rand(2,5);
$n = rand(2,5);
echo "Ma trận có kích thước như sau " ;
echo"<br>";
echo"Chiều dài : ".$m ;
echo "<br>";
echo "Chiều rộng : ".$n;
echo "<br>";

$matrix = [] ;
foreach(range(0,$m - 1 ) as $rowindex) {
    $row = [] ;
    foreach(range(0,$n - 1 ) as $colindex) {
        $element = rand(-100,100);
        $row[] = $element ;

    }
    $matrix[] = $row ;
} 
  
echo " Ma trận tự nhiên <br>" ;
foreach ($matrix as $row ) {
    foreach ($row as $element) {
        echo $element ." ";
    }
    echo "<br>";
} 
echo "Ma trận sau khi chuyển đổi số âm thành số 0 như sau : <br>" ;
foreach ($matrix as $row ){
foreach ($row as $element) {
    if ($element <0 ) {
        echo $element = 0 . " " ;
    }
    else 
    echo $element ." ";
}
echo "<br>";
}
?>