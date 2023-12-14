<?php
include "./CSQL/config/connect.php";

// Lấy giá trị id từ tham số GET
$id = isset($_GET['id']) ? $_GET['id'] : '';

// Kiểm tra giá trị id hợp lệ
if (!empty($id)) {
  // Truy vấn cơ sở dữ liệu để lấy thông tin chi tiết về bộ phim
  $query = "SELECT * FROM phim WHERE MaPhim = ?";
  $stmt = mysqli_prepare($conn, $query);
  mysqli_stmt_bind_param($stmt, "s", $id);
  mysqli_stmt_execute($stmt);
  $result = mysqli_stmt_get_result($stmt);

  if (mysqli_num_rows($result) > 0) {
    // Hiển thị thông tin chi tiết về bộ phim
    $row = mysqli_fetch_assoc($result);
    $imageUrl = $row["Anh"];
    $banner = $row["banner"];

    // Hiển thị phần HTML và CSS
    echo "<style>
      .hero:before {
        content: '';
        width: 100%;
        height: 100%;
        position: absolute;
        overflow: hidden;
        top: 0;
        left: 0;
        background: red;
        background-image: url('Admincp/hinhPhim/" . $banner . "');
        z-index: -1;
        transform: skewY(-2.2deg);
        transform-origin: 0 0;
        backface-visibility: hidden;
        -webkit-backface-visibility: hidden;
      }
    </style>";

    // Hiển thị hình ảnh
    echo '<a href="#"><img src="Admincp/hinhPhim/' . $imageUrl . '" alt="cover" class="cover" /></a>';
    echo "<div class='hero'>" . $row['Anh'];
    echo "<div class='details'>";
    echo "<div class='title1'>" . $row['TenPhim'] . " </div>";
    echo "</div>"; // end details
    echo "</div>"; // end hero
    echo "<div class='description'>";
    echo "<div class='column1'>";

    $sql1 = "SELECT phim.*, theloai.TenTL FROM phim JOIN theloai ON phim.MaTL = theloai.MaTL WHERE MaPhim = ?";
    $stmt1 = $conn->prepare($sql1);
    $stmt1->bind_param("s", $id);
    $stmt1->execute();
    $result1 = $stmt1->get_result();

    if ($result1->num_rows > 0) {
      while ($row1 = $result1->fetch_assoc()) {
        echo "<p> Thể loại: " . $row1['TenTL'] . "</p>";
      }
    }

    $sql1 = "SELECT phim.*, quocgia.TenQuocGia FROM phim JOIN quocgia ON phim.MaQuocGia = quocgia.MaQuocGia WHERE MaPhim = ?";
    $stmt1 = $conn->prepare($sql1);
    $stmt1->bind_param("s", $id);
    $stmt1->execute();
    $result1 = $stmt1->get_result();

    if ($result1->num_rows > 0) {
      while ($row1 = $result1->fetch_assoc()) {
        echo "<p> Quốc gia: " . $row1['TenQuocGia'] . "</p>";
      }
    }

    echo '<a href="Admincp/hinhPhim/' . $row['Trailer'] . '" class="tag">Xem trailer</a>';
    echo "<a href='./showtime.php' class=\"tag\">Đặt vé</a>";
    echo "</div>"; // end column1
    echo "<div class='column2'>";
    $description = $row['Mota'];

    // Hiển thị chỉ 400 từ của mô tả
    $shortDescription = substr($description, 0, 400);

    // Kiểm tra nếu mô tả đã được rút gọn
    $isCollapsed = strlen($shortDescription) < strlen($description);

    echo "<p>";

    if ($isCollapsed) {
     
      echo $shortDescription;
      echo "<a href='#' onclick=\"expandDescription(event, '" . $description . "')\">read more</a>";
    } else {
      echo $description;
    }

    echo "</p>";
    echo "</div>"; // end column2
    echo "</div>"; // end description
  } else {
    echo "Không tìm thấy thông tin phim.";
  }
} else {
  echo "ID không hợp lệ.";
}

// Đóng kết nối
mysqli_close($conn);
?>
<script>
function expandDescription(event, fullDescription) {
  event.preventDefault();
  const descriptionElement = event.target.parentElement;
  descriptionElement.innerHTML = fullDescription;
}
</script>