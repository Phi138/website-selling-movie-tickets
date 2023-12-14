<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="namnhuan.css">
    <title>Document</title>
</head>
<body>
<?php
    function ktnamnhuan($nam){
        return (($nam % 4 == 0 && $nam % 100 != 0 || ($nam % 400 == 0)));
    }
    
    $kq = "";
    $kq2 = "";
    if(isset($_POST['n'])){
        $n = trim($_POST['n']);
    }else $n = 0;
    if(isset($_POST['n1'])){
        $n1 = trim($_POST['n1']);
    }else $n1 = 0;
    if(isset($_POST['tinh1'])){
        $n = isset($_POST['n']) ? trim($_POST['n']) : 0;
        if($n < 2000){
            if(is_numeric($n) && $n < 2000){
                $kq .= "<h3>Năm nhuận từ $n đến 2000:</h3>";
                $kq .= "<table>";
                $kq .= "<tr><th>Năm nhuận</th></tr>";
                foreach (range($n, 2000) as $year) {
                    if (ktnamnhuan($year)) {
                        $kq .= "<tr><td>$year</td></tr>";
                    }
                }
                $kq .= "</table>";

                if(ktnamnhuan($n)){
                    $kq .= "<p>Năm $n là năm nhuận.</p>";
                } else {
                    $kq .= "<p>Năm $n không là năm nhuận.</p>";
                }
            } else {
                $kq .= "<p>Vui lòng nhập số năm nhỏ hơn năm 2000.</p>";
            }
        }
    }

    if(isset($_POST['tinh2'])){
        $n1 = isset($_POST['n1']) ? trim($_POST['n1']) : 0;
        if($n1 > 2000){
            if(is_numeric($n1) && $n1 > 2000){
                $kq2 .= "<h3>Năm nhuận từ 2000 đến $n1:</h3>";
                $kq2 .= "<table>";
                $kq2 .= "<tr><th>Năm nhuận</th></tr>";
                foreach (range(2000,$n1) as $year) {
                    if (ktnamnhuan($year)) {
                        $kq2 .= "<tr><td>$year</td></tr>";
                    }
                }
                $kq2 .= "</table>";

                if(ktnamnhuan($n1)){
                    $kq2 .= "<p>Năm $n1 là năm nhuận.</p>";
                } else {
                    $kq2 .= "<p>Năm $n1 không là năm nhuận.</p>";
                }
            } else {
                $kq2 .= "<p>Vui lòng nhập số năm lớn hơn năm 2000.</p>";
            }
        }
    }
?>
<form action="" method="post">
  <table border="0" cellpadding="0">
    <tr>
      <td colspan="2" align="center">
        <h3>Năm nhập vào nhỏ hơn năm 2000</h3>
        <h2>Tìm Năm Nhuận</h2>
      </td>
    </tr>
    <tr>
      <td>Năm:</td>
      <td><input type="text" name="n" size="30" value="<?php echo $n; ?>"></td>
    </tr>
    <tr>
      <td colspan="2" align="center">
        <input type="submit" name="tinh1" value="Tìm năm nhuận">
      </td>
    </tr>
    <tr>
      <td colspan="2"><?php echo $kq; ?></td>
    </tr>
  </table>
</form>

<form action="" method="post">
  <table border="0" cellpadding="0">
    <tr>
      <td colspan="2" align="center">
        <h3>Năm nhập vào lớn hơn năm 2000</h3>
        <h2>Tìm Năm Nhuận</h2>
      </td>
    </tr>
    <tr>
      <td>Năm:</td>
      <td><input type="text" name="n1" size="30" value="<?php echo $n1; ?>"></td>
    </tr>
    <tr>
      <td colspan="2" align="center">
        <input type="submit" name="tinh2" value="Tìm năm nhuận">
      </td>
    </tr>
    <tr>
      <td colspan="2"><?php echo $kq2; ?></td>
    </tr>
  </table>
</form>

</body>
</html>
