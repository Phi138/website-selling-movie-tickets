<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Frameset//EN">

<html>

<head>

    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">

    <title>Mot so thao tac tren mang</title>

    <style type="text/css">
        table {

            color: #ffff00;

            background-color: gray;

        }

        table th {

            background-color: blue;

            font-style: vni-times;

            color: yellow;

        }
    </style>

</head>

<body>
    <?php
    function taoMang($soPT)
    {
        $arr = array();
        for ($i = 0; $i < $soPT; $i++)
            $arr[$i] = rand(-1000, 1000);
        return $arr;
    }
    function hienthi_mang($arr)
    { //hàm hiển thị
        for ($i = 0; $i < count($arr); $i++)
            echo "$arr[$i]  ";
    }
    function demSochan($arr)
    { //hàm đếm số chẵn
        $dem = 0;
        for ($i = 0; $i < count($arr); $i++)
            if ($arr[$i] % 2 == 0)
                $dem++;
        return $dem;
    }
    function nhohon100($arr)
    {
        $dem = 0;
        for ($i = 0; $i < count($arr); $i++)
            if ($arr[$i] < 50)
                $dem++;
        return $dem;
    }
    function tongam($arr)
    {
        $tong = 0;
        for ($i = 0; $i < count($arr); $i++) {
            if ($arr[$i] < 0)
                $tong += $arr[$i];
        }
        return $tong;
    }
    function kecuoi($arr)
    {
        $ketqua = "";

        for ($i = 0; $i < count($arr); $i++) {
            if ($arr[$i] > 10 || $arr[$i] < -10) {
                $kecuoi = $arr[$i] / 10;
                if ($kecuoi % 10 == 0) {
                    $ketqua .= "$i ";
                }
            }
        }

        return $ketqua;
    }
    function sapxep($arr)
    {
        $b = [];
        $ketqua = "";

        for ($i = 0; $i < count($arr); $i++) {
            if ($arr[$i] > 10 || $arr[$i] < -10) {
                $kecuoi = $arr[$i] / 10;
                if ($kecuoi % 10 == 0) {
                    $b[] = $arr[$i];
                }
            }
        }
        sort($b);
        $ketqua = implode(", ", $b);
        return $ketqua;
    }
    if (isset($_POST['n']))
        $n = trim($_POST['n']);
    else $n = 0;
    $kq = "";
    if (isset($_POST['tinh']) && $n > 0) {
        $a = taoMang($n);
        $str = implode(' ', $a);
        $kq = "Mang duoc tao ra la: " . $str;
        $kq .= "\nSố phần tử chẵn trong mảng là: ";
        $kq .= demSochan($a);
        $kq .= "\nSố phần tử chẵn trong mảng: " . demSochan($a);
        $kq .= "\nSố phần tử nhỏ hơn 100: " . nhohon100($a);
        $kq .= "\nTổng phần tử âm: " . tongam($a);
        $kq .= "\nVị trí của các thành phần trong mảng có chữ số kề cuối =0 là: " . kecuoi($a);
        $kq .= "\nMảng sau khi sắp xếp: " . sapxep($a);
    }


    ?>

    <form action="" method="post">

        <table border="0" cellpadding="0">

            <th colspan="2">
                <h2>MỘT SỐ THAO TÁC TRÊN MẢNG</h2>
            </th>

            <tr>

                <td>Nhập n:</td>

                <td><input type="text" name="n" size="30" value="<?php echo $n; ?> " /></td>

            </tr>

            <tr>

                <td></td>

                <td><input type="submit" name="tinh" size="20" value="  Xử lý  " /></td>

            </tr>
            <tr>
                <td colspan="2"><textarea name="ketqua" id="" cols="70" rows="10" disabled="disabled"><?php echo $kq; ?></textarea></td>
            </tr>


        </table>

    </form>

</body>

</html>