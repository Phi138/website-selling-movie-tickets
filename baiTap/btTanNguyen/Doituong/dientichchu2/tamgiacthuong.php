<?php 
require_once 'hinhHoc.php';
class tamgt extends hinhHoc{
    public  $a;
    public $b = $a*2;
    public $c = $a*3;
    
    public function __construct($a,$b,$c)
    {
        $this -> a =  $a;
        $this -> b =  $b;
        $this -> c =  $c;
         
    }
public function tinhChuVi()
{
   return $this -> a +$this -> b +$this -> c ; 
    
}
public function tinhdientich()
{
   $chuVi = $this->tinhChuVi();
   return sqrt($chuVi * ($chuVi - $this->a) * ($chuVi - $this->b) * ($chuVi - $this->c));
}
}


?>