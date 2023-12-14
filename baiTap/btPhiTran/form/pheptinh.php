<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHEP TINH HAI SO</title>
    <script>
        function kiemTra() {
            var stn=document.getElementById("stn").value;
            var sth=document.getElementById("sth").value;
            if(stn.trim()=="" || sth.trim()=="" || isNaN(stn) || isNaN(sth)){
                alert("Vui lòng nhập số!");
                return false;
            }
            return true;
        }
    </script>
</head>
<body>
    <style>
        th{
            color: blue;
        }
        .cot1{
            text-align: right;
            font-weight: bold;
        }
        .hang1{
            color: red;
        }
        .hang1 td:not(:first-child){
            width: 70px;
        }
        input[type="submit"] {
            background-color: #fff;
            color: #007bff;
            border: 1px solid blue;
            cursor: pointer;
            font-weight: bold;
            transition: background-color 0.3s ease;
        }
        input[type="submit"]:hover {
            background-color: #0056b3;
            color: #fff;
        }
    </style>
    <form action="ketquapheptinh.php" method="get" onsubmit="return kiemTra()">
        <table>
            <thead>
                <th colspan="5">PHÉP TÍNH TRÊN HAI SỐ</th>
            </thead>
            <tr  class="hang1">
                <td class="cot1">Chọn phép tính:</td>
                <td>Cộng<input type="radio" name="cong" id="" value="Cộng" checked></td>
                <td>Trừ<input type="radio" name="cong" id="" value="Trừ"></td>
                <td>Nhân<input type="radio" name="cong" id="" value="Nhân"></td>
                <td>Chia<input type="radio" name="cong" id="" value="Chia"></td>
            </tr>
            <tr>
                <td class="cot1" style="color: blue">Số thứ nhất:</td>
                <td colspan="4">
                    <input type="text" name="stn" id="stn" >
                </td>
            </tr>
            <tr>
                <td  class="cot1" style="color: blue">Số thứ hai:</td>
                <td colspan="4">
                    <input type="text" name="sth" id="sth" >
                </td>
            </tr>
            <tr>
                <td></td>
                <td colspan="4">
                    <input type="submit" value="Tính" name="tinh">
                </td>
            </tr>
        </table>
    </form>
</body>
</html>