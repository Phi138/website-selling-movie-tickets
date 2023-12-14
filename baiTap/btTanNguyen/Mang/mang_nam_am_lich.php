<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tính năm âm lịch</title>
    
    <style>
    body {
        font-family: Arial, sans-serif;
        background-color: #f4f4f4;
        padding: 20px;
    }
    table {
        border-collapse: collapse;
        width: 100%;
        background-color: #fff;
        border: 1px solid #ddd;
    }
    th, td {
        border: 1px solid #ddd;
        padding: 8px;
        text-align: left;
    }
    th {
        background-color: #f2f2f2;
    }
    input[type="text"], input[type="submit"] {
        padding: 8px;
        border: 1px solid #ddd;
        border-radius: 4px;
    }
    input[type="submit"] {
        background-color: #4CAF50;
        color: #fff;
        cursor: pointer;
    }
    input[type="submit"]:hover {
        background-color: #45a049;
    }
    input[type="text"][disabled] {
        background-color: #f4f4f4;
        color: #888;
        cursor: not-allowed;
    }
    .nowrap {
        white-space: nowrap;
    }
    .center-image {
        display: flex;
        justify-content: center;
        align-items: center;
        height: 300px;
        background-color: #f9f9f9;
        border: 1px solid #ddd;
        margin-top: 20px;
    }

    .center-image img {
        width: 200px;
        height: auto;
    }
</style>
</head>
<body>
    <?php 
    $mang_can = array("Qúy", "Gíap", "Ất", "Bính", "Đinh", "Mậu", "Kỷ", "Canh", "Tân", "Nhâm");
    $mang_chi = array("Hợi", "Tý", "Sửu", "Dần", "Mão", "Thìn", "Tỵ", "Ngọ", "Mùi", "Thân", "Dậu", "Tuất");
    $mang_hinh = array("heo.jpg", "chuot.jpg", "trau.jpg", "ho.jpg", "meo.jpg", "rong.jpg", "ran.jpg", "ngua.jpg", "de.jpg", "khi.jpg", "ga.jpg", "cho.jpg");
    
    if(isset($_POST['tinh'])) {
        $duonglich = trim($_POST['duonglich']);
        if(is_numeric($duonglich)){
            $can = $mang_can[($duonglich-3) % 10];
            $chi = $mang_chi[($duonglich-3) % 12];
            $hinhanh = $mang_hinh[($duonglich-3) % 12];
            $amlich = $can . ' ' . $chi;
        }
    }
    ?>
    <form action="" method="post">
        <table>
            <thead>
                <tr>
                    <th colspan="3">Tính năm âm lịch</th>
                </tr>
            </thead> 
            <tr>
                <td class="nowrap">Năm dương lịch</td>
                <td></td>
                <td>Năm âm lịch</td>
            </tr>
            <tr>
                <td class="nowrap"><input type="text" name="duonglich" id="" value="<?php echo isset($duonglich) ? $duonglich : ''; ?>"></td>
                <td class="nowrap"><input type="submit" value="=>" name="tinh"></td>
                <td>
                    <input type="text" name="amlich" id="" disabled="disabled" value="<?php echo isset($amlich) ? $amlich : ''; ?>">
                </td>
            </tr>
                
            </tr>
        </table>
      
                    <div class="center-image">
                    <?php if (isset($hinhanh)): ?>
                        <img src="image/<?php echo $hinhanh; ?>" alt="Hình ảnh">
                    <?php endif; ?> 
</div>
    </form>
</body>
</html>