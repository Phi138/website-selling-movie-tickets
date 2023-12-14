<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title></title>
    <style>
        body {
            font-family: Verdana, Geneva, Tahoma, sans-serif;
            height: 100%;
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
        }

        .form {
            display: flex;
            justify-content: center;
            padding-top: 35px;
        }

        .sub-form {
            display: flex;
            flex-direction: column;
            align-items: center;
            width: 400px;
            height: 450px;
            border-radius: 12px;
            background-color: whitesmoke;
        }

        h2 {
            margin: 15px 0 20px 0;
            text-align: center;
        }

        label {
            padding-left: 16px;
            opacity: 0.75;
        }

        input {
            display: flex;
            border-radius: 50px;
            border-style: none;
            outline: none;
            margin-top: 8px;
            padding: 12px 24px;
            width: 250px;
            background-color: #EAEEED;
        }

        input:focus {
            opacity: 0.7;
        }

        button {
            padding: 12px 48px;
            border-radius: 50px;
            color: #fff;
            margin-top: 10px;
            cursor: pointer;
            outline: none;
            border-width: 0;
            background-color: rgb(87, 151, 207);
            font-weight: 600;
            width: 100%;
        }

        button:hover {
            opacity: 0.8;
        }

        .bottom-form {
            display: flex;
            justify-content: center;
            margin-top: 40px;
        }

        .signup {
            padding-left: 20px;
            text-decoration: none;
            cursor: pointer;
            color: #21D4FD;
        }

        .signup:hover {
            opacity: 0.8;
        }
    </style>
</head>

<body>
    <?php
    $username = "";
    $password = "";
    include "./connect.php";

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $username = $_POST["username"];
        $password = $_POST["password"];

        $sql = "SELECT tk.id, tk.matkhau
            FROM tai_khoan tk
            WHERE tk.id = '$username' AND tk.matkhau = '$password'";
        $result = mysqli_query($conn, $sql);

        if (mysqli_num_rows($result) > 0) {
            // Đăng nhập thành công
            // Thực hiện các hành động tiếp theo sau khi đăng nhập thành công
        } else {
            echo "<script>alert('Nhập đúng tên tài khoản!');</script>";
        }
        if (mysqli_num_rows($result) > 0) {
            // Đăng nhập thành công
            // Thực hiện các hành động tiếp theo sau khi đăng nhập thành công

            // Chuyển hướng đến trang chính
            header("Location: qlbs.php");
            exit();
        } else {
            echo "<script>alert('Nhập đúng mật khẩu!');</script>";
        }
    }

    ?>
    <div class="form">
        <form action="" method="post" class="sub-form">
            <div class="upper-form">
                <h2>Login</h2>
                <label>Username</label><br>
                <input type="text" name="username" value="<?php echo $username ?>"><br>
                <label>Password</label><br>
                <input type="text" name="password" value="<?php echo $password ?>" required><br>
                <div class="btn">
                    <button type="submit">Login</button><br>
                </div>
            </div>
            <div class="bottom-form">
                <div class="no-account">Don't have an account?</div>
                <a href="#" class="signup">Signup</a>
            </div>
        </form>
    </div>

</body>

</html>