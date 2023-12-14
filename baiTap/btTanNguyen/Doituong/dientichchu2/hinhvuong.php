<?php 
require_once 'hinhHoc.php';
class hinhvuong extends hinhHoc {
    protected  $dodai;

    public function __construct($dodai) {
        $this->dodai = $dodai;
    }
   

    public function tinhDienTich() {
        return $this->dodai * $this->dodai;
}
   public function tinhchuvi()
   {
    return $this -> dodai *4 ;
   }
}
?>