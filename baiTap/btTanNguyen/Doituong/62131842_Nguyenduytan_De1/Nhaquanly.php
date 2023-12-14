<?php 
require_once "Nhanviencaocap.php";
 class Nhaquanly extends nhanviencaocap{
  protected $ChucVu ;
  protected $hesochucvu;
  const luongcoban1n= 1000000;
  public function __construct($Maso, $hoten, $ngaysinh,$gioitinh,$songaycong,$bacluong,$ChucVu,$hesochucvu)
      {
        parent::__construct($Maso, $hoten, $ngaysinh,$gioitinh,$songaycong,$bacluong);
        $this -> ChucVu = $ChucVu;
        $this -> hesochucvu = $hesochucvu ;
      }
      public function getchucvu (){
        return $this -> ChucVu ;
      }
      public function setchucvu($ChucVu){
        $this ->ChucVu = $ChucVu;
      }
      public function getHSchucvu (){
        return $this -> hesochucvu ;
      }
      public function setHSchucvu($hesochucvu){
        $this ->hesochucvu = $hesochucvu;
      }

      public function tinhluongthang()
      {
        $tienluong = 0;
        if ($this->gioitinh == "Nữ") {
          return $tienluong = (intval($this->songaycong) * self::luongcoban1n *intval($this->bacluong) * floatval($this->hesochucvu)) * 0.05;
        } else {
          return $tienluong = intval($this->songaycong) * self::luongcoban1n * intval($this->bacluong) * floatval($this->hesochucvu);
        }
        return $tienluong;
      }
 }

?>