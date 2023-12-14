<style>
    p{
        text-align: center;
        box-sizing: border-box;
        font-family: 'Courier New', Courier, monospace;
        color: #C70039;
    }
    th, td {
        border: 1px solid black;
        padding: 8px;
        text-align: left;
    }

    th {
        background-color: blue;
        color: white;
    }

    .image-column {
        text-align: center;
    }
    form {
        width: 400px;
        margin: 0 auto;
        padding: 20px;
        background-color: #FFDFDF;
        border: 1px solid #ccc;
        border-radius: 5px;
    }
    h1{
        color:#CE5A67;
    }
    label {
        display: block;
        margin-bottom: 10px;
        font-weight: bold;
    }
    a{
        background-color: #C70039;
        color: white;
        padding: 8px 15px;
        border: none;
        border-radius: 4px;
        cursor: pointer;
        text-decoration: none;
    }
    input[type="text"],
    textarea {
        width: 100%;
        padding: 10px;
        border: 1px solid #ccc;
        border-radius: 4px;
        box-sizing: border-box;
        margin-bottom: 20px;    
    }

    select {
        width: 100%;
        padding: 10px;
        border: 1px solid #ccc;
        border-radius: 4px;
        box-sizing: border-box;
        margin-bottom: 20px;
    }

    input[type="submit"] {
        margin-top: 10px;
        background-color: #CE5A67;
        color: white;
        padding: 10px 20px;
        border: none;
        border-radius: 4px;
        cursor: pointer;
    }

    input[type="submit"]:hover {
        background-color: #C70039;
    }
</style>
<?php 
require('connect.php'); 
if (isset($_GET['id'])) { 
    $id = $_GET['id']; 
    // Truy vấn thông tin khách hàng 
    $query = "SELECT * FROM khach_hang WHERE Ma_khach_hang = '$id'"; 
    $result = mysqli_query($conn, $query); 
    $row = mysqli_fetch_assoc($result); 
    if ($row) { 
        $room_name = $row['Ten_khach_hang']; 
        $Phai = $row['Phai']; 
        $Diachi = $row['Dia_chi']; 
        $Dienthoai = $row['Dien_thoai']; 
        $email = $row['Email']; 
        echo " 
        <form action='' method='POST'> 
            <input type='hidden' name='id' value='$id'> 
            <table>
                <h1>Thông tin khách hàng</h1> 
                <tr>
                    <td>Mã khách hàng:</td>
                    <td>$id</td>
                </tr>
                <tr>
                    <td>Tên khách hàng:</td>
                    <td>$room_name</td>
                </tr>
                <tr>
                    <td>Giới tính:</td>
                    <td>$Phai</td>
                </tr>
                <tr>
                    <td>Địa chỉ:</td>
                    <td>$Diachi</td>
                </tr>
                <tr>
                    <td>Số điện thoại:</td>
                    <td>$Dienthoai</td>
                </tr>
                <tr>
                    <td>Email:</td>
                    <td>$email</td>
                </tr>
            </table>
            <input type='submit' name='confirm_delete' value='Đồng ý'> 
            <a href='bansua.php'>Hủy bỏ</a> 
        </form> 
        <p>Bạn có chắc chắn muốn xóa khách hàng sau không?</p> 
        "; 
    } else { 
        echo "Khách hàng không tồn tại."; 
    } 
} else { 
    echo "Mã khách hàng không được cung cấp."; 
} 
// Xử lý khi người dùng nhấn nút "Đồng ý" để xóa khách hàng 
if (isset($_POST['confirm_delete'])) { 
    if (isset($_POST['id'])) { 
        // Lấy thông tin từ form 
        $id = $_POST['id']; 
        // Xóa khách hàng từ cơ sở dữ liệu 
        $delete_query = "DELETE FROM khach_hang WHERE Ma_khach_hang = '$id'"; 
        mysqli_query($conn, $delete_query); 
        // Điều hướng về trang danh sách khách hàng 
        header("Location: bansua.php"); 
        exit(); 
    } else { 
        echo "Mã khách hàng không được cung cấp."; 
    } 
} 
?>