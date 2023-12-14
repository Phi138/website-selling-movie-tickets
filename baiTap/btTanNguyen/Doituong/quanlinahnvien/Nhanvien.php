<?php 
abstract class nhanVien{
    protected $name;
protected $gender;
protected $ngayvaolam;
protected $hesoluong;
protected $socon;
const luongcanban = 135000;


public function __construct($name,$gender,$ngayvaolam,$hesoluong,$socon)
{
    $this ->name = $name;
    $this -> gender=$gender;
    $this -> ngayvaolam = $ngayvaolam;
    $this ->hesoluong = $hesoluong ;
    $this ->socon = $socon ;
}
    // Các phương thức getter và setter cho các thuộc tính

public function getName()
{
    return $this->name;
}

public function setName($name)
{
    $this->name = $name;
}

public function getGender()
{
    return $this->gender;
}

public function setGender($gender)
{
    $this->gender = $gender;
}

public function getNgayvaolam()
{
    return $this->ngayvaolam;
}

public function setNgayvaolam($ngayvaolam)
{
    $this->ngayvaolam = $ngayvaolam;
}

public function getHesoluong()
{
    return $this->hesoluong;
}

public function setHesoluong($hesoluong)
{
    $this->hesoluong = $hesoluong;
}

public function getSocon()
{
    return $this->socon;
}

public function setSocon($socon)
{
    $this->socon = $socon;
}
public function geluongcanban() {
    return self::luongcanban;
}

// Getter và Setter cho thuộc tính dongiaphat

public function getluongcanban() {
    return self::luongcanban;
}
    abstract public function tinhTienluong ();
    abstract public function tinhtrocap();
    public function tinhtienthuong(){
        $sonamlamviec = date('Y')-date('Y',strtotime($this -> ngayvaolam));
        $tienthuong = $sonamlamviec *1000000;
        return $tienthuong;
    }
    


}


?>