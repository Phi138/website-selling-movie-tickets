<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Frameset//EN">
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <title>Thông tin sữa</title>
    <style>
        table {
            width: 700px;
            border-collapse: collapse;
        }
        th, td {
            padding: 5px;
            text-align: center;
            border: 1px solid black;
        }
        th {
            background-color: blue;
            color: white;
        }
        div.pagination {
            text-align: center;
            margin-top: 10px;
        }
        div.pagination a {
            padding: 5px 10px;
            margin-right: 5px;
            border: 1px solid black;
            text-decoration: none;
            background-color: lightgray;
            color: black;
        }
        div.pagination a.active {
            background-color: blue;
            color: white;
        }
    </style>
</head>
<body>
<?php
// Kết nối CSDL
require("connect.php");
$sql = 'select Ma_sua, ten_sua, Trong_luong, Don_gia from sua';
$result = mysqli_query($conn, $sql);
echo "<p align='center'><font size='5' color='blue'> THÔNG TIN SỮA</font></P>";
echo "<table align='center'>";
echo '<tr>
    <th width="50">STT</th>
    <th width="50">Mã sữa</th>
    <th width="150">Tên sữa</th>
    <th width="200">Trọng lượng</th>
    <th width="200">Đơn giá</th>
</tr>';
// Phân trang
$numberrow = 10; // Số dòng dữ liệu tối đa trên mỗi trang
$page = isset($_GET['page']) ? $_GET['page'] : 1; // Trang hiện tại, mặc định là trang 1
$offset = ($page - 1) * $numberrow; // Vị trí bắt đầu của dữ liệu trên trang hiện tại
$query = $sql . " LIMIT $offset, $numberrow";
$paginationResult = mysqli_query($conn, $query);
if (mysqli_num_rows($paginationResult) <> 0) {
    $stt = ($page - 1) * $numberrow + 1;
    while ($rows = mysqli_fetch_row($paginationResult)) {
        echo "<tr>";
        echo "<td>$stt</td>";
        echo "<td>$rows[0]</td>";
        echo "<td>$rows[1]</td>";
        echo "<td>$rows[2]</td>";
        echo "<td>$rows[3]</td>";
        echo "</tr>";
        $stt += 1;
    }
}
echo "</table>";
// Tạo phân trang
$queryTotal = "SELECT COUNT(*) as total FROM sua";
$totalResult = mysqli_query($conn, $queryTotal);
$totalRows = mysqli_fetch_assoc($totalResult)['total'];
$totalPages = ceil($totalRows / $numberrow); // Tính tổng số trang

echo "<div class='pagination'>";
if ($page > 1) {
    echo "<a href='?page=1'><<</a>";
    $prevPage = $page - 1;
    echo "<a href='?page=$prevPage'><</a>";
}
for ($i = 1; $i <= $totalPages; $i++) {
    echo "<a href='?page=$i' class='" . ($page == $i ? 'active' : '') . "'>$i</a> ";
}
if ($page < $totalPages) {
    $nextPage = $page + 1;
    echo "<a href='?page=$nextPage'>></a>";
    echo "<a href='?page=$totalPages'>>></a>";
}
echo "</div>";

mysqli_free_result($result);
mysqli_close($conn);
?>
</body>
</html>