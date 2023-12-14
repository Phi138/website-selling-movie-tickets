<?php
$list = array(
    "Top V-POP trong tuần" => array(
        '1' => 'Lạc Trôi',
        '5' => 'Cô gái trong mưa',
        '3' => 'Mụ dì ghẻ',
        '2' => 'Tìm về đâu',
        '4' => 'Công chúa hóa đá'
    )
);
asort($list["Top V-POP trong tuần"]); // Sắp xếp tăng dần theo tên (giá trị)
krsort($list["Top V-POP trong tuần"]); // Sắp xếp giảm dần theo bài hát (khóa)
foreach ($list as $key => $values) {
    echo $key . ':' . '<br>';
    foreach ($values as $subKey => $subValue) {
        echo $subKey . ': ' . $subValue . '<br>';
    }
}


?>