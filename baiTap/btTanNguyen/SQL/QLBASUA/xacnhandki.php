
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<?php 
include "./connect.php";
$tdn =$_POST["username"];
$matkhau=$_POST['password'];
$mail=$_POST['mail'];

$sql = "INSERT INTO user (Username,Password,mail)
        VALUE ('$tdn','$matkhau','$mail')
 ";
 $conn->query($sql);

?>
    <p>Đã đăng kí thành công </p>
    <a href="./dangnhap.php">chuyển đến trang đăng nhập</a>
   
</body>
</html>