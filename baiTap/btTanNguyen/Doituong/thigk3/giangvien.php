<?php 
  require_once "nguoi.php";
class Giangvien extends nguoi{
    protected $hocvi;
    protected $sonamcongtac;
    const luongcoban = 1350000;
    public function __construct($Maso, $hoten, $diachi, $hocvi, $gioitinh,$sonamcongtac)
    {
        parent::__construct($Maso, $hoten,$diachi,$gioitinh);
        $this->hocvi = $hocvi;
        $this -> sonamcongtac = $sonamcongtac;
    }
    public function getHocvi (){
        return $this -> hocvi ;
      }
      public function setHocVi($hocvi){
        $this ->hocvi = $hocvi;
      }
      public function getSonamct(){
        return $this -> sonamcongtac ;
      }
      public function setSonamct($sonamcongtac){
        $this ->sonamcongtac = $sonamcongtac;
      }
      public function tinhthuong(){
        $tienthuong = 0 ;
        if ($this->hocvi == "Thạc sĩ"){
            return $tienthuong = self::luongcoban * intval($this->sonamcongtac);
        }
        else if($this->hocvi == "Tiến sĩ"){
            return $tienthuong = self::luongcoban * intval($this->sonamcongtac) * 1.2;
        }
        else {
            return $tienthuong = self::luongcoban * intval($this->sonamcongtac) * 1.5;
        }
        return $tienthuong ;
    }
}



?>