<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BAI 5 - PHAT SINH MANG VA TINH TOAN</title>
    <style>
        body{
            display: flex;
            justify-content: center;
        }
        table {
            border-collapse: collapse;
            width: 100%;
            background-color: #9EDDFF;
        }
        
        /* Áp dụng kiểu cho tiêu đề bảng */
        th {
            background-color: #793FDF;
            color: white;
            padding: 10px;
        }
        
        /* Áp dụng kiểu cho các ô dữ liệu */
        td{
            padding: 10px;
        }
        input[type="submit"] {
            background-color: #fff;
            color: #007bff;
            border: 1px solid blue;
            cursor: pointer;
            font-weight: bold;
            transition: background-color 0.3s ease;
        }
        input[type="submit"]:hover {
            background-color: #0056b3;
            color: #fff;
        }
        .tong{
            color: #FF3FA4;
            font-weight: bold;
        }
    </style>
</head>
<body>
    <?php
        function taoMang(&$arr, $n) {
            for($i=0; $i<$n; $i++){
                $arr[]=rand(0, 20);
            }
            return $arr;
        }
        function xuatMang($arr){
            $kq="";
            $kq=implode(" ", $arr);
            return $kq;
        }
        function tinhTong($arr){
            $kq=array_sum($arr);
            return $kq;
        }
        function timMin($arr){
            $kq=min($arr);
            return $kq;
        }
        function timMax($arr){
            $kq=max($arr);
            return $kq;
        }
        $mang="";
        $gtln="";
        $gtnn="";
        $tong="";
        $arr=array();
        if(isset($_POST['sopt'])){
            $sopt=trim($_POST['sopt']);
        }
        else
            $sopt="";
        if(isset($_POST['tinh'])){
            if(is_numeric($sopt)){
                taoMang($arr, $sopt);
                $mang=xuatMang($arr);
                $gtln=timMax($arr);
                $gtnn=timMin($arr);
                $tong=tinhTong($arr);
            }
            else{
                $sopt="";
            }
        }
    ?>
    <form action="Bai5_mang_phat_sinh_tinh_toan.php" method="post">
        <table>
            <thead><th colspan="3" align="center">PHÁT SINH MẢNG VÀ TÍNH TOÁN</th></thead>
            <tr>
                <td>Nhập số phần tử:</td>
                <td>
                    <input type="text" name="sopt" id="" value="<?php echo $sopt; ?>" placeholder="Vui lòng nhập số">
                </td>
            </tr>
            <tr>
                <td></td>
                <td>
                    <input type="submit" value="Phát sinh và tính toán" name="tinh">
                </td>
            </tr>
            <tr>
                <td>Mảng:</td>
                <td>
                    <textarea name="" id="" cols="30" rows="5"><?php echo $mang; ?></textarea>
                </td>
            </tr>
            <tr>
                <td>GTLN (MAX) trong mảng:</td>
                <td>
                    <input class="mang" type="text" name="gtln" id="" value="<?php echo $gtln; ?>" disabled="disabled">
                </td>
            </tr>
            <tr>
                <td>GTNN (MIN) trong mảng:</td>
                <td>
                    <input class="mang" type="text" name="gtnn" id="" value="<?php echo $gtnn; ?>" disabled="disabled">
                </td>
            </tr>
            <tr>
                <td>Tổng mảng:</td>
                <td>
                    <input class="mang" type="text" name="tong" id="" value="<?php echo $tong; ?>" disabled="disabled">
                </td>
            </tr>
            <tr><td colspan="2" align="center">(<span style="color: red; font-weight: bold">Ghi chú:</span> Các phần tử trong mảng sẽ có giá trị từ 0 đến 20)</td></tr>           
        </table>
    </form>
</body>
</html>