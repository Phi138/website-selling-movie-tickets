<?php
require_once"hinhHoc.php";
class hcn extends hinhHoc {
    public $ChieuRong;
    public $chieuDai;

    public function __construct($dodai)
    {
        $this->chieuDai = $dodai;
        $this->tinhChieuRong();
    }

    private function tinhChieuRong()
    {
        $this->ChieuRong = $this->chieuDai * 2;
    }

    public function tinhdientich()
    {
        return $this->chieuDai * $this->ChieuRong;
    }

    public function tinhchuvi()
    {
        return $this->chieuDai + $this->ChieuRong * 2;
    }
}
?>