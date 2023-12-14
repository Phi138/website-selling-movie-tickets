<?php 
require_once "Canbo.php";
 class Chuyenvien extends canbo{
  protected $ChucVu ;
  protected $SoSangKien;
  public function __construct($MaSo,$HoTen,$Ngaysinh,$gioitinh,$donvict,$ChucVu,$SoSangKien)
      {
        parent::__construct($MaSo,$HoTen,$Ngaysinh,$gioitinh,$donvict);
        $this -> ChucVu = $ChucVu;
        $this -> SoSangKien = $SoSangKien ;
      }
      public function getchucvu (){
        return $this -> chucvu ;
      }
      public function setchucvu($ChucVu){
        $this ->ChucVu = $ChucVu;
      }
      public function getsosangkien (){
        return $this -> SoSangKien ;
      }
      public function setsosangkien($SoSangKien){
        $this ->SoSangKien = $SoSangKien;
      }

      public function tinhthuong()
      {
          $tienthuong = 0;
          if ($this->SoSangKien > 0) {
              $tienthuong = 2000000 * $this->SoSangKien;
          }
          switch ($this->ChucVu) {
              case 'Trưởng phòng':
                  $tienthuong += 500000;
                  break;
              case 'Phó phòng':
                  $tienthuong += 300000;
                  break;
              case 'Thư ký':
                  $tienthuong += 100000;
                  break;
          }
          return $tienthuong;
      }
 }

?>