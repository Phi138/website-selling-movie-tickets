<!-- 
  Giảm dần theo thứ hạng 
  Tăng dần theo tên bài hát
-->
<?php
$songs = [
  "1" => "Hãy trao cho anh",
  "3" => "Chắc ai đó sẽ về",
  "4" => "Đừng về trễ",
  "5" => "Chúng ta của hiện tại",
  "2" => "Nơi này có anh",
];
// Giảm dần theo thứ hạng
ksort($songs);

//Tăng dần theo tên bài hát

// asort($songs);

foreach ($songs as $song => $name) {
  echo $song . ": " . $name . "<br>";
}
