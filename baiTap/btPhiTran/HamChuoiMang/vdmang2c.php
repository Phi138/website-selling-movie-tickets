<?php
    $list=array("CNTT"=>array("KTPM"=>array("Hang","Hung"),"HTTH"=>array("Thuy","Son"),
    "MMT"=>array("Nam","Anh")),"NN"=>array("PD"=>array("Thu","Binh"),"DL"=>array("Khanh","Quynh")));
foreach($list as $khoa=>$value)
{
    echo "<h2>$khoa</h2><ul>";
    foreach($value as $bm=>$gv){
        echo"$bm: ";
        foreach($gv as $mon=>$tengv){
            echo"$tengv ";
        }
        echo "<br>";
    }
    echo '</ul>';
}

 $str="Sun-Mon-Tue-Wed-Thu-Fri-Sat";
 $arr=explode("-",$str);
 print_r($arr);
 $str=implode("+",$arr);
 print_r($str);
?>