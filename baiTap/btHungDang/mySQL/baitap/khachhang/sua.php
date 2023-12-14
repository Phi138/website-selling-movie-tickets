<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Cập nhật thông tin khách hàng</title>
</head>

<body>
  <?php
  require_once("../../sql/connection.php");

  $maKH = $tenKH = $gioiTinh = $diaChi = $dienThoai = $email = "";

  if (isset($_GET["Ma_KH"])) {
    $maKH = $_GET["Ma_KH"];
    $querySELECT = "SELECT * FROM khach_hang WHERE Ma_khach_hang = '$maKH'";
    $result = mysqli_query($conn, $querySELECT);
    if (mysqli_num_rows($result) > 0) {
      $rows = mysqli_fetch_assoc($result);
      $maKH = $rows["Ma_khach_hang"];
      $tenKH = $rows["Ten_khach_hang"];
      $gioiTinh = $rows["Phai"] == 0 ? "Nam" : "Nữ";
      $diaChi = $rows["Dia_chi"];
      $dienThoai = $rows["Dien_thoai"];
      $email = $rows["Email"];
    }
  }
  if (isset($_POST["capNhat"])) {
    $maKHN = $_POST["maKH"];
    $tenKHN = $_POST["tenKH"];
    $gioiTinhN = isset($_POST["gioiTinh"]) && $_POST["gioiTinh"] === "Nữ" ? 1 : 0;
    $diaChiN = $_POST["diaChi"];
    $dienThoaiN = $_POST["dienThoai"];
    $emailN = $_POST["email"];
    // echo $maKHN, $tenKHN, $gioiTinhN;
    $queryUPDATE = "UPDATE khach_hang 
                    SET Ten_khach_hang = '$tenKHN', Phai = $gioiTinhN, Dia_chi = '$diaChiN', Dien_thoai = '$dienThoaiN', Email = '$emailN'
                    WHERE Ma_khach_hang = '$maKHN'";
    $re = mysqli_query($conn, $queryUPDATE);
    if ($re) {
      session_start(); // Bắt đầu phiên làm việc
      $_SESSION['success_message_edit'] = "Cập nhật thành công";
      header("Location: index.php");
    }
  }

  ?>

  <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
    <h3>Cập nhật thông tin khách hàng</h3>
    <table>
      <tr>
        <td>Mã khách hàng:</td>
        <td>
          <input type="text" name="maKH" value="<?php echo $maKH; ?>" readonly>
        </td>
      </tr>
      <tr>
        <td>Tên khách hàng:</td>
        <td>
          <input name="tenKH" type="text" value="<?php echo $tenKH; ?>">
        </td>
      </tr>
      <tr>
        <td>Giới tính:</td>
        <td>
          <input name="gioiTinh" type="radio" value="Nam" <?php if ($gioiTinh === "Nam") echo 'checked'; ?>>Nam
          <input name="gioiTinh" type="radio" value="Nữ" <?php if ($gioiTinh === "Nữ") echo 'checked'; ?>>Nữ
        </td>
      </tr>
      <tr>
        <td>Địa chỉ:</td>
        <td>
          <input name="diaChi" type="text" value="<?php echo $diaChi; ?>">
        </td>
      </tr>
      <tr>
        <td>Điện thoại:</td>
        <td>
          <input name="dienThoai" type="text" value="<?php echo $dienThoai; ?>">
        </td>
      </tr>
      <tr>
        <td>Email:</td>
        <td>
          <input name="email" type="text" value="<?php echo $email; ?>">
        </td>
      </tr>
    </table>
    <div class="actions">
      <input name="capNhat" type="submit" value="Cập nhật">
      <a href="index.php">Trở về </a>
    </div>
  </form>

</body>

</html>