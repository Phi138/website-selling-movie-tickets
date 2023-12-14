<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Danh sách sữa</title>
  <style>
    * {
      box-sizing: border-box;
      margin: 0;
      padding: 0;
    }

    html {
      scroll-behavior: smooth;
    }

    a {
      text-decoration: none;
    }

    a:active {
      color: inherit;
    }

    body {
      padding: 20px;
      display: flex;
      flex-direction: column;
      justify-content: center;
      align-items: center;
      margin: 7px;
    }

    .list-card {
      display: grid;
      grid-template-columns: repeat(4, minmax(0, 180px));
      gap: 20px;
      grid-auto-flow: row;
      justify-content: space-between;
    }

    .card-container {
      height: 100%;
      border: 1px solid #eee;
      border-radius: 15px;
      display: flex;
      flex-direction: column;
      overflow: hidden;
      transition: all 0.25s ease;
    }

    .card-container:hover {
      border: 1px solid #1AACAC;
    }

    .imgs {
      width: 100%;
      height: 200px;
      flex: 0;
    }

    .imgs img {
      width: 100%;
      object-fit: cover;
      object-position: center;
      height: 100%;
    }

    .content {
      background: #eee;
      display: flex;
      flex-direction: column;
      flex: 1;
      padding: 0 8px 10px;
    }

    .title {
      margin-top: auto;
      margin-bottom: 5px;
      font-size: 20px;
      color: #1AACAC;
    }

    .weight {
      margin-bottom: 5px;
      color: #000;
    }

    .cost {
      color: #000;
      margin-bottom: 5px;
    }

    span {
      color: #1AACAC;
      font-weight: bold;
      margin-right: 8px;
    }

    .btns {
      text-align: center;
      margin-top: 15px;
    }

    .btns button {
      margin: 0 3px;
      cursor: pointer;
      border: none;
      outline: none;
      color: #fff;
      background: #2E97A7;
      padding: 3px 7px;
      border-radius: 8px;
      transition: all 0.25s ease;
    }

    .btns button:hover {
      transform: translateY(-2px);
    }

    .list-page {
      margin-top: 25px;
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
      background: #1AACAC !important;
      padding: 5px 20px !important;
      color: #fff !important;
      transition: all 0.25s ease;
    }

    .actions {
      margin-bottom: 25px;
    }
  </style>
</head>

<body>
  <div class="actions">
    <form action="">
      <table>
        <tr>
          <td>
            Loại sữa:
            <select name="milk-type" id="milk-type">
            </select>
          </td>
          <td>
            Hãng sữa:
            <select name="milk-branch" id="milk-branch">
            </select>
          </td>
        </tr>
        <tr>
          <td> Tên sữa: <input type="text" name="nameMilk"></td>
          <td> <input type="submit" name="timkiem" value="tìm kiếm"></td>
        </tr>
      </table>
    </form>

  </div>

  <?php
  require_once("../../sql/connection.php");

  $rowsPerPage = 20; // Số phần tử cho phép hiển thị trên trang (vì bảng sữa có 43 record nên tổng trang có thể có là 43 / $rowsPerPage = 9)

  if (!isset($_GET['page'])) {
    $_GET['page'] = 1;
  }
  //vị trí của mẩu tin đầu tiên trên mỗi trang
  $offset = ($_GET['page'] - 1) * $rowsPerPage;
  $re = mysqli_query($conn, 'select * from sua');
  //tổng số mẩu tin cần hiển thị
  $numRows = mysqli_num_rows($re);
  //tổng số trang
  $maxPage = ceil($numRows / $rowsPerPage);

  //lấy $rowsPerPage mẩu tin, bắt đầu từ vị trí $offset
  $querySelect = "SELECT * FROM sua LIMIT  $offset, $rowsPerPage";
  $result = mysqli_query($conn, $querySelect);
  echo '<div class="list-card">';
  if (mysqli_num_rows($result) != 0) {
    while ($rows = mysqli_fetch_assoc($result)) {
      $maSua = $rows['Ma_sua'];
      $tenSua = $rows['Ten_sua'];
      $trongLuong = $rows['Trong_luong'];
      $donGia = $rows['Don_gia'];
      $hinh = $rows['Hinh'];
      echo '
      <a href="./list-card-detail.php?Ma_sua=' . $maSua . '" class="card-container">
          <div class="imgs">
            <img src="../../img/' . $hinh . '" alt="Nô hình =))">
          </div>
          <div class="content">
            <h4 class="title">' . $tenSua . '</h4>
            <p class="weight"><span>Trọng lượng:</span>' . $trongLuong . '</p>
            <p class="cost"><span>Giá:</span> ' . $donGia . ' VNĐ</p>
            <div class="btns">
              <button>Đặt hàng</button>
              <button>Mua ngay</button>
            </div>
          </div>
      </a>';
    }
  }
  echo '</div>';
  // end 

  // button prev next
  echo "<div class='list-page'>";
  if ($_GET['page'] > 1) {
    echo "<a href='" . $_SERVER['PHP_SELF'] . "?page=1'>&lt;&lt;</a> ";
    echo "<a href='" . $_SERVER['PHP_SELF'] . "?page=" . ($_GET['page'] - 1) . "'>&lt;</a> ";
  }
  for ($i = 1; $i <= $maxPage; $i++) {
    if ($i == $_GET['page']) {
      echo '<a class="current-page">' . $i . '</a>';
    } else {
      echo "<a href='" . $_SERVER['PHP_SELF'] . "?page=" . $i . "'>" . $i . "</a> ";
    }
  }
  if ($_GET['page'] < $maxPage) {
    echo "<a href='" . $_SERVER['PHP_SELF'] . "?page=" . ($_GET['page'] + 1) . "'>&gt;</a>";
    echo "<a href='" . $_SERVER['PHP_SELF'] . "?page=" . $maxPage . "'>&gt;&gt;</a>";
  }
  echo "<br/>";
  // echo "<a href='../sign-in-up/main.php'>Trở về</a>";
  echo "</div>";
  ?>



</body>

</html>