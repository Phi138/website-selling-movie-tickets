<?php
include "./CSQL/config/connect.php";
require_once("./send_mail/send_mail.php");
if ($_SERVER["REQUEST_METHOD"] === "POST" ) {
    $khachHang=$_POST['khachHang'];
    $email=$_POST['email'];
  $tenPhim = $_POST["tenphim"];
  $MalichPhim = $_POST["malichphim"];
  $maPhong = $_POST["phongchieu"];
  $totalprice = $_POST["totalPrice"];
  $maghe = $_POST["maghe"];
  $ngay = $_POST['ngaydat'];
  $soluongve= $_POST['soluongve'];
   $loaive = $_POST['loaive'];
$venl = $_POST['nguoilon'];
$u22= $_POST['u22'];
$malichchieu = $_POST["Malichchieu"];
$mapttt = $_POST['payment-method'];
  // Tạo mã đặt vé
  $maDatVe = generateMaDatVe();
        
  // Tách mã ghế thành mảng
  $arrMaghe = explode(",", $maghe);

  // Tạo mảng giá vé cho từng ghế
  $arrGiaVe = generateGiaVe($venl, $u22, $conn);

  // Thêm thông tin đặt vé vào bảng ttdatve
  $sqlTtdatve = "INSERT INTO ttdatve (MaDatVe, MaLichPhim, NgayDat) VALUES ('$maDatVe','$MalichPhim', '$ngay')";
  if ($conn->query($sqlTtdatve) === TRUE) {
      // Lấy ID tự động được tạo cho đơn đặt vé
      $idDatVe = $conn->insert_id;

      // Thêm thông tin chi tiết đặt vé vào bảng ctdatve
      $index = 0;
      for ($i = 0; $i < $soluongve; $i++) {
          $maGhe = $arrMaghe[$i];
          if ($i < $venl) {
              $giaVe = $arrGiaVe[$index];
          } else {
              $giaVe = $arrGiaVe[$index + 1];
          }
          $index++;
          for ($i = 0; $i < $soluongve; $i++) {
              $maGhe = $arrMaghe[$i];
              $giaVe = isset($arrGiaVe[$i]) ? $arrGiaVe[$i] : 0;
              $sqlCtdatve = "INSERT INTO ctdatve (MaDatVe, MaGhe, GiaVe) VALUES ('$idDatVe', '$maGhe', '$giaVe')";
              $conn->query($sqlCtdatve);
              $sqlTrangThaiGhe = "INSERT INTO trangthaighe (Maghe, TrangThai, MaPhong, MaLichChieu) VALUES ('$maGhe', 1, '$maPhong', '$malichchieu')";
          $conn->query($sqlTrangThaiGhe);
        
          }
          // Thêm thông tin vào bảng trangthaighe
          
      }
      
      echo " ";
  } else {
      echo "Lỗi: " . $sqlTtdatve . "<br>" . $conn->error;
  }
  // Thêm thông tin vào bảng thanhthoan
  $maThanhToan = generateMaThanhToan($conn); 
  $sqlThanhToan = "INSERT INTO thanhtoan (MaThanhToan, MaDatVe, MaNhanVien, TrangThaiThanhToan, NgayThanhToan, tongtienthanhtoan) VALUES ('$maThanhToan', '$idDatVe', 'NV01', '1', NOW(), '$totalprice')"; 
  if ($conn->query($sqlThanhToan) === TRUE) { 
    echo '<script>
    alert("Đặt vé và thanh toán thành công. Vui lòng bấm OK!!!");
    setTimeout(function() {
        window.location.href = "index.php";
    }, 500);
</script>';
  } else { 
      echo "Lỗi: " . $sqlThanhToan . "<br>" . $conn->error; 
  } 
 if (isset($_POST['payment'])&&$mapttt === "PTTT02") {
  header("Location: momo_payment.php");
  exit;
} 
else{
  // Lấy Giờ Chiếu từ bảng LichChieu dựa vào MaLichChieu trong bảng TrangThaiGhe
$sqllc = "SELECT lc.GioChieu,lc.NgayChieu
FROM trangthaighe ttg
INNER JOIN lichchieu lc ON ttg.MaLichChieu = lc.MaLichChieu
WHERE ttg.MaLichChieu = '$malichchieu'";
$result = $conn->query($sqllc);

if ($result->num_rows > 0) {
$row = $result->fetch_assoc();
$giochieu = $row['GioChieu'];
$ngaychieu = $row['NgayChieu'];
// Sử dụng biến $giochieu trong phần xử lý tiếp theo của bạn
} else {
echo "Không tìm thấy thông tin Giờ Chiếu.";
}

// Lấy cột "thoigianketthuc" từ bảng "lichchieuphim" dựa vào "malichphim"
$sqlThoigianKetThuc = "SELECT lc.thoigianketthuc
                      FROM lichchieuphim lc
                      INNER JOIN ttdatve tt ON lc.MaLichPhim = tt.MaLichPhim
                      WHERE tt.MaLichPhim = '$MalichPhim'";
$resultThoigianKetThuc = $conn->query($sqlThoigianKetThuc);

if ($resultThoigianKetThuc->num_rows > 0) {
    $rowThoigianKetThuc = $resultThoigianKetThuc->fetch_assoc();
    $thoigianketthuc = $rowThoigianKetThuc['thoigianketthuc'];
    // Sử dụng biến $thoigianketthuc trong phần xử lý tiếp theo của bạn
} else {
    echo "Không tìm thấy thông tin Thời Gian Kết Thúc.";
}
  $title = "Hóa đơn thanh toán";
  $tenKH = $khachHang;
  $email;
  $maPhong;
  $maghe;
  $maDatVe;
  $tenPhim;
  $ngay;
  $giochieu;
  $ngaychieu;
  $thoigianketthuc;
  $mailer = new Mailer_Helper();
  $mailer->sendMail($title, $maPhong, $maghe, $tenPhim, $maDatVe, $ngay, $giochieu, $tenKH, $ngaychieu, $thoigianketthuc, $email);
}

 
}
// Đóng kết nối
$conn->close();

// Hàm tạo mã đặt vé ngẫu nhiên
function generateMaDatVe()
{
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $randomString = '';
    $length = 10;
    for ($i = 0; $i < $length; $i++) {
        $randomString .= $characters[rand(0, strlen($characters) - 1)];
    }
    return "DV-" . $randomString;
}

// Hàm tạo mảng giá vé cho từng ghế
function generateGiaVe($venl, $u22, $conn)
{
    $arrGiaVe = array();
    for ($i = 0; $i < $venl; $i++) {
        $sqlGiaveNguoiLon = "SELECT GiaVe FROM giave WHERE MaLoaiVe = 'LV01'";
        $resultGiaveNguoiLon = $conn->query($sqlGiaveNguoiLon);
        if ($resultGiaveNguoiLon->num_rows > 0) {
            $row = $resultGiaveNguoiLon->fetch_assoc();
            $giaVeNguoiLon = $row['GiaVe'];
            $arrGiaVe[] = $giaVeNguoiLon;
        } else {
            echo "Không tìm thấy giá vé người lớn.";
            return array();
        }
    }
    for ($i = 0; $i < $u22; $i++) {
        $sqlGiaveU22 = "SELECT GiaVe FROM giave WHERE MaLoaiVe = 'LV02'";
        $resultGiaveU22 = $conn->query($sqlGiaveU22);
        if ($resultGiaveU22->num_rows > 0) {
            $row = $resultGiaveU22->fetch_assoc();
            $giaVeU22 = $row['GiaVe'];
            $arrGiaVe[] = $giaVeU22;
        } else {
            echo "Không tìm thấy giá vé U22.";
            return array();
        }
    }
    return $arrGiaVe;
}
// Hàm tạo mã thanh toán
function generateMaThanhToan($conn)
{
    $sqlMaxMaThanhToan = "SELECT MAX(MaThanhToan) AS MaxMaThanhToan FROM thanhtoan";
    $resultMaxMaThanhToan = $conn->query($sqlMaxMaThanhToan);
    if ($resultMaxMaThanhToan->num_rows > 0) {
        $row = $resultMaxMaThanhToan->fetch_assoc();
        $maxMaThanhToan = $row['MaxMaThanhToan'];
        if ($maxMaThanhToan !== null) {
            $maxMaThanhToanNumber = intval(substr($maxMaThanhToan, 2));
            $newMaThanhToanNumber = $maxMaThanhToanNumber + 1;
            $newMaThanhToan = "TT" . str_pad($newMaThanhToanNumber, 5, '0', STR_PAD_LEFT);
            return $newMaThanhToan;
        } else {
            return "TT00001";
        }
    } else {
        return "TT00001";
    }
}

?>
