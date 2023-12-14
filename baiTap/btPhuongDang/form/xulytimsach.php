<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Tìm sách</h1>
    <form action="xlTimsach.php" method="post">
        Từ khóa: <input type="text" name="txtTukhoa" value=""/>
        <input type="submit" value="Tìm"/>
    </form>
    $sTukhoa = $_POST["txtTukhoa"];
    Từ khóa tìm sách là: <?php echo $sTukhoa;?>
    </br>
</body>
</html>