<?php 
abstract class nguoi {
    protected $MaSo;
    protected $HoTen;
    protected $gioitinh ;
    protected $diachi ; 
    public function __construct($MaSo,$HoTen,$gioitinh,$diachi)
    {
        $this->MaSo = $MaSo ;
        $this->HoTen = $HoTen;
        $this->gioitinh = $gioitinh ;
        $this->diachi = $diachi;
    }
    public function getmaso(){
        return $this->MaSo;
    }
    public function setmaso($MaSo){
        $this->MaSo = $MaSo;
    }
    public function gethoten (){
        return $this->HoTen ;
    }
    public function sethoten ($HoTen){
         $this->HoTen = $HoTen;
    }
    public function getgioitinh(){
        return $this->gioitinh;
    }
    public function setgioitinh($gioitinh){
        $this->gioitinh = $gioitinh;
    }
    public function getdiachi(){
        return $this->diachi;
    }
    public function setdiachi($diachi){
        $this->diachi = $diachi;
    }
    abstract public function tinhthuong ();
} 
?>