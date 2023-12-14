<?php 
require_once "./canbo.php";
class chuyenvien extends canbo
{
    protected $chucvu;
    protected $sosangkienct;

    public function __construct($Maso, $hoten, $ngaysinh, $donvicongtac, $chucvu, $sosangkienct)
    {
        parent::__construct($Maso, $hoten, $ngaysinh, $donvicongtac);
        $this->chucvu = $chucvu;
        $this->sosangkienct = $sosangkienct;
    }

    public function getchucvu()
    {
        return $this->chucvu;
    }

    public function setchucvu($chucvu)
    {
        $this->chucvu = $chucvu;
    }

    public function getsosangkienct()
    {
        return $this->sosangkienct;
    }

    public function setsosangkienct($sosangkienct)
    {
        $this->sosangkienct = $sosangkienct;
    }

    public function tinhthuong()
{
    $tienthuong = 0;
    if ($this->sosangkienct > 0) {
        $tienthuong = 2000000 * $this->sosangkienct;
    }
    switch ($this->chucvu) {
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
