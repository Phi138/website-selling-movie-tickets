<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <?php 
   require_once 'hinhHoc.php';
   require_once 'hcn.php';
   require_once 'hinhTron.php';
   require_once 'hinhvuong.php';
//    require_once 'tamGiacDeu.php';
//    require_once 'tamGiacThuong.php';
    $str=NULL;
 if(isset ($_POST['dodai'])){
    $dodai = trim($_POST['dodai']);
 }
 else 
 $dodai= 0 ; 
if(isset($_POST['tinh'])){

	if(isset($_POST['hinh']) && ($_POST['hinh'])=="hinhvuong"){

		$hv=new hinhvuong($dodai);

		if (isset($_POST['ten'])) {
            // Xử lý khi biến 'ten' tồn tại
            $hv->setTen($_POST['ten']);
        } else {
            // Xử lý khi biến 'ten' không tồn tại
            // Ví dụ:
            $hv->setTen("Tên không được cung cấp");
        }

		$hv->setDodai($_POST['dodai']);

		$str= "Diện tích  ".$hv->getTen()." là: ".$hv->tinhDienTich()." \n".

		 		"Chu vi của  ".$hv->getTen()." là: ".$hv->tinhchuvi();

	}

	if(isset($_POST['hinh']) && ($_POST['hinh'])=="hinhtron"){

		$ht=new HinhTron($dodai);

		$ht->setTen($_POST['ten']);

		$ht->setDodai($_POST['dodai']);

		$str= "Diện tích của  ".$ht->getTen()." là: ".$ht->tinhdientich()." \n".

				"Chu vi của  ".$ht->getTen()." là: ".$ht->tinhChuVi();

	}

}
    ?>
    <form action="" method="post">
        <table>
            <tr>
                <thead>
                    <th colspan="5">Tính diện tích và chu vi các hình</th>
                </thead>
            </tr>
            <tr>
                <td>Độ dài :</td>
                <td><input type="text" name="dodai" id="" value="<?php echo $dodai; ?>"></td>
            </tr>

            <tr>
                <td>Tên :</td>
                <td><input type="text" name="ten" id="" value=""></td>
            </tr>
            <tr>
                <td><input type="radio" name="hinh" id="hinhvuong" value="hinhvuong"
                        <?php if(isset($_POST['hinh'])&&($_POST['hinh'])=="hinhvuong") echo 'checked'?> />Hình vuông
                </td>
                <td><input type="radio" name="hinh" id="hinhtron" value="hinhtron">Hình Tròn</td>
                <td><input type="radio" name="hinh" id="tamgiacdeu" value="tamgiacdeu">Tam giác đều</td>
                <td><input type="radio" name="hinh" id="tamgiacthuong" value="tamgiacthuong">Tam giác thường</td>
                <td><input type="radio" name="hinh" id="hinhChuNhat" value="hinhchunhat">Hình Chữ Nhật</td>
            </tr>
            <tr>
                <th colspan="5"><input type="submit" value="Tính" name="tinh"></th>
            </tr>
            <tr>
                <th colspan="5"><textarea name="ketqua" id="" cols="70" rows="10"><?php echo $str;?></textarea></th>
            </tr>
        </table>
    </form>
</body>

</html>