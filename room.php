<?php

include "./CSQL/config/connect.php";
    session_start();
    if (!isset($_SESSION['username'])) {
        $_SESSION['message'] = "Vui lòng đăng nhập để mua vé";
        header('Location: ./index.php');
        exit();
}
$maPhong = $_GET['phong'];
$tenPhim = $_GET['tenphim'];
$lichChieu = $_GET['giochieu'];
$MalichPhim = $_GET['malichphim'];
$MaLichChieu = $_GET['malichchieu'];

$query = "SELECT g.TenGhe, g.TrangThai, g.maGhe, p.SoCot, p.SoHang
FROM ghe g
JOIN phong p ON g.MaPhong = p.MaPhong
WHERE g.MaPhong = ?
ORDER BY CAST(SUBSTRING_INDEX(g.TenGhe, '-', 1) AS UNSIGNED), CAST(SUBSTRING_INDEX(g.TenGhe, '-', -1) AS UNSIGNED)";
$stmt = mysqli_prepare($conn, $query);
mysqli_stmt_bind_param($stmt, "s", $maPhong);
mysqli_stmt_execute($stmt);
$result = mysqli_stmt_get_result($stmt);
$rows = mysqli_fetch_all($result, MYSQLI_ASSOC); // Lấy tất cả dữ liệu ghế và gán cho biến $rows
$soCot = $rows[0]['SoCot'];

?>
<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>5thWonder.</title>
    <link rel="icon" type="image/x-icon" href="./assets/img/favicon.svg">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="./assets/css/main.css">
    <link rel="stylesheet" href="./assets/fonts/stylesheet.css">
    <link rel="stylesheet" href="./assets/css/_selectseat.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>

<body>
    <?php include "./components/header.php"; ?>

    <div class="contain">
        <div class="container">
            <div class="row">
                <div class="col-md-3">
                    <div class="welcome">
                        <h2 style="font-size: 20px; color: black;">Chọn ghế:</h2>
                        <hr width="100">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="text-center">
                        <form action="inforpay.php" method="POST" onsubmit="return validateForm()">
                            <table class="how">
                                <tr>
                                    <td>
                                        <label for="adultTickets">Số lượng người lớn:</label>
                                        <input type="number" id="adultTickets" name="adultTickets" min="0" required>
                                        <br>
                                    </td>
                                    <td>
                                        <label for="u22Tickets">Số lượng vé U22:</label>
                                        <input type="number" id="u22Tickets" name="u22Tickets" min="0" required>
                                        <br>
                                    </td>
                                </tr>
                            </table>
                            <h6 style="background-color: #FF2A2A; padding: 10px; color: white;" class="text-center">Screen this Side</h6>
                            <table class="seatcine">
                                <tr>
                                    <td>➘</td>
                                    <?php
                                    for ($i = 1; $i <= $soCot; $i++) {
                                        echo '<td>' . $i . '</td>';
                                    }
                                    ?>
                                </tr>
                                <?php
                                // Tạo bố cục ghế
                                $previousRow = '';
                                foreach ($rows as $row) {
                                    $currentRow = $row['TenGhe'][0];
                                    if ($currentRow !== $previousRow) {
                                        echo '</tr><tr>';
                                        echo '<td>' . $currentRow . '</td>';
                                    }
                                    // Truy vấn trạng thái ghế từ bảng trangthaighe
                                    $queryTrangThai = "SELECT TrangThai FROM trangthaighe WHERE MaPhong = ? AND MaLichChieu = ? AND Maghe = ?";
                                    $stmtTrangThai = mysqli_prepare($conn, $queryTrangThai);
                                    mysqli_stmt_bind_param($stmtTrangThai, "sss", $maPhong, $MaLichChieu, $row['maGhe']);
                                    mysqli_stmt_execute($stmtTrangThai);
                                    $resultTrangThai = mysqli_stmt_get_result($stmtTrangThai);
                                    $trangThai = mysqli_fetch_assoc($resultTrangThai);
                                    
                                    // Check if $trangThai is not null before accessing its elements
                                    if ($trangThai !== null && isset($trangThai['TrangThai'])) {
                                        $disabled = ($trangThai['TrangThai'] == 1) ? 'disabled' : '';
                                    } else {
                                        $disabled = '';
                                    }

                                    echo '<td><input type="checkbox" name="seats[' . $row['maGhe'] . ']" value="' . $row['maGhe'] . '" ' . $disabled . '>' . $row['TenGhe'] . '</td>';
                                    $previousRow = $currentRow;
                                }
                                ?>
                            </table>
                            <?php if (isset($message)) : ?>
                                <p><?php echo $message; ?></p>
                            <?php endif; ?>
                            <input type="hidden" name="totalTickets" value="">
                            <input type="hidden" name="maPhong" value="<?php echo $maPhong; ?>">
                            <input type="hidden" name="tenPhim" value="<?php echo $tenPhim; ?>">
                            <input type="hidden" name="lichChieu" value="<?php echo $lichChieu; ?>">
                            <input type="hidden" name="MalichPhim" value="<?php echo $MalichPhim; ?>">
                            <input type="hidden" name="Malichchieu" value="<?php echo $MaLichChieu; ?>">
                            <input class="btn btn-danger" type="submit" name="submit" style="margin:10px;" value="Thanh Toán">
                        </form>
                    </div>
                </div>
                <div class="col-md-3"></div>
            </div>
            <div class="seat-guide">
                <table>
                    <tr>
                        <thead>Ghi Chú :</thead>
                    </tr>
                    <tr>
                        <td>
                            <div class="seat available"></div>
                        </td>
                        <td>Chỗ trống</td>
                        <td>
                            <div class="seat reserved"></div>
                        </td>
                        <td>Đã có người đặt</td>
                        <td>
                            <div class="seat selected"></div>
                        </td>
                        <td>Đang đặt</td>
                    </tr>
                </table>
            </div>
        </div>
    </div>
    <script>
        function validateForm() {
            var adultTickets = parseInt(document.getElementById("adultTickets").value);
            var u22Tickets = parseInt(document.getElementById("u22Tickets").value);
            var checkboxes = document.querySelectorAll('input[type="checkbox"]:checked');
            var checkedCount = checkboxes.length;
            // Check if the number of adult tickets, U22 tickets, and checked checkboxes are valid
            if (adultTickets + u22Tickets <= 0) {
                alert("Vui lòng nhập số vé người lớn và vé U22.");
                return false;
            } else if (checkedCount != adultTickets + u22Tickets) {
                alert("Vui lòng chọn đúng số lượng ghế tương ứng với số vé người lớn và vé U22.");
                return false;
            }
            // Calculate the value of totalTickets
            var totalTickets = adultTickets + u22Tickets;
            // Set the value of totalTickets input
            document.getElementsByName("totalTickets")[0].value = totalTickets;
            // Form is valid, allow submission
            return true;
        }
    </script>
</body>

</html>