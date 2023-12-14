<?php
    class HocSinh{
        private $ma;
        public $ho;
        public $ten;
        public $ngaysinh;
        public $diemtb;
        const HESO=2;
        function setMa($maHS){
            $this->ma=$maHS;
        }
        function getMa(){
            return $this->ma;
        }
        function getHoten(){
            return $this->ho . " " . $this->ten;
        }
        function getTuoi(){
            $ns=explode("/", $this->ngaysinh);
            return date("Y") - $ns[2];
        }
        function tinhDiem(){
            return $this->diemtb*self::HESO;
        }
    }
    $hs1=new HocSinh();
    $hs1->setMa("62134090");
    $hs1->ho="Trần Lê Văn";
    $hs1->ten="Phi";
    $hs1->ngaysinh="13/08/2002";
    $hs1->diemtb=7;
    echo "Mã HS: ".$hs1->getMa();
    echo "<h4>Họ tên: ", $hs1->getHoten(), "</h4>";
    echo "<br>Tuổi: {$hs1->getTuoi()}";
    echo "<br>Điểm đạt được: {$hs1->tinhDiem()}";
    echo " theo hệ số điểm là ".HocSinh::HESO;
?>