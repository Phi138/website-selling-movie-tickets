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
            height: 400px;
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
    </style>
</head>

<body>
    <?php
    $username = "";
    $password = "";
    include "./connect.php";
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Lấy giá trị từ biểu mẫu
        $username = $_POST["username"];
        $password = $_POST["password"];

        // Kiểm tra xem tài khoản đã tồn tại hay chưa
        $checkQuery = "SELECT id FROM tai_khoan WHERE id = '$username'";
        $checkResult = mysqli_query($conn, $checkQuery);

        if (mysqli_num_rows($checkResult) > 0) {
            // Tên đăng nhập đã tồn tại
            echo "<script>alert('Tên đăng nhập đã được sử dụng. Vui lòng chọn tên khác.');</script>";
        } else {
            // Tên đăng nhập chưa tồn tại, tiến hành tạo tài khoản mới
            $insertQuery = "INSERT INTO tai_khoan (id, matkhau) VALUES ('$username', '$password')";
            $insertResult = mysqli_query($conn, $insertQuery);

            if ($insertResult) {
                // Tài khoản đã được tạo thành công
                echo "<script>alert('Tài khoản đã được tạo thành công.');</script>";
            } else {
                // Lỗi khi tạo tài khoản
                echo "<script>alert('Đã xảy ra lỗi khi tạo tài khoản. Vui lòng thử lại.');</script>";
            }
        }
    }
    ?>
    <div class="form">
        <form action="" method="post" class="sub-form">
            <div class="upper-form">
                <h2>Tạo tài khoản</h2>
                <label>Username</label><br>
                <input type="text" name="username" value="<?php echo $username ?>" required><br>
                <label>Password</label><br>
                <input type="text" name="password" value="<?php echo $password ?>" required><br>
                <div class="btn">
                    <button type="submit">Register</button><br>
                </div>
            </div>
        </form>
    </div>

</body>

</html>