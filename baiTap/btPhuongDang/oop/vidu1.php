<?php
class HocSinh
{
    private $ma;
    public $ho;
    public $ten;
    public $ngaysinh;
    public $diemTB;
    const HESO = 2;
    function setMa($maHS)
    {
        $this->ma = $maHS;
    }
    function getMa()
    {
        return $this->ma;
    }
    function getHoTen()
    {
        return $this->ho . " " . $this->ten;
    }
    function getTuoi()
    {
        $ns = explode("/", $this->ngaysinh);
        return date("Y") - $ns[2];
    }
    function tinhDiem()
    {
        return $this->diemTB * self::HESO;
    }
}
$hs1 = new HocSinh();
$hs1->setMa("62131600");
$hs1->ho = "Dang Thi";
$hs1->ten = "Phuong";
$hs1->ngaysinh = "02/02/2002";
$hs1->diemTB = 7;
echo "<h3>Thông tin sinh viên</h3>";
echo "Mã SV: " . $hs1->getMa();
echo "<h4>Họ tên: ", $hs1->getHoTen(), "</h4>";
echo "<br>Tuổi: {$hs1->getTuoi()}";
echo "<br>Điểm đạt được: {$hs1->tinhDiem()}";
echo "  theo hệ số điểm là " . HocSinh::HESO;
