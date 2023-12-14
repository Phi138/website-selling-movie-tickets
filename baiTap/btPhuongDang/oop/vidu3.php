<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Frameset//EN">

<html>

<head>

    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">

    <title>Tinh chu vi va dien tich</title>

    <style>
        fieldset {

            background-color: #eeeeee;

        }



        legend {

            background-color: gray;

            color: white;

            padding: 5px 10px;

        }



        input {

            margin: 5px;

        }
    </style>

</head>

<body>

    <?php

    abstract class Hinh
    {

        protected $ten, $dodai, $dodai2, $dodai3;

        public function setTen($ten)
        {

            $this->ten = $ten;
        }

        public function getTen()
        {

            return $this->ten;
        }

        public function setDodai($doDai)
        {

            $this->dodai = $doDai;
        }

        public function getDodai()
        {

            return $this->dodai;
        }
        public function setDodai2($doDai2)
        {

            $this->dodai2 = $doDai2;
        }

        public function getDodai2()
        {

            return $this->dodai2;
        }
        public function setDodai3($doDai3)
        {

            $this->dodai3 = $doDai3;
        }

        public function getDodai3()
        {

            return $this->dodai3;
        }

        abstract public function tinh_CV();

        abstract public function tinh_DT();
    }

    class HinhTron extends Hinh
    {

        const PI = 3.14;

        function tinh_CV()
        {

            return $this->dodai * 2 * self::PI;
        }

        function tinh_DT()
        {

            return pow($this->dodai, 2) * self::PI;
        }
    }

    class HinhVuong extends Hinh
    {

        public function tinh_CV()
        {

            return $this->dodai * 4;
        }

        public function tinh_DT()
        {

            return pow($this->dodai, 2);
        }
    }
    class HinhTamGiacDeu extends Hinh
    {
        public function tinh_CV()
        {
            return $this->dodai * 3;
        }
        public function tinh_DT()
        {
            return (sqrt(3) / 4) * $this->dodai * $this->dodai;
        }
    }
    class HinhTamGiacThuong extends Hinh
    {

        public function tinh_CV()
        {
            return $this->dodai + $this->dodai2 + $this->dodai3;
        }
        public function tinh_DT()
        {
            $p = ($this->dodai + $this->dodai2 + $this->dodai3) / 2;
            return sqrt($p * ($p - $this->dodai) * ($p - $this->dodai2) * ($p - $this->dodai3));
        }
    }

    $str = NULL;

    if (isset($_POST['tinh'])) {

        if (isset($_POST['hinh']) && ($_POST['hinh']) == "hv") {

            $hv = new HinhVuong();

            $hv->setTen($_POST['ten']);

            $hv->setDodai($_POST['dodai']);

            $str = "Diện tích hình vuông " . $hv->getTen() . " là: " . $hv->tinh_DT() . " \n" .

                "Chu vi của hình vuông " . $hv->getTen() . " là: " . $hv->tinh_CV();
        }

        if (isset($_POST['hinh']) && ($_POST['hinh']) == "ht") {

            $ht = new HinhTron();

            $ht->setTen($_POST['ten']);

            $ht->setDodai($_POST['dodai']);

            $str = "Diện tích của hình tròn " . $ht->getTen() . " là: " . $ht->tinh_DT() . " \n" .

                "Chu vi của hình tròn " . $ht->getTen() . " là: " . $ht->tinh_CV();
        }
        if (isset($_POST['hinh']) && ($_POST['hinh']) == "htgd") {

            $ht = new HinhTamGiacDeu();

            $ht->setTen($_POST['ten']);

            $ht->setDodai($_POST['dodai']);

            $str = "Diện tích của hình tam giác đều " . $ht->getTen() . " là: " . $ht->tinh_DT() . " \n" .

                "Chu vi của hình tam giác đều " . $ht->getTen() . " là: " . $ht->tinh_CV();
        }
        if (isset($_POST['hinh']) && ($_POST['hinh']) == "htgt") {

            $ht = new HinhTamGiacThuong();

            $ht->setTen($_POST['ten']);

            $ht->setDodai($_POST['dodai']);

            $str = "Diện tích của hình tam giác thường " . $ht->getTen() . " là: " . $ht->tinh_DT() . " \n" .

                "Chu vi của hình tam giác thường " . $ht->getTen() . " là: " . $ht->tinh_CV();
        }
    }

    ?>

    <form action="" method="post">

        <fieldset>

            <legend>Tính chu vi và diện tích các hình đơn giản</legend>

            <table border='0'>

                <tr>

                    <td>Chọn hình</td>

                    <td><input type="radio" name="hinh" value="hv" <?php if (isset($_POST['hinh']) && ($_POST['hinh']) == "hv") echo 'checked' ?> />Hình vuông

                        <input type="radio" name="hinh" value="ht" <?php if (isset($_POST['hinh']) && ($_POST['hinh']) == "ht") echo 'checked' ?> />Hình tròn
                        <input type="radio" name="hinh" value="htgd" <?php if (isset($_POST['hinh']) && ($_POST['hinh']) == "htgd") echo 'checked' ?> />Hình tam giác đều
                        <input type="radio" name="hinh" value="htgt" <?php if (isset($_POST['hinh']) && ($_POST['hinh']) == "htgt") echo 'checked' ?> />Hình tam giác thường
                        <input type="radio" name="hinh" value="hcn" <?php if (isset($_POST['hinh']) && ($_POST['hinh']) == "hcn") echo 'checked' ?> />Hình chữ nhật

                    </td>

                </tr>

                <tr>

                    <td>Nhập tên:</td>

                    <td><input type="text" name="ten" value="<?php if (isset($_POST['ten'])) echo $_POST['ten']; ?>" /></td>

                </tr>

                <tr>

                    <td>Nhập độ dài:</td>

                    <td><input type="text" name="dodai" value="<?php if (isset($_POST['dodai'])) echo $_POST['dodai']; ?>" /></td>

                </tr>

                <tr>
                    <td>Kết quả:</td>

                    <td><textarea name="ketqua" cols="70" rows="4" disabled="disabled"><?php echo $str; ?></textarea></td>

                </tr>

                <tr>

                    <td colspan="2" align="center"><input type="submit" name="tinh" value="Tính" /></td>

                </tr>

            </table>

        </fieldset>

    </form>

</body>

</html>