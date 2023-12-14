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
        #phongTN, #vanPhong{
            padding-left: 105px;
        }
        #nut{
            padding-left: 105px;
        }
    </style>
</head>
<body>
    <?php
        abstract class NhanVien{
            protected $maSo, $hoTen, $ngaySinh, $gioiTinh, $bangCap;
            const mucThuongCB=5000000;
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
            public function setNgaySinh($ngaySinh){
                $this->ngaySinh = $ngaySinh;
            }
            public function getNgaySinh(){
                return $this->ngaySinh;
            }

            public function setGioiTinh($gioiTinh){
                $this->gioiTinh = $gioiTinh;
            }
            public function getGioiTinh(){
                return $this->gioiTinh;
            }

            public function setBangCap($bangCap){
                $this->bangCap = $bangCap;
            }
            public function getBangCap(){
                return $this->bangCap;
            }
            abstract public function tinhTienThuong();
        }
        class NhanVienVanPhong extends NhanVien{
            protected $chucVu, $phongBan, $xepLoai;

            
            public function setChucVu($chucVu){
                $this->chucVu = $chucVu;
            }
            public function getChucVu(){
                return $this->chucVu;
            }
            public function setPhongBan($phongBan){
                $this->phongBan = $phongBan;
            }
            public function getPhongBan(){
                return $this->phongBan;
            }
            public function setXepLoai($xepLoai){
                $this->xepLoai = $xepLoai;
            }
            public function getXepLoai(){
                return $this->xepLoai;
            }
            public function tinhTienThuong()
            {
                if($this->xepLoai=="A"){
                    if($this->chucVu=="Trưởng phòng"){
                        return self::mucThuongCB*2*2;
                    }
                    elseif($this->chucVu=="Phó phòng")
                        return self::mucThuongCB*2*1.5;
                    else
                        return self::mucThuongCB*2*1;
                }
                elseif($this->xepLoai=="B"){
                    if($this->chucVu=="Trưởng phòng"){
                        return self::mucThuongCB*1.5*2;
                    }
                    elseif($this->chucVu=="Phó phòng")
                        return self::mucThuongCB*1.5*1.5;
                    else
                        return self::mucThuongCB*1.5*1;
                }
                else{
                    if($this->chucVu=="Trưởng phòng"){
                        return self::mucThuongCB*1*2;
                    }
                    elseif($this->chucVu=="Phó phòng")
                        return self::mucThuongCB*1*1.5;
                    else
                        return self::mucThuongCB*1*1;
                }
            }
        }
        class NhanVienPhongThiNghiem extends NhanVien{
            protected $soSanPham, $soSangKien;
            public function setSoSanPham($soSanPham){
                $this->soSanPham = $soSanPham;
            }
            public function getSoSanPham(){
                return $this->soSanPham;
            }
            public function setSoSangKien($soSangKien){
                $this->soSangKien = $soSangKien;
            }
            public function getSoSangKien(){
                return $this->soSangKien;
            }
            public function tinhTienThuong(){
                return self::mucThuongCB+$this->soSanPham*2000000+$this->soSangKien*3000000;
            }
        }

        $str=NULL;

        if(isset($_POST['them']) && isset($_POST['nhanVien']) && isset($_POST['gtinh'])){
            if($_POST['nhanVien']=="Văn phòng"){
                $gv=new NhanVienVanPhong();
                $gv->setMaSo($_POST['maSo']);
                $gv->setHoTen($_POST['hoTen']);
                $gv->setNgaySinh($_POST['ngaySinh']);
                $gv->setGioiTinh($_POST['gtinh']);
                $gv->setBangCap($_POST['bangCap']);
                $gv->setChucVu($_POST['chucVu']);
                $gv->setPhongBan($_POST['phongBan']);
                $gv->setXepLoai($_POST['xepLoai']);
                $gv->tinhTienThuong();

                $str="Mã số: ".$gv->getMaSo()."\nHọ tên: " . $gv->getHoTen() . "\n" . "Ngày sinh: " . $gv->getNgaySinh() . "\n" . 
                    "Giới tính: " . $gv->getGioiTinh() . "\n" . "Bằng cấp: " . $gv->getBangCap() . "\nChức vụ: ".$gv->getChucVu()
                    ."\nPhòng ban: ".$gv->getPhongBan()."\nXếp loại: ".$gv->getXepLoai()."\nTiền thưởng: ".$gv->tinhTienThuong();
                
                $fileName = "vanPhong.txt";
                $file = fopen($fileName, "a");
                fwrite($file, $str);
                fwrite($file, "\n");
                echo "<script>alert('Thêm thành công');</script>";
            }
            if($_POST['nhanVien']=="Phòng thí nghiệm"){
                $sv=new NhanVienPhongThiNghiem();
                $sv->setMaSo($_POST['maSo']);
                $sv->setHoTen($_POST['hoTen']);
                $sv->setNgaySinh($_POST['ngaySinh']);
                $sv->setGioiTinh($_POST['gtinh']);
                $sv->setBangCap($_POST['bangCap']);
                $sv->setSoSanPham($_POST['soSanPham']);
                $sv->setSoSangKien($_POST['soSangKien']);

                $str="Mã số: ".$sv->getMaSo()."\nHọ tên: " . $sv->getHoTen() . "\n" . "Ngày sinh: " . $sv->getNgaySinh() . "\n" . 
                    "Giới tính: " . $sv->getGioiTinh() . "\n" . "Bằng cấp: " . $sv->getBangCap() 
                    ."\nSố sản phẩm thực nghiệm: ".$sv->getSoSanPham()."\nSố sáng kiến: ".$sv->getSoSangKien()."\nTiền thưởng: ".$sv->tinhTienThuong();
                
                
                $fileName = "phongTN.txt";
                $file = fopen($fileName, "a");
                fwrite($file, $str);
                fwrite($file, "\n");
                echo "<script>alert('Lưu thành công');</script>";
            }
        }
        if(isset($_POST['hienThi']) && isset($_POST['nhanVien'])){
            if($_POST['nhanVien']=="Văn phòng"){
                $file = 'vanPhong.txt';
                $str = file_get_contents($file);
            }
            if($_POST['nhanVien']=="Phòng thí nghiệm"){
                $file = 'phongTN.txt';
                $str = file_get_contents($file);
            }
        }
    ?>
    <form action="" method="post">
        <table>
            <thead><th colspan="2" align="center">Nhập thông tin</th></thead>
            <tr>
                <td><input type="radio" name="nhanVien" id="" value="Văn phòng" onclick="hienVanPhong()" <?php if(isset($_POST["nhanVien"])&&$_POST['nhanVien']=='Văn phòng') echo 'checked';?>>Văn phòng</td>
                <td><input type="radio" name="nhanVien" id="" value="Phòng thí nghiệm" onclick="hienPhongTN()" <?php if(isset($_POST["nhanVien"])&&$_POST['nhanVien']=='Phòng thí nghiệm') echo 'checked';?>>Phòng thí nghiệm</td>
            </tr>
            <tr>
                <td>Mã số:</td>
                <td><input type="text" name="maSo" id="" value="<?php if(isset($_POST['maSo']))echo$_POST['maSo'];?>"></td>
            </tr>
            <tr>
                <td>Họ tên:</td>
                <td><input type="text" name="hoTen" id="" value="<?php if(isset($_POST['hoTen']))echo$_POST['hoTen'];?>"></td>
            </tr>
            <tr>
                <td>Ngày sinh:</td>
                <td><input type="date" name="ngaySinh" id="" value="<?php if(isset($_POST['ngaySinh']))echo$_POST['ngaySinh'];?>"></td>
            </tr>
            <tr>
                <td>Giới tính:</td>
                <td>
                    <input type="radio" name="gtinh" id="" value="Nam" <?php if (isset($_POST['gtinh']) && $_POST['gtinh'] == "Nam") echo "checked"; ?>>Nam
                    <input type="radio" name="gtinh" id="" value="Nữ" <?php if (isset($_POST['gtinh']) && $_POST['gtinh'] == "Nữ") echo "checked"; ?>>Nữ
                </td>            
            </tr>
            <tr>
                <td>Bằng cấp:</td>
                <td><input type="text" name="bangCap" id="" value="<?php if(isset($_POST['bangCap']))echo$_POST['bangCap'];?>"></td>
            </tr>
        </table>

        <table id='vanPhong' style="<?php if(isset($_POST['nhanVien'])&&$_POST['nhanVien']=="Văn phòng") echo 'display: block'; else echo 'display: none';?>">
            <tr>
                <td>Chức vụ:</td>
                <td>
                    <select name="chucVu" id="chucVu">
                        <option value="Trưởng phòng" <?php if (isset($_POST['chucVu']) && $_POST['chucVu']=="Trưởng phòng") echo "selected"; ?>>Trưởng phòng</option>
                        <option value="Phó phòng" <?php if (isset($_POST['chucVu']) && $_POST['chucVu']=="Phó phòng") echo "selected"; ?>>Phó phòng</option>
                        <option value="Chuyên viên" <?php if (isset($_POST['chucVu']) && $_POST['chucVu']=="Chuyên viên") echo "selected"; ?>>Chuyên viên</option>
                    </select>
                </td>
            </tr>
            <tr>
                <td>Phòng ban:</td>
                <td><input type="text" name="phongBan" value="<?php if(isset($_POST['phongBan']))echo$_POST['phongBan'];?>"></td>
            </tr>
            <tr>
                <td>Xếp loại:</td>
                <td>
                    <select name="xepLoai" id="xepLoai">
                        <option value="A" <?php if (isset($_POST['xepLoai']) && $_POST['xepLoai']=="A") echo "selected"; ?>>A</option>
                        <option value="B" <?php if (isset($_POST['xepLoai']) && $_POST['xepLoai']=="B") echo "selected"; ?>>B</option>
                        <option value="C" <?php if (isset($_POST['xepLoai']) && $_POST['xepLoai']=="C") echo "selected"; ?>>C</option>
                    </select>
                </td>
            </tr>
        </table>

        <table id="phongTN" style="<?php if(isset($_POST['nhanVien'])&&$_POST['nhanVien']=="Phòng thí nghiệm") echo 'display: block'; else echo 'display: none';?>">
            <tr>
                <td>Số sản phẩm thực nghiệm:</td>
                <td><input type="text" name="soSanPham" placeholder="Nhỏ hơn 3" value="<?php if(isset($_POST['soSanPham']))echo$_POST['soSanPham'];?>"></td>
            </tr>
            <tr>
                <td>Số sáng kiến:</td>
                <td><input type="text" name="soSangKien" placeholder="Nhỏ hơn 3" value="<?php if(isset($_POST['soSangKien']))echo$_POST['soSangKien'];?>"></td>
            </tr>
        </table>
        
        <table id="nut">
            <tr>
                <td><input type="submit" value="Thêm nhân viên" name="them"></td>
                <td><input type="submit" value="Hiển thị thông tin NV" name="hienThi"></td>
            </tr>
            <tr>
                <td colspan='2'><textarea disabled name="str" id="" cols="70" rows="10"><?php echo $str; ?></textarea></td>
            </tr>
        </table>
    </form>

    <script>
        function hienVanPhong() {
            var giangVien = document.getElementById("vanPhong");
            giangVien.style.display = "block";
            var sinhVien = document.getElementById("phongTN");
            sinhVien.style.display = "none";
        }

        function hienPhongTN() {
            var giangVien = document.getElementById("vanPhong");
            giangVien.style.display = "none";
            var sinhVien = document.getElementById("phongTN");
            sinhVien.style.display = "block";
        }
    </script>
</body>
</html>