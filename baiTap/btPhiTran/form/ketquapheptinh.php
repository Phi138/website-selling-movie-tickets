<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>KET QUA PHEP TINH</title>
    <style>
        th{
            color: blue;
            padding: 10px 0px;
        }
        .cot1{
            text-align: right;
            font-weight: bold;
        }
        .cot2{
            padding-left: 10px;
        }
        a {
            color: #007bff;
            text-decoration: none;
            transition: color 0.3s ease;
        }

        a:hover {
            color: #0056b3;
            text-decoration: underline;
        }
    </style>
</head>
<body>
    <?php
        $stn=trim($_GET['stn']);
        $sth=trim($_GET['sth']);
        if($_GET['cong']=="Cộng"){
            $ketqua=$stn+$sth;
        }
        elseif($_GET['cong']=="Trừ"){
            $ketqua=$stn-$sth;
        }
        elseif($_GET['cong']=="Nhân"){
            $ketqua=$stn*$sth;
        }
        else{
            if($sth!=0)
                $ketqua=$stn/$sth;
            else
                $ketqua="Error";
        }
    ?>

    <form action="" method="get">
        <table>
            <thead>
                <th colspan="2" align="center">PHÉP TÍNH TRÊN HAI SỐ</th>
            </thead>
            <tr style="color: red">
                <td class="cot1" >Chọn phép tính:</td>
                <td class="cot2"><?php echo $_GET['cong']; ?></td>
            </tr>
            <tr>
                <td class="cot1" style="color: blue">Số 1:</td>
                <td class="cot2"><input type="text" value="<?php
                    echo isset($stn) ? $stn : "";
                ?>"></td>
            </tr>
            <tr>
                <td class="cot1" style="color: blue">Số 2:</td>
                <td class="cot2"><input type="text" name="" id="" value="<?php echo $sth ?>"></td>
            </tr>
            <tr>
                <td class="cot1" style="color: blue">Kết quả:</td>
                <td class="cot2"><input type="text" name="" id="" disabled="disabled" value="<?php echo $ketqua ?>"></td>
            </tr>
            <tr>
                <td></td>
                <td class="cot2" style="padding: 10px 0px;"><a href="javascript:window.history.back(-1);">Trở về trang trước</a></td>
            </tr>
        </table>
    </form>
</body>
</html>