<?php
class HinhHoc{
    public function Ve(){
        echo "Vẽ hình";
    }
    public function tinh_Dien_Tich(){
        echo "Tính diện tích";
    }
}
class HinhVuong extends HinhHoc{
    public $canh = 0;
    public function Ve(){
        echo 'Vẽ hình vuông';
    }
    public function tinh_Dien_Tich(){
        return $this->canh*$this->canh;
    }
}
class HinhChuNhat extends HinhHoc{
    public $dai = 0;
    public $rong = 0;
    public function Ve(){
        echo 'Vẽ hình chữ nhật';
    }
    public function tinh_Dien_Tich(){
        return $this->dai*$this->rong;
    }
}
//hinh chu nhat
$HinhChuNhat = new HinhChuNhat();
$HinhChuNhat->Ve();
$HinhChuNhat->dai = 25;
$HinhChuNhat -> rong = 20;
echo "<br>Diện tích hình chữ nhật: ".$HinhChuNhat->tinh_Dien_Tich(). "<br>";
//hinh vuong
$HinhVuong = new HinhVuong();
$HinhVuong->Ve();
$HinhVuong->canh=20;
echo "<br>Diện tích hình vuông: ".$HinhVuong->tinh_Dien_Tich();
