<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <style>
    fieldset {
      background-color: #eeeeee;
      width: 500px;
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
  class PhanSo
  {
    public $tuSo, $mauSo;
    public function __construct($tuSo, $mauSo)
    {
      $this->tuSo = $tuSo;
      $this->mauSo = $mauSo;
    }
    private function ucln($a, $b)
    {
      if ($b == 0) {
        return $a;
      } else {
        return $this->ucln($b, $a % $b);
      }
    }
    public function rutGon()
    {
      $ucln = $this->ucln($this->tuSo, $this->mauSo);
      $this->tuSo /= $ucln;
      $this->mauSo /= $ucln;
    }
    public function cong($ps2)
    {
      $tuSoMoi = $this->tuSo * $ps2->mauSo + $ps2->tuSo * $this->mauSo;
      $mauSoMoi = $this->mauSo * $ps2->mauSo;
      $ketQua = new PhanSo($tuSoMoi, $mauSoMoi);
      $ketQua->rutGon();
      return $ketQua;
    }

    public function tru($ps2)
    {
      $tuSoMoi = $this->tuSo * $ps2->mauSo - $ps2->tuSo * $this->mauSo;
      $mauSoMoi = $this->mauSo * $ps2->mauSo;
      $ketQua = new PhanSo($tuSoMoi, $mauSoMoi);
      $ketQua->rutGon();
      return $ketQua;
    }

    public function nhan($ps2)
    {
      $tuSoMoi = $this->tuSo * $ps2->tuSo;
      $mauSoMoi = $this->mauSo * $ps2->mauSo;
      $ketQua = new PhanSo($tuSoMoi, $mauSoMoi);
      $ketQua->rutGon();
      return $ketQua;
    }

    public function chia($ps2)
    {
      $tuSoMoi = $this->tuSo * $ps2->mauSo;
      $mauSoMoi = $this->mauSo * $ps2->tuSo;
      $ketQua = new PhanSo($tuSoMoi, $mauSoMoi);
      $ketQua->rutGon();
      return $ketQua;
    }
  }
  $tuSo1 = $mauSo1 = $tuSo2 = $mauSo2 = $phepTinh = $ketQua_rut_gon = "";
  if (isset($_POST["kq"])) {
    $tuSo1 = $_POST["ts1"];
    $mauSo1 = $_POST["ms1"];
    $tuSo2 = $_POST["ts2"];
    $mauSo2 = $_POST["ms2"];
    $phepTinh = $_POST["pt"];

    $ps1 = new PhanSo($tuSo1, $mauSo1);
    $ps2 = new PhanSo($tuSo2, $mauSo2);

    switch ($phepTinh) {
      case "cong":
        $ketQua = $ps1->cong($ps2);
        break;
      case "tru":
        $ketQua = $ps1->tru($ps2);
        break;
      case "nhan":
        $ketQua = $ps1->nhan($ps2);
        break;
      case "chia":
        $ketQua = $ps1->chia($ps2);
        break;
      default:
        $ketQua = null;
        break;
    }

    if ($ketQua) {
      $ketQua_rut_gon = $ketQua->tuSo . "/" . $ketQua->mauSo;
    } else {
      $ketQua_rut_gon = "Không hợp lệ";
    }
  }
  ?>

  <form action="" method="post">
    <h4>Chọn các phép tính trên phân số</h4>
    Nhập phân số thứ nhất: Tử số: <input type="text" name="ts1" value="<?php
                                                                        echo isset($tuSo1) ? $tuSo1 : "";
                                                                        ?>">
    Mẫu số: <input type="text" name="ms1" value="<?php
                                                  echo isset($mauSo1) ? $mauSo1 : "";
                                                  ?>">
    <br>
    <br>
    Nhập phân số thứ hai: Tử số: <input type="text" name="ts2" value="<?php
                                                                      echo isset($tuSo2) ? $tuSo2 : "";
                                                                      ?>">
    Mẫu số: <input type="text" name="ms2" value="<?php
                                                  echo isset($mauSo2) ? $mauSo2 : "";
                                                  ?>">
    <br>
    <br>
    <fieldset>
      <legend>Chọn phép tính</legend>
      <input type="radio" name="pt" value="cong" <?php if (isset($_POST['pt']) && ($_POST['pt']) == "cong") echo 'checked' ?> />Phép cộng
      <input type="radio" name="pt" value="tru" <?php if (isset($_POST['pt']) && ($_POST['pt']) == "tru") echo 'checked' ?> />Phép trừ
      <input type="radio" name="pt" value="nhan" <?php if (isset($_POST['pt']) && ($_POST['pt']) == "nhan") echo 'checked' ?> />Phép nhân
      <input type="radio" name="pt" value="chia" <?php if (isset($_POST['pt']) && ($_POST['pt']) == "chia") echo 'checked' ?> />Phép chia
    </fieldset>
    <input type="submit" name="kq" value="Kết quả">
    <?php if (isset($_POST["kq"]) && isset($ketQua_rut_gon)) { ?>
      <p>Kết quả: <?php echo $ketQua_rut_gon; ?></p>
    <?php } ?>
  </form>
</body>

</html>