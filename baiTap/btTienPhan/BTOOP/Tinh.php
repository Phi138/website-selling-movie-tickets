<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tính chu vi,diện tích</title>
</head>
<body>
    <?php 
        abstract class Hinh{
            protected $ten,$dodai;
            public function setTen($ten){
                $this->ten = $ten;
            }
            public function getTen(){
                return $this->ten;
            }
            public function setDodai($dodai){
                $this->dodai = $dodai;
            }
            public function getDodai(){
                return $this->dodai;
            }
            abstract function tinh_CV();
            abstract function tinh_DT();
        }
        class HinhTron extends Hinh{
            const Pi = 3.14;
            function tinh_CV(){
                return $this->dodai*2*self::Pi;
            }
            function tinh_DT(){
                return pow($this->dodai,2)*self::Pi;
            }
        }
        class HinhVuong extends Hinh{
            function tinh_CV(){
                return $this->dodai*4;
            }
            function tinh_DT(){
                return pow($this->dodai,2);
            }
        }
        class HinhTamGiacDeu extends Hinh{
            function tinh_CV(){
                return $this->dodai * 3;
            }
            function tinh_DT(){
                return (sqrt(3) * pow($this->dodai, 2)) / 4;;
            }
        }
        class HinhChuNhat extends Hinh {
            protected $chieurong;
            public function setChieuRong($chieurong) {
                $this->chieurong = $chieurong;
            }
            public function getChieuRong() {
                return $this->chieurong;
            }
            function tinh_CV() {
                return ($this->dodai + $this->chieurong) * 2;
            }
            function tinh_DT() {
                return $this->dodai * $this->chieurong;
            }
        }
        $str = NULL;
        if(isset($_POST['tinh'])){
            if(isset($_POST['hinh']) && $_POST['hinh'] == 'hv'){
                $hv = new HinhVuong();
                $hv ->setTen($_POST['ten']);
                $hv ->setDodai($_POST['dodai']);
                $str= "Diện tích hình vuông ".$hv->getTen()." là: ".$hv->tinh_DT()." \n".

		 		"Chu vi của hình vuông ".$hv->getTen()." là: ".$hv->tinh_CV();
            }
        }
        if(isset($_POST['hinh']) && ($_POST['hinh'])=="ht"){

            $ht=new HinhTron();
    
            $ht->setTen($_POST['ten']);
    
            $ht->setDodai($_POST['dodai']);
    
            $str= "Diện tích của hình tròn ".$ht->getTen()." là: ".$ht->tinh_DT()." \n".
    
                    "Chu vi của hình tròn ".$ht->getTen()." là: ".$ht->tinh_CV();
    
        }
        if(isset($_POST['hinh']) && $_POST['hinh'] == 'htg') {
            $htg = new HinhTamGiacDeu();
            $htg->setTen($_POST['ten']);
            $htg->setDodai($_POST['dodai']);
            $str = "Diện tích của hình tam giác đều ".$htg->getTen()." là: ".$htg->tinh_DT()." \n".
                    "Chu vi của hình tam giác đều ".$htg->getTen()." là: ".$htg->tinh_CV();
        }
        if(isset($_POST['hinh']) && $_POST['hinh'] == 'hcn') {
            $hcn = new HinhChuNhat();
            $hcn->setTen($_POST['ten']);
            $hcn->setDodai($_POST['dodai']);
            $hcn->setChieuRong($_POST['chieurong']);
            $str = "Diện tích của hình chữ nhật ".$hcn->getTen()." là: ".$hcn->tinh_DT()." \n".
                    "Chu vi của hình chữ nhật ".$hcn->getTen()." là: ".$hcn->tinh_CV();
        }
    ?>
</body>
<form action="" method="post">
        <fieldset>
            <legend>Tính chu vi và diện tích các hình đơn giản</legend>
            <table border='0'>
                <tr>
                    <td>Chọn hình</td>
                    <td>
                        <input type="radio" name="hinh" value="hv" <?php if(isset($_POST['hinh']) && $_POST['hinh'] == 'hv') echo 'checked'?>/>Hình vuông
                        <input type="radio" name="hinh" value="ht" <?php if(isset($_POST['hinh']) && $_POST['hinh'] == 'ht') echo 'checked'?>/>Hình tròn
                        <input type="radio" name="hinh" value="htg" <?php if(isset($_POST['hinh']) && $_POST['hinh'] == 'htg') echo 'checked'?>/>Hình tam giác đều
                        <input type="radio" name="hinh" value="hcn" <?php if(isset($_POST['hinh']) && $_POST['hinh'] == 'hcn') echo 'checked'?>/>Hình chữ nhật
                    </td>
                </tr>
                <tr>
                    <td>Nhập tên:</td>
                    <td><input type="text" name="ten" value="<?php if(isset($_POST['ten'])) echo $_POST['ten'];?>"/></td>
                </tr>
                <tr>
                    <td>Nhập độ dài:</td>
                    <td><input type="text" name="dodai" value="<?php if(isset($_POST['dodai'])) echo $_POST['dodai'];?>"/></td>
                </tr>
                <tr>
                    <td>Nhập chiều rộng (chỉ cho hình chữ nhật):</td>
                    <td><input type="text" name="chieurong" value="<?php if(isset($_POST['chieurong'])) echo $_POST['chieurong'];?>"/></td>
                </tr>
                <tr>
                    <td>Kết quả:</td>
                    <td><textarea name="ketqua" cols="70" rows="4" disabled="disabled"><?php echo $str;?></textarea></td>
                </tr>
                <tr>
                    <td colspan="2" align="center"><input type="submit" name="tinh" value="Tính"/></td>
                </tr>
            </table>
        </fieldset>
    </form>
</body>
</html>