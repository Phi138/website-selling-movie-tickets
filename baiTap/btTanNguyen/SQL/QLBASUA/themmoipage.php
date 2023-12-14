<?php
include"./connect.php";
$ten_sua="";
$Ten_hang="";
$Ten_loai="";
$Trong_luong="";
$Don_gia="";
$TP_Dinh_Duong="";
$Loi_ich="";
$sql = "SELECT hs.Ma_hang_sua,hs.Ten_hang_sua
        FROM hang_sua hs 
";
$result = mysqli_query($conn,$sql);

$sqlloaisua = "SELECT ls.Ma_loai_sua,ls.Ten_loai
        FROM loai_sua ls 
";
$resultls = mysqli_query($conn,$sqlloaisua);
?>
<!DOCTYPE html>
<html>
<head>
    <title>Thêm thông tin sữa</title>
    <style>
        .container {
            width: 400px;
            margin: 0 auto;
        }

        .form-group {
            margin-bottom: 20px;
        }

        .form-group label {
            display: block;
            font-weight: bold;
        }

        .form-group input {
            width: 100%;
            padding: 5px;
            border: 1px solid #ccc;
        }

        .form-group textarea {
            width: 100%;
            padding: 5px;
            border: 1px solid #ccc;
        }

        .form-group select {
            width: 100%;
            padding: 5px;
            border: 1px solid #ccc;
        }

        .form-group button {
            padding: 10px 20px;
            background-color: #4CAF50;
            color: white;
            border: none;
            cursor: pointer;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Thông tin sữa</h2>
       <form action="themmoi.php" method="post" enctype="multipart/form-data">
       <div class="form-group">
                <label for="Ten_sua">Tên sữa:</label>
                <input type="text" id="Ten_sua" name="Ten_sua" value="<?php echo $ten_sua?>">
            </div>
            <div class="form-group">
                <label for="Ten_hang_sua">Tên hãng sữa:</label>
                <select id="Ten_hang_sua" name="Ten_hang">
                    <?php
                    while ($row = $result->fetch_assoc()) {
                        $ma_hang_sua = $row["Ma_hang_sua"];
                        $Ten_hang  = $row ["Ten_hang_sua"];
                        echo "<option value='$ma_hang_sua'>$Ten_hang</option>";
                    }
                    ?>
                </select>
            </div>
            <div class="form-group">
                <label for="Ten_loai_sua">Loại sữa:</label>
                <select id="Ten_loai_sua" name="Ten_loai">
                    <?php
                    while ($row = $resultls->fetch_assoc()) {
                        $ma_loai_sua = $row["Ma_loai_sua"];
                        $Ten_loai  = $row ["Ten_loai"];
                        echo "<option value='$ma_loai_sua'>$Ten_loai</option>";
                    }
                    ?>
                </select>
            </div>
            <div class="form-group">
                <label for="Trong_luong">Trọng lượng:</label>
                <input type="text" id="Trong_luong" name="Trong_luong"value="<?php echo $Trong_luong?>">
            </div>
            <div class="form-group">
                <label for="Don_gia">Đơn giá:</label>
                <input type="text" id="Don_gia" name="Don_gia" value="<?php echo $Don_gia?>">
            </div>
            <div class="form-group">
                <label for="TP_Dinh_Duong">Thành phần dinh dưỡng:</label>
                <textarea id="TP_Dinh_Duong" name="TP_Dinh_Duong" value="<?php echo $TP_Dinh_Duong?>"></textarea>
            </div>
            <div class="form-group">
                <label for="Loi_ich">Lợi ích:</label>
                <textarea id="Loi_ich" name="Loi_ich" value="<?php echo $Loi_ich?>"></textarea>
            </div>
            <div class="form-group">
                <label for="Hinh">Hình:</label>
                <input type="file" id="Hinh" name="Hinh">
            </div>
            <div class="form-group">
            <input type="hidden" name="Ma_loai_sua" value="<?php echo $ma_loai_sua?>">
            <input type="hidden" name="Ma_hang_sua" value="<?php echo $ma_hang_sua?>">


                <button type="submit">Submit</button>
            </div>
       </form>
    </div>
</body>
</html>