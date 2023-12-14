<?php

abstract class canbo
{
    protected $Maso;
    protected $hoten;
    protected $ngaysinh;
    protected $donvicongtac;

    abstract public function tinhthuong();

    public function __construct($Maso, $hoten, $ngaysinh, $donvicongtac)
    {
        $this->Maso = $Maso;
        $this->hoten = $hoten;
        $this->ngaysinh = $ngaysinh;
        $this->donvicongtac = $donvicongtac;
    }

    public function getmaso()
    {
        return $this->Maso;
    }

    public function setMaso($Maso)
    {
        $this->Maso = $Maso;
    }

    public function gethoten()
    {
        return $this->hoten;
    }

    public function sethoten($hoten)
    {
        $this->hoten = $hoten;
    }

    public function getngaysinh()
    {
        return $this->ngaysinh;
    }

    public function setngaysinh($ngaysinh)
    {
        $this->ngaysinh = $ngaysinh;
    }

    public function getDVCTAC()
    {
        return $this->donvicongtac;
    }

    public function setDVCTAC($donvicongtac)
    {
        $this->donvicongtac = $donvicongtac;
    }
}

?>
