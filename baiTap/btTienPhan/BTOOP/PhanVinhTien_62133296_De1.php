<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<style>
    body {
        background-color: #ffffcc;
    }
    
    fieldset {
        border: 1px solid #cccccc;
        background-color: #ffffcc;
        
        
    }
    legend {
        font-size:35px;
        
    }
</style>
<body>
<?php
class NhanVien {
    protected $maSo;
    protected $hoTen;
    protected $ngaySinh;
    protected $gioiTinh;
    protected $soNgayCong;
    protected $bacLuong;
    
    public function __construct($maSo, $hoTen, $ngaySinh, $gioiTinh, $soNgayCong, $bacLuong) {
        $this->maSo = $maSo;
        $this->hoTen = $hoTen;
        $this->ngaySinh = $ngaySinh;
        $this->gioiTinh = $gioiTinh;
        $this->soNgayCong = $soNgayCong;
        $this->bacLuong = $bacLuong;
    }
    
    public function getMaSo() {
        return $this->maSo;
    }
    
    public function getHoTen() {
        return $this->hoTen;
    }
    
    public function getNgaySinh() {
        return $this->ngaySinh;
    }
    
    public function getGioiTinh() {
        return $this->gioiTinh;
    }
    
    public function getSoNgayCong() {
        return $this->soNgayCong;
    }
    
    public function getBacLuong() {
        return $this->bacLuong;
    }
    
    public function tinhLuongThang() {
        return $this->soNgayCong * $this->bacLuong;
    }
}

class NhaKhoaHoc extends NhanVien {
    const LUONG_CO_BAN_MOT_NGAY = 1000000;
    protected $soBaiBao;
    protected $donGiaBaiBao;
    
    public function __construct($maSo, $hoTen, $ngaySinh, $gioiTinh, $soNgayCong, $bacLuong, $soBaiBao) {
        parent::__construct($maSo, $hoTen, $ngaySinh, $gioiTinh, $soNgayCong, $bacLuong);
        $this->soBaiBao = $soBaiBao;
        $this->donGiaBaiBao = 20000000;
    }
    
    public function getSoBaiBao() {
        return $this->soBaiBao;
    }
    
    public function getDonGiaBaiBao() {
        return $this->donGiaBaiBao;
    }
    
    public function tinhLuongThang() {
        $luong = parent::tinhLuongThang();
        $luong += $this->soBaiBao * $this->donGiaBaiBao;
        return $luong;
    }
}

class NhaQuanLy extends NhanVien {
    const LUONG_CO_BAN_MOT_NGAY = 800000;
    protected $chucVu;
    protected $heSoChucVu;
    
    public function __construct($maSo, $hoTen, $ngaySinh, $gioiTinh, $soNgayCong, $bacLuong, $chucVu, $heSoChucVu) {
        parent::__construct($maSo, $hoTen, $ngaySinh, $gioiTinh, $soNgayCong, $bacLuong);
        $this->chucVu = $chucVu;
        $this->heSoChucVu = $heSoChucVu;
    }
    
    public function getChucVu() {
        return $this->chucVu;
    }
    
    public function getHeSoChucVu() {
        return $this->heSoChucVu;
    }
    
    public function tinhLuongThang() {
        $luong = parent::tinhLuongThang();
        if ($this->gioiTinh == 'Nữ') {
            $luong *= 1.05;
        }
        return $luong;
    }
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['luuNhanVien'])) {
        $loaiDoiTuong = $_POST['loaiDoiTuong'];
        $nhanVien = null;
        
        if ($loaiDoiTuong == 'nhaKhoaHoc') {
            $nhanVien = new NhaKhoaHoc(
                $_POST['maSo'],
                $_POST['hoTen'],
                $_POST['ngaySinh'],
                $_POST['gioiTinh'],
                $_POST['soNgayCong'],
                $_POST['bacLuong'],
                $_POST['soBaiBao']
            );
        } elseif ($loaiDoiTuong == 'nhaQuanLy') {
            $nhanVien = new NhaQuanLy(
                $_POST['maSo'],
                $_POST['hoTen'],
                $_POST['ngaySinh'],
                $_POST['gioiTinh'],
                $_POST['soNgayCong'],
                $_POST['bacLuong'],
                $_POST['chucVu'],
                $_POST['heSoChucVu']
            );
        }
        
        if ($nhanVien) {
            $luongThang = $nhanVien->tinhLuongThang();
            $thongTinNhanVien = "Loại đối tượng: $loaiDoiTuong" . PHP_EOL;
            $thongTinNhanVien .= "Mã số: " . $nhanVien->getMaSo() . PHP_EOL;
            $thongTinNhanVien .= "Họ tên: " . $nhanVien->getHoTen() . PHP_EOL;
            $thongTinNhanVien .= "Ngày sinh: " . $nhanVien->getNgaySinh() . PHP_EOL;
            $thongTinNhanVien .= "Giới tính: " . $nhanVien->getGioiTinh() . PHP_EOL;
            $thongTinNhanVien .= "Số ngày công trong tháng: " . $nhanVien->getSoNgayCong() . PHP_EOL;
            $thongTinNhanVien .= "Bậc lương: " . $nhanVien->getBacLuong() . PHP_EOL;
            $thongTinNhanVien .= "Lương tháng: " . $luongThang . PHP_EOL;
            $thongTinNhanVien .= "------------------------" . PHP_EOL;
            
            file_put_contents("thongtin.dat", $thongTinNhanVien, FILE_APPEND);
        }
    }
}

if (isset($_POST['hienThiThongTin'])) {
    $thongTin = file_get_contents("thongtin.dat");
            $danhSach = explode("------------------------", $thongTin);
            echo "<table>";
            echo "<thead>
                    <tr>
                        <th>Loại đối tượng</th>
                        <th>Mã số</th>
                        <th>Họ tên</th>
                        <th>Giới tính</th>
                        <th>Địa chỉ</th>
                        <th>Thông tin khác</th>
                    </tr>
                  </thead>";
            echo "<tbody>";
            foreach ($danhSach as $item) {
                $item = trim($item);
                if (!empty($item)) {
                    $thongTinChiTiet = explode(PHP_EOL, $item);
                    echo "<tr>";
                    foreach ($thongTinChiTiet as $chiTiet) {
                        echo "<td style='border: 1px solid #ddd; padding: 8px;'>" . $chiTiet . "</td>";
                    }
                    echo "</tr>";
                }
            }
            echo "</tbody>";
            echo "</table>";
        }
?>

<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form nhập liệu</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f2f2f2;
            margin: 0;
            padding: 0;
        }
        .container {
            max-width: 800px;
            margin: 0 auto;
            padding: 20px;
            background-color: #fff;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        }
        h1 {
            color: #333;
            text-align: center;
        }
        label {
            display: block;
            margin-bottom: 10px;
        }
        input[type="text"],
        input[type="number"],
        select {
            width: 100%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
        }
        input[type="radio"] {
            margin-right: 5px;
        }
        input[type="submit"] {
            display: block;
            width: 100%;
            margin-top: 10px;
            padding: 10px;
            background-color: #4CAF50;
            color: #fff;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }
        input[type="submit"]:hover {
            background-color: #45a049;
        }
        pre {
            background-color: #f9f9f9;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
            overflow-x: auto;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Form nhập liệu</h1>
        <form action="" method="post">
            <fieldset>
                <legend>Thông tin nhân viên</legend>
                <label for="loaiDoiTuong">Loại đối tượng:</label>
                <input type="radio" name="loaiDoiTuong" value="nhaKhoaHoc" required> Nhà khoa học
                <input type="radio" name="loaiDoiTuong" value="nhaQuanLy" required> Nhà quản lý
                <br>
                <label for="maSo">Mã số:</label>
                <input type="text" name="maSo" id="maSo" required>
                <br>
                <label for="hoTen">Họ tên:</label>
                <input type="text" name="hoTen" id="hoTen" required>
                <br>
                <label for="ngaySinh">Ngày sinh:</label>
                <input type="text" name="ngaySinh" id="ngaySinh" required>
                <br>
                <label for="gioiTinh">Giới tính:</label>
                <input type="radio" name="gioiTinh" value="Nam" required> Nam
                <input type="radio" name="gioiTinh" value="Nữ" required> Nữ
                <br>
                <label for="soNgayCong">Số ngày công trong tháng:</label>
                <input type="number" name="soNgayCong" id="soNgayCong" required>
                <br>
                <label for="bacLuong">Bậc lương:</label>
                <input type="number" name="bacLuong" id="bacLuong" required>
                <br>
                <label for="soBaiBao">Số bài báo:</label>
                <input type="number" name="soBaiBao" id="soBaiBao">
                <br>
                <label for="chucVu">Chức vụ:</label>
                <input type="text" name="chucVu" id="chucVu">
                <br>
                <label for="heSoChucVu">Hệ số chức vụ:</label>
                <input type="number" name="heSoChucVu" id="heSoChucVu">
                <br>
                <input type="submit" name="luuNhanVien" value="Lưu nhân viên">
            </fieldset>
        </form>
        <form action="" method="post">
            <input type="submit" name="hienThiThongTin" value="Hiển thị thông tin nhân viên">
        </form>
    </div>
</body>
</html>