<?php 
$arr =array(1,2,3,4) ;
print_r($arr);
foreach($arr as $i => $value)
echo "Khoa : $i - Gia tri : $value<br>";
foreach($arr as $giatri)
echo "Giatri : $giatri <br>";

$myarray = array(
    "CNTT" => array(
        'KTPM' => array('Hang', 'ngoan', 'thuy', 'hung'),
        'HTTT' => array('Thuy', 'Nga', 'Son', 'Trung'),
        'MMT' => array('HUY', 'Tho', 'Nam', 'Phuong')
    ),
    "NN" => array(
        'KTPM' => array('Hang', 'ngoan', 'thuy', 'hung'),
        'HTTT' => array('Thuy', 'Nga', 'Son', 'Trung'),
        'MMT' => array('HUY', 'Tho', 'Nam', 'Phuong')
    )
);

// Hiển thị các giá trị
foreach ($myarray as $key => $values) {
    echo $key . ':<br>';
    foreach ($values as $subKey => $subValues) {
        echo $subKey . ': ';
        foreach ($subValues as $value) {
            echo $value . ', ';
        }
        echo '<br>';
    }
    echo '<br>';
}
$str = "Sun-Mon-Tue-Web-Thu-Fri-Sat";
$arr = explode("-",$str);
var_dump($arr);
$s=implode("+",$arr);
var_dump($s);


?>