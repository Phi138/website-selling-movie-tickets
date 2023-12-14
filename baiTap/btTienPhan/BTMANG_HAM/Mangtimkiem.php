<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Frameset//EN">

<html>

<head>

<meta http-equiv="Content-Type" content="text/html; charset=utf-8">

<title>Mang tim kiem va thay the</title>

</head>
<style>
    body {
  font-family: Arial, sans-serif;
  margin: 20px;
  background-color: #f7f7f7;
}

h2 {
  color: #333;
}

table {
  width: 100%;
  border-collapse: collapse;
  margin-bottom: 20px;
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

input[type="submit"] {
  background-color: #4CAF50;
  color: white;
  border: none;
  cursor: pointer;
}

input[type="submit"]:hover {
  background-color: #45a049;
}

/* Adjustments for disabled input */
input[disabled] {
  background-color: #f7f7f7;
  border: 1px solid #ccc;
  color: #555;
}

label {
  color: #555;
}

</style>
<body>

<?php 

function tim_kiem($arr,$so){

    for($i=0;$i<count($arr);$i++){

        if($arr[$i]==$so){

            return $i;

        }

    }

    return -1;

}
$str="";

$str_kq="";

$ketqua="";

if(isset($_POST['so'])){

    $so=$_POST['so'];

}
if(isset($_POST['so']) && isset($_POST['tinh'])){

    $str=$_POST['mang'];

    $arr=explode(",",$str);

    $str_kq=implode(",",$arr);

    $vitri=tim_kiem($arr,$so);

    if($vitri!=-1){

        $ketqua="Tìm thấy ".$so." tại vị trí thứ ". $vitri ." của mảng.";

    }

    else{

        $ketqua="Không tìm thấy ".$so." trong mảng.";

    }

}

?>

<form action="" method="post">

<table border="0" cellpadding="0">

    <th colspan="2"><h2>TÌM KIẾM</h2></th>

    <tr>

        <td>Nhập mảng:</td>

        <td><input type="text" name="mang" size= "70" value="<?php echo $str;?> "/></td>

    </tr>

    <tr>

        <td>Nhập số cần tìm:</td>

        <td><input type="text" name="so" size="20" value="<?php if(isset($_POST['so'])) echo $_POST['so'];?> "/></td>

    </tr>

    <tr>

        <td></td>

        <td><input type="submit" name="tinh"  size="20" value="   Tìm kiếm  "/></td>

    </tr>

    <tr>

        <td>Mảng:</td>

        <td><input type="text" name="mang_kq" size= "70" disabled="disabled" value="<?php echo $str_kq;?> "/></td>

    </tr>

    

        <td>Kết quả tìm kiếm:</td>

        <td><input type="text" name="kq" size= "70" disabled="disabled" value="<?php echo $ketqua;?> "/></td>

    </tr>

    <tr >

        <td colspan="2" align="center"><label>(Các phần tử trong mảng sẽ cách nhau bằng dấu ",")</label></td>

        

    </tr>

</table>

</form>

</body>

</html>