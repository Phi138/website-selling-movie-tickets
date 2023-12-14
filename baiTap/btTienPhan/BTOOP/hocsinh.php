<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<?php 
    class HocSinh{
        private $ma;
        public $ho;
        public $ten;
        public $ngaySinh;
        public $diemtb;
        const Heso =2;
        
        function getHo(){
            return $this->ho;
        }
        
        function setHo($ho){
            $this->ho = $ho;
        }
        
        function getTen(){
            return $this->ten;
        }
        
        function setTen($ten){
            $this->ten = $ten;
        }
        
        function getNgaySinh(){
            return $this->ngaySinh;
        }
        
        function setNgaySinh($ngaySinh){
            $this->ngaySinh = $ngaySinh;
        }
        
        function getDiemTB(){
            return $this->diemtb;
        }
        
        function setDiemTB($diemtb){
            $this->diemtb = $diemtb;
        }
        
        function getHoTen(){
            return $this->ho." ".$this->ten;
        }
        
        function getTuoi(){
            $ns = explode("/",$this->ngaySinh);
            return date("Y") - $ns[2];
        }
        function setMa($maHS){
            $this -> ma = $maHS;
        }
        function getMa(){
            return $this -> ma;
        }
        function tinhDiem(){
            return $this -> diemtb * self::Heso;
        }
    }
    
    $hs1 = new HocSinh();
    $hs1->setHo("Hoa");
    $hs1->setTen("Phượng");
    $hs1->setNgaySinh("15/12/2002");
    $hs1->diemtb = 7;
    echo "<h3>Thông tin học sinh</h3>";
    echo "Mã HS:" .$hs1->getMa();
    echo "<br>Họ tên:".$hs1->getHoTen();
    echo "<br>Tuổi: {$hs1->getTuoi()}";
    echo "<br>Điểm đạt được: {$hs1 -> tinhDiem()}";
    echo " theo hệ số điểm là ".HocSinh::Heso;
?>
</body>
</html>