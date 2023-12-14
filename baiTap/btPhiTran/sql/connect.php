<?php
    $conn = mysqli_connect ('localhost', 'root', '', 'qlbansua') 
    OR die ('Không thể kết nối tới database: ' . mysqli_connect_error() );

    mysqli_set_charset($conn, 'UTF8');
?>