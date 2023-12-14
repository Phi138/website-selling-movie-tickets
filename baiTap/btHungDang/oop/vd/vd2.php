<?php
class HinhHoc
{
  public function Ve()
  {
    echo "";
  }
  public function tinhDT()
  {
    echo "";
  }
}

class HinhVuong extends HinhHoc
{
  public $canh = 0;
  public function Ve()
  {
    return "Vẽ hình vuông";
  }
  public function tinhDT()
  {
    return $this->canh * $this->canh;
  }
}
class HinhChuNhat extends HinhHoc
{
  public $dai = 0, $rong = 0;
  public function Ve()
  {
    return "Vẽ hình chữ nhật";
  }
  public function tinhDT()
  {
    return $this->dai * $this->rong;
  }
}
$hv = new HinhVuong();
$hv->canh = 5;
echo "<h4>Hình vuông</h4>";
echo "<p>{$hv->Ve()}</p>";
echo "<p>Diện tích: {$hv->tinhDT()}</p>";
$hcn = new HinhChuNhat();
$hcn->dai = 3;
$hcn->rong = 4;
echo "<h4>Hình chữ nhật</h4>";
echo "<p>{$hcn->Ve()}</p>";
echo "<p>Diện tích: {$hcn->tinhDT()}</p>";
