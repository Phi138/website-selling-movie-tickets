<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Đăng ký</title>
    <style>
        .container {
            width: 300px;
            padding: 16px;
            background-color: white;
            margin: 0 auto;
            margin-top: 100px;
            border: 1px solid black;
        }
        input[type=text],
        input[type=password] {
            width: 100%;
            padding: 12px 20px;
            margin: 8px 0;
            display: inline-block;
            border: 1px solid #ccc;
            box-sizing: border-box;
        }
        button {
            background-color: #4CAF50;
            color: white;
            padding: 14px 20px;
            margin: 8px 0;
            border: none;
            cursor: pointer;
            width: 100%;
        }
        button:hover {
            opacity: 0.8;
        }
    </style>
</head>
<body>
   <?php 
      $tentaikhoan = "";
      $matkhau = "";
      $mail = "";

      if(isset($_POST['submit'])) {
        $_POST["username"];
        $_POST['password'];
        $_POST['mail'];
      }
      
   ?>
    <form action="xacnhandki.php" method="post">
        <div class="container">
            <label for="username"><b>Tên người dùng</b></label>
            <input type="text" placeholder="Nhập tên người dùng" name="username"  value="<?php echo $tentaikhoan ?>" required>
            <label for="password"><b>Mật khẩu</b></label>
            <input type="password" placeholder="Nhập mật khẩu" name="password" value="<?php echo $matkhau ?>" required>
            <label for="email"><b>Nhập email</b></label>
            <input type="email" placeholder="mail" name="mail" <?php echo $mail?> required>
            <button type="submit" name="submit">Đăng ký</button>
        </div>
    </form>
</body>
</html>