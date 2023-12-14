<?php

if(isset($_POST['dangxuat'])){
    session_start();

    // Xóa tất cả các session
    session_unset();

    // Hủy bỏ phiên làm việc
    session_destroy();

    // Chuyển hướng người dùng về trang đăng nhập
    header("Location: ../index.php");
    exit();
}
?>