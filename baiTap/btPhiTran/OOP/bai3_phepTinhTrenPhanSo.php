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
    if(isset($_POST['ts1'])){
        $ts1=trim($_POST['ts1']);
    }
    else $ts1="";

    if(isset($_POST['ms1'])){
        $ms1=trim($_POST['ms1']);
    }
    else $ms1="";

    if(isset($_POST['ts2'])){
        $ts2=trim($_POST['ts2']);
    }
    else $ts2="";

    if(isset($_POST['ms2'])){
        $ms2=trim($_POST['ms2']);
    }
    else $ms2="";

    if (isset($_POST['kq'])){
        if(!is_numeric($ts1))
            $ts1="";
        if(!is_numeric($ts2))
            $ts2="";
        if(!is_numeric($ms1) || $ms1==0)
            $ms1="";
        if(!is_numeric($ms2) || $ms2==0)
            $ms2="";

        if(is_numeric($ts1) && is_numeric($ts2) && is_numeric($ms1) && is_numeric($ms2)){
            $ps = new Phanso;
            $ps->tuso1 = $ts1;
            $ps->tuso2 = $ts2;
            $ps->mauso1 = $ms1;
            $ps->mauso2 = $ms2;
            if($_POST['cpt']=="Cộng")
                $str="Phép cộng là: ".$ps->tuso1."/".$ps->mauso1." + ".$ps->tuso2."/".$ps->mauso2." = ".$ps->Cong();
            if($_POST['cpt']=="Trừ")
                $str="Phép trừ là: ".$ps->tuso1."/".$ps->mauso1." - ".$ps->tuso2."/".$ps->mauso2." = ".$ps->Tru();
            if($_POST['cpt']=="Nhân")
                $str="Phép nhân là: ".$ps->tuso1."/".$ps->mauso1." * ".$ps->tuso2."/".$ps->mauso2." = ".$ps->Nhan();
            if($_POST['cpt']=="Chia")
                $str="Phép chia là: ".$ps->tuso1."/".$ps->mauso1." / ".$ps->tuso2."/".$ps->mauso2." = ".$ps->Chia();
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
                    Tử số:<input type="text" name="ts1" id="" value="<?php echo $ts1; ?>" placeholder="Nhập số!">
                </td>
                <td>
                    Mẫu số:<input type="text" name="ms1" id="" value="<?php echo $ms1; ?>" placeholder="Nhập số khác 0!">
                </td>
            </tr>
            <tr>
                <td>Nhập phân số thứ 2:</td>
                <td>
                    Tử số:<input type="text" name="ts2" id="" value="<?php echo $ts2; ?>" placeholder="Nhập số!">
                </td>
                <td>
                    Mẫu số:<input type="text" name="ms2" id="" value="<?php echo $ms2 ?>" placeholder="Nhập số khác 0!">
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
                <td >
                    <textarea cols="83" rows="10" disabled="disabled"><?php echo $str; ?></textarea>
                </td>
            </tr>
        </table>


    </form>
</body>

</html>