<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f2f2f2;
            padding: 20px;
        }

        form {
            margin-bottom: 20px;
        }

        table {
            border-collapse: collapse;
            background-color: #fff; /* Màu nền của bảng */
            color: #333; /* Màu chữ của bảng */
            width: 100%;
        }

        table, th, td {
            border: 1px solid black;
            padding: 5px;
        }

        th {
            background-color: #f2f2f2;
            font-weight: bold;
        }

        ul {
            margin: 0;
            padding: 0;
            list-style-type: none;
        }

        ul li {
            margin-bottom: 5px;
        }

        .result-section {
            margin-top: 20px;
        }
    </style>
</head>
<body>
<?php
$arr = array();
$count = 0;
$count2 = 0;
$tongam = 0;

function generateRandomArray($n) {
    $arr = array();
    foreach (range(0, $n - 1) as $dodai) {
        $randomN = rand(-100, 100);
        $arr[] = $randomN;
    }
    return $arr;
}

if (isset($_POST['n'])) {
    $n = (int)$_POST['n'];
} else {
    $n = 0;
}

if (isset($_POST['tinh'])) {
    if ($n <= 0) {
        echo "khong tinh duoc";
    } else {
        $arr = generateRandomArray($n);
    }
    
}

?>

<form action="" method="post">
    <table>
        <thead>MỘT SỐ THAO TÁC TRÊN MẢNG</thead>
        <tr>
            <td>Nhập n:</td>
            <td><input type="text" name="n" value="<?php echo $n; ?>"></td>
        </tr>
        <tr>
            <th><input type="submit" name="tinh" value="Tính"></th>
        </tr>
        <tr>
            <th><textarea name="ketqua" id="" cols="70" rows="10"><?php
if (isset($_POST['tinh']) && $n > 0) {
    echo "Mảng ngẫu nhiên: ";
    foreach ($arr as $number) {
       
        echo " $number ";
    }
    echo"\n";
foreach($arr as $number) {
    if ($number %2 == 0 ){
        $count ++ ;
    }
}
echo "Số phần tử chẳn trong mảng là :".$count  ;
} 
echo"\n";


foreach($arr as $number){
    if($number < 100) {
        $count2 ++;
    }
}
echo "Số phần tử nhỏ hơn 100 là :" .$count2 ;
echo"\n";


foreach($arr as $number){
    if($number <0){
      $tongam += $number ; 
    }
}
echo "Tổng âm là : " .$tongam ;
echo"\n";


foreach ($arr as $key => $number){
    $lastlight = substr($number,-1);
    if($lastlight == 0 ){
        echo "Vị trí cuối cùng của $number trong phần tử là $key \n";
    }
}
asort($arr);
echo "Hàm sau khi được sắp xếp tăng dần như sau :" ;
foreach($arr as $number){
    echo $number . " ";
}
?></textarea></th>
        </tr>
    </table>
</form>


</body>
</html>