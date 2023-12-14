<?php
$list = [
  "CNTT" => [
    "KTPM" => ["Hang", "Hung"],
    "HTTT" => ["Thuy", "Ngan"],
    "MMT" => ["Huy", "Phuong"],
  ],
  "NN" => [
    "BPD" => ["Binh", "Hoa"],
    "DL" => ["Quynh", "Khanh"],
  ],
];

foreach ($list as $faculty => $courses) {
  echo " <h2>Khoa: $faculty <br></h2>";

  foreach ($courses as $course => $teachers) {
    echo "<h3> - Bộ môn: $course<br></h3>";

    foreach ($teachers as $teacher) {
      echo "    + Giảng viên: " . $teacher . "<br>";
    }
  }
}


$strInfo = "Đặng Đình Hùng-62.CNTT-3-hung.dd.62cntt@ntu.edu.vn";
$arrInfo = explode("-", $strInfo);
$s = implode("ntu", $arrInfo);
print_r($arrInfo);
