<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">  
    <title>Document</title>
</head>
    <style>
        body {
        font-family: 'Courier New', Courier, monospace;
        margin: 20px;
        background-image: linear-gradient(to right, #00b09b, #96c93d);
    }
    h1 {
    text-align: center;
    color: #D7E5CA;
    }
    h3 {
    text-align: center;
    color: #B2533E;
    }
    table {
    width: 50%;
    margin: 0 auto;
    border-collapse: collapse;
    margin-bottom: 20px;
    }   

input[type="text"] {
    width: 100%;
    padding: 8px;
    box-sizing: border-box;
    margin: 5px 0 10px 0;
   font-size: 20px;
}

input[type="text"]:focus {
    outline: none;
    border-color: #2196F3;
}

input[type="submit"] {
    padding: 10px 20px;
    font-size: 16px;
}

input[type="submit"]:hover {
    background-color: #4CAF50;
    color: white;
    cursor: pointer;
}
    </style>
<body>
<?php
        $kq = "";
        if(isset($_POST['nam'])){
            $nam = trim($_POST['nam']);
        }else $nam = 0;
        $mang_can =["Quý","Giáp","Ất","Binh","Đinh","Mậu","Kỷ","Canh","Tân","Nhâm"];
        $mang_chi =["Hợi","Tý","Sửu","Dần","Mão","Thìn","Tỵ","Ngọ","Mùi","Thân","Dậu","Tuất"];
        $mang_hinh=["hoi.jpg","ty.jpg","suu.jpg","dan.jpg","mao.jpg","thin.jpg","ran.jpg","ngo.jpg","mui.jpg","than.jpg","dau.jpg","tuat.jpg"];
        if(isset($_POST['hienthi'])){
            $nam = $_POST['nam'];
    
            // Tính can, chi
            $canIndex = ($nam - 3) % 10;
            $chiIndex = ($nam - 3) % 12;
    
            // Lấy giá trị can, chi và hình ảnh tương ứng
            $nam_can = $mang_can[$canIndex];
            $nam_chi = $mang_chi[$chiIndex];
            $hinh_anh = $mang_hinh[$chiIndex];
    
            // Hiển thị kết quả
            $kq .= " $nam_can $nam_chi <br>";
            $kq .= "<img src='12con_giap/$hinh_anh' alt='$nam_chi'></p>";
        }
    ?>
    <form action="" method="post">
        <div>
        <table border="0" cellpadding="0">
    <tr>
      <td colspan="2" align="center">
        <h2>Tính năm âm lịch</h2>
      </td>
    </tr>
    <tr>
      <td>Năm:</td>
      <td><input type="text" name="nam" size="30" value="<?php echo $nam; ?>"></td>
    </tr>
    <tr>
      <td colspan="2" align="center">
        <input type="submit" name="hienthi" value="=>">
      </td>
    </tr>
    <tr>
      <td colspan="2"><?php echo $kq; ?></td>
    </tr>
  </table>
        </div>
    </form>
    
</body>
</html>