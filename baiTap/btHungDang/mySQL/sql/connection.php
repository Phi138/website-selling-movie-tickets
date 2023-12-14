<?php
const HOST = "localhost";
const USERNAME = "root";
const PASSWORD = "";
const DATABASE = "qlbansua";
$conn = mysqli_connect(HOST, USERNAME, PASSWORD, DATABASE);

if (!$conn) {
  die("Lỗi kết nối cơ sở dữ liệu: " . mysqli_connect_error());
}
