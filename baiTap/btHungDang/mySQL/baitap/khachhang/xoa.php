<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Xóa thông tin khách hàng</title>
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
  if (isset($_POST["xoa"])) {
    // $maKHN = $_POST["maKH"];
    echo "<script> 
    var chose = confirm('Bạn có muốn xóa không ?'); 
    if (chose) { 
      window.location.href = 'xoa.php?confirmed=1&maKH=$maKHN'; 
    } else {
      window.location.href = 'index.php'; 
    }
    </script>";
  }

  if (isset($_GET["confirmed"]) && $_GET["confirmed"] == 1) {
    $maKHN = $_GET["maKH"];
    $queryDELETE = "DELETE FROM khach_hang WHERE Ma_khach_hang = '$maKHN'";
    $re = mysqli_query($conn, $queryDELETE);
    if ($re) {
      session_start();
      $_SESSION['success_message_delete'] = "Xóa thành công";
      header("Location: index.php");
    }
  }

  ?>

  <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
    <h3>Xóa thông tin khách hàng</h3>
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
      <input name="xoa" type="submit" value="Xóa">
      <a href="index.php">Trở về </a>
    </div>
  </form>

</body>

</html>