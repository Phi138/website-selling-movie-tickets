<?php
    $arr=array(1, "a"=>2,3,4,5);
    print_r($arr);
    foreach($arr as $i=>$value)
        echo "Khóa: $i - Giá trị: $value <br>";
?>