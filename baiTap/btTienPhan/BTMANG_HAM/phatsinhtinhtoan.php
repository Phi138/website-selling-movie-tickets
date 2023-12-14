<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tính tổng dãy số</title>
</head>
    <style>
        body {
            font-family: Arial, sans-serif;
        }

        form {
            background-color: #f0f0f0;
            padding: 20px;
            border-radius: 10px;
            max-width: 300px;
            margin: 0 auto;
            text-align: center;
        }
        h3{
            color: #B2533E;
        }
        label {
            display: block;
            margin-bottom: 10px;
            font-weight: bold;
        }

        #dayso {
            width: 100%;
            padding: 10px;
            margin-bottom: 10px;
        }

        button {
            padding: 10px 20px;
            background-color: #3498db;
            border: none;
            color: white;
            font-size: 16px;
            border-radius: 5px;
            cursor: pointer;
        }

        button:hover {
            background-color: #2980b9;
        }

        #tong {
            width: 100%;
            padding: 10px;
            font-weight: bold;
            text-align: center;
            border: 1px solid #ccc;
            border-radius: 5px;
        }
    </style>
<body>
<?php
        if (isset($_POST['n'])){
            $n = trim($_POST['n']);
        } else $n = 0;
        $kq = "";
        function taoMang($n){
            $mang=array();
            for($i=1;$i<=$n;$i++){
                $mang[$i]=rand(0,20);
            }
            return $mang;
        }
        function inMang($mang) {
            return $mang;
        }
        function tinhTong($mang){
            return array_sum($mang);
        }
        function timMin($mang){
            return min($mang);
        }
        function timMax($mang){
            return max($mang);
        }
       if(isset($_POST['tinh'])){
        $mang = taoMang($n);
         $str = implode (' ', $mang);
        $kq = "Mảng được tạo ra là: ". $str;
        $kq .= "\n Phần tử lớn nhất là: ";
        $kq .= max($mang);
        $kq.= "\n Phần tử nhỏ nhất là: ";
        $kq .= min($mang);
        $kq.= "\n Tổng của mảng là: ";
        $kq .= array_sum($mang);
       }
    ?>
    <form action="" method="post">
        <table border="0" cellpadding="0">
    <tr>
      <td colspan="2" align="center">
        <h2>Phát sinh mảng và tính toán</h2>
      </td>
    </tr>
    <tr>
      <td>Nhập n:</td>
      <td><input type="text" name="n" size="30" value="<?php echo $n; ?>"></td>
    </tr>
    <tr>
      <td colspan="2" align="center">
        <input type="submit" name="tinh" value="Phát sinh tính toán">
      </td>
    </tr>
    <tr>
      <td colspan = "2"><textarea name="ketqua" cols="100" rows="10"><?php echo $kq; ?></textarea></td>
    </tr>
  </table>
    </form>
        
</body>
</html>
