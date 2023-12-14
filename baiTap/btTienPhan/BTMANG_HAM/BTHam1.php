<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="bai1.css">
  <title>Bài 1</title>
</head>
<style>
  body {
  font-family: Arial, sans-serif;
  background-color: #f0f0f0;
  margin: 0;
  padding: 20px;
}

h2 {
  color: #333;
}

table {
  width: 100%;
  border-collapse: collapse;
  margin-bottom: 20px;
  background-color: #8EACCD;
}

td, th {
  padding: 10px;
  border: 1px solid #ccc;
}

input[type="text"], input[type="submit"] {
  padding: 10px;
  width: 100%;
  box-sizing: border-box;
}

textarea {
  width: 100%;
  box-sizing: border-box;
}

textarea[name="ketqua"] {
  resize: vertical;
}

/* Optional: Style the submit button */
input[type="submit"] {
  background-color: #4CAF50;
  color: #001524;
  border: none;
  cursor: pointer;
}

input[type="submit"]:hover {
  background-color: #333;
}

</style>
<body>
<?php 
     function mangNgaunhien($n){
      $arr = array();
      for($i = 0; $i < $n; $i++){
        $arr[]= rand(-100,100); //sử dụng rand để tạo số ngẫu nhiên từ 1 - 100
      }
      return $arr;
    }
    function inMang($arr) {
      return implode(", ", $arr);
    }
    function demPTChan($arr) {
      $count = 0;
      foreach ($arr as $value) {
        if ($value % 2 === 0) {
          $count++;
        }
      }
      return $count;
    }
    function PTBe100($arr) {
      $count = 0;
      foreach ($arr as $value) {
        if ($value < 100) {
          $count++;
        }
      }
      return $count;
    }
    function tongAm($arr) {
      $tong = 0;
      foreach ($arr as $value) {
        if($value < 0)
        $tong += $value;
      }
      return $tong;
    }
    if(isset($_POST['n'])){
      $n = trim($_POST['n']);
    }else $n = 0;
    $kq="";
     if(isset($_POST['tinh'])){
      $mang = mangNgaunhien($n);
      $str = implode (' ', $mang);
      $kq = "Mảng được tạo ra là: ". $str;
      $kq .= "\n Số phần tử chẵn trong mảng là: ";
      $kq .= demPTChan($mang);
      $kq.= "\n Số phần tử bé 100 trong mảng là: ";
      $kq .= PTbe100($mang);
      $kq.= "\n Tổng số âm trong mảng là: ";
      $kq.= tongAm($mang);
     }
    ?>
<form action="" method="post">
  <table border="0" cellpadding="0">
    <tr>
      <td colspan="2" align="center">
        <h2>Một số thao tác trên mảng</h2>
      </td>
    </tr>
    <tr>
      <td>Nhập n:</td>
      <td><input type="text" name="n" size="30" value="<?php echo $n; ?>"></td>
    </tr>
    <tr>
      <td colspan="2" align="center">
        <input type="submit" name="tinh" value="Xử lý">
      </td>
    </tr>
    <tr>
      <td colspan = "2"><textarea name="ketqua" cols="100" rows="10"><?php echo $kq; ?></textarea></td>
    </tr>
  </table>
</form>
</body>
</html>