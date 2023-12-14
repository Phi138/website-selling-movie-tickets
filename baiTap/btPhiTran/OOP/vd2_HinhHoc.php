<?php
//Lớp Hình Học
class HinhHoc{
    public function Ve(){ //Hàm vẽ hình
        echo "Vẽ hình";
    }
    public function tinh_Dien_Tich(){
        echo 'Tính diện tích';
    }
}
class HinhVuong extends HinhHoc{
    public $canh=0;
    public function Ve(){
        echo "Vẽ hình vuông";
    }
    public function tinh_Dien_Tich(){
        return $this->canh*$this->canh;
    }
}
class HinhChuNhat extends HinhHoc{
    public $dai=0;
    public $rong=0;
    public function Ve(){
        echo "Vẽ hình chữ nhật";
    }
    public function tinh_Dien_Tich(){
        return $this->dai*$this->rong;
    }
}
$hcn=new HinhChuNhat();
$hcn->Ve();
$hcn->dai=25;
$hcn->rong=20;
echo "<br>Diện tích hình chữ nhật: ".$hcn->tinh_Dien_Tich();
?>