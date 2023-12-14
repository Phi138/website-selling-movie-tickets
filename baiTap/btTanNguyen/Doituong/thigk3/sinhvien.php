<?php 
require_once"nguoi.php";
class sinhvien extends nguoi {
    protected $lop;
    protected $nganhhoc;
    const thuongcoban = 500000;
    public function __construct($Maso, $hoten, $diachi, $gioitinh,$lop,$nganhhoc)
    {
        parent::__construct($Maso, $hoten,$diachi,$gioitinh);
        $this->lop = $lop;
        $this -> nganhhoc = $nganhhoc;
    }
    public function getlop (){
        return $this -> lop ;
      }
      public function setlop($lop){
        $this ->lop = $lop;
      }
      public function getnganhhoc(){
        return $this -> nganhhoc ;
      }
      public function setnganhoc($nganhhoc){
        $this ->nganhhoc = $nganhhoc;
      }
    public function tinhthuong()
    { 
        $tienthuong = 0 ; 
        if($this ->nganhhoc == "Xây dựng") {
            return self::thuongcoban;
        }
        else if ($this -> nganhhoc == "CNTT"){
            return self ::thuongcoban *2;
        }
        else {
            return self::thuongcoban *1.5;
        }
        return $tienthuong;
        
    }
}

?>