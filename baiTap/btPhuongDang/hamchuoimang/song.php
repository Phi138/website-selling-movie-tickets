<?php
    $song=array(1=>"Love is gone",5=>"Lonely", 3=>"One more time", 2=>"Just say hello",4=>"Why not me");
    krsort($song);
    echo "Sap xep giam dan theo bxh<br>";
    foreach($song as $i=>$baihat)
    {
        echo "$i - $baihat<br>";
    }

    asort($song);
    echo "Sap xep giam dan theo ten<br>";
    foreach($song as $i=>$baihat)
    {
        echo "$i - $baihat<br>";
    }
?>