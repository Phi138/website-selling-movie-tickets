<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tính lương</title>
    <style>
      .center {
  text-align: center;
}

.thread {
  margin: 0 auto;
  width: 600px;
  padding: 20px;
  border: 1px solid #ccc;
  background-color: #f9f9f9;
}

h2 {
  text-align: center;
}

table {
  width: 100%;
}

td {
  padding: 5px;
}

input[type="text"],
select {
  width: 100%;
  padding: 5px;
}

textarea {
  width: 100%;
  padding: 5px;
}

input[type="submit"] {
  display: block;
  margin: 10px auto;
  padding: 10px 20px;
  background-color: #4caf50;
  color: #fff;
  border: none;
  cursor: pointer;
}

input[type="submit"]:hover {
  background-color: #45a049;
}

textarea[disabled="disabled"] {
  background-color: #f9f9f9;
  color: #555;
  resize: none;
  cursor: not-allowed;
}
    </style>
</head>

<body>
<?php
    require_once "Nhanviencaocap.php";
    require_once "NhaKhoahoc.php";
    require_once "Nhaquanly.php";
    $tienluong = "";
    $hoten = "";
    $checked_kh = "";
    $chucvu = "";
    $checked_ql = "";
    $ma = "";
    $gioitinh = "";
    $ngaysinh = "";
    $hechucvu = "";
    $sobaibao = "";
    $bacluong = "";
    $loai="";
    
    if (isset($_POST['tinh'])) {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $hoten = $_POST['hoten'];
            $ma = $_POST['maso'];
            $gioitinh = $_POST['gioitinh'];
            $ngaysinh = $_POST['ngaysinh'];
            $songaycong=$_POST['socong'];
             $bacluong = $_POST['bacluong'];
             $songaycong=isset($_POST['socong'])?$_POST['socong']:"";
             $sbbdcb = isset($_POST['sbbdcb']) ? $_POST['sbbdcb'] : "";

            $loai = isset($_POST['loaicb']) ? $_POST['loaicb'] : "";
            $checked_kh = ($loai == 'Nhà khoa học') ? 'checked' : '';
            $checked_ql = ($loai == 'Nhà quản lý') ? 'checked' : '';
            if (isset($_POST['loaicb']) && $_POST['loaicb'] == "Nhà khoa học") {
                $sbbdcb = isset($_POST['sbbdcb']) ? $_POST['sbbdcb'] : "";
                $nhakhoahoc = new nhakhoahoc($ma, $hoten, $gioitinh, $ngaysinh, $bacluong,$songaycong, $sbbdcb);
                $tienluong = $nhakhoahoc->tinhluongthang();
            }
            if (isset($_POST['loaicb']) && $_POST['loaicb'] == "Nhà quản lý") {
                $chucvu = isset($_POST['chucvu']) ? $_POST['chucvu'] : "";
                $gioitinh = $_POST['gioitinh'];
                $hechucvu = isset($_POST['hscv']) ? $_POST['hscv'] : "";
                $quanly = new Nhaquanly($ma, $hoten, $gioitinh, $ngaysinh,$bacluong,$songaycong,$chucvu,$hechucvu);
                $tienluong = $quanly->tinhluongthang();
            }
        }
    }
    $str = NULL;
    if (isset($_POST['luu'])) {
        if ($_POST['loaicb'] == "Nhà khoa học") {
            $tienluong = $_POST['tienluong'];
            $songaycong=isset($_POST['socong'])?$_POST['socong']:"";
            $sbbdcb = isset($_POST['sbbdcb']) ? $_POST['sbbdcb'] : "";
            $nkh = new nhakhoahoc($ma, $hoten, $gioitinh, $ngaysinh, $bacluong,$songaycong, $sbbdcb);
            $nkh->setmaSo($_POST['maso']);
            $nkh->setHoten($_POST['hoten']);
            $nkh->setgioitinh($_POST['gioitinh']);
            $nkh->setngaysinh($_POST['ngaysinh']);
            $nkh->setbacluong($_POST['bacluong']);
            $nkh->setsobaibao($_POST['sbbdcb']);

            $str = "Mã số NKH:" . $nkh->getmaSo() . "\n" .
                "Họ tên NKH: " . $nkh->getHoten() . "\n" .
                "Ngày sinh NKH: " . $nkh->getgioitinh() . "\n" .
                "Giới tính NKH: " . $nkh->getngaysinh() . "\n" .
                "Bậc lương của NKH: " . $nkh->getbacluong() . "\n" .
                "Số bài báo của NKH: " . $nkh->getsobaibao() . "\n" .
                "Tiền luong: " .  $tienluong;
            $fileName = "nhakhoahoc.txt";
            $file = fopen($fileName, "a");
            fwrite($file, $str);
            fwrite($file, "\n");
            echo "<script>alert('Lưu thành công');</script>";
        }
        if ($_POST['loaicb'] == "Nhà quản lý") {
            $tienluong = $_POST['tienluong'];
            $songaycong=isset($_POST['socong'])?$_POST['socong']:"";
            $snct = isset($_POST['socong']) ? $_POST['socong'] : "";
            $nql = new Nhaquanly($ma, $hoten, $gioitinh, $ngaysinh,$bacluong,$songaycong,$chucvu,$hechucvu);
            $nql->setmaSo($_POST['maso']);
            $nql->setHoten($_POST['hoten']);
            $nql->setgioitinh($_POST['gioitinh']);
            $nql->setngaysinh($_POST['ngaysinh']);
            $nql->setchucvu($_POST['chucvu']);
            $nql->setHSchucvu($_POST['hscv']);
            $str = "Mã số nql:" . $nql->getmaSo() . "\n" .
                "Họ tên nql: " . $nql->getHoten() . "\n" .
                "giới tính nql: " . $nql->getgioiTinh() . "\n" .
                "Ngày sinh nql: " . $nql->getngaysinh() . "\n" .
                "Chức vụ của nql: " . $nql->getchucvu() . "\n" .
                "Hệ số chức vụ của nql: " . $nql->getHSchucvu() . "\n" .
                "Tiền lương: " .  $tienluong;
            $fileName = "nhaquanly.txt";
            $file = fopen($fileName, "a");
            fwrite($file, $str);
            fwrite($file, "\n");
            echo "<script>alert('Lưu thành công');</script>";
        }
    }
  
    if (isset($_POST['hienthi'])) {
        $checked_kh = ($loai == 'Nhà khoa học') ? 'checked' : '';
        $checked_ql = ($loai == 'Nhà quản lý') ? 'checked' : '';
        $loai = $_POST['loaicb'];
        $nkhInfo = file_get_contents("nhakhoahoc.txt");
        $nqlInfo = file_get_contents("nhaquanly.txt");
    }

    ?>
    <div class="center">
        <div class="thread">
            <h2>Tính tiền lương </h2>
            <form action="" method="post">
                <table>

                    <tr>
                        <td>Mã số</td>
                        <td><input type="text" name="maso" id="" value="<?php if (isset($_POST['maso'])) echo $_POST['maso']; ?>"></td>
                        <td>Họ và tên :</td>
                        <td><input type="text" name="hoten" id="" value="<?php if (isset($_POST['hoten'])) echo $_POST['hoten']; ?>"></td>
                        <td>Giới tính</td>
                        <td><input type="text" name="gioitinh" id="" value="<?php if (isset($_POST['gioitinh'])) echo $_POST['gioitinh'] ?>"></td>
                        <td>Ngày sinh </td>
                        <td><input type="text" name="ngaysinh" id="" value="<?php if (isset($_POST['ngaysinh'])) echo $_POST['ngaysinh'] ?>"></td>
                        <td>Số ngày công của tháng : </td>
                        <td><input type="number" name="socong" id="" value="<?php if (isset($_POST['socong'])) echo $_POST['socong'] ?>"></td>
                    </tr>
                    <tr>
                        <td><input type="radio" name="loaicb" id="" value="Nhà khoa học" onclick="toggleFields()" <?php echo $checked_kh; ?>>Nhà khoa học</td>
                        <td><input type="radio" name="loaicb" id="" value="Nhà quản lý" onclick="toggleFields()" <?php echo $checked_ql; ?>>Nhà quản lý</td>
                    </tr>
                    <tr>
                        <td>Lương cơ bản : 1000000 </td>
                        <td>Đơn giá bài báo : 20000000</td>
                        <td>Số bài báo đã công bố : </td>
                        <td><input type="number" name="sbbdcb" id="sbbdcb" value="<?php if (isset($_POST['sbbdcb'])) echo $_POST['sbbdcb'] ?>"></td>
                        <td>Bậc lương : </td>
                        <td><input type="number" name="bacluong" id="bacluong" value="<?php if (isset($_POST['bacluong'])) echo $_POST['bacluong'] ?>"></td>
                    </tr>
                    <tr>
                        <td>Lương cơ bản :1000000 </td>
                        <td>Chức vụ :</td>
                        <td>
                            <select id="chucvu" name="chucvu">
                                <option value="Trưởng phòng" <?php if (isset($_POST['chucvu']) && $_POST['chucvu'] == "Trưởng phòng") echo "selected"; ?>>Trưởng phòng</option>
                                <option value="Phó phòng" <?php if (isset($_POST['chucvu']) && $_POST['chucvu'] == "Phó phòng") echo "selected"; ?>>Phó phòng</option>
                                <option value="Thư ký" <?php if (isset($_POST['chucvu']) && $_POST['chucvu'] == "Thư ký") echo "selected"; ?>>Thư ký</option>
                            </select>
                        </td>
                        <td>Hệ số chức vụ :</td>
                        <td><input type="text" name="hscv" id="hscv" value="<?php if (isset($_POST['hscv'])) echo $_POST['hscv'] ?>"></td>
                    </tr>
                    <tr>
                        <td>TIỀN LƯƠNG NHẬN ĐƯỢC :</td>
                        <td><input type="text" name="tienluong" id="" value="<?php echo $tienluong ?>"></td>
                    </tr>
                    <tr>
                        <td>Kết quả:</td>
                        <td><textarea name="ketqua" cols="70" rows="10" disabled="disabled"><?php if ($loai == "Nhà khoa học") {
                                                                                                echo "Thông tin nha khoa học:";
                                                                                                echo ($nkhInfo);
                                                                                            } elseif ($loai == "Nhà quản lý") {
                                                                                                echo "Thông tin nhà quản lý:";
                                                                                                echo ($nqlInfo);
                                                                                            } ?></textarea></td>
                    </tr>
                </table>
                <input type="submit" value="Tính " name="tinh">
                <input type="submit" value="Lưu" name="luu">
                <input type="submit" value="Hiển thị" name="hienthi">
            </form>
        </div>
    </div>
    <script>
        function toggleFields() {
            var loai = document.querySelector('input[name="loaicb"]:checked').value;
            var sobaibaoInput = document.getElementById("sbbdcb");
           
            var chucvuInput = document.getElementById("chucvu");
            var socvInput = document.getElementById("hscv");


            if (loai === "Nhà khoa học") {
                hocviInput.disabled = false;
                snctInput.disabled = false;
                lopInput.disabled = true;
                nganhInput.disabled = true;



            } else if (loai === "Nhà quản lý") {
                hocviInput.disabled = true;
                snctInput.disabled = true;
                lopInput.disabled = false;
                nganhInput.disabled = false;


            }
        }
    </script>
</body>

</html>