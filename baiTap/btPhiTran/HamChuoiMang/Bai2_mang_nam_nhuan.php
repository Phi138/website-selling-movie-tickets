<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BAI 2 - MANG NAM NHUAN</title>
    <style>
        .kq{
            width: 350px;
            color: #141E46;
        }
        table{
            border-spacing: 20px 10px;
            border: 1px solid #ccc;
            background-color: #7575c7;
        }
        th, td{
            text-align: center;
        }
        th{
            color: blue;
            font-size: 20px;
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
        .hang2{
            background-color: #7575c7;
            color: white;
            font-weight: bold;
        }
        .hang3{
            color: #141E46;
        }
    </style>
</head>
<body>
    <?php
        function nam_nhuan($nam){
            if(($nam % 400 == 0) || ($nam % 4 == 0 && $nam % 100 != 0))
                return 1;
            return 0;
        }

        //Tìm năm nhuận nhỏ hơn năm 2000
        $kq1="";
        $nn=array();
        if(isset($_POST['nam1'])){
            $nam1 = trim($_POST['nam1']);
        }
        else
            $nam1 = "";
        if(isset($_POST['tim1']) || isset($_POST['tim2'])){
            if(is_numeric($nam1) && $nam1<=2000){
                for($i=$nam1; $i<=2000; $i++){
                    if(nam_nhuan($i)==1)
                        $nn[]=$i;
                }
                $kq1=implode(" ",$nn);
                if($kq1!="")
                    $kq1.=" là năm nhuận";
                else
                    $kq1.="Không có năm nhuận";
            }
            else{
                $nam1="";
            }
        }

        //Tìm năm nhuận lớn hơn năm 2000
        $kq2="";
        $nn=array();
        if(isset($_POST['nam2'])){
            $nam2 = trim($_POST['nam2']);
        }
        else
            $nam2 = "";
        if(isset($_POST['tim1']) || isset($_POST['tim2'])){
            if(is_numeric($nam2) && $nam2>=2000){
                for($i=2000; $i<=$nam2; $i++){
                    if(nam_nhuan($i)==1)
                        $nn[]=$i;
                }
                $kq2=implode(" ",$nn);
                if($kq2!="")
                    $kq2.=" là năm nhuận";
                else
                    $kq2.="Không có năm nhuận";
            }
            else{
                $nam2="";
            }
        }
    ?>
    <form action="Bai2_mang_nam_nhuan.php" method="post">
        <table>
            <thead><th>Năm nhập vào nhỏ hơn năm 2000</th></thead>
            <tr><td class="hang2">TÌM NĂM NHUẬN</td></tr>
            <tr>
                <td class="hang3">Năm: <input type="text" name="nam1" id="" placeholder="Nhập năm <= 2000" value="<?php echo $nam1 ?>"></td>
            </tr>
            <tr><td class="kq"><?php echo  $kq1; ?></td></tr>
            <tr><td><input type="submit" value="Tìm năm nhuận" name="tim1"></td></tr>

            <thead><th style="border-top: 1px solid #ccc">Năm nhập vào lớn hơn năm 2000</th></thead>
            <tr><td class="hang2">TÌM NĂM NHUẬN</td></tr>
            <tr>
                <td class="hang3">Năm: <input type="text" name="nam2" id="" placeholder="Nhập năm >= 2000" value="<?php echo $nam2 ?>"></td>
            </tr>
            <tr><td class="kq"><?php echo  $kq2; ?></td></tr>
            <tr><td><input type="submit" value="Tìm năm nhuận" name="tim2"></td></tr>
        </table>
    </form>
</body>
</html>