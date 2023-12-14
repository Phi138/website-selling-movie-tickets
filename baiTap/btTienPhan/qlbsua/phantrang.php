<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Frameset//EN">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title>Thông tin sữa</title>
<style>
  body {
    font-family: Arial, sans-serif;
    background-color: #F5F5F5;
  }

  h1 {
    text-align: center;
    color: blue;
  }

  table {
    margin: 0 auto;
    border-collapse: collapse;
    width: 80%;
    background-color: white;
  }

  th, td {
    padding: 10px;
    text-align: center;
    border: 1px solid black;
  }

  th {
    background-color: #E6E6FA;
  }

  tr:nth-child(even) {
    background-color: #DE8F5F;
  }

  tr:nth-child(odd) {
    background-color: #F4DFB6;
  }

  .pagination {
    text-align: center;
    margin-top: 20px;
  }

  .pagination a {
    display: inline-block;
    padding: 5px 10px;
    background-color: #E6E6FA;
    color: black;
    text-decoration: none;
    border: 1px solid black;
    margin-right: 5px;
  }

  .pagination a:hover {
    background-color: #D8BFD8;
  }

  .pagination .active {
    background-color: #8A2BE2;
    color: white;
  }

  .pagination .disabled {
    pointer-events: none;
    opacity: 0.6;
  }
</style>
</head>
<body>
<?php
  // Ket noi CSDL
  $conn = mysqli_connect('localhost', 'root', '', 'qlbansua');
  mysqli_set_charset($conn, 'UTF8');
  $rowsPerPage = 10;
  if (!isset($_GET['page'])) {
    $_GET['page'] = 1;
  }
  $offset = ($_GET['page'] - 1) * $rowsPerPage;
  $sql = 'select Ma_sua, ten_sua, Trong_luong, Don_gia from sua';
  $result = mysqli_query($conn, 'SELECT Ma_sua, ten_sua, Trong_luong, Don_gia FROM sua LIMIT ' . $offset . ', ' . $rowsPerPage);
  echo "<h1>THÔNG TIN SỮA</h1>";
  echo "<table>";
  echo '<tr>
          <th width="50">STT</th>
          <th width="50">Mã sữa</th>
          <th width="150">Tên sữa</th>
          <th width="200">Trọng lượng</th>
        </tr>';
  if (mysqli_num_rows($result) <> 0) {
    $stt = 1;
    while ($rows = mysqli_fetch_row($result)) {
      echo "<tr>";
      echo "<td>$stt</td>";
      echo "<td>$rows[0]</td>";
      echo "<td>$rows[1]</td>";
      echo "<td>$rows[2]</td>";
      echo "</tr>";
      $stt += 1;
    }
  }
  echo "</table>";
  $re = mysqli_query($conn, 'select * from sua');
  $numRows = mysqli_num_rows($re);
  $maxPage = floor($numRows / $rowsPerPage) + 1;
  if ($_GET['page'] > 1) {
    echo "<a href=" . $_SERVER['PHP_SELF'] . "?page=" . ($_GET['page'] - 1) . ">Back</a> ";
  }
  echo '<div class="pagination">';
  for ($i = 1; $i <= $maxPage; $i++) {
    if ($i == $_GET['page']) {
      echo '<a class="active" href="' . $_SERVER['PHP_SELF'] . '?page=' . $i . '">Trang ' . $i . '</a>';
    } else {
      echo '<a href="' . $_SERVER['PHP_SELF'] . '?page=' . $i . '">Trang ' . $i . '</a>';
    }
  }
  echo "</div>";
  if ($_GET['page'] < $maxPage) {
    echo "<a href=" . $_SERVER['PHP_SELF'] . "?page=" . ($_GET['page'] + 1) . ">Next</a>";
  }
  echo '<p align="center">Tổng số trang: ' . $maxPage . '</p>';
?>
</body>
</html>