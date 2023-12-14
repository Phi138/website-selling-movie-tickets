<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Document</title>
</head>
<body>
   <h1>Phép tính trên 2 số</h1>
   <form action="ketquaphetinh.php" method="post">
      <table>
         <thead>
            <tr></tr>
         </thead>
         <tr>
            <td>
               Chọn phép tính:
            </td>
            <td>
               <Label><input type="radio" name="pheptinh" id="" value="cong">Cộng</Label>
               <Label><input type="radio" name="pheptinh" id="" value="tru">Trừ</Label>
               <Label><input type="radio" name="pheptinh" id="" value="nhan">Nhân</Label>
               <Label><input type="radio" name="pheptinh" id="" value="chia">Chia</Label>
            </td>

         </tr>
      <tr>
         <td>Số thứ nhất: </td>
         <td><input type="text" name="sothu1" id="" value=""></td>
      </tr>
      <tr>
         <td>Số thứ hai:</td>
         <td><input type="text" name="sothu2" id="" value=""></td>
      </tr>
      <tr>
            <td></td>
            <td><input type="submit" value="Tính"></td>
         </tr>
      </table>    
   </form>
</body>
</html>