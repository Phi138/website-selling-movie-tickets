<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>

<body>
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

      protected $ten, $dodai;

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
        return pow($this->dodai, 2) * sqrt(3) / 4;
      }
    }
    class HinhTamGiacThuong extends Hinh
    {

      public function tinh_CV()
      {
        return $this->dodai * 3;
      }
      public function tinh_DT()
      {
        return 0.5 * $this->dodai * sqrt(pow($this->dodai, 2) - pow($this->dodai / 2, 2));
      }
    }
    class HinhChuNhat extends Hinh
    {
      private $chieuRong = 0;

      public function tinh_CV()
      {
        return ($this->dodai + $this->chieuRong) * 2;
      }
      public function tinh_DT()
      {
        return $this->dodai * $this->chieuRong;
      }
      public function setChieuRong($chieuRong)
      {
        $this->chieuRong = $chieuRong;
      }
      public function getChieuRong()
      {
        return $this->chieuRong;
      }
    }

    $str = NULL;

    if (isset($_POST['tinh'])) {
      if (isset($_POST['hinh'])) {
        if ($_POST['hinh'] == "hv") {
          $hv = new HinhVuong();
          $hv->setTen($_POST['ten']);
          $hv->setDodai($_POST['dodai']);
          $str = "Diện tích hình vuông " . $hv->getTen() . " là: " . $hv->tinh_DT() . " \n" .
            "Chu vi của hình vuông " . $hv->getTen() . " là: " . $hv->tinh_CV();
        } elseif ($_POST['hinh'] == "ht") {
          $ht = new HinhTron();
          $ht->setTen($_POST['ten']);
          $ht->setDodai($_POST['dodai']);
          $str = "Diện tích của hình tròn " . $ht->getTen() . " là: " . $ht->tinh_DT() . " \n" .
            "Chu vi của hình tròn " . $ht->getTen() . " là: " . $ht->tinh_CV();
        } elseif ($_POST['hinh'] == "tgd") {
          $tgd = new HinhTamGiacDeu();
          $tgd->setTen($_POST['ten']);
          $tgd->setDodai($_POST['dodai']);
          $str = "Diện tích của hình tam giác đều " . $tgd->getTen() . " là: " . $tgd->tinh_DT() . " \n" .
            "Chu vi của hình tam giác đều " . $tgd->getTen() . " là: " . $tgd->tinh_CV();
        } elseif ($_POST['hinh'] == "tgt") {
          $tgt = new HinhTamGiacThuong();
          $tgt->setTen($_POST['ten']);
          $tgt->setDodai($_POST['dodai']);
          $str = "Diện tích của hình tam giác thường " . $tgt->getTen() . " là: " . $tgt->tinh_DT() . " \n" .
            "Chu vi của hình tam giác thường " . $tgt->getTen() . " là: " . $tgt->tinh_CV();
        } elseif ($_POST['hinh'] == "hcn") {
          $hcn = new HinhChuNhat();
          $hcn->setTen($_POST['ten']);
          $hcn->setDodai($_POST['dodai']);
          $hcn->setChieuRong($_POST['chieurong']);
          $str = "Diện tích của hình chữ nhật " . $hcn->getTen() . " là: " . $hcn->tinh_DT() . " \n" .
            "Chu vi của hình chữ nhật " . $hcn->getTen() . " là: " . $hcn->tinh_CV();
        }
      }
    }
    ?>

    <form action="" method="post">

      <fieldset>

        <legend>Tính chu vi và diện tích các hình đơn giản</legend>

        <table border='0'>

          <tr>

            <td>Chọn hình</td>

            <td>
              <input type="radio" name="hinh" value="hv" <?php if (isset($_POST['hinh']) && ($_POST['hinh']) == "hv") echo 'checked' ?> />Hình vuông
              <input type="radio" name="hinh" value="ht" <?php if (isset($_POST['hinh']) && ($_POST['hinh']) == "ht") echo 'checked' ?> />Hình tròn
              <input type="radio" name="hinh" value="tgd" <?php if (isset($_POST['hinh']) && ($_POST['hinh']) == "tgd") echo 'checked' ?> />Hình tam giác đều
              <input type="radio" name="hinh" value="tgt" <?php if (isset($_POST['hinh']) && ($_POST['hinh']) == "tgt") echo 'checked' ?> />Hình tam giác thường
              <input type="radio" name="hinh" value="hcn" <?php if (isset($_POST['hinh']) && ($_POST['hinh']) == "hcn ") echo 'checked' ?> />Hình chữ nhật

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

            <td>Nhập chiều rộng:</td>

            <td><input type="text" name="chieurong" value="<?php if (isset($_POST['chieurong'])) echo $_POST['chieurong']; ?>" /></td>

          </tr>
          <tr>

            <td>Nhập cạnh thứ 3:</td>

            <td><input type="text" name="canh3" value="<?php if (isset($_POST['canh3'])) echo $_POST['canh3']; ?>" /></td>

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