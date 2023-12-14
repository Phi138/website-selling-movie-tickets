<?php 
abstract class canbo{

    protected $MaSo;
    protected$HoTen;
    protected $Ngaysinh;
    protected $gioitinh ;
    protected $donvict;
    public function __construct($MaSo,$HoTen,$Ngaysinh,$gioitinh,$donvict)
    {
        $this ->Maso = $MaSo ;
        $this -> HoTen = $HoTen;
        $this -> Ngaysinh = $Ngaysinh ;
        $this -> gioitinh = $gioitinh ;
        $this -> donvict=$donvict;
    }
    public function getmaso(){
        return $this -> MaSo;
    }
    public function setmaso($MaSo){
        $this -> MaSo = $MaSo;
    }
    public function gethoten (){
        return $this -> HoTen ;
    }
    public function sethoten ($HoTen){
         $this -> $HoTen;
    }
    public function getngaysinh(){
        return $this -> ngaysinh;
    }
    public function setngaysinh($Ngaysinh){
        $this -> $Ngaysinh;
    }
    public function getgiotinh(){
        return $this -> gioitinh;
    }
    public function setgiotinh($gioitinh){
        $this -> $gioitinh;
    }
    public function getdonvict(){
        return $this -> donvict;
    }
    public function setdonvict($donvict){
        $this -> $donvict;
    }
    abstract public function tinhthuong();
}


?>