<?php 
require_once"Canbo.php";
class Giangvien extends canbo{
      protected $NgayVeTruong ; 
      protected $HocVi ;
      protected $SoCtNc ;
      const DonGia = 10000000;

      public function __construct($MaSo,$HoTen,$Ngaysinh,$gioitinh,$donvict,$NgayVeTruong,$HocVi,$SoCtNc)
      {
        parent::__construct($MaSo,$HoTen,$Ngaysinh,$gioitinh,$donvict);
        $this -> NgayVeTruong = $NgayVeTruong;
        $this -> HocVi = $HocVi ;
        $this -> SoCtNc = $SoCtNc ;
        
      }
      public function getNgayvetruong (){
        return $this -> NgayVeTruong ;
      }
      public function setNgayvetruong($NgayVeTruong){
        $this ->NgayVeTruong = $NgayVeTruong;
      }
      public function getHocvi (){
        return $this -> HocVi ;
      }
      public function setHocVi($HocVi){
        $this ->HocVi = $HocVi;
      }
      public function getSoctnc(){
        return $this -> SoCtNc ;
      }
      public function setSoctnt($SoCtNc){
        $this ->SoCtNc = $SoCtNc;
      }
    public function tinhthuong()
    {
        $tienthuong = 0 ;
        if(($this->HocVi == "Thạc sĩ" || $this ->HocVi=="Tiến sĩ")&& ($this ->SoCtNc <=2)){
           $tienthuong = self::DonGia * $this->SoCtNc ;
        }
        else {
            $tienthuong = self::DonGia *$this -> SoCtNc *1.5;
        }
        return $tienthuong;
    }
}
?>