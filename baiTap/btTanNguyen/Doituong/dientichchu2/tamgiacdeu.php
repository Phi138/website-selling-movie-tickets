<?php 
require_once 'hinhHoc.php';
class tgd extends hinhHoc {
    public $dodai ;
     public function __construct($dodai)
     {
        $this -> dodai = $dodai;
        
     } 


    public function tinhChuVi()
    {
        return $this -> dodai *3;
        
        
    }
    public function tinhdientich()
    {
        return sqrt(3)%4 * ($this -> dodai*$this -> dodai);
    }

}
?>