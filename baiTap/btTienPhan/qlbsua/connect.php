<?php 
    define ('DB_USER','root');
    define ('DB_PASSWORD','');
    define ('DB_HOST', 'localhost');
    define ('DB_NAME', 'qlbansua');
    $conn = mysqli_connect ('localhost', 'root', '', 'qlbansua') 

    OR die ('Không thể kết nối tới database: ' . mysqli_connect_error() );

$sql = 'select Ma_khach_hang,Ten_khach_hang,Phai,Dia_Chi,Dien_thoai,email from khach_hang';

$result = mysqli_query($conn, $sql);
?>