<style>
  * {
    box-sizing: border-box;
    margin: 0;
    padding: 0;
  }

  .list-page {
    margin: 25px auto;
    text-align: center;
  }

  .list-page a {
    color: initial;
    display: inline-block;
    padding: 5px 10px;
    margin: 0 7px;
    background: #eee;
    text-align: center;
  }

  .current-page {
    background: #FF2A2A !important;
    padding: 5px 20px !important;
    color: #fff !important;
    transition: all 0.25s ease;
  }
</style>
<?php
$servername = "localhost";
$username = "root";
$password = "";
$account = "web_cinema";

// Kết nối với cơ sở dữ liệu
$conn = new mysqli($servername, $username, $password, $account);

// Kiểm tra loại phim được chọn (phim đang chiếu hoặc phim sắp chiếu)
$type = isset($_GET['type']) ? $_GET['type'] : 'now_playing';

// Xác định điều kiện truy vấn dựa trên loại phim
if ($type == 'now_playing') {
  $condition = "ngaykhoichieu <= CURDATE()";
} else {
  $condition = "ngaykhoichieu > CURDATE()";
}
$tenPhim = '';
if (isset($_GET['tenPhim'])) {
  $tenPhim = $_GET['tenPhim'];
}
// Phân trang
$rowsPerPage = 3; // Số bản ghi cho mỗi trang
$page = isset($_GET['page']) ? intval($_GET['page']) : 1;

// Tính toán vị trí bắt đầu của trang hiện tại
$offset = ($page - 1) * $rowsPerPage;
// Truy vấn cơ sở dữ liệu để đếm tổng số bản ghi
$re = mysqli_query($conn, 'select * from phim');
//tổng số mẩu tin cần hiển thị
$numRows = mysqli_num_rows($re);
//tổng số trang
$maxPage = ceil($numRows / $rowsPerPage);

// Truy vấn cơ sở dữ liệu để lấy thông tin về các bộ phim với phân trang
$query = "SELECT * FROM phim WHERE $condition AND TenPhim LIKE '%$tenPhim%' LIMIT $offset, $rowsPerPage";
$result = mysqli_query($conn, $query);

// Duyệt qua các kết quả và hiển thị thông tin phim
while ($row = mysqli_fetch_assoc($result)) {
  // Hiển thị thông tin phim theo ý bạn
  echo "<div class='col-md-4'>";
  echo "<div class='card'>";
  echo "<a href='informovie.php?id=" . $row['MaPhim'] . "'>"; // Truyền giá trị id của bộ phim
  echo "<img src='./Admincp/hinhPhim/" . $row['Anh'] . "' class='card-img-top' alt='Ảnh bìa' />";
  echo "</a>";
  echo "<div class='datve'>";
  echo "<a href='./showtime.php' class=\"tag\">Đặt vé</a>";
  echo "</div>";
  echo "<div class='chitiet'>";
  echo "<a href='informovie.php?id=" . $row['MaPhim'] . "'>Chi tiết</a>"; // Truyền giá trị id của bộ phim

  echo "</div>";
  echo "</div>";
  echo "</div>";
}
echo "</div>";
// Đóng kết nối cơ sở dữ liệu
mysqli_close($conn);
// Phân trang
echo "<div class='list-page'>";
if ($page > 1) {
  echo "<a href='" . $_SERVER['PHP_SELF'] . "?page=1'>&lt;&lt;</a> ";
  echo "<a href='" . $_SERVER['PHP_SELF'] . "?page=" . ($page - 1) . "'>&lt;</a> ";
}
for ($i = 1; $i <= $maxPage; $i++) {
  if ($i == $page) {
    echo '<a class="current-page">' . $i . '</a>';
  } else {
    echo "<a href='" . $_SERVER['PHP_SELF'] . "?page=" . $i . "'>" . $i . "</a> ";
  }
}
if ($page < $maxPage) {
  echo "<a href='" . $_SERVER['PHP_SELF'] . "?page=" . ($page + 1) . "'>&gt;</a>";
  echo "<a href='" . $_SERVER['PHP_SELF'] . "?page=" . $maxPage . "'>&gt;&gt;</a>";
}
echo "</div>";
?>