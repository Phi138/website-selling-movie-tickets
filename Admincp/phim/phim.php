<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DANH SÁCH PHIM</title>
    <link rel="stylesheet" href="../css/admin.css">
    <style>
        table {
            border-collapse: collapse;
            width: 100%;
            background-color: #EEEDED;
        }

        /* Áp dụng kiểu cho tiêu đề bảng */
        th {
            background-color: #FF2A2A;
            color: white;
            padding: 10px;
        }

        /* Áp dụng kiểu cho các ô dữ liệu */
        td {
            text-align: center;
            padding: 10px;
        }
        .tieuDe{
            color:#FF2A2A;
            font-weight: bold;
        }
        .so{
            width: 100%;
            text-align: center;
        }
        .so a{
            padding: 0px 10px;
        }
        .aleft{
            text-align: left;
        }
        .them a {
            background-color: white;
            color: #FF2A2A;
            border: 1px solid #FF2A2A;
            cursor: pointer;
            font-weight: bold;
            transition: background-color 0.3s ease;
            text-decoration: none;
            margin: 0px 100px;
        }
        .them a:hover {
            background-color: #FF2A2A;
            color: white;
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
            <?php
                //Kết nối csdl
                require("../connect.php");
                $rowsPerPage = 5; //số mẩu tin trên mỗi trang, giả sử là 5
                if (!isset($_GET['page'])) {
                    $_GET['page'] = 1;
                }

                //vị trí của mẩu tin đầu tiên trên mỗi trang
                $offset = ($_GET['page'] - 1) * $rowsPerPage;

                //lấy $rowsPerPage mẩu tin, bắt đầu từ vị trí $offset
                $result = mysqli_query($conn, 'SELECT MaPhim, TenPhim, ngaykhoichieu, Mota, Anh, Trailer, TenTL, TenQuocGia, thoiluong
                                                FROM phim p, theloai tl, quocgia qg
                                                Where p.MaTL=tl.MaTL and p.MaQuocGia=qg.MaQuocGia
                                                ORDER BY MaPhim DESC
                                                LIMIT ' . $offset . ', ' . $rowsPerPage);

                echo "<p class='tieuDe' align='left'><font face= 'Verdana, Geneva, sans-serif' size='5'><span class='them' align='left' style='font-size: 27px'><a href='themPhim.php'>Thêm mới</a></span>DANH SÁCH PHIM</font></p>";

                echo "<table width='' border='1' cellpadding='2' cellspacing='2' style='border-collapse:collapse'>";
                    echo '<tr>
                    <th width="">Ảnh</th>
                    <th width="">STT</th>
                    <th width="">Mã phim</th>
                    <th width="">Tên phim</th>
                    <th width="">Ngày khởi chiếu</th>
                    <th width="">Thời lượng</th>
                    <th width="30%">Mô tả</th>
                    <th width="">Thể loại</th>
                    <th width="">Quốc gia</th>
                    <th width="">Thao tác</th>
                    </tr>';
                    if (mysqli_num_rows($result) <> 0) {
                        $stt = 1;
                        while ($rows = mysqli_fetch_row($result)) {
                            echo "<tr>";
                            echo "<td style='width: 180px; height: 250px;'><img src='../hinhPhim/$rows[4]' alt='' width='180' height='250'></td>";
                            echo "<td>$stt</td>";
                            echo "<td>$rows[0]</td>";
                            echo "<td>$rows[1]</td>";
                            echo "<td>$rows[2]</td>";
                            echo "<td>$rows[8]</td>";

                            $maxLength = 250; // Độ dài tối đa của chuỗi
                            $text = $rows[3]; // Chuỗi cần hiển thị
                            if (strlen($text) > $maxLength) {
                                $text = substr($text, 0, $maxLength) . '...';
                            }
                            echo "<td class='aleft'>$text</td>";

                            echo "<td>$rows[6]</td>";
                            echo "<td>$rows[7]</td>";
                            echo "<td>
                                    <a href='suaPhim.php?MaPhim=$rows[0]'>Sửa</a> |
                                    <a href='xoaPhim.php?MaPhim=$rows[0]'>Xóa</a>
                                </td>";
                            echo "</tr>";
                            $stt += 1;
                        } //while
                    }
                echo "</table>";

                $re = mysqli_query($conn, 'select * from phim');

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
        </div>
    </div>
</body>
</html>
