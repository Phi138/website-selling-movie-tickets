<?php
require_once "canbo.php";

class giangvien extends canbo
{
    protected $ngayvetruong;
    protected $hocvi;
    const Dongia = 10000000;
    protected $socongtrinh;
    protected $gioitinh;

    public function __construct($Maso, $hoten, $ngaysinh, $donvicongtac, $ngayvetruong, $hocvi, $socongtrinh, $gioitinh)
    {
        parent::__construct($Maso, $hoten, $ngaysinh, $donvicongtac);
        $this->ngayvetruong = $ngayvetruong;
        $this->hocvi = $hocvi;
        $this->socongtrinh = $socongtrinh;
        $this->gioitinh = $gioitinh;
    }

    public function getngayvetruong()
    {
        return $this->ngayvetruong;
    }

    public function setngayvetruong($ngayvetruong)
    {
        $this->ngayvetruong = $ngayvetruong;
    }

    public function gethocvi()
    {
        return $this->hocvi;
    }

    public function sethocvi($hocvi)
    {
        $this->hocvi = $hocvi;
    }

    public function getsocongtrinh()
    {
        return $this->socongtrinh;
    }

    public function setsocongtrinh($socongtrinh)
    {
        $this->socongtrinh = $socongtrinh;
    }

    public function tinhthuong()
    {
        $tienthuong = 0;
        if (($this->hocvi == 'Thạc sĩ' || $this->hocvi == 'Tiến sĩ') && $this->socongtrinh <= 2) {
            $tienthuong = self::Dongia * $this->socongtrinh;
        } elseif (($this->hocvi == 'Phó giáo sư' || $this->hocvi == 'Tiến sĩ') && $this->socongtrinh >= 3) {
            $tienthuong = self::Dongia * $this->socongtrinh * 1.5;
        }
        return $tienthuong;
    }
}

?>