<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Frameset//EN">
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <title>Chi Tiết Sữa</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f0f0f0;
            margin: 0;
            padding: 0;
        }
        h1 {
            text-align: center;
            background-color: #CE5A67;
            color: white;
            padding: 10px;
        }
        table{
            border: 1px solid;
        }
        .container {
            display: flex;
            justify-content: space-between;
            align-items: center;
            width: 80%;
            margin: 20px auto;
        }
        .image-column {
            flex: 0.5;
        }
        a{
        background-color: #C70039;
        color: white;
        padding: 8px 15px;
        border: none;
        border-radius: 4px;
        cursor: pointer;
        text-decoration: none;
    }
        .image-column img {
            max-width: 100%;
            height: auto;
            display: block;
        }
        .info-column {
            flex: 2;
            padding: 20px;
            border: 1px solid black;
            border-radius: 5px;
            background-color: white;
        }
    </style>
</head>
<body>
    <?php
    require('connect.php'); // Include your database connection script
    if (isset($_GET['masua'])) {
        $masua = $_GET['masua'];
        // Fetch the product details based on $masua
        $query = "SELECT * FROM sua WHERE Ma_sua = '$masua'";
        $result = mysqli_query($conn, $query);
        if ($row = mysqli_fetch_assoc($result)) {
            ?>
            <h1><?php echo $row['Ten_sua']; ?></h1>
            <div class="container">
                <div class="image-column">
                    <img src="./Hinh_sua/<?php echo $row['Hinh']; ?>" alt="<?php echo $row['Ten_sua']; ?>">
                </div>
                <div class="info-column">
                    <p><strong>Thành phần dinh dưỡng:</strong> <?php echo $row['TP_Dinh_Duong']; ?></p>
                    <p><strong>Trọng Lượng:</strong> <?php echo $row['Trong_luong']; ?></p>
                    <p><strong>Đơn Giá:</strong> <?php echo $row['Don_gia']; ?></p>
                    <p><strong>Lợi Ích:</strong> <?php echo $row['Loi_ich']; ?></p>
                </div>
            </div>
            <?php
        } else {
            echo "Sản phẩm không tồn tại.";
        }
    } else {
        echo "Thiếu thông tin sản phẩm.";
    }
    ?>
    <a href="list_dang_cot.php">Trở về</a>
</body>
</html>