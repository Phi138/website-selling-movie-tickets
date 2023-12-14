<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Frameset//EN">
<html>
<head>
<style>
    body {
        font-family: Arial, sans-serif;
    }
    table {
        width: 70%;
        
        margin: 0 auto;
    }
    th, td {
        padding: 8px;
        border: 1px solid black;
    }
    th {
        background-color: #eeeeee;
        font-weight: bold;
    }
    h3 {
        margin: 0;
        text-align: center;
    }
    p {
        margin: 0;
    }
    .center {
        text-align: center;
    }
    .error {
        color: red;
        font-weight: bold;
    }
    @media only screen and (max-width: 600px) {
        table {
            width: 100%;
        }
    }
</style>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title>Tìm kiếm khách hàng</title>
</head>
<body>
<form action="" method="get">
    <table bgcolor="#eeeeee" align="center" width="70%" border="0" 
           cellpadding="1" cellspacing="1" style="border-collapse: collapse;">
        <tr>
            <td class="center"><font color="blue"><h3>TÌM KIẾM THÔNG TIN KHÁCH HÀNG</h3></font></td>
        </tr>
        <tr>
            <td class="center">Mã khách hàng: <input type="text" name="makh" size="30" 
                    value="<?php if(isset($_GET['makh'])) echo $_GET['makh'];?>">
                <input type="submit" name="tim" value="Tìm kiếm"></td>
        </tr>
    </table>
</form>
<?php 
if($_SERVER['REQUEST_METHOD'] == 'GET') {
    if(empty($_GET['makh'])) {
        echo "<p class='center error'>Vui lòng nhập mã khách hàng</p>";
    } else {
        $makh = $_GET['makh'];    
        require('connect.php');
        $query = "SELECT khach_hang.*,So_hoa_don,Tri_gia
                  FROM khach_hang,hoa_don
                  WHERE khach_hang.Ma_khach_hang=hoa_don.Ma_khach_hang
                  AND khach_hang.Ma_khach_hang LIKE '%$makh%'";
        $result = mysqli_query($conn, $query);        
        if(mysqli_num_rows($result) <> 0) {
            $rows = mysqli_num_rows($result);
            echo "<div class='center'><b>Có $rows khách hàng được tìm thấy.</b></div><br>";
            while($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
                echo '<table border="1">
                <h3> Thông tin khách hàng</h3>
                <tr>
                    <th>Họ tên</th>
                    <th>Ngày sinh</th>
                    <th>Giới tính</th>
                </tr>
                <tr>
                    <td>'.$row['Ten_khach_hang'].'</td>
                    <td>'.$row['Ma_khach_hang'].'</td>
                    <td>'.$row['Phai'].'</td>
                </tr>
                </table>';
                echo '<table border ="1">
                <h3> Hóa đơn đã mua</h3>
                <tr>
                    <th>Số hóa đơn</th>
                    <th>Trị giá</th>
                </tr>
                <tr>
                    <td>'.$row['So_hoa_don'].'</td>
                    <td>'.$row['Tri_gia'].'</td>
                </tr>
            </tr>
                </table>';
            }
        } else {
            echo "<div class='center'><b>Không tìm thấy khách hàng này.</b></div>";
        }
    }
}
?>

</body>
</html>