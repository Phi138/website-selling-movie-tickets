<?php
abstract  class hinhHoc {
    protected $ten, $dodai;

	public function setTen($ten){

		$this->ten=$ten;

	}

	public function getTen(){

		return $this->ten;

	}

	public function setDodai($doDai){

		$this->dodai=$doDai;

	}

	public function getDodai(){

		return $this->dodai;

	}
    abstract public function tinhChuVi ();
    abstract public function tinhdientich ();
}
?>