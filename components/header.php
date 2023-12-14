<?php
// Kết nối csdl
$servername = "localhost";
$username = "root";
$password = "";
$account = "web_cinema";

// Create connection
$conn = new mysqli($servername, $username, $password, $account);
mysqli_set_charset($conn, 'UTF8');

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
echo "";
// Kiểm tra kết nối
if (!$conn) {
  die("Kết nối thất bại: " . mysqli_connect_error());
}
// Lấy dữ liệu bảng Nhân viên
$sql = "SELECT * FROM nhanvien";
$result = mysqli_query($conn, $sql);
$nhanVienList = array();
if (mysqli_num_rows($result) > 0) {
  while ($row = mysqli_fetch_assoc($result)) {
    $nhanVienList[$row['MaNhanVien']] = $row["TenNhanVien"];
  }
}
?>
<header id="header">
  <!-- top bar -->
  <div id="topbar">
    <div class="links">
      <a href="#" class="link">Hỗ trợ khách hàng</a>
      <a href="#" class="link">Thẻ thành viên</a>
      <div class="link has-dropdown" id="language-dropdown">
        Tiếng Việt
        <i class="fa-solid fa-angle-down"></i>
        <div class="sub-links">
          <a class="sub-link" href="#!">English</a>
        </div>
      </div>
    </div>
    <?php
if (isset($_SESSION["username"])) {
      $username = $_SESSION["username"];

      // Hiển thị tên người dùng và nút đăng xuất
      echo "Xin chào, " . $username . "! ";
      echo '<form method="post" action="components/logout.php">';
      echo '<input type="submit"  name = "dangxuat" value="Đăng xuất">';
      echo '</form>';
    } else {
      // Hiển thị nút đăng nhập
      echo '<div class="actions">
        <a href="#" class="action" id="loginButton">Đăng nhập</a>
        <a href="#" class="action" id="registerButton">Đăng ký</a>
      </div>';

    }
    ?>

  </div>

  <!-- logo -->
  <div id="container_logo">
    <a href="./index.php" class="logo">
      <img src="./assets/img/favicon.svg" alt="logo">
    </a>
  </div>

  <!-- navigation -->
  <nav id="nav">
    <div class="links">
      <a href="./index.php" class="link active">Trang chủ</a>
      <a href="./showtime.php" class="link">Mua vé</a>
      <a href="./sukien.php" class="link">Sự kiện</a>
      <a href="./baitap.php" class="link">Bài tập</a>
    </div>
    <div class="search">
      <form action="" method="get">
        <input type="text" id="searchInput" name="tenPhim" placeholder="Nhập phim cần tìm... " value="<?php echo isset($_GET['tenPhim']) ? $_GET['tenPhim'] : "" ?>">
        <button type="submit" id="searchButton">
          <i class="fa fa-search"></i>
        </button>
      </form>
    </div>
  </nav>
</header>

<div class="modal" id="loginModal">
  <div class="ctn">
    <h1 class="title">Đăng nhập</h1>
    <form action="./components/process_login.php" method="post">
      <div class="form-group">
        <label for="loginUsername">Tên đăng nhập</label>
        <input type="text" id="loginUsername" name="username" required>
      </div>
      <div class="form-group">
        <label for="loginPassword">Mật khẩu</label>
        <input type="password" id="loginPassword" name="password">
      </div>
      <div class="footer">
        <input type="submit" name="dangnhap" value="Đăng Nhập">
        <input type="button" name="huy" value="Hủy">
      </div>
    </form>
  </div>
</div>

<div class=" modal" id="registerModal">
  <div class="ctn">
    <h1 class="title">Đăng ký</h1>
    <form action="./components/process_register.php" method="post">
      <div class="form-group">
        <label for="registerUsername">Tên tài khoản</label>
        <input type="text" id="registerUsername" name="username" required>
      </div>
      <div class="form-group">
        <label for="registerPassword">Mật khẩu</label>
        <input type="password" id="registerPassword" name="registerPassword">
      </div>
      <div class="form-group">
        <label for="confirm-registerPassword">Nhập lại mật khẩu</label>
        <input type="password" id="confirm-registerPassword" name="confirm-registerPassword">
      </div>
      <div class="form-group">
        <label for="registerUsername">Email</label>
        <input type="text" id="email" name="email" required>
      </div>
      <div class="form-group">
        <label for="nhanVien">Chọn Nhân viên</label>
        <select name="nhanVien" id="nhanVien">
          <?php
          foreach ($nhanVienList as $maNhanVien => $tenNhanVien) {
            echo "<option value='$maNhanVien'>$tenNhanVien</option>";
          }
          ?>
        </select>
      </div>
      <div class="footer">
        <input type="submit" name="dangky" value="Đăng Ký">
        <input type="button" name="dangky" value="Hủy">
      </div>
    </form>
  </div>
</div>


<script>
  const btnDangky = document.getElementById("registerButton")
  const modalDangky = document.getElementById("registerModal")
  const btnCloses = document.querySelectorAll(".footer input[type=button]")

  const btnDangnhap = document.getElementById("loginButton")
  const modalDangnhap = document.getElementById("loginModal")
  btnDangky.addEventListener("click", () => {
    modalDangky.style.display = "flex";
  })
  btnDangnhap.addEventListener("click", () => {
    modalDangnhap.style.display = "flex";
  })
  btnCloses.forEach(btnCloses => {
    btnCloses.addEventListener("click", () => {
      modalDangnhap.style.display = "none";
      modalDangky.style.display = "none";

    })
  })
</script>