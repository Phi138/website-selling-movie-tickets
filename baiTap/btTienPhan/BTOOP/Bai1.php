<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<style>
    body {
    font-family: Arial, sans-serif;
    margin: 0;
    padding: 20px;
}

fieldset {
    margin-bottom: 20px;
    border: none;
}

legend {
    font-weight: bold;
    font-size: 18px;
    margin-bottom: 10px;
}

table {
    width: 100%;
    border-collapse: collapse;
}

table td {
    padding: 5px;
}

textarea {
    width: 100%;
    height: 100px;
    resize: none;
}

input[type="submit"] {
    padding: 10px 20px;
    background-color: #4CAF50;
    color: white;
    border: none;
    cursor: pointer;
}

input[type="submit"]:hover {
    background-color: #45a049;
}
</style>
<body>
    <?php 
        class Nguoi {
            public $hoTen;
            public $diaChi;
            public $gioiTinh;
            
            public function __construct($hoTen, $diaChi, $gioiTinh) {
                $this->hoTen = $hoTen;
                $this->diaChi = $diaChi;
                $this->gioiTinh = $gioiTinh;
            }
            public function gethoTen() {
                    return $this->hoTen;
            }
            public function getdiaChi() {
                return $this->diaChi;
            }
            public function getgioiTinh() {
                return $this->gioiTinh;
            }
            public function sethoTen($hoTen){
                 $this -> hoTen = $hoTen;
            }
            public function setdiaChi($diaChi){
                 $this -> diaChi = $diaChi;
            }
            public function setgioiTinh($gioiTinh){
                $this ->gioiTinh = $gioiTinh;
            }
        }
        
        class SinhVien extends Nguoi {
            public $lopHoc;
            public $nganhHoc;
            
            public function __construct($hoTen, $diaChi, $gioiTinh, $lopHoc, $nganhHoc) {
                parent::__construct($hoTen, $diaChi, $gioiTinh);
                $this->lopHoc = $lopHoc;
                $this->nganhHoc = $nganhHoc;
            }
            public function getlopHoc() {
                return $this->lopHoc;
            }
            public function getnganhHoc() {
                return $this->nganhHoc;
            }
            public function setlopHoc($lopHoc) {
                $this -> lopHoc = $lopHoc;
            }
            public function setnganhHoc($nganhHoc) {
                $this -> nganhHoc = $nganhHoc;
            }
            
            public function tinhDiemThuong() {
                if ($this->nganhHoc === "CNTT") {
                    return 1;
                } elseif ($this->nganhHoc === "Kinh tế") {
                    return 1.5;
                } else {
                    return 0;
                }
            }
        }
        
        class GiangVien extends Nguoi {
            public $trinhDo;
            public $luongCoBan = 1500000;
            
            public function __construct($hoTen, $diaChi, $gioiTinh, $trinhDo) {
                parent::__construct($hoTen, $diaChi, $gioiTinh);
                $this->trinhDo = $trinhDo;
            }
            
            public function tinhLuong() {
                if ($this->trinhDo === "Cử nhân") {
                    return $this->luongCoBan * 2.34;
                } elseif ($this->trinhDo === "Thạc sĩ") {
                    return $this->luongCoBan * 3.67;
                } elseif ($this->trinhDo === "Tiến sĩ") {
                    return $this->luongCoBan * 5.66;
                } else {
                    return 0;
                }
            }
        }
            $str = Null;
            if(isset($_POST['tinhSinhVien'])){
                $hoTen = $_POST['hoTen'];
                $diaChi = $_POST['diaChi'];
                $gioiTinh = $_POST['gioiTinh'];
                $lopHoc = $_POST['lopHoc'];
                $nganhHoc = $_POST['nganhHoc'];
                $sinhVien = new SinhVien($hoTen, $diaChi, $gioiTinh, $lopHoc, $nganhHoc);
                $str .= "Họ tên " . $sinhVien->hoTen . "\n";
                $str .= "Địa chỉ " . $sinhVien->diaChi . "\n";
                $str .= "Giới tính " . $sinhVien->gioiTinh . "\n";
                $str .= "Lớp học " . $sinhVien->lopHoc . "\n";
                $str .= "Ngành học " . $sinhVien->nganhHoc . "\n";
                $str .= "Thưởng " . $sinhVien->tinhDiemThuong();
            }
            $str2 = Null;
            if(isset($_POST['tinhGiangVien'])){
                $hoTen = $_POST['hoTenGV'];
                $diaChi = $_POST['diaChiGV'];
                $gioiTinh = $_POST['gioiTinhGV'];
                $trinhDo = $_POST['trinhDo'];
                $giangVien = new GiangVien($hoTen, $diaChi, $gioiTinh,$trinhDo);
                $str2 .= "Họ tên " . $giangVien->hoTen . "\n";
                $str2 .= "Địa chỉ " . $giangVien->diaChi . "\n";
                $str2 .= "Giới tính " . $giangVien->gioiTinh . "\n";
                $str2 .= "Trình Độ " . $giangVien->trinhDo . "\n";
                $str2 .= "Lương " . $giangVien->tinhLuong();
            }
        
    ?>
</body>
            <form action="" method="post">
            <fieldset>
            <legend>Tính lương và thưởng sinh viên/giảng viên</legend>
            <table border='0'>
                <tr>
                    <td>Nhập tên sinh viên:</td>
                    <td><input type="text" name="hoTen" value="<?php if(isset($_POST['hoTen'])) echo $_POST['hoTen'];?>"/></td>
                </tr>
                <tr>
                    <td>Nhập giới tính:</td>
                    <td>
                    <input type="radio" name="gioiTinh" value="Nam" <?php if(isset($_POST['gioiTinh']) && $_POST['gioiTinh'] == "Nam") echo 'checked'?>/>Nam
                    <input type="radio" name="gioiTinh" value="Nữ" <?php if(isset($_POST['gioiTinh']) && $_POST['gioiTinh'] == "Nữ") echo 'checked'?>/>Nữ
                    </td>
                    
                </tr>
                <tr>
                    <td>Nhập địa chỉ </td>
                    <td><input type="text" name="diaChi" value="<?php if(isset($_POST['diaChi'])) echo $_POST['diaChi'];?>"/></td>
                </tr>
                <tr>
                    <td>Lớp học </td>
                    <td><input type="text" name="lopHoc" value="<?php if(isset($_POST['lopHoc'])) echo $_POST['lopHoc'];?>"/></td>
                </tr>
                <tr>
                    <td>Ngành Học </td>
                    <td>
                        <select name="nganhHoc" value="nganhHoc">
                            <option value="CNTT"<?php if(isset($_POST['nganhHoc']) && $_POST['nganhHoc'] == "CNTT") ?>>CNTT</option>
                            <option value="Kinh tế"<?php if(isset($_POST['nganhHoc']) && $_POST['nganhHoc'] == "Kinh tế") ?>>Kinh Tế</option>
                        </select>
                        
                    </td>
                </tr>
                <tr>
                    <td>Kết quả:</td>
                    <td><textarea name="ketqua" cols="70" rows="4" disabled="disabled"><?php echo $str;?></textarea></td>
                </tr>
                <tr>
                    <td colspan="2" align="center"><input type="submit" name="tinhSinhVien" value="Tính"/></td>
                </tr>
            </table>
            <fieldset>
            <legend>Tính lương và thưởng sinh viên/giảng viên</legend>
            <table border='0'>
                <tr>
                    <td>Nhập tên Giảng Viên:</td>
                    <td><input type="text" name="hoTenGV" value="<?php if(isset($_POST['hoTenGV'])) echo $_POST['hoTenGV'];?>"/></td>
                </tr>
                <tr>
                    <td>Nhập Giới Tính:</td>
                    <td><input type="radio" name="gioiTinhGV" value="Nam" <?php if(isset($_POST['gioiTinhGV']) && $_POST['gioiTinhGV'] == "Nam") echo 'checked'?>/>Nam
                    <input type="radio" name="gioiTinhGV" value="Nữ" <?php if(isset($_POST['gioiTinhGV']) && $_POST['gioiTinhGV'] == "Nữ") echo 'checked'?>/>Nữ</td>
                </tr>
                <tr>
                    <td>Nhập Địa chỉ: </td>
                    <td><input type="text" name="diaChiGV" value="<?php if(isset($_POST['diaChiGV'])) echo $_POST['diaChiGV'];?>"/></td>
                </tr>
                <tr>
                        <td>Ngành Học  
                        </td>
                        <td>
                        <select name="trinhDo" value="trinhDo">
                            <option value="Thạc sĩ"<?php if(isset($_POST['trinhDo']) && $_POST['trinhDo'] == "Thạc sĩ") ?>>Thạc sĩ</option>
                            <option value="Cử nhân"<?php if(isset($_POST['trinhDo']) && $_POST['trinhDo'] == "Cử nhân") ?>>Cử nhân</option>
                            <option value="Tiến sĩ"<?php if(isset($_POST['trinhDo']) && $_POST['trinhDo'] == "Tiến sĩ") ?>>Tiến sĩ</option>
                        </select>
                        </td>
                        
                </tr>
                <tr>
                    <td>Kết quả:</td>
                    <td><textarea name="ketqua" cols="70" rows="4" disabled="disabled"><?php echo $str2;?></textarea></td>
                </tr>
                <tr>
                    <td colspan="2" align="center"><input type="submit" name="tinhGiangVien" value="Tính"/></td>
                </tr>
            </table>
        </fieldset>
        </fieldset>
</html>

