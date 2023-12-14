<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
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

        #overlay {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.5);
            justify-content: center;
            align-items: center;
            display: flex;
            z-index: 999;
        }

        #notification {
            background-color: white;
            padding: 20px;
            border-radius: 5px;
            text-align: center;
        }

        #closeButton {
            margin-top: 10px;
        }
    </style>
</head>

<body>
    <?php
    include "./connect.php";

    if (isset($_POST['submit'])) {
        $tendangnhap = $_POST['username'];
        $matkhau = $_POST['password'];
        $sql = "SELECT us.Username,us.Password,us.mail
        FROM user us
        WHERE Username = '$tendangnhap'
";
        $result = mysqli_query($conn, $sql);


        while ($rows = mysqli_fetch_row($result)) {
            $tendangnhap = $rows[0];
            $matkhau = $rows[1];
        }
        if ($_POST['username'] == $tendangnhap && $_POST['password'] == $matkhau) {
            header("Location: thongtinsua.php");
            exit;
        } else {
            echo ' <div id="overlay">
                <div id="notification">
                    <span id="message">Tên tài khoản và mật khẩu không hợp lệ, vui lòng nhập lại</span>
                    <button id="closeButton" onclick="closeNotification()">Đóng</button>
                </div>
            </div>';
        }
    }


    ?>
    <form action="dangnhap.php" method="post">

        <div class="container">
            <label for="username"><b>Username</b></label>
            <input type="text" placeholder="Enter Username" name="username" required " >

            <label for=" password"><b>Password</b></label>
            <input type="password" placeholder="Enter Password" name="password" required " >

            <button type=" submit" name="submit">Login</button>

        </div>
    </form>
    <script>
        function closeNotification() {
            var overlay = document.getElementById("overlay");
            if (overlay) {
                overlay.style.display = "none";
            }
        }
    </script>
</body>

</html>