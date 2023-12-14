<?php 
require_once 'Nhanvien.php';
class Nhanvienvaphong extends NhanVien{
    protected $songayvang ;
    const dinhmucvang= 3 ;
    const dongiaPhat = 200000 ;
    public function __construct($name,$gender,$ngayvaolam,$hesoluong,$socon,$songayvang)
    {
        parent::__construct($name,$gender,$ngayvaolam,$hesoluong,$socon);
        return $this -> songayvang = $songayvang ;
    }
    // Getter và Setter cho thuộc tính soNgayVang

    public function getSoNgayVang() {
        return $this->songayvang;
    }

    public function setSoNgayVang($songayvang) {
        $this->songayvang = $songayvang;
    }

    // Getter và Setter cho thuộc tính dinhmucvang

    public function getDinhMucVang() {
        return self::dinhmucvang;
    }

    // Getter và Setter cho thuộc tính dongiaphat

    public function getDonGiaPhat() {
        return self::dongiaPhat;}
   public function tinhtrocap()
   {
   if($this -> gender=='Nữ'){
    return 200000*$this->socon*1.5;
   } 
   else 
   return $this -> socon *200000;
   }
   public function tinhtienphat (){
    if ($this->songayvang > self::dinhmucvang) {
        return ($this->songayvang - self::dinhmucvang) * self::dongiaPhat;
    } else {
        return 0;
    }
   }
   public function tinhTienLuong()
   {
       $luongcanban = intval(self::luongcanban); // Chuyển đổi thành số nguyên
       return $luongcanban * $this->hesoluong - $this->tinhtienphat();
   }
  

}
?>