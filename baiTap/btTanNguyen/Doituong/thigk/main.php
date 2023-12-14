<?php

require_once "./canbo.php";
require_once "./giangvien.php";
require_once "./chuyenvien.php";


$hoten = "";
$tienthuong = "";

if (isset($_POST['tinh'])) {
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        // Lấy thông tin từ form
        $maso = $_POST['maso'];
        $hoten = $_POST['hoten'];
        $gioitinh = $_POST['gioitinh'];
        $ngaysinh = $_POST['ngaysinh'];
        $donvicongtac = $_POST['dvct'];
        $chucvu = isset($_POST['chucvu']) ? $_POST['chucvu'] : "";
        $sosangkien = isset($_POST['sosangkien']) ? $_POST['sosangkien'] : "";
        $loaicanbo = $_POST['loaicanbo'];

        if (isset($_POST['loaicanbo']) && $_POST['loaicanbo'] == "giảng viên") {
            $ngayvetruong = $_POST['ngayvetruong'];
            $hocvi = $_POST['hocvi'];
            $socongtrinh = $_POST['socongtrinh'];

            // Tạo đối tượng Giảng viên và tính tiền thưởng
            $giangvien = new giangvien($maso, $hoten, $ngaysinh, $donvicongtac, $ngayvetruong, $hocvi, $socongtrinh, $gioitinh);
            $tienthuong = $giangvien->tinhthuong();
        } elseif (isset($_POST['loaicanbo']) && $_POST['loaicanbo'] == "chuyên viên") {
            $chucvu = $_POST['chucvu'];
            $sosangkien = $_POST['sosangkien'];

            // Tạo đối tượng Chuyên viên và tính tiền thưởng
            $chuyenvien = new chuyenvien($maso, $hoten, $ngaysinh, $donvicongtac, $chucvu, $sosangkien);
            $tienthuong = $chuyenvien->tinhthuong();
        }
    }
}

if (isset($_POST['luu'])) {
    $tienthuongluu = $_POST['tienthuong'];
    $hoten = $_POST['hoten'];
    $maso = $_POST['maso'];
    $hoten = $_POST['hoten'];
    $gioitinh = $_POST['gioitinh'];
    $ngaysinh = $_POST['ngaysinh'];
    $donvicongtac = $_POST['dvct'];
    $loaicanbo = $_POST['loaicanbo'];
    // Lưu thông tin cán bộ vào file
    $canboInfo = "Họ tên: " . $hoten . "\ngiới tính " . $gioitinh . "\nngày sinh " . $ngaysinh . "\nĐơn vị công tác :" . $donvicongtac . "\nLoại cán bộ:" . $loaicanbo . "\nTiền thưởng: " . $tienthuongluu . "\n\n";
    file_put_contents("canbo.txt", $canboInfo, FILE_APPEND);
}
if (isset($_POST['hienthi'])) {
    $loaicanbo = $_POST['loaicanbo'];
    // Đọc nội dung file "canbo.txt"
    $canboInfo = file_get_contents("canbo.txt");
    // Hiển thị danh sách thông tin cán bộ tương ứng với loại cán bộ được chọn
    if ($loaicanbo == "giảng viên") {
        echo "<h3>Thông tin giảng viên:</h3>";
        $canboList = explode("\n\n", $canboInfo);
        foreach ($canboList as $canbo) {
            if (strpos($canbo, "Loại cán bộ:giảng viên") !== false) {
                echo "<pre>" . $canbo . "</pre>";
            }
        }
    } elseif ($loaicanbo == "chuyên viên") {
        echo "<h3>Thông tin chuyên viên:</h3>";
        $canboList = explode("\n\n", $canboInfo);
        foreach ($canboList as $canbo) {
            if (strpos($canbo, "Loại cán bộ:chuyên viên") !== false) {
                echo "<pre>" . $canbo . "</pre>";
            }
        }
    }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thi giửa kì</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f1f1f1;
        }

        form {
            background-color: purple;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        table thead {
            font-weight: bold;
            background-color: purple;
            color: black;
        }

        table td {
            padding: 10px;
            border: 1px solid #ccc;
        }

        input[type="text"],
        input[type="number"],
        select {
            width: 100%;
            padding: 5px;
            border: 1px solid #ccc;
            border-radius: 3px;
        }

        input[type="submit"] {
            padding: 10px 20px;
            background-color: #4CAF50;
            color: #fff;
            border: none;
            border-radius: 3px;
            cursor: pointer;
        }

        input[type="submit"]:hover {
            background-color: #45a049;
        }

        .center {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .thread {
            width: 1000px;
            background-color: #fff;
            border-radius: 5px;
            padding: 20px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        .thread h2 {
            text-align: center;
            color: #4CAF50;
        }

        .thread table {
            margin-top: 20px;
        }

        .thread table td {
            border: none;
            padding: 5px;
        }

        .thread input[type="submit"] {
            margin-top: 20px;
            display: block;
            margin-left: auto;
            margin-right: auto;
        }
    </style>
</head>

<body>
    <div class="center">
        <div class="thread">
            <h2>Tính tiền cán bộ</h2>
            <form action="" method="post">
                <table>
                    <thead>
                        <tr>
                            <td>Mã số :</td>
                            <td><input type="text" name="maso" id="" value="<?php if (isset($_POST['maso'])) echo $_POST['maso'];
                                                                            ?>"></td>
                            <td>Họ tên :</td>
                            <td><input type="text" name="hoten" id="" value="<?php if (isset($_POST['hoten'])) echo $_POST['hoten'];
                                                                                ?>"></td>
                        </tr>
                        <tr>
                            <td>Giới tính :</td>
                            <td><input type="text" name="gioitinh" id="" value="<?php if (isset($_POST['gioitinh'])) echo $_POST['gioitinh'];
                                                                                ?>"></td>
                            <td>Ngày sinh :</td>
                            <td><input type="text" name="ngaysinh" id="" value="<?php if (isset($_POST['ngaysinh'])) echo $_POST['ngaysinh'];
                                                                                ?>"></td>
                            <td>Đơn vị công tác :</td>
                            <td><input type="text" name="dvct" id="" value="<?php if (isset($_POST['dvct'])) echo $_POST['dvct'] ?>" ?></td>
                        </tr>
                        <tr>
                            <td><input type="radio" name="loaicanbo" id="" value="giảng viên" onclick="toggleFields()" <?php if (isset($_POST['loaicanbo']) && $_POST['loaicanbo'] == "giảng viên") echo "checked"; ?>>giảng viên</td>
                            <td><input type="radio" name="loaicanbo" id="" value="chuyên viên" onclick="toggleFields()" <?php if (isset($_POST['loaicanbo']) && $_POST['loaicanbo'] == "chuyên viên") echo "checked"; ?>>chuyên viên</td>
                        </tr>
                        <tr>
                            <td>Ngày về trường :</td>
                            <td><input type="date" name="ngayvetruong" id="ngayvetruong" value="<?php if (isset($_POST['ngayvetruong'])) echo $_POST['ngayvetruong'];
                                                                                                ?>"></td>
                            <td>Học vị :</td>
                            <td><input type="text" name="hocvi" id="hocvi" value="<?php if (isset($_POST['hocvi'])) echo $_POST['hocvi'];
                                                                                    ?>"></td>
                            <td> Đơn giá : 10000000 VND</td>
                            <td> Số công trình nghiên cứu :</td>
                            <td><input type="number" name="socongtrinh" id="socongtrinh" value="<?php if (isset($_POST['socongtrinh'])) echo $_POST['socongtrinh'] ?>" ; "></td>
            </tr>
            <tr>
                <td>Chức vụ :</td>
                <td>
                    <select id="chucvu" name="chucvu">
                                <option value="Trưởng phòng" <?php if (isset($_POST['chucvu']) && $_POST['chucvu'] == "Trưởng phòng") echo "selected"; ?>>Trưởng phòng</option>
                                <option value="Phó phòng" <?php if (isset($_POST['chucvu']) && $_POST['chucvu'] == "Phó phòng") echo "selected"; ?>>Phó phòng</option>
                                <option value="Thư ký" <?php if (isset($_POST['chucvu']) && $_POST['chucvu'] == "Thư ký") echo "selected"; ?>>Thư ký</option>
                                </select>
                            </td>
                            <td>Số sáng kiến cãi tiến :</td>
                            <td><input type="text" name="sosangkien" id="sosangkien" value="<?php if (isset($_POST['sosangkien'])) echo $_POST['sosangkien']; ?>"></td>
                        </tr>
                        <tr>
                            <td>Tiền thưởng được nhận của : <?php echo $hoten ?></td>
                            <td> <input type="text" name="tienthuong" value="<?php echo $tienthuong; ?>" readonly></td>
                        </tr>
                    </thead>

                </table>

                <input type="submit" value="Tính tiền thưởng" name="tinh">
                <input type="submit" value="Lưu cán bộ" name="luu">
                <input type="submit" value="Hiển thị thông tin cán bộ" name="hienthi">
            </form>
        </div>
    </div>
    <script>
        function toggleFields() {
            var loaiCanBo = document.querySelector('input[name="loaicanbo"]:checked').value;
            var chucVuInput = document.getElementById("chucvu");
            var sangKienInput = document.getElementById("sosangkien");
            var ngayvetruongInput = document.getElementById("ngayvetruong");
            var hocviInput = document.getElementById("hocvi");
            var socongtrinhInput = document.getElementById("socongtrinh");


            if (loaiCanBo === "giảng viên") {
                chucVuInput.disabled = true;
                sangKienInput.disabled = true;
                ngayvetruongInput.disabled = false;
                hocviInput.disabled = false;
                socongtrinhInput.disabled = false;


            } else if (loaiCanBo === "chuyên viên") {
                chucVuInput.disabled = false;
                sangKienInput.disabled = false;
                ngayvetruongInput.disabled = true;
                hocviInput.disabled = true;
                socongtrinhInput.disabled = true;


            }
        }
    </script>
</body>

</html>