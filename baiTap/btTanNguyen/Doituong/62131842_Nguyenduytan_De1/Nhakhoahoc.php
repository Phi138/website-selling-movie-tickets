<?php 
  require_once "Nhanviencaocap.php";
class nhakhoahoc extends nhanviencaocap{

    protected $sobaibao;
    const dongiabaibao = 20000000;
    const luongcoban = 1000000;
    public function __construct($Maso, $hoten, $ngaysinh,$gioitinh,$songaycong,$bacluong,$sobaibao)
    {
        parent::__construct($Maso, $hoten, $ngaysinh,$gioitinh,$songaycong,$bacluong);
        $this->sobaibao = $sobaibao;
      
    }
    public function getsobaibao (){
        return $this -> sobaibao ;
      }
      public function setsobaibao($sobaibao){
        $this ->sobaibao = $sobaibao;
      }
     
      public function tinhluongthang()
      {
        $tienluong = 0;
        if ($this->sobaibao > 0) {
          return $tienluong = (intval($this->songaycong) * intval($this->bacluong) * self::luongcoban) * intval($this->sobaibao) * self::dongiabaibao;
        } else {
          return $tienluong = intval($this->songaycong) * intval($this->bacluong) * self::luongcoban;
        }
        return $tienluong;
      }
   
}



?>