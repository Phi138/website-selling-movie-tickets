<!-- <?php
    $list=array(1=>"Chắc ai đó sẽ về", 5=>"Cuối cùng thì", 3=>"Hồng nhan", 4=>"Chúng ta của hiện tại", 2=>"Lạc trôi");
    krsort($list);
    echo "<h3>Sắp xếp giảm dần theo bảng xếp hạng:</h3><br>";
    foreach($list as $key => $ten){
        echo "$key - $ten<br>";
    }

    echo "<h3>Sắp xếp tăng dần theo tên bài hát:</h3><br>";
    asort($list);
    foreach($list as $key => $ten){
        echo "$key - $ten<br>";
    }
?> -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>XẾP HẠNG BÀI HÁT</title>
    <style>
        body{
            display: flex;
            justify-content: center;
        }
        table {
            border-collapse: collapse;
            width: 100%;
            background-color: #EEEDED;
        }
        
        /* Áp dụng kiểu cho tiêu đề bảng */
        th {
            background-color: #0D1282;
            color: #F0DE36;
            padding: 10px;
        }
        
        /* Áp dụng kiểu cho các ô dữ liệu */
        td{
            padding: 10px;
        }
        input[type="submit"] {
            background-color: #EEEDED;
            color: #0D1282;
            border: 1px solid #0D1282;
            cursor: pointer;
            font-weight: bold;
            transition: background-color 0.3s ease;
        }
        input[type="submit"]:hover {
            background-color: #0D1282;
            color: #F0DE36;
        }
        input[type="text"]{
            width: 300px;
            color: #4477CE;
        }
        textarea{
            color: #4477CE;
        }
        .cot1{
            color: #0D1282;
        }
    </style>
</head>
<body>
    <?php
        session_start();//Bắt đầu session

        function thembh(&$arr, $ten, $thuHang){
            $key=$thuHang;
            $arr[$key]=$ten;
            return $arr;
        }
        function xuatDanhSach($arr){
            $danhSach="";
            foreach($arr as $key => $ten){
                $danhSach.="$ten($key) ";
            }
            return $danhSach;
        }
        function bangXepHang($arr){
            $danhSach="";
            foreach($arr as $key => $ten){
                $danhSach.="$key - $ten"."\n";
            }
            return $danhSach;
        }

        $danhSach="";
        $xepHang="";

        if(isset($_SESSION['arrBaiHat'])){
            $arrBaiHat=$_SESSION['arrBaiHat']; //Khôi phục mảng từ session
        }
        else
            $arrBaiHat=array();

        if(isset($_POST['tenbh']))
            $tenbh=$_POST['tenbh'];
        else 
            $tenbh="";

        if(isset($_POST['thuHang']))
            $thuHang=trim($_POST['thuHang']);
        else{
            $thuHang="";
        }
            
        if(isset($_POST['them'])){
            if(is_numeric($thuHang)){
                thembh($arrBaiHat, $tenbh, $thuHang);
                $_SESSION['arrBaiHat']=$arrBaiHat; //Lưu mảng vào session
                $danhSach=xuatDanhSach($arrBaiHat);
            }
            else{
                $thuHang="";
                $_SESSION['arrBaiHat']=$arrBaiHat; //Lưu mảng vào session
                $danhSach=xuatDanhSach($arrBaiHat);
            }
        }
        
        if(isset($_POST['hienThi'])){
            $danhSach=xuatDanhSach($arrBaiHat);
            krsort($arrBaiHat);
            $xepHang=bangXepHang($arrBaiHat);
        }
    ?>
    <form action="" method="post">
        <table>
            <thead><th colspan="2" align="center">BẢNG XẾP HẠNG BÀI HÁT</th></thead>
            <tr>
                <td class="cot1">Tên bài hát:</td>
                <td><input type="text" name="tenbh" id="" value="<?php echo $tenbh ?>"></td>
            </tr>
            <tr>
                <td class="cot1">Thứ hạng:</td>
                <td><input type="text" name="thuHang" id="" value="<?php echo $thuHang ?>" placeholder="Vui lòng nhập số"></td>
            </tr>
            <tr>
                <td class="cot1">Danh sách bài hát:</td>
                <td><textarea name="danhSach" id="" cols="45" rows="5" disabled="disabled"><?php echo $danhSach ?></textarea></td>
            </tr>
            <tr>
                <td class="cot1">Xếp hạng bài hát:</td>
                <td><textarea name="xepHang" id="" cols="45" rows="10" disabled="disabled"><?php echo $xepHang ?></textarea></td>
            </tr>
            <tr>
                <td colspan="2" align="center">
                    <input type="submit" value="Thêm bài hát" name="them">
                    <input type="submit" value="Hiển thị bảng xếp hạng" name="hienThi">
                </td>
            </tr>
        </table>
    </form>
</body>
</html>