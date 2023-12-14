<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thêm lịch chiếu phim</title>
    <link rel="stylesheet" href="../css/admin.css">
    <style>
        /* CSS cho tiêu đề */
        h1 {
            color: #ff2a2a;
            font-size: 24px;
            text-align: center;
        }

        /* CSS cho form */
        form {
            width: 300px;
            margin: 0 auto;
            border: 1px solid #ccc;
            padding: 20px;
        }

        /* CSS cho các nhãn và các trường nhập */
        label,
        input,
        select {
            display: block;
            margin-bottom: 10px;
        }

        /* CSS cho nút submit */
        input[type="submit"] {
            background-color: #ff2a2a;
            color: white;
            padding: 10px 20px;
            border: none;
            cursor: pointer;
            text-align: center;
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
            padding: 10px 20px;
            background-color: #FF2A2A;
            color: #fff;
            border: none;
            cursor: pointer;
        }
    </style>
</head>

<body>
    <?php
    include("../adminHeader.php");
    ?>
    <div class="container">
        <?php
        include("../adminMenu.php");
        ?>
        <div class="noiDung">
            <h1>Thêm lịch chiếu phim</h1>
            <form action="" method="POST">
                <?php
                // Kết nối đến cơ sở dữ liệu
                $servername = "localhost";
                $username = "root";
                $password = "";
                $database = "web_cinema";
                $conn = new mysqli($servername, $username, $password, $database);
                if ($conn->connect_error) {
                    die("Kết nối cơ sở dữ liệu thất bại: " . $conn->connect_error);
                }
                $query = "SELECT MaLichPhim FROM lichchieuphim ORDER BY MaLichPhim DESC LIMIT 1";
                $result = $conn->query($query);

                if ($result->num_rows > 0) {
                    $row = $result->fetch_assoc();
                    $lastMaLichPhim = $row['MaLichPhim'];

                    // Trích xuất phần số từ mã hiện có
                    $numericPart = intval(substr($lastMaLichPhim, 3));

                    // Tăng giá trị số lên 1
                    $numericPart++;

                    // Tạo mã mới dựa trên giá trị số đã tăng
                    $newMaLichPhim = "LCP" . str_pad($numericPart, 3, '0', STR_PAD_LEFT);
                } else {
                    $newMaLichPhim = "LCP001";
                }
                // Hiển thị MaLichPhim (đã tự động tạo)
                echo "<label for='malichphim'>Mã lịch phim:</label>";
                echo "<input type='text' name='malichphim' id='malichphim' value='" . $newMaLichPhim . "' readonly>";
                // Hiển thị MaLichChieu (danh sách tên lịch chiếu)
                echo "<label for='malichchieu'>Giờ chiếu:</label>";
                echo "<select name='malichchieu' id='malichchieu'>";
                $query = "SELECT * FROM lichchieu";
                $result = $conn->query($query);
                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        $malichchieu =  $row['MaLichChieu'];
                        $giochieu = $row['GioChieu'];
                        $ngaychieu = $row['NgayChieu'];
                        echo "<option value='" . $row['MaLichChieu'] . "'>" . $row['GioChieu'] . "" . $row['NgayChieu'] . "</option>";
                    }
                }
                echo "</select>";
                // Hiển thị MaPhong (danh sách tên phòng)
                echo "<label for='maphong'>Tên phòng chiếu :</label>";
                echo "<select name='maphong' id='maphong'>";
                $query = "SELECT * FROM phong";
                $result = $conn->query($query);
                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        $maphong = $row['MaPhong'];
                        echo "<option value='" . $row['MaPhong'] . "'>" . $row['TenPhong'] . "</option>";
                    }
                }
                echo "</select>";
                // Hiển thị MaPhim (danh sách tên phim)
                echo "<label for='maphim'>Tên phim :</label>";
                echo "<select name='maphim' id='maphim'>";
                $query = "SELECT * FROM phim";
                $result = $conn->query($query);
                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        $maphim = $row['MaPhim'];
                        echo "<option value='" . $row['MaPhim'] . "'>" . $row['TenPhim'] . "</option>";
                    }
                } else {
                    echo "Không có phim nào";
                }
                echo "</select>";

                ?>
                <br><br>

                <input type="submit" value="Thêm" name="submit" onclick="showNotification()">
            </form>
            <?php

            if (isset($_POST['submit'])) {
                $malichphim = $_POST['malichphim'];
                $malichchieu = $_POST['malichchieu'];
                $maphong = $_POST['maphong'];
                $maphim = $_POST['maphim'];
                $query = "SELECT phim.thoiluong
                FROM phim
                WHERE phim.MaPhim = '$maphim'";
                $result = $conn->query($query);
                if ($result->num_rows > 0) {
                    $row = $result->fetch_assoc();
                    $thoiluong = strtotime($row['thoiluong']);

                    $query1 = "SELECT lichchieu.GioChieu, lichchieu.MaLichChieu
                     FROM lichchieu
                     WHERE lichchieu.MaLichChieu = '$malichchieu'";
                    $result1 = $conn->query($query1);
                    if ($result1->num_rows > 0) {
                        while ($row1 = $result1->fetch_assoc()) {
                            $giochieu = strtotime($row1['GioChieu']);
                            // Tính toán thời gian kết thúc
                            $thoigianketthuc = $giochieu + $thoiluong;
                            // Định dạng lại thời gian kết thúc thành chuỗi "H:i:s"
                            $thoigianketthuc1 = date("H:i:s", $thoigianketthuc);

                            // Thêm dữ liệu vào bảng lichchieuphim 
                            $insertQuery = "INSERT INTO lichchieuphim (MaLichPhim, MaLichChieu, MaPhong, MaPhim, thoigianketthuc) VALUES ('$malichphim', '$malichchieu', '$maphong', '$maphim', '$thoigianketthuc1')";
                            if ($conn->query($insertQuery) === TRUE) {
                                echo '<div id="overlay">
                          <div id="notification">
                              <span id="message">Thêm thành công </span>
                              <button id="closeButton" onclick="closeNotification()">Đóng</button>
                          </div>
                      </div>';
                            } else {
                                echo "Lỗi: " . $conn->error;
                            }
                        }
                    }
                } else {
                    echo "Không tìm thấy thông tin lịch chiếu";
                }
                // Đóng kết nối
                $conn->close();
            }
            ?>

        </div>
    </div>

</body>
<script>
    function showNotification() {
        var overlay = document.getElementById("overlay");
        if (overlay) {
            overlay.style.display = "flex";
        }
    }

    function closeNotification() {
        var overlay = document.getElementById("overlay");
        if (overlay) {
            overlay.style.display = "none";
            window.location.href = "detail_lichchieuphim.php";
        }
    }
</script>

</html>