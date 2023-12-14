<!DOCTYPE html>
<html>
<head>
    <title>Phân số PHP</title>
</head>
<body>
    <h1>Phân số PHP</h1>

    <?php
    class PhanSo {
        private $tuSo;
        private $mauSo;
    
        public function __construct($tuSo, $mauSo) {
            $this->tuSo = $tuSo;
            $this->mauSo = $mauSo;
        }
    
        public function cong(PhanSo $ps) {
            $tuSoMoi = $this->tuSo * $ps->mauSo + $ps->tuSo * $this->mauSo;
            $mauSoMoi = $this->mauSo * $ps->mauSo;
            return new PhanSo($tuSoMoi, $mauSoMoi);
        }
    
        public function tru(PhanSo $ps) {
            $tuSoMoi = $this->tuSo * $ps->mauSo - $ps->tuSo * $this->mauSo;
            $mauSoMoi = $this->mauSo * $ps->mauSo;
            return new PhanSo($tuSoMoi, $mauSoMoi);
        }
    
        public function nhan(PhanSo $ps) {
            $tuSoMoi = $this->tuSo * $ps->tuSo;
            $mauSoMoi = $this->mauSo * $ps->mauSo;
            return new PhanSo($tuSoMoi, $mauSoMoi);
        }
    
        public function chia(PhanSo $ps) {
            $tuSoMoi = $this->tuSo * $ps->mauSo;
            $mauSoMoi = $this->mauSo * $ps->tuSo;
            return new PhanSo($tuSoMoi, $mauSoMoi);
        }
    
        public function toString() {
            return $this->tuSo . "/" . $this->mauSo;
        }
    }
    
    // Sử dụng lớp PhanSo
    $ps1 = new PhanSo(1, 2);
    $ps2 = new PhanSo(3, 4);

    $psTong = $ps1->cong($ps2);
    echo "<p>Tổng: " . $psTong->toString() . "</p>";

    $psHieu = $ps1->tru($ps2);
    echo "<p>Hiệu: " . $psHieu->toString() . "</p>";

    $psTich = $ps1->nhan($ps2);
    echo "<p>Tích: " . $psTich->toString() . "</p>";

    $psThuong = $ps1->chia($ps2);
    echo "<p>Thương: " . $psThuong->toString() . "</p>";
    ?>

</body>
</html>