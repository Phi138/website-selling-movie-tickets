<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Frameset//EN">

<html>

<head>

<meta http-equiv="Content-Type" content="text/html; charset=utf-8">

<title>BAI 1 - MANG CHUOI HAM</title>

<style type="text/css">
    table{
        color: #ffff00;
        background-color: gray;     
    }
    table th{
        background-color: blue;
        font-style: vni-times;
        color: yellow;
    }
</style>
</head>
<body>
<?php
    function taoMang($sopt){
        $a=array();
        for($i=0;$i<$sopt;$i++){
            $a[$i]=rand(-1000,1000);
        }
        return $a;
    }
    //a- Hiển thị mảng phát sinh ngẫu nhiên có độ dài n
    function hienthi_mang($arr){
        for($i=0;$i<count($arr);$i++){
            echo $arr[$i]." ";
        }
    }

    //b- Đếm xem có bao nhiêu thành phần trong mảng có giá trị là số chẵn
    function demSoChan($arr){
        $dem=0;
        for($i=0;$i<count($arr);$i++){
            if($arr[$i]%2==0)
                $dem++;
        }
        return $dem;
    }

    //c- Đếm xem có bao nhiêu thành phần trong mảng có giá trị là số nhỏ hơn 100
    function demNho100($b){
        $dem=0;
        for($i=0;$i<count($b);$i++){
            if($b[$i]<100)
                $dem++;
        }
        return $dem;
    }

    //d- Tính tổng của các thành phần trong mảng giá trị là số âm
    function tongAm($arr){
        $tong=0;
        for($i=0; $i<count($arr); $i++){
            if($arr[$i]<0)
                $tong+=$arr[$i];
        }
        return $tong;
    }

    //e- In ra vị trí của các thành phần trong mảng có chữ số kề cuối là 0
    function keCuoi0($a){
        $ketQua="";
        for($i=0; $i<count($a); $i++){
            if($a[$i]<-10 || $a[$i]>10){
                $keCuoi=$a[$i]/10;
                if($keCuoi%10==0)
                    $ketQua.="$i ";
            }
        }
        return $ketQua;
    }
    
    //f- Sắp xếp các số đó theo thứ tự tăng dần rồi lại in ra màn hình
    function sapXep($a){
        $b=array();
        for($i=0; $i<count($a); $i++){
            if($a[$i]<-10 || $a[$i]>10){
                $keCuoi=$a[$i]/10;
                if($keCuoi%10==0)
                    $b[]=$a[$i];
            }
        }
        sort($b);
        $ketQua = implode(", ", $b);
        return $ketQua;
    }
    if(isset($_POST['n'])){
        $n=trim($_POST['n']);
    }
    else
        $n=0;
    $kq="";
    if(isset($_POST['tinh'])){
        if($n<=0){
            echo "Không tính được";
        }
        else{
            $a=taoMang($n);
            $str=implode("  ", $a);
            $kq.="Mảng được tạo ra là: ".$str;

            $kq.="\nSố lượng phần tử chẵn: ".demSoChan($a);

            $kq.="\nSố lượng phần tử nhỏ hơn 100: ".demNho100($a);

            $kq.="\nTổng các thành phần trong mảng giá trị là số âm: ".tongAm($a);

            $kq.="\nVị trí các thành phần trong mảng có chữ số kề cuối là 0: ".keCuoi0($a);

            $kq.="\nSắp xếp các số đó theo thứ tự tăng dần: ".sapXep($a);
        }
    }
    
?>
<?php 
    


?>

<form action="" method="post">

<table border="0" cellpadding="0">
    <th colspan="2"><h2>MỘT SỐ THAO TÁC TRÊN MẢNG</h2></th>
    <tr>

        <td>Nhập n:</td>

        <td><input type="text" name="n" size= "70" value="<?php echo $n;?> "/></td>
    </tr>
    <tr>
        <td colspan="2" align="center"><input type="submit" name="tinh"  size="20" value="   Xử lý  "/></td>
    </tr>
    <tr>
        <td colspan="2"><textarea name="ketQua" id="" cols="90" rows="10"><?php echo $kq ?></textarea></td>
    </tr>
</table>

</form>

</body>

</html>

