<?php
// 1. Kết nối CSDL
$conn = mysqli_connect('localhost', 'root', '', 'qlbansua')
or die ('Không thể kết nối tới database'. mysqli_connect_error());
// 5. Giải phóng kết quả khỏi vùng nhớ và Đóng kết nối

?>