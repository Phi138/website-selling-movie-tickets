<?php 
require('connect.php');
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    
    // Thực hiện câu truy vấn xóa khách hàng
    if ($row) {
        $room_name = $row['Ten_khach_hang'];
        $Phai = $row['Phai'];
        $Diachi = $row['Dia_chi'];
        $Dienthoai = $row ['Dien_Thoai'];
        $email = $row['Email'];
        echo "
        <h1>Xóa Khách hàng</h1>
        <p>Bạn có chắc chắn muốn xóa khách hàng sau không?</p>
        <h2>Mã khách hàng: $id</h2>
        <p>Tên khách hàng: $room_name</p>
        <p>Giới tính: $Phai</p>
        <p>Địa chỉ: $Diachi</p>
        <p>Số điện thoại: $Dienthoai</p>
        <p>Email: $email</p>
        <form action='' method='POST'>
            <input type='hidden' name='id' value='$id'>
            <input type='submit' name='confirm_delete' value='Đồng ý'>
            <a href='room_list.php'>Hủy bỏ</a>
        </form>
        ";
    } else {
        echo "Khách hàng không tồn tại.";
    }
} else {
    echo "Mã khách hàng không được cung cấp.";
}
// Xử lý khi người dùng nhấn nút "Đồng ý" để xóa khách hàng
if (isset($_POST['confirm_delete'])) {
    if(isset($_POST['id'])){
        // Lấy thông tin từ form
        $id = $_POST['id'];
        // Xóa khách hàng từ cơ sở dữ liệu
        $delete_query = "DELETE FROM khach_hang WHERE Ma_khach_hang='$id'";
        mysqli_query($conn, $delete_query);
        // Điều hướng về trang danh sách khách hàng
        header("Location: room_list.php");
        exit();
    } else {
        echo "Mã khách hàng không được cung cấp.";
    }
}

    // Kiểm tra xem khách hàng có tồn tại hay không
    
?>