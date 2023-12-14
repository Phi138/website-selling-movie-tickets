<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        body{
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
        td{
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
        input[type="text"]{
            color: #4477CE;
        }
        textarea{
            color: #4477CE;
        }
        #sinhVien, #giangVien{
            padding-left: 105px;
        }
        #nut{
            padding-left: 105px;
        }
    </style>
</head>
<body>
    <?php
        abstract class Nguoi{
            protected $maSo, $hoTen, $gioiTinh, $diaChi;
            public function setMaSo($maSo){
                $this->maSo = $maSo;
            }
            public function getMaSo(){
                return $this->maSo;
            }

            public function setHoTen($hoTen){
                $this->hoTen = $hoTen;
            }
            public function getHoTen(){
                return $this->hoTen;
            }

            public function setGioiTinh($gioiTinh){
                $this->gioiTinh = $gioiTinh;
            }
            public function getGioiTinh(){
                return $this->gioiTinh;
            }

            public function setDiaChi($diaChi){
                $this->diaChi = $diaChi;
            }
            public function getDiaChi(){
                return $this->diaChi;
            }
        }

        class GiangVien extends Nguoi{
            protected $hocVi, $soNam;
            const luongCoBan = 1350000;

            public function setHocVi($hocVi){
                $this->hocVi = $hocVi;
            }
            public function getHocVi(){
                return $this->hocVi;
            }

            public function setSoNam($soNam){ 
                $this->soNam = $soNam;
            }
            public function getSoNam(){
                return $this->soNam;
            }

            public function tinhLuong(){
                if($this->hocVi == "Thạc sĩ")
                    return self::luongCoBan + self::luongCoBan * $this->soNam;
                if($this->hocVi == "Tiến sĩ")
                    return self::luongCoBan + self::luongCoBan * $this->soNam * 1.2;
                if($this->hocVi == "Phó giáo sư")
                    return self::luongCoBan + self::luongCoBan * $this->soNam * 1.5;
            }
        }

        class SinhVien extends Nguoi{
            protected $lop, $nganhHoc;
            const tienThuongCB = 500000;

            public function setLop($lop){
                $this->lop = $lop;
            }
            public function getLop(){
                return $this->lop;
            }

            public function setNganhHoc($nganhHoc){
                $this->nganhHoc = $nganhHoc;
            }
            public function getNganhHoc(){
                return $this->nganhHoc;
            }

            public function tinhTienThuong(){
                if($this->nganhHoc == "Xây dựng")
                    return self::tienThuongCB;
                elseif($this->nganhHoc == "CNTT")
                    return self::tienThuongCB*2;
                else
                    return self::tienThuongCB*1.5; 
            }
        }

        $str=NULL;

        if(isset($_POST['luu']) && isset($_POST['chucVu']) && isset($_POST['gioiTinh'])){
            if($_POST['chucVu']=="Giảng viên"){
                $gv=new GiangVien();
                $gv->setMaSo($_POST['maSo']);
                $gv->setHoTen($_POST['hoTen']);
                $gv->setDiaChi($_POST['diaChi']);
                $gv->setGioiTinh($_POST['gioiTinh']);
                $gv->setHocVi($_POST['hocVi']);
                $gv->setSoNam($_POST['soNam']);

                $str="Mã số: ".$gv->getMaSo()."\nHọ tên: " . $gv->getHoTen() . "\n" . "Địa chỉ: " . $gv->getDiaChi() . "\n" . 
                    "Giới tính: " . $gv->getGioiTinh() . "\n" . "Học vị: " . $gv->getHocVi() . "\n" . 
                    "Số năm công tác: " . $gv->getSoNam()."\nTiền lương: ".$gv->tinhLuong();
                
                $fileName = "giangVien.txt";
                $file = fopen($fileName, "a");
                fwrite($file, $str);
                fwrite($file, "\n");
                echo "<script>alert('Lưu thành công');</script>";
            }
            if($_POST['chucVu']=="Sinh viên"){
                $sv=new SinhVien();
                $sv->setMaSo($_POST['maSo']);
                $sv->setHoTen($_POST['hoTen']);
                $sv->setDiaChi($_POST['diaChi']);
                $sv->setGioiTinh($_POST['gioiTinh']);
                $sv->setLop($_POST['lop']);
                $sv->setNganhHoc($_POST['nganhHoc']);

                $str="Mã số: ".$sv->getMaSo()."\nHọ tên: " . $sv->getHoTen() . "\n" . "Địa chỉ: " . $sv->getDiaChi() . "\n" . 
                    "Giới tính: " . $sv->getGioiTinh() . "\n" . "Lớp: " . $sv->getLop() . "\n" . 
                    "Ngành học: " . $sv->getNganhHoc()."\nTiền thưởng: ".$sv->tinhTienThuong();
                
                $fileName = "sinhVien.txt";
                $file = fopen($fileName, "a");
                fwrite($file, $str);
                fwrite($file, "\n");
                echo "<script>alert('Lưu thành công');</script>";
            }
        }
        if(isset($_POST['hienThi']) && isset($_POST['chucVu'])){
            if($_POST['chucVu']=="Giảng viên"){
                $file = 'giangVien.txt';
                $str = file_get_contents($file);
            }
            if($_POST['chucVu']=="Sinh viên"){
                $file = 'sinhVien.txt';
                $str = file_get_contents($file);
            }
        }
    ?>

    <form action="" method="post">
        <table>
            <thead><th colspan="2" align="center">Nhập thông tin</th></thead>
            <tr>
                <td><input type="radio" name="chucVu" id="" value="Giảng viên" onclick="hienGiangVien()" <?php if(isset($_POST["chucVu"])&&$_POST['chucVu']=='Giảng viên') echo 'checked';?>>Giảng viên</td>
                <td><input type="radio" name="chucVu" id="" value="Sinh viên" onclick="hienSinhVien()" <?php if(isset($_POST["chucVu"])&&$_POST['chucVu']=='Sinh viên') echo 'checked';?>>Sinh viên</td>
            </tr>
            <tr>
                <td>Mã số:</td>
                <td><input style="width: 100px" type="text" name="maSo" value="<?php if(isset($_POST['maSo']))echo$_POST['maSo'];?>"></td>
            </tr>
            <tr>
                <td>Họ tên:</td>
                <td><input type="text" name="hoTen" value="<?php if(isset($_POST['hoTen']))echo$_POST['hoTen'];?>"></td>
            </tr>
            <tr>
                <td>Giới tính:</td>
                <td>
                    <input type="radio" name="gioiTinh" id="" value="Nam" <?php if(isset($_POST["gioiTinh"])&&$_POST['gioiTinh']=='Nam') echo 'checked';?>>Nam
                    <input type="radio" name="gioiTinh" id="" value="Nữ" <?php if(isset($_POST["gioiTinh"])&&$_POST['gioiTinh']=='Nữ') echo 'checked';?>>Nữ
                </td>
            </tr>
            <tr>
                <td>Địa chỉ:</td>
                <td><input style="width: 250px" type="text" name="diaChi" value="<?php if(isset($_POST['diaChi']))echo$_POST['diaChi'];?>"></td>
            </tr>
        </table>

        <table id='giangVien' style="<?php if(isset($_POST['chucVu'])&&$_POST['chucVu']=="Giảng viên") echo 'display: block'; else echo 'display: none';?>">
            <tr>
                <td>Học vị:</td>
                <td><input type="text" name="hocVi"  value="<?php if(isset($_POST['hocVi']))echo$_POST['hocVi'];?>"></td>
            </tr>
            <tr>
                <td>Số năm công tác:</td>
                <td><input type="text" name="soNam" value="<?php if(isset($_POST['soNam']))echo$_POST['soNam'];?>"></td>
            </tr>
        </table>

        <table id="sinhVien" style="<?php if(isset($_POST['chucVu'])&&$_POST['chucVu']=="Sinh viên") echo 'display: block'; else echo 'display: none';?>">
            <tr>
                <td>Lớp:</td>
                <td><input type="text" name="lop" id="" value="<?php if(isset($_POST['lop']))echo$_POST['lop'];?>"></td>
            </tr>
            <tr>
                <td>Ngành học:</td>
                <td><input type="text" name="nganhHoc" id="" value="<?php if(isset($_POST['nganhHoc']))echo$_POST['nganhHoc'];?>"></td>
            </tr>
        </table>
        
        <table id="nut">
            <tr>
                <td><input type="submit" value="Lưu" name="luu"></td>
                <td><input type="submit" value="Hiển thị danh sách" name="hienThi"></td>
            </tr>
            <tr>
                <td colspan='2'><textarea disabled name="str" id="" cols="70" rows="10"><?php echo $str; ?></textarea></td>
            </tr>
        </table>
    </form>

    <script>
        function hienGiangVien() {
            var giangVien = document.getElementById("giangVien");
            giangVien.style.display = "block";
            var sinhVien = document.getElementById("sinhVien");
            sinhVien.style.display = "none";
        }

        function hienSinhVien() {
            var giangVien = document.getElementById("giangVien");
            giangVien.style.display = "none";
            var sinhVien = document.getElementById("sinhVien");
            sinhVien.style.display = "block";
        }
    </script>
</body>
</html>