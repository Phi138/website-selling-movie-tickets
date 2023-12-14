<?php 
require_once "Nhanvien.php";
class NhanVienSanXuat  extends NhanVien{
    protected $soSanPham;
    const DINH_MUC_SAN_PHAM = 20;
    const DON_GIA_SAN_PHAM = 250000;

    public function __construct($name,$gender,$ngayvaolam,$hesoluong,$socon, $soSanPham) {
        parent::__construct($name,$gender,$ngayvaolam,$hesoluong,$socon);
        $this->soSanPham = $soSanPham;
    }

    // Getter và Setter cho thuộc tính soSanPham

    public function getSoSanPham() {
        return $this->soSanPham;
    }

    public function setSoSanPham($soSanPham) {
        $this->soSanPham = $soSanPham;
    }

    // Getter cho thuộc tính dinhMucSanPham

    public function getDinhMucSanPham() {
        return self::DINH_MUC_SAN_PHAM;
    }

    // Getter cho thuộc tính donGiaSanPham

    public function getDonGiaSanPham() {
        return self::DON_GIA_SAN_PHAM;
    }
   
    public function tinhTienthuong (){
      if($this ->soSanPham > self::DINH_MUC_SAN_PHAM)
      {
        return ($this->soSanPham - self::DINH_MUC_SAN_PHAM) *self::DON_GIA_SAN_PHAM* 0.3;
      }
      else 
      return 0 ;
    }
   
    public function tinhTroCap() {
        $soCon = intval($this->socon); // Chuyển đổi thành số nguyên
        return $soCon * 120000;
    }
    public function tinhTienLuong()
    {
        $soSanPham = intval($this->soSanPham); // Chuyển đổi thành số nguyên
    if ($soSanPham > self::DINH_MUC_SAN_PHAM) {
        return ($soSanPham - self::DINH_MUC_SAN_PHAM) * self::DON_GIA_SAN_PHAM * 0.3;
    } else {
        return 0;
    }
    }
}

?>