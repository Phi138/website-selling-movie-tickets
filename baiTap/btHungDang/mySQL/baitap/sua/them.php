<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>
<style>
  body {
    display: flex;
    align-items: center;
    justify-content: center;
  }
</style>

<body>
  <?php
  require_once("../../sql/connection.php");
  $HangSuaArr = [];
  $queryHangSua = "SELECT Ma_hang_sua, Ten_hang_sua FROM hang_sua";
  $resultHangSua = mysqli_query($conn, $queryHangSua);
  if (mysqli_num_rows($resultHangSua) > 0) {
    while ($rows = mysqli_fetch_assoc($resultHangSua)) {
      $HangSuaArr[$rows['Ma_hang_sua']] = $rows['Ten_hang_sua'];
    }
  }

  $LoaiSuaArr = [];
  $queryLoaiSua = "SELECT Ma_loai_sua, Ten_loai FROM loai_sua";
  $resultLoaiSua = mysqli_query($conn, $queryLoaiSua);
  if (mysqli_num_rows($resultLoaiSua) > 0) {
    while ($rows = mysqli_fetch_assoc($resultLoaiSua)) {
      $LoaiSuaArr[$rows['Ma_loai_sua']] = $rows['Ten_loai'];
    }
  }

  if (isset($_POST['them'])) {
    $maSua = $_POST['maSua'];
    $tenSua = $_POST['tenSua'];
    $hangSua = $_POST['hangSua'];
    $loaiSua = $_POST['loaiSua'];
    $trongLuong = intval($_POST['trongLuong']);
    $donGia = intval($_POST['donGia']);
    $thanhPhan = $_POST['thanhPhan'];
    $loiIch = $_POST['loiIch'];
    $hinhAnh = $_FILES['hinhAnh'];
    $file_Name = $hinhAnh['name'];
    $fileSize = $hinhAnh['size'];
    $dirTMP = $hinhAnh['tmp_name']; // khi up file lên sẽ được lưu tạm vào đây

    // Tạo 4 ký tự số ngẫu nhiên
    $soNgauNhien = str_pad(mt_rand(1, 9999), 4, '0', STR_PAD_LEFT);

    // Tạo mã sữa tự động
    $maSuaTudong = substr($hangSua, 0, 2) . substr($loaiSua, 0, 2) . $soNgauNhien;
    //Kiểm tra kích thước
    $maxFileSize = 20 * 1024 * 1024;
    if ($fileSize > $maxFileSize) {
      $err = "Kích thước ảnh nên bé hơn hoặc bằng 20 MB";
    }

    // Kiểm tra định dạng
    $fileEx = pathinfo($file_Name, PATHINFO_EXTENSION);
    $acceptedtEx = ['jpg', 'jpeg', 'png', 'gif', 'bmp'];
    if (!in_array($fileEx, $acceptedtEx)) {
      $err = "Định dạng ảnh không hợp lệ!";
    }

    // //  tạo tên file ngẫu nhiên để không bị trùng
    // $newFileName = uniqid() . "." . $fileEx;

    // Di chuyển ảnh từ thư mục tmp sang thư mục làm việc
    $dirTarget = '../../img/';
    if (!move_uploaded_file($dirTMP, $dirTarget . $file_Name)) {
      $err = "Không tải ảnh lên được";
    }

    // thêm sản phẩm vào db
    $queryINSERT = "INSERT INTO sua VALUES('$maSua', '$tenSua', '$hangSua', '$loaiSua', $trongLuong, $donGia, '$thanhPhan', '$loiIch', '$file_Name')";
    $result = mysqli_query($conn, $queryINSERT);
    if ($result) {
      $success = "Thêm thành công";
    } else {
      $err = "Không thêm được: " . mysqli_error($conn);
    }
  }
  ?>
  <div class="container">
    <h3>thêm sữa mới</h3>
    <form action="" method="post" enctype="multipart/form-data">
      <table>
        <tr>
          <td>Mã sữa:</td>
          <td>
            <input readonly type="text" name="maSua" value="<?php echo isset($maSuaTudong) ? $maSuaTudong : '' ?>">
          </td>
        </tr>
        <tr>
          <td>Tên sữa:</td>
          <td>
            <input type=" text" name="tenSua" value="<?php echo isset($tenSua) ? $tenSua : "" ?>">
          </td>
        </tr>
        <tr>
          <td>Hãng sữa:</td>
          <td>
            <select name="hangSua" id="hangSua">
              <?php
              foreach ($HangSuaArr as $maHangSua => $tenHangSua) {
                $selected = ($maHangSua == $hangSua) ? 'selected' : '';
                echo "<option $selected value = '$maHangSua'>$tenHangSua</option>";
              }
              ?>
            </select>
          </td>
        </tr>
        <tr>
          <td>Loại sữa:</td>
          <td>
            <select name="loaiSua" id="loaiSua">
              <?php
              foreach ($LoaiSuaArr as $maLoaiSua => $tenLoaiSua) {
                $selected = ($maLoaiSua == $loaiSua) ? 'selected' : "";
                echo "<option  $selected  value = '$maLoaiSua'>$tenLoaiSua</option>";
              }
              ?>
            </select>
          </td>
        </tr>
        <tr>
          <td>Trọng lượng:</td>
          <td>
            <input type=" text" name="trongLuong" value="<?php echo isset($trongLuong) ? $trongLuong : "" ?>">
          </td>
        </tr>
        <tr>
          <td>Đơn giá:</td>
          <td>
            <input type=" text" name="donGia" value="<?php echo isset($donGia) ? $donGia : "" ?>">
          </td>
        </tr>
        <tr>
          <td>Thành phần:</td>
          <td>
            <textarea name="thanhPhan" id="" cols="30" rows="3"><?php
                                                                echo isset($thanhPhan) ? $thanhPhan : "";
                                                                ?></textarea>
          </td>
        </tr>
        <tr>
          <td>Lợi ích:</td>
          <td>
            <textarea name="loiIch" id="" cols="30" rows="3"><?php
                                                              echo isset($loiIch) ? $loiIch : "";
                                                              ?></textarea>
          </td>
        </tr>
        <tr>
          <td>Hình ảnh:</td>
          <td>
            <input type="file" name="hinhAnh" value="a">
          </td>
        </tr>
      </table>
      <div class=" actions">
        <input type="submit" name="them" value="Thêm mới">
      </div>
    </form>
    <div class="notifi">
      <p>
        <?php
        if (isset($err)) {
          echo $err;
        } elseif (isset($success)) {
          echo $success;
        }
        ?>
      </p>
    </div>
  </div>
</body>

</html>