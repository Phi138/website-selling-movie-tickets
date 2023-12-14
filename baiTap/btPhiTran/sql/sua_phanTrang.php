<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>THÔNG TIN SỮA</title>
    <style>
        table {
            border-collapse: collapse;
            width: 85%;
            background-color: #EEEDED;
        }

        /* Áp dụng kiểu cho tiêu đề bảng */
        th {
            background-color: #0D1282;
            color: #F0DE36;
            padding: 10px;
        }

        /* Áp dụng kiểu cho các ô dữ liệu */
        td {
            text-align: center;
            padding: 10px;
        }
        .tieuDe{
            color:#0D1282;
            font-weight: bold;
        }
        .so{
            width: 100%;
            text-align: center;
        }
        .so a{
            padding: 0px 10px;
        }
    </style>
</head>
<body>
    <?php
        $conn = mysqli_connect('localhost', 'root', '', 'qlbansua');
        mysqli_set_charset($conn, 'UTF8');
        $rowsPerPage = 5; //số mẩu tin trên mỗi trang, giả sử là 5
        if (!isset($_GET['page'])) {
            $_GET['page'] = 1;
        }

        //vị trí của mẩu tin đầu tiên trên mỗi trang
        $offset = ($_GET['page'] - 1) * $rowsPerPage;

        //lấy $rowsPerPage mẩu tin, bắt đầu từ vị trí $offset
        $result = mysqli_query($conn, 'SELECT s.ten_sua, h.ten_hang_sua, l.ten_loai, s.Trong_luong, s.don_gia
            FROM sua AS s
            INNER JOIN hang_sua AS h ON s.ma_hang_sua = h.ma_hang_sua
            INNER JOIN loai_sua AS l ON s.ma_loai_sua = l.ma_loai_sua
            LIMIT ' . $offset . ', ' . $rowsPerPage);

        echo "<p class='tieuDe' align='center'><font face= 'Verdana, Geneva, sans-serif' size='5'>THÔNG TIN SỮA</font></P>";

        echo "<table align='center' width='900' border='1' cellpadding='2' cellspacing='2' style='border-collapse:collapse'>";
            echo '<tr>
            <th width="50">STT</th>
            <th width="250">Tên sữa</th>
            <th width="150">Hãng sữa</th>
            <th width="100">Loại sữa</th>
            <th width="100">Trọng lượng</th>
            <th width="100">Đơn giá</th>
            </tr>';
            if (mysqli_num_rows($result) <> 0) {
                $stt = 1;
                while ($rows = mysqli_fetch_row($result)) {
                    echo "<tr>";
                    echo "<td align='center'>$stt</td>";
                    echo "<td>$rows[0]</td>";
                    echo "<td>$rows[1]</td>";
                    echo "<td>$rows[2]</td>";
                    echo "<td>$rows[3] gram</td>";
                    $formattedPrice = number_format($rows[4], 0, '.', '.');
                    echo "<td>$formattedPrice VNĐ</td>";
                    echo "</tr>";
                    $stt += 1;
                } //while
            }
        echo "</table>";

        $re = mysqli_query($conn, 'select * from sua');

        //tổng số mẩu tin cần hiển thị
        $numRows = mysqli_num_rows($re);

        //tổng số trang
        $maxPage = floor($numRows / $rowsPerPage) + 1;
        echo '<div class="so" style="text-align: center; margin: 20px">';

            // gắn thêm nút quay về trang đầu
            if ($_GET['page'] > 1) {
                echo "<a href=" . $_SERVER['PHP_SELF'] . "?page=1><<</a> ";
            }

            // gắn thêm nút Back
            if ($_GET['page'] > 1) {
                echo "<a href=" . $_SERVER['PHP_SELF'] . "?page=" . ($_GET['page'] - 1) . "> < </a>";
            }

            // tạo link tương ứng tới các trang
            for ($i = 1; $i <= $maxPage; $i++) {
                if ($i == $_GET['page']) {
                    echo '<div style="text-decoration: underline, color: #F0DE36"><b>' . $i . '</b></div> '; // trang hiện tại sẽ được bôi đậm
                } else {
                    echo "<a href=" . $_SERVER['PHP_SELF'] . "?page=" . $i . ">" . $i . "</a> ";
                }
            }

            // gắn thêm nút Next
            if ($_GET['page'] < $maxPage) {
                echo "<a href=" . $_SERVER['PHP_SELF'] . "?page=" . ($_GET['page'] + 1) . "> > </a>";
            }

            // gắn thêm nút về cuối trang
            if ($_GET['page'] < $maxPage) {
                echo "<a href=" . $_SERVER['PHP_SELF'] . "?page=" . $maxPage . ">>></a>";
            }

        echo '</div>';
    ?>
</body>
</html>
