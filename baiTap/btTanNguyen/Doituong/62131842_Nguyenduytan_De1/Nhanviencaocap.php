<?php

abstract class nhanviencaocap
{
    protected $Maso;
    protected $hoten;
    protected $ngaysinh;
    protected $gioitinh ;
    protected $songaycong;
    protected $bacluong ;

    abstract public function tinhluongthang();

    public function __construct($Maso, $hoten, $ngaysinh,$gioitinh,$songaycong,$bacluong)
    {
        $this->Maso = $Maso;
        $this->hoten = $hoten;
        $this->ngaysinh = $ngaysinh;
        $this->gioitinh = $gioitinh;
        $this->songaycong = $songaycong;
        $this->bacluong = $bacluong;

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
    public function getgioitinh(){
        return $this->gioitinh;
    }
    public function setgioitinh($gioitinh){
        $this->gioitinh = $gioitinh;
    }
    public function getsocong()
    {
        return $this->songaycong;
    }

    public function setsocong($songaycong)
    {
        $this->songaycong = $songaycong;
    }
    public function getbacluong()
    {
        return $this->bacluong;
    }

    public function setbacluong($bacluong)
    {
        $this->bacluong = $bacluong;
    }
}

?>
