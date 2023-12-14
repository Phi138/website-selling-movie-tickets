<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <?php
    class Phanso
    {
        public $tuso1, $mauso1, $tuso2, $mauso2;
        function findGCD($a, $b)
        {
            while ($b != 0) {
                $temp = $b;
                $b = $a % $b;
                $a = $temp;
            }
            return $a;
        }
        public function Cong()
        {
            $tuso = ($this->tuso1 * $this->mauso2 + $this->tuso2 * $this->mauso1);
            $mauso = ($this->mauso1 * $this->mauso2);
            $UCLN = $this->findGCD($tuso, $mauso);
            $tuso = $tuso / $UCLN;
            $mauso = $mauso / $UCLN;
            return $tuso . '/' . $mauso;
        }
        public function Tru()
        {
            $tuso = ($this->tuso1 * $this->mauso2 - $this->tuso2 * $this->mauso1);
            $mauso = ($this->mauso1 * $this->mauso2);
            $UCLN = $this->findGCD($tuso, $mauso);
            $tuso = $tuso / $UCLN;
            $mauso = $mauso / $UCLN;
            return $tuso . '/' . $mauso;
        }
        public function Nhan()
        {
            $tuso = ($this->tuso1 * $this->tuso2);
            $mauso = ($this->mauso1 * $this->mauso2);
            $UCLN = $this->findGCD($tuso, $mauso);
            $tuso = $tuso / $UCLN;
            $mauso = $mauso / $UCLN;
            return $tuso . '/' . $mauso;
        }
        public function Chia()
        {
            $tuso = ($this->tuso1 * $this->mauso2);
            $mauso = ($this->mauso1 * $this->tuso2);
            $UCLN = $this->findGCD($tuso, $mauso);
            $tuso = $tuso / $UCLN;
            $mauso = $mauso / $UCLN;
            return $tuso . '/' . $mauso;
        }
    }
    $str = NULL;
    if (isset($_POST['kq'])) {
        $ps = new Phanso;
        $ps->tuso1 = $_POST['ts1'];
        $ps->tuso2 = $_POST['ts2'];
        $ps->mauso1 = $_POST['ms1'];
        $ps->mauso2 = $_POST['ms2'];
        if ($ps->mauso1 != 0 && $ps->mauso2 != 0) {
        } else {
            $ms1 = "";
            $ms2 = "";
            echo "Nhập mẫu số khác 0";
        }
    }
    ?>
    <form action="" method="post">
        <table>
            <thead>
                <th colspan="3" , align="left">Chọn các phép tính trên phân số</th>
            </thead>
            <tr>
                <td>Nhập phân số thứ 1:</td>
                <td>
                    Tử số:<input type="text" name="ts1" id="" value="<?php if (isset($_POST['ts1'])) echo $_POST['ts1']; ?>">
                </td>
                <td>
                    Mẫu số:<input type="text" name="ms1" id="" value="<?php if (isset($_POST['ms1'])) echo $_POST['ms1']; ?>">
                </td>
            </tr>
            <tr>
                <td>Nhập phân số thứ 2:</td>
                <td>
                    Tử số:<input type="text" name="ts2" id="" value="<?php if (isset($_POST['ts2'])) echo $_POST['ts2']; ?>">
                </td>
                <td>
                    Mẫu số:<input type="text" name="ms2" id="" value="<?php if (isset($_POST['ms2'])) echo $_POST['ms2']; ?>">
                </td>
            </tr>
        </table>
        <fieldset style="width: 600px;">
            <legend>Chọn phép tính</legend>
            <tr>
                <td>
                    <input type="radio" name="cpt" id="" value="Cộng" <?php if (isset($_POST['cpt']) && $_POST['cpt'] == "Cộng") echo "checked"; ?> checked>Cộng
                    <input type="radio" name="cpt" id="" value="Trừ" <?php if (isset($_POST['cpt']) && $_POST['cpt'] == "Trừ") echo "checked"; ?>>Trừ
                    <input type="radio" name="cpt" id="" value="Nhân" <?php if (isset($_POST['cpt']) && $_POST['cpt'] == "Nhân") echo "checked"; ?>> Nhân
                    <input type="radio" name="cpt" id="" value="Chia" <?php if (isset($_POST['cpt']) && $_POST['cpt'] == "Chia") echo "checked"; ?>>Chia
                </td>
            </tr>
        </fieldset>
        <table>
            <tr>
                <td><input type="submit" name="kq" value="Kết quả"></td>
            </tr>
            <tr>
                <td>
                    <textarea cols="70" rows="10" disabled="disabled"><?php echo $str; ?></textarea>
                </td>
            </tr>
        </table>


    </form>
</body>

</html>