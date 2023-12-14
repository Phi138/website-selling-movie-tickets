<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BÀI 1 - TẠO CÁC LỚP ĐƠN GIẢN</title>
    <script>
        function toggleTrinhDo(){
            var chucVu=document.getElementById("chucVu").value;
            var trinhDoSelect=document.getElementById("trinhDo");
            var lop=document.getElementById("lop");
            var nganh=document.getElementById("nganh");
            if(chucVu=="Sinh viên"){
                trinhDoSelect.disabled=true;
                nganh.disabled=false;
                lop.disabled=false;
            }
            else{
                trinhDoSelect.disabled=false;
                nganh.disabled=true;
                lop.disabled=true;
            }
                
        }
        window.addEventListener('DOMContentLoaded', function(){
            toggleTrinhDo();
        });
    </script>
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
    </style>
</head>
<body>
    <?php
        abstract class Nguoi{
            protected $hoTen, $diaChi, $gioiTinh;

            public function setHoTen($hoTen){
                $this->hoTen=$hoTen;
            }
            public function getHoTen(){
                return $this->hoTen;
            }

            public function setDiaChi($diaChi){
                $this->diaChi=$diaChi;
            }
            public function getDiaChi(){
                return $this->diaChi;
            }

            public function setGioiTinh($gioiTinh){
                $this->gioiTinh=$gioiTinh;
            }
            public function getGioiTinh(){
                return $this->gioiTinh;
            }
        }

        class SinhVien extends Nguoi{
            public $lop, $nganh;

            public function tinhDiem($nganh){
                if($nganh=="CNTT")
                    return 1;
                if($nganh=="Kinh tế")
                    return 1.5;
                return "Không có";
            }
        }

        class GiangVien extends Nguoi{
            public $trinhDo;
            const luongCB = 1500000;

            public function tinhLuong($trinhDo){
                if($trinhDo=="Cử nhân")
                    return self::luongCB*2.34;
                if($trinhDo=="Thạc sĩ")
                    return self::luongCB*3.67;
                return self::luongCB*5.66;
            }
        }
        
        $str=NULL;

        if(isset($_POST['xacNhan'])){
            if($_POST['chucVu']=="Giảng viên"){
                $gv=new GiangVien();
                $gv->setHoTen($_POST['hoTen']);
                $gv->setDiaChi($_POST['diaChi']);
                $gv->setGioiTinh($_POST['gtinh']);
                $gv->trinhDo=$_POST['trinhDo'];

                $str="Họ tên: " . $gv->getHoTen() . "\n" . "Địa chỉ: " . $gv->getDiaChi() . "\n" . 
                    "Giới tính: " . $gv->getGioiTinh() . "\n" . "Trình độ: " . $gv->trinhDo . "\n" . 
                    "Lương: " . $gv->tinhLuong($gv->trinhDo);
            }
            if($_POST['chucVu']=="Sinh viên"){
                $sv=new SinhVien();
                $sv->setHoTen($_POST['hoTen']);
                $sv->setDiaChi($_POST['diaChi']);
                $sv->setGioiTinh($_POST['gtinh']);
                $sv->lop=$_POST['lop'];
                $sv->nganh=$_POST['nganh'];

                $str="Họ tên: " . $sv->getHoTen() . "\n" . "Địa chỉ: " . $sv->getDiaChi() . "\n" . 
                    "Giới tính: " . $sv->getGioiTinh() . "\n" . "Lớp học: " . $sv->lop . "\n" . 
                    "Ngành học: " . $sv->nganh . "\nĐiểm thưởng: " . $sv->tinhDiem($sv->nganh);
            }
        }
    ?>
    <form action="" method="post">
        <table>
            <thead><th colspan="2" align="center">NHẬP THÔNG TIN</th></thead>
            <tr>
                <td>Chức vụ:</td>
                <td>
                    <select name="chucVu" id="chucVu" onchange="toggleTrinhDo()">
                        <option value="Giảng viên" <?php if(isset($_POST['chucVu']) && $_POST['chucVu']=="Giảng viên") echo "selected"; ?>>Giảng viên</option>
                        <option value="Sinh viên" <?php if(isset($_POST['chucVu']) && $_POST['chucVu']=="Sinh viên") echo "selected"; ?>>Sinh viên</option>
                    </select>
                </td>
            </tr>
            <tr>
                <td>Họ tên:</td>
                <td><input type="text" name="hoTen" id="" value="<?php if(isset($_POST['hoTen'])) echo $_POST['hoTen']; ?>"></td>
            </tr>
            <tr>
                <td>Địa chỉ:</td>
                <td><input style="width: 300px" type="text" name="diaChi" id="" value="<?php if(isset($_POST['diaChi'])) echo $_POST['diaChi']; ?>"></td>
            </tr>
            <tr>
                <td>Giới tính:</td>
                <td>
                    <input type="radio" name="gtinh" id="" value="Nam" <?php if (isset($_POST['gtinh']) && $_POST['gtinh']=="Nam") echo "checked"; ?> checked>Nam
                    <input type="radio" name="gtinh" id="" value="Nữ" <?php if (isset($_POST['gtinh']) && $_POST['gtinh']=="Nữ") echo "checked"; ?>>Nữ
                </td>
            </tr>
            <tr>
                <td>Lớp học:</td>
                <td><input type="text" name="lop" id="lop" value="<?php if(isset($_POST['lop'])) echo $_POST['lop']; ?>"></td>
            </tr>
            <tr>
                <td>Ngành học:</td>
                <td><input type="text" name="nganh" id="nganh" value="<?php if(isset($_POST['nganh'])) echo $_POST['nganh']; ?>"></td>
            </tr>
            <tr>
                <td>Trình độ:</td>
                <td>
                    <select name="trinhDo" id="trinhDo">
                        <option value="Cử nhân" <?php if (isset($_POST['trinhDo']) && $_POST['trinhDo']=="Cử nhân") echo "selected"; ?>>Cử nhân</option>
                        <option value="Thạc sĩ" <?php if (isset($_POST['trinhDo']) && $_POST['trinhDo']=="Thạc sĩ") echo "selected"; ?>>Thạc sĩ</option>
                        <option value="Tiến sĩ" <?php if (isset($_POST['trinhDo']) && $_POST['trinhDo']=="Tiến sĩ") echo "selected"; ?>>Tiến sĩ</option>
                    </select>
                </td>
            </tr>
            <tr><td colspan="2" align="center"><input type="submit" value="Xác nhận" name="xacNhan"></td></tr>
            <tr><td colspan="2" align="center"><textarea disabled="disabled" name="" id="" cols="50" rows="7"><?php echo $str ?></textarea></td></tr>
        </table>
    </form>
</body>
</html>