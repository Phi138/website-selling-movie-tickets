<?php 
require_once 'hinhHoc.php';
class HinhTron extends hinhHoc{
    public $dodai ;
    public function __construct($dodai)
    {
        $this->dodai = $dodai;
    }
    
    public function tinhChuVi()
    {
        return 2 * pi() * $this->dodai;
    }
    public function tinhdientich()
    
    {
        return pi() *pow($this->dodai,2);
    }

}

?>