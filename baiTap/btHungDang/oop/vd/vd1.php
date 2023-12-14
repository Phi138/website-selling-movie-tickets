<?php
class HocSinh
{
  private $ma;
  private $ho;
  private $ten;
  private $ngaySinh;
  private $diemTB;
  const heSo = 2;

  public function setMa($ma)
  {
    $this->ma = $ma;
  }

  public function getMa()
  {
    return $this->ma;
  }
  public function setHo($ho)
  {
    $this->ho = $ho;
  }

  public function getHo()
  {
    return $this->ho;
  }

  public function setTen($ten)
  {
    $this->ten = $ten;
  }

  public function getTen()
  {
    return $this->ten;
  }
  public function setDTB($diemTB)
  {
    $this->diemTB = $diemTB;
  }

  public function getDTB()
  {
    return $this->diemTB;
  }
  public function setNgaySinh($ngaySinh)
  {
    $this->ngaySinh = $ngaySinh;
  }

  public function getNgaySinh()
  {
    return $this->ngaySinh;
  }

  public function getHoTen()
  {
    return $this->ho . " " . $this->ten;
  }

  public function getTuoi()
  {
    $ns = explode("/", $this->ngaySinh);
    return date("Y") - $ns[2];
  }
  function tinhDiem()
  {
    return $this->diemTB * self::heSo;
  }
}

$hs1 = new HocSinh();
echo "<h3>Thông tin học sinh</h3>";
$hs1->setMa("62130677");
$hs1->setHo("Đặng Đình");
$hs1->setTen("Hùng");
$hs1->setNgaySinh("29/04/2002");
$hs1->setDTB(7);
echo "<p>MSSV: {$hs1->getMa()}</p>";
echo "<p>Họ tên: " . $hs1->getHoTen() . "</p>";
echo "<p>Tuổi: {$hs1->getTuoi()}</p>";
echo "<p>Ngày sinh: {$hs1->getNgaySinh()}</p>";
echo "<p>Điểm trung bình: {$hs1->tinhDiem()}</p>";
