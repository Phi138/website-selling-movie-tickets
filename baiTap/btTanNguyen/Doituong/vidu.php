<?php
class HocSinh{
    private $ma ; 
    public $ho ;
    public $ten ; 
    public $ngaysinh ; 
    public $diemtb ;
    const HESO = 2 ; 
   function setMa ($maHS){
    $this -> ma =$maHS;

   }
   function getMa (){
    return $this -> ma ;
   }
   function getHoTen(){
    return $this -> ho ." ".$this -> ten ;
   }
   function getTuoi (){
    $ns = explode("/",$this -> ngaysinh);
    return date("Y") - $ns[2];
   } 

   function tinhDiem (){
    return $this -> diemtb*self::HESO;
   }
   

}
$hs1 = new HocSinh();
$hs1 -> setMa("62131842");
$hs1 -> ho="Nguyễn Duy ";
$hs1 -> ten = "Tân";
$hs1 ->ngaysinh="29/09/2002";
$hs1 -> diemtb = 9;
echo "<h3>Thông tin sinh viên </h3>";
echo "Mã HS :".$hs1 -> getMa();
echo "<br>Họ tên :".$hs1->getHoTen();
echo "<br> Tuổi : {$hs1 -> getTuoi()}";
echo "<br>Điểm đạt được là : ".$hs1 -> tinhDiem();  
echo " trong hệ số 2"
?>