<?php
      abstract class  NhanVien
      {
        protected $hoTen, $gioiTinh, $ngaySinh, $ngayVaoLam, $heSoLuong, $soCon;
        const luongCoBan = 1250000;

        protected function __construct($hoTen, $gioiTinh, $ngaySinh, $ngayVaoLam, $heSoLuong, $soCon)
        {
          $this->hoTen = $hoTen;
          $this->gioiTinh = $gioiTinh;
          $this->ngaySinh = $ngaySinh;
          $this->ngayVaoLam = $ngayVaoLam;
          $this->heSoLuong = $heSoLuong;
          $this->soCon = $soCon;
        }
        abstract protected function tinhTienThuong();
        abstract protected function tinhTroCap();
        abstract protected function tinhTienLuong();
      }

      class NhanVienVanPhong extends NhanVien
      {
        protected $soNgayVang;
        const dinhMucVang  = 5;
        const donGiaPhat = 100000;

        public function __construct($hoTen, $gioiTinh, $ngaySinh, $ngayVaoLam, $heSoLuong, $soCon, $soNgayVang)
        {
          parent::__construct($hoTen, $gioiTinh, $ngaySinh, $ngayVaoLam, $heSoLuong, $soCon);
          $this->soNgayVang = $soNgayVang;
        }
        public function tinhTienThuong()
        {
          return (date('Y') - date('Y', strtotime($this->ngayVaoLam))) * 100000;
        }
        public function tinhTienPhat()
        {
          $tienPhat = 0;
          if ($this->soNgayVang > NhanVienVanPhong::dinhMucVang) {
            $tienPhat = ($this->soNgayVang - NhanVienVanPhong::dinhMucVang) * NhanVienVanPhong::donGiaPhat;
          }
          return $tienPhat;
        }
        public function tinhTienLuong()
        {
          return NhanVien::luongCoBan * $this->heSoLuong;
        }


        public function tinhTroCap()
        {
          $tienTroCap = 0;
          if ($this->gioiTinh == "Nữ") {
            $tienTroCap = 200000 * $this->soCon * 1.5;
          } else {
            $tienTroCap = 200000 * $this->soCon;
          }
          return $tienTroCap;
        }
      }

      class NhanVienSanXuat extends NhanVien
      {
        public $soSanPham;
        const dinhMucSanPham = 5;
        const donGiaSanPham = 100000;
        public function __construct($hoTen, $gioiTinh, $ngayVaoLam, $heSoLuong, $soCon, $soSanPham)
        {
          parent::__construct($hoTen, $gioiTinh, $ngayVaoLam, $heSoLuong, $soCon, $soSanPham);
          $this->soSanPham = $soSanPham;
        }
        public function tinhTienThuong()
        {
          $tienThuong = 0;
          if ($this->soSanPham > NhanVienSanXuat::dinhMucSanPham) {
            $tienThuong = ($this->soSanPham - NhanVienSanXuat::dinhMucSanPham) * NhanVienSanXuat::donGiaSanPham * 0.03;
          }
          return $tienThuong;
        }
        public function tinhTroCap()
        {
          $tienTroCap = $this->soCon * 120000;
          return $tienTroCap;
        }
        public function tinhTienLuong()
        {
          $tienLuong = $this->soSanPham * NhanVienSanXuat::donGiaSanPham;
          return $tienLuong;
        }
      }
      $tienLuong = 0;
      $troCap = 0;
      $tienThuong = 0;
      $tienPhat = 0;
      $thucLinh = 0;
      if (isset($_POST["tinhLuong"])) {
        $hoTen = $_POST["hoten"];
        $gioiTinh = $_POST["gtinh"];
        $ngaySinh = $_POST["ngaysinh"];
        $ngayVaoLam = $_POST["ngayvaolam"];
        $heSoLuong = intval($_POST["hesoluong"]);
        $soCon = intval($_POST["socon"]);
        $loaiNhanVien = $_POST["loainv"];
        $soNgayVang = isset($_POST["songayvang"]) ? $_POST["songayvang"] : 0;
        $soSanPham = isset($_POST["sosp"]) ? $_POST["sosp"] : 0;

        $nhanVien = null;
        if ($loaiNhanVien == "Văn phòng") {
          $nhanVien = new NhanVienVanPhong($hoTen, $gioiTinh, $ngaySinh, $ngayVaoLam, $heSoLuong, $soCon, $soNgayVang);
          $tienLuong = $nhanVien->tinhTienLuong();
          $troCap = $nhanVien->tinhTroCap();
          $tienPhat = $nhanVien->tinhTienPhat();
        } elseif ($loaiNhanVien == "Sản xuất") {
          $nhanVien = new NhanVienSanXuat($hoTen, $gioiTinh, $ngaySinh, $ngayVaoLam, $heSoLuong, $soCon, $soSanPham);
          $tienLuong = $nhanVien->tinhTienLuong();
          $troCap = $nhanVien->tinhTroCap();
          $tienThuong = $nhanVien->tinhTienThuong();
        }

        $thucLinh = $tienLuong + $troCap + $tienThuong - $tienPhat;
      }

      ?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Tính Lương Nhân Viên</title>
  <style>
    * {
      box-sizing: border-box;
    }

    body {
      display: flex;
      align-items: center;
      justify-content: center;

    }

    th {
      color: #fff;
      background: #22446688;
      padding: 15px 0;
    }

    form {
      background: #33557788;
    }
  </style>
</head>

<body>
  <form action="" method="post">
    <table>
      <thead>
        <th colspan="4">Quản lý nhân viên</th>
      </thead>
      <tr>
        <td>Họ và tên</td>
        <td>
          <input type="text" name="hoten" id="" value="<?php if (isset($_POST['hoten'])) echo $_POST['hoten']; ?>">
        </td>
        <td>Số con</td>
        <td>
          <input type="text" name="socon" id="" value="<?php if (isset($_POST['socon'])) echo $_POST['socon']; ?>">
        </td>
      </tr>
      <tr>
        <td>Ngày sinh</td>
        <td>
          <input type="text" name="ngaysinh" id="" value="<?php if (isset($_POST['ngaysinh'])) echo $_POST['ngaysinh']; ?>">
        </td>
        <td>Số ngày vào làm</td>
        <td>
          <input type="text" name="ngayvaolam" id="" value="<?php if (isset($_POST['ngayvaolam'])) echo $_POST['ngayvaolam']; ?>">
        </td>
      </tr>
      <tr>
        <td>Nhập giới tính:</td>
        <td>
          <input type="radio" name="gtinh" id="" value="Nam" <?php if (isset($_POST['gtinh']) && $_POST['gtinh'] == "Nam") echo "checked"; ?> checked>Nam
          <input type="radio" name="gtinh" id="" value="Nữ" <?php if (isset($_POST['gtinh']) && $_POST['gtinh'] == "Nữ") echo "checked"; ?>>Nữ
        </td>
        <td>Hệ số lương</td>
        <td>
          <input type="text" name="hesoluong" id="" value="<?php if (isset($_POST['hesoluong'])) echo $_POST['hesoluong']; ?>">
        </td>
      </tr>
      <tr>
        <td>Loại nhân viên</td>

        <td><input type="radio" name="loainv" id="" value="Văn phòng" <?php if (isset($_POST['loainv']) && $_POST['loainv'] == "Văn phòng") echo "checked"; ?> checked>Văn phòng
        </td>
        <td><input type="radio" name="loainv" id="" value="Sản xuất" <?php if (isset($_POST['loainv']) && $_POST['loainv'] == "Sản xuất") echo "checked"; ?>>Sản xuất</td>
      </tr>
      <tr>
        <td></td>
        <td>
          Số ngày vắng:<input type="text" name="songayvang" id="" value="<?php if (isset($_POST['songayvang'])) echo $_POST['songayvang']; ?>">
        </td>
        <td>
          Số sản phẩm:<input type="text" name="sosp" id="" value="<?php if (isset($_POST['sosp'])) echo $_POST['sosp']; ?>">
        </td>
      </tr>
      <tr>
        <td colspan="4">
          <input type="submit" name="tinhLuong" value="Tính lương">
        </td>
      </tr>
      <tr>
        <td>Tiền lương:</td>
        <td>
          <input type="text" name="tienluong" id="" disabled="disabled" value="<?php echo isset($tienLuong) ? " $tienLuong VND" : '' ?>">
        </td>
        <td>Trợ cấp:</td>
        <td>
          <input type="text" name="trocap" id="" disabled="disabled" value="<?php echo isset($troCap) ? " $troCap VND" : ''  ?>">
        </td>
      </tr>
      <tr>
        <td>Tiền thưởng:</td>
        <td>
          <input type="text" name="tienthuong" id="" disabled="disabled" value="<?php echo isset($tienThuong) ? " $tienThuong VND" : '' ?>">
        </td>
        <td>Tiền phạt:</td>
        <td>
          <input type="text" name="tienphat" id="" disabled="disabled" value="<?php echo isset($tienPhat) ? " $tienPhat VND" : ''  ?>">
        </td>
      </tr>
      <tr>
        <td colspan="4">
          Thực lĩnh:<input type="text" name="thuclinh" id="" disabled="disabled" value="<?php echo isset($thucLinh) ? " $thucLinh VND" : '' ?>">
        </td>
      </tr>
    </table>
  </form>
</body>

</html>