<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="xulithongtin.php" method="post">
        <table>
            <thead>
                <tr>
                    Nhập thông tin của bạn 
                </tr>
            </thead>
            <tr>
                <td>Họ tên :</td>
                <td><input type="text" name="hoten" id=""></td>
            </tr>
            <tr>
                <td>Địa Chỉ :</td>
                <td><input type="text" name="diachi" id=""></td>
            </tr>
            <tr>
                <td>Số điện thoại :</td>
                <td>
                    <label ><input type="radio" name="nam" id="" value="Nam">Nam</label>
                </td>
                <td>
                    <label ><input type="radio" name="nu" id="" value="Nữ">Nữ</label>
                </td>
            </tr>
            <tr>
                <td>Quốc tịch</td>
                <td><select name="quoctich">
                        <option value="Việt Nam">Việt Nam</option>
                        <option value="Mỹ">Mỹ</option>
                        <option value="Canada">Canada</option>
                        <option value="Úc">Úc</option>
                    </select></td>
            </tr>
            <tr>
                <td>Các môn đã học :</td>
                <td>
                    <label ><input type="radio" name="php" id="" value="php">php</label>
                </td>
                <td>
                    <label ><input type="radio" name="C#" id="" value="C#">Nữ</label>
                </td>
                <td>
                    <label ><input type="radio" name="XML" id="" value="XML">Nam</label>
                </td>
                <td>
                    <label ><input type="radio" name="Python" id="" value="Python">Nữ</label>
                </td>
            </tr>
        </table>
    </form>
</body>
</html>