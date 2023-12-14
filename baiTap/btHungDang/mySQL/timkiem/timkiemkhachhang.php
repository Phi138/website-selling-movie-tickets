<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Frameset//EN">

<html>

<head>

  <meta http-equiv="Content-Type" content="text/html; charset=utf-8">

  <title>Tim kiem khach hang</title>

</head>

<body>

  <form action="" method="get">

    <table bgcolor="#eeeeee" align="center" width="70%" border="1" cellpadding="5" cellspacing="5" style="border-collapse: collapse;">

      <tr>

        <td align="center">
          <font color="blue">
            <h3>TÌM KIẾM THÔNG TIN KHÁCH HÀNG</h3>
          </font>
        </td>

      </tr>

      <tr>

        <td align="center">
          Tên khách hàng:
          <input type="text" name="tenkhachhang" size="30" value="<?php if (isset($_GET['tenkhachhang'])) echo $_GET['tenkhachhang']; ?>">
          <br>
          Giới tính:
          <input type="text" name="gioitinh" size="30" value="<?php if (isset($_GET['gioitinh'])) echo $_GET['gioitinh']; ?>">
          <br>
          Địa chỉ:
          <input type="text" name="diachi" size="30" value="<?php if (isset($_GET['diachi'])) echo $_GET['diachi']; ?>">
          <br>
          Email:
          <input type="text" name="email" size="30" value="<?php if (isset($_GET['email'])) echo $_GET['email']; ?>">



          <input type="submit" name="tim" value="Tìm kiếm">
        </td>

      </tr>

    </table>

  </form>

  <?php

  if ($_SERVER['REQUEST_METHOD'] == 'GET') {
    if (empty($_GET['tenkhachhang'])) {
      echo "<p align='center'>Vui lòng nhập tên khách hàng</p>";
    } else {
      require_once("../sql/connection.php");
      $tenkhachhang = $_GET['tenkhachhang'];
      $gioitinh = $_GET['gioitinh'];
      $diachi = $_GET['diachi'];
      $email = $_GET['email'];

      // Tìm mã khách hàng dựa trên tên khách hàng
      $query = "SELECT * FROM khach_hang";
      $result = mysqli_query($conn, $query);

      if (mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
        $ma_khach_hang = $row['Ma_khach_hang'];
        $Ten_khach_hang = $row['Ten_khach_hang'];
        $Phai = $row['Phai'];
        $dia_chi = $row['Dia_chi'];
        $dien_thoai = $row['Dien_thoai'];
        $email = $row['Email'];

        // Tìm hóa đơn của khách hàng dựa trên mã khách hàng
        $query_hoadon = "SELECT * FROM hoa_don WHERE Ma_khach_hang = '$ma_khach_hang'";
        $result_hoadon = mysqli_query($conn, $query_hoadon);

        if (mysqli_num_rows($result_hoadon) > 0) {
          $rows = mysqli_num_rows($result_hoadon);
          echo "<div align='center'><b>Danh sách khách hàng:</b></div>";

          // Hiển thị danh sách hóa đơn
          while ($row_hoadon = mysqli_fetch_array($result_hoadon, MYSQLI_ASSOC)) {
            $STT = 1;
            echo '<table border="1" cellpadding="5" cellspacing="5" style="border-collapse:collapse;">';
            echo '<tr bgcolor="#eeeeee">
                <th>STT</th>
                <th>Mã hóa đơn</th>
                <th>Ngày mua</th>
                <th>Điện thoại</th>
                <th>Chi tiết</th>
              </tr>';
            echo '<tr>';

            echo ' <td>' . $STT++ . '</td>';
            echo ' <td>' . $row_hoadon['So_hoa_don'] . '</td>';
            echo ' <td>' .  $row_hoadon['Ngay_HD'] . '</td>';
            echo ' <td>' .  $dien_thoai . '</td>';
            echo '<td><a href="chi-tiet-khach-hang.php?id=' . $row['Ma_khach_hang'] . '">Xem chi tiết</a></td>';
            echo '</tr>';
            echo '</table>';
          }
        } else {
          echo "<div><b>Không tìm thấy hóa đơn cho khách hàng $tenkhachhang.</b></div>";
        }
      } else {
        echo "<div><b>Không tìm thấy khách hàng có tên $tenkhachhang.</b></div>";
      }
    }
  }
  ?>

</body>

</html>