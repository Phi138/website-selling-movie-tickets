<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        body {
            display: flex;
            justify-content: center;
        }

        table {
            border-collapse: collapse;
            width: 100%;
            background-color: #EEEDED;
        }

        /* Áp dụng kiểu cho tiêu đề bảng */
        th {
            background-color: #0D1282;
            color: #F0DE36;
            padding: 10px;
        }

        /* Áp dụng kiểu cho các ô dữ liệu */
        td {
            text-align: center;
            padding: 10px;
        }

        input[type="submit"] {
            background-color: #EEEDED;
            color: #0D1282;
            border: 1px solid #0D1282;
            cursor: pointer;
            font-weight: bold;
            transition: background-color 0.3s ease;
        }
        input[type="submit"]:hover {
            background-color: #0D1282;
            color: #F0DE36;
        }
    </style>
</head>

<body>
    <?php
    abstract class Nhanvien
    {
        public $gioitinh, $socon;
        protected $hoten, $ngayvaolam, $hesoluong;

        public function setHoTen($hoten){
            $this->hoten=$hoten;
        }
        public function getHoTen(){
            return $this->hoten;
        }

        public function setNgayVaoLam($ngayvaolam){
            $this->ngayvaolam=$ngayvaolam;
        }
        public function getNgayVaoLam(){
            return $this->ngayvaolam;
        }

        public function setHeSoLuong($hesoluong){
            $this->hesoluong=$hesoluong;
        }
        public function getHeSoLuong(){
            return $this->hesoluong;
        }
        const luongcoban = 1350000;
        abstract public function tinhtienluong();
        abstract public function tinhtrocap();

        public function tinhtienthuong()
        {
            return (date('Y') - date('Y', strtotime($this->ngayvaolam))) * 100000;
        }
    }
    class Nhanvienvanphong extends Nhanvien
    {
        public $songayvang;
        const dinhmucvang = 4;
        const dongiaphat = 150000;
        public function tinhtienphat()
        {
            if ($this->songayvang > self::dinhmucvang)
                return ($this->songayvang-self::dinhmucvang) * self::dongiaphat;
            return 0;
        }
        public function tinhtrocap()
        {
            if ($this->gioitinh == "Nữ") {
                return 200000 * $this->socon * 1.5;
            } else {
                return 200000 * $this->socon;
            }
        }
        public function tinhtienluong()
        {
            return self::luongcoban * $this->hesoluong;
        }
    }
    class Nhanviensanxuat extends Nhanvien
    {
        public $sosanpham;
        const dinhmucsanpham = 20;
        const dongiasanpham = 100000;
        
        public function tinhtienthuong()
        {
            if ($this->sosanpham > self::dinhmucsanpham)
                return ($this->sosanpham - self::dinhmucsanpham) * self::dongiasanpham * 0.03;
        }
        public function tinhtrocap()
        {
            return $this->socon * 120000;
        }
        public function tinhtienluong()
        {
            return $this->sosanpham * self::dongiasanpham;
        }
    }
    $str = NULL;
    $tienluong = NULL;
    $tienthuong = NULL;
    $tienphat = NULL;
    $trocap = NULL;
    $thuclinh = NULL;
    if (isset($_POST['submit'])) {
        if ($_POST['loainv'] == "Văn phòng") {
            $vp = new Nhanvienvanphong();
            $vp->setHoTen($_POST['hoten']);
            $vp->gioitinh = $_POST['gtinh'];
            $vp->setNgayVaoLam($_POST['ngayvaolam']);
            $vp->setHeSoLuong($_POST['hesoluong']);
            $vp->socon = $_POST['socon'];
            $vp->songayvang = $_POST['songayvang'];
            $tienluong = $vp->tinhtienluong();
            $tienthuong = $vp->tinhtienthuong();
            $trocap = $vp->tinhtrocap();
            $tienphat = $vp->tinhtienphat();
            $thuclinh = $tienluong + $tienthuong + $trocap - $tienphat;
        }
        if ($_POST['loainv'] == "Sản xuất") {
            $sx = new Nhanviensanxuat();
            $sx->setHoTen($_POST['hoten']);
            $sx->gioitinh = $_POST['gtinh'];
            $sx->setNgayVaoLam($_POST['ngayvaolam']);
            $sx->setHeSoLuong($_POST['hesoluong']);
            $sx->socon = $_POST['socon'];
            $sx->sosanpham = $_POST['sosp'];
            $tienluong = $sx->tinhtienluong();
            $trocap = $sx->tinhtrocap();
            $tienthuong = $sx->tinhtienthuong();
            $thuclinh = $tienluong + $trocap + $tienthuong;
        }
    }
    ?>
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
                    <input required type="text" name="socon" id="" value="<?php if (isset($_POST['socon'])) echo $_POST['socon']; ?>">
                </td>
            </tr>
            <tr>
                <td>Ngày sinh</td>
                <td>
                    <input type="text" name="ngaysinh" id="" value="<?php if (isset($_POST['ngaysinh'])) echo $_POST['ngaysinh']; ?>">
                </td>
                <td>Số ngày vào làm</td>
                <td>
                    <input required type="text" name="ngayvaolam" id="" value="<?php if (isset($_POST['ngayvaolam'])) echo $_POST['ngayvaolam']; ?>">
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
                    <input required type="text" name="hesoluong" id="" value="<?php if (isset($_POST['hesoluong'])) echo $_POST['hesoluong']; ?>">
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
                    <input type="submit" name="submit" value="Tính lương">
                </td>
            </tr>
            <tr>
                <td>Tiền lương:</td>
                <td>
                    <input type="text" name="tienluong" id="" disabled="disabled" value="<?php echo number_format($tienluong, 0, '.', '.')." VNĐ" ?>">
                </td>
                <td>Trợ cấp:</td>
                <td>
                    <input type="text" name="trocap" id="" disabled="disabled" value="<?php echo number_format($trocap, 0, '.', '.')." VNĐ" ?>">
                </td>
            </tr>
            <tr>
                <td>Tiền thưởng:</td>
                <td>
                    <input type="text" name="tienthuong" id="" disabled="disabled" value="<?php echo number_format($tienthuong, 0, '.', '.')." VNĐ" ?>">
                </td>
                <td>Tiền phạt:</td>
                <td>
                    <input type="text" name="tienphat" id="" disabled="disabled" value="<?php echo number_format($tienphat, 0, '.', '.')." VNĐ" ?>">
                </td>
            </tr>
            <tr>
                <td colspan="4">
                    Thực lĩnh:<input type="text" name="thuclinh" id="" disabled="disabled" value="<?php echo number_format($thuclinh, 0, '.', '.')." VNĐ" ?>">
                </td>
            </tr>
        </table>
    </form>
</body>

</html>