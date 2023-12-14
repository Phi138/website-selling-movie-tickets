<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script>
        function kiemtra(){
            var sothunhat = document.getElementById("sothunhat").value;
            var sothuhai = document.getElementById("sothuhai").value;
            if(sothunhat.trim()=="" || sothuhai.trim()=="" || isNaN(sothunhat) || isNaN(sothuhai)){
                alert("Vui long nhap so");
                return false;
            }
            return true;
        }
    </script>
</head>
<body>
    
    <form action="xulythongtin.php" method="post" onsubmit="return kiemtra()">
        <table>
            <thead>
                <th colspan='4'>PHÉP TÍNH TRÊN 2 SỐ</th>
            </thead>
            <tr>
                <td>Chọn phép tính</td>
                <td>
                   Cộng <input  type="radio" name="cong" id="" value="Cộng" checked>
                </td>
                <td>Trừ <input type="radio" name="cong" id="" value="Trừ"></td>
                <td>Nhân <input type="radio" name="cong" id="" value="Nhân"></td>
                <td>Chia <input type="radio" name="cong" id="" value="Chia"></td>
            </tr>
            <tr>
                <td>Số thứ nhất: </td>
                <td colspan='4'><input type="text" name="sothunhat" id="sothunhat" ></td>
            </tr>
            <tr>
                <td>Số thứ hai: </td>
                <td colspan='4'><input type="text" name="sothuhai" id="sothuhai" ></td></tr>
            <tr>
            <td colspan='4' align="center">
                   <input type="submit" value="Tính" name="tinh">
                </td>
            </tr>
        </table>
    </form>
</body>
</html>