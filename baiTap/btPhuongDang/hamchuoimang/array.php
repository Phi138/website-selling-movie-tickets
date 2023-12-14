<?php 
  /*  $arr=array(1,"a"=>2,3,4,5);
    print_r($arr);
    $arr=array(1,2,3,4,5);
    print_r($arr);
    foreach($arr as $i=>$value)
        echo "Khóa: $i - Gía trị: $value <br>";
    foreach($arr as $giatri)
        echo "Gía trị: $giatri<br>";
    for($i=0;$i<count($arr);$i++)
        echo $arr[$i]." ";


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
    */
    $str="Sun-Mon-Tue-Wed-Thu-Fri-Sat";
    $arr=explode("-",$str);
    var_dump($arr);
    $s=implode(",",$arr);
    var_dump($s);

?>