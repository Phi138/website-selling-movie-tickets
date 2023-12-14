<?php include "./CSQL/config/connect.php";
$khachHang='';
$email='';
if ($_SERVER["REQUEST_METHOD"] === "POST") {
  $tenPhim = $_POST["tenPhim"];
  $lichChieu = $_POST["lichChieu"];
  $maPhong = $_POST["maPhong"];
  $totalTickets = $_POST["totalTickets"];
  $MalichPhim = $_POST["MalichPhim"];
  $seats = $_POST["seats"];
  $malichchieu = $_POST["Malichchieu"];
  
  // Truy vấn bảng giá vé để lấy giá vé cho từng loại vé
  $query = "SELECT MaGiaVe, GiaVe ,loaive.Maloaive,loaive.Tenloaive
   FROM giave
   INNER JOIN loaive ON giave.Maloaive=loaive.Maloaive";
  $result = mysqli_query($conn, $query);
  $prices = array();
  $loaiveArr = array();
  while ($row = mysqli_fetch_assoc($result)) {
    $prices[$row['MaGiaVe']] = $row['GiaVe'];
    $loaiveArr[$row['Maloaive']] = $row['Maloaive']; // Lưu tên loại vé vào mảng
  }

  // Lấy số lượng vé người lớn và vé U22 từ form
  $adultTickets = $_POST['adultTickets'];
  $u22Tickets = $_POST['u22Tickets'];

  // Tính tổng tiền vé
  $totalPrice = ($prices['GV01'] * $adultTickets) + ($prices['GV02'] * $u22Tickets);
}
//Truy vấn đến bảng phương thức thanh toán 
$queryPTTT = "SELECT pt.MaPTTT,pt.TenPTTT
              FROM pttt pt";
$resultpttt = mysqli_query($conn, $queryPTTT);


?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>5thWonder.</title>
  <link rel="icon" type="image/x-icon" href="./assets/img/favicon.svg">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <link rel="stylesheet" href="./assets/css/main.css">
  <link rel="stylesheet" href="./assets/fonts/stylesheet.css">
  <link rel="stylesheet" href="./assets/css/_showtime.css">
  <link rel="stylesheet" href="./assets/css/_branch.css">
  <style>
    body {
      font-family: Arial;
      font-size: 17px;
      padding: 8px;
    }

    * {
      box-sizing: border-box;
    }

    .row {
      display: -ms-flexbox;
      /* IE10 */
      display: flex;
      -ms-flex-wrap: wrap;
      /* IE10 */
      flex-wrap: wrap;
      margin: 0 -16px;
      margin-top: 150px;
    }

    .col-25 {
      -ms-flex: 25%;
      /* IE10 */
      flex: 25%;
    }

    .col-50 {
      -ms-flex: 50%;
      /* IE10 */
      flex: 50%;
    }

    .col-75 {
      -ms-flex: 75%;
      /* IE10 */
      flex: 75%;
    }

    .col-25,
    .col-50,
    .col-75 {
      padding: 0 16px;
    }

    .container {
      background-color: #f2f2f2;
      padding: 5px 20px 15px 20px;
      border: 1px solid lightgrey;
      border-radius: 3px;
    }

    input[type=text] {
      width: 100%;
      margin-bottom: 20px;
      padding: 12px;
      border: 1px solid #ccc;
      border-radius: 3px;
    }

    label {
      margin-bottom: 10px;
      display: block;
    }

    .icon-container {
      margin-bottom: 20px;
      padding: 7px 0;
      font-size: 24px;
    }

    .btn {
      background-color: #04AA6D;
      color: white;
      padding: 12px;
      margin: 10px 0;
      border: none;
      width: 100%;
      border-radius: 3px;
      cursor: pointer;
      font-size: 17px;
    }

    .btn:hover {
      background-color: #45a049;
    }

    a {
      color: #2196F3;
    }

    hr {
      border: 1px solid lightgrey;
    }

    span.price {
      float: right;
      color: grey;
    }

    /* Responsive layout - when the screen is less than 800px wide, make the two columns stack on top of each other instead of next to each other (also change the direction - make the "cart" column go on top) */
    @media (max-width: 800px) {
      .row {
        flex-direction: column-reverse;
        margin-top: 300px;
      }

      .col-25 {
        margin-bottom: 20px;
      }
    }

    .modal1 {
      display: none;
      position: fixed;
      z-index: 1;
      left: 0;
      top: 0;
      width: 100%;
      height: 100%;
      overflow: auto;
      background-color: rgba(0, 0, 0, 0.4);
    }

    .modal-content {
      background-color: #fefefe;
      margin: 15% auto;
      padding: 20px;
      border: 1px solid #888;
      width: 50%;
    }
    .modal-content h2 {
      text-align: center;
    color: #ff2a2a;
    font-size: 25px;
    font-weight: 600;
    text-transform: uppercase;
    margin-bottom: 15px;
    }
    .modal-content p {
      margin-bottom: 10px;
      text-align: center;
    }
    .modal-content .btns {
      display: flex;
      justify-content: center;
    }
    .modal-content .btns button {
      min-width: 90px;
      margin: 0 10px;
    background: #ff2a2a;
    border: none;
    outline: none;
    color: #fff;
    border-radius: 10px;
    padding: 1px 3px;
    cursor: pointer;

    }
    .close {
      color: #aaa;
      float: right;
      font-size: 28px;
      font-weight: bold;
    }

    .close:hover,
    .close:focus {
      color: black;
      text-decoration: none;
      cursor: pointer;
    }
  </style>
</head>

<body>

  <?php 
session_start();
  
  include "./components/header.php" ?>
  <div class="row">
    <div class="col-75">
      <div class="container">
        <form action="payment.php" method="post">
          <div class="row">
            <div class="col-50">
              <h3>Thông tin phim </h3>
              <label for="fname"><i class="fa fa-film"></i>Ngày đặt vé :</label>
              <input type="text" name="ngaydat" id="" value="<?php echo date('Y-m-d') ?>">
              <label for="fname"><i class="fa fa-film"></i>Loại vé :</label>
              <input type="text" name="loaive" id="" value="<?php echo implode(', ', $loaiveArr); ?>">
              <label for="fname"><i class="fa fa-film"></i>Mã lịch Phim </label>
              <input type="text" name="malichphim" id="" value="<?php echo $MalichPhim; ?>">
              <label for="fname"><i class="fa fa-film"></i>Tên Phim </label>
              <input type="text" name="tenphim" id="" value="<?php echo $tenPhim; ?>">
              <label for="fname"><i class="fa fa-film"></i>Số lượng vé người lớn</label>
              <input type="text" name="nguoilon" id="" value="<?php echo $adultTickets; ?>">
              <label for="fname"><i class="fa fa-film"></i>Số lượng vé u22 </label>
              <input type="text" name="u22" id="" value="<?php echo $u22Tickets; ?>">
              <label for="email"><i class="fa fa-video"></i>Phòng chiếu </label>
              <input type="text" name="phongchieu" id="" value="<?php echo $maPhong ?>">
              <label for="email"><i class="fa fa-video"></i>Mã lịch chiếu </label>
              <input type="text" name="malichchieu" id="" value="<?php echo $malichchieu ?>">
              <label for="email"><i class="fa fa-video"></i>giờ chiếu </label>
              <input type="text" name="lichchieu" id="" value="<?php echo $lichChieu ?>">
              <label for="adr"><i class="fa fa-ticket"></i>Số lượng vé :</label>
              <input type="text" name="soluongve " id="" value="<?php echo $totalTickets ?>">
              <label for="city"><i class="fa fa-chair"></i> Mã Ghế :</label>
              <input type="text" name="maghe " id="" value=" <?php foreach ($_POST['seats'] as $maGhe) {
                                                                // Truy vấn cơ sở dữ liệu để lấy thông tin tên ghế từ mã ghế
                                                                $query = "SELECT TenGhe FROM ghe WHERE maGhe = ?";
                                                                $stmt = mysqli_prepare($conn, $query);
                                                                mysqli_stmt_bind_param($stmt, "s", $maGhe);
                                                                mysqli_stmt_execute($stmt);
                                                                $result = mysqli_stmt_get_result($stmt);
                                                                $row = mysqli_fetch_assoc($result);
                                                                $tenGhe = $row['TenGhe'];

                                                                echo   $maGhe;
                                                              } ?>">
              <label for="city"><i class="fa fa-chair"></i> Tên Ghế :</label>
              <input type="text" name="tenghe " id="" value=" <?php foreach ($_POST['seats'] as $maGhe) {
                                                                // Truy vấn cơ sở dữ liệu để lấy thông tin tên ghế từ mã ghế
                                                                $query = "SELECT TenGhe FROM ghe WHERE maGhe = ?";
                                                                $stmt = mysqli_prepare($conn, $query);
                                                                mysqli_stmt_bind_param($stmt, "s", $maGhe);
                                                                mysqli_stmt_execute($stmt);
                                                                $result = mysqli_stmt_get_result($stmt);
                                                                $row = mysqli_fetch_assoc($result);
                                                                $tenGhe = $row['TenGhe'];

                                                                echo    $tenGhe;
                                                              } ?>">

              <input type="hidden" name="MalichPhim" value="<?php echo $MalichPhim; ?>"> <!-- Added hidden input field for MalichPhim -->
              <input type="hidden" name="totalTickets" value="<?php echo $totalTickets; ?>"> <!-- Added hidden input field for totalTickets -->
              <input type="hidden" name="ngaydat" value="<?php echo date('Y-m-d'); ?>"> <!-- Added hidden input field for ngaydat -->
              <input type="hidden" name="soluongve" value="<?php echo $totalTickets; ?>"> <!-- Added hidden input field for soluongve -->
              <input type="hidden" name="Malichchieu" value="<?php echo $malichchieu; ?>">
              <input type="hidden" name="Mapttt" value="<?php echo $mapttt; ?>">
              <input type="hidden" name="maghe" value="<?php echo implode(',', $_POST['seats']); ?>"> <!-- Added hidden input field for maghe -->
              <label for="fname"><i class="fa fa-film"></i>Tên khách hàng:</label>
              <input type="text" name="khachHang" id="" value="<?php echo $khachHang ?>">
              <label for="fname"><i class="fa fa-film"></i>Email:</label>
              <input type="text" name="email" id="" value="<?php echo $email ?>">
              <label for="payment-method"><i class="fa fa-credit-card"></i> Phương thức thanh toán:</label>
              <select name="payment-method" id="payment-method">
                <?php while ($row = mysqli_fetch_assoc($resultpttt)) {
                  $mapttt = $row['MaPTTT'];
                  $tenpttt = $row['TenPTTT']; ?>
                  <option value="<?php echo $mapttt; ?>"><?php echo $tenpttt; ?></option>
                <?php } ?>
              </select>
              <p>Total <span class="price" style="color:black"><b><?php echo $totalPrice ?></b></span></p>
              <input type="hidden" name="totalPrice" value="<?php echo $totalPrice; ?>">
            </div>
            <div id="myModal" class="modal1">
              <div class="modal-content">
                <span class="close">&times;</span>
                <h2>Xác nhận thanh toán</h2>
                <p>Bạn có chắc chắn muốn thanh toán không?</p>
                <div class="btns">
                <button id="confirmPayment">Xác nhận </button>
                <button id="cancelPayment">Hủy</button>
                </div>
              </div>
            </div>
            <input type="submit" name='payment' value="Thanh toán " class="btn thanhtoan">
        </form>
      </div>
    </div>
  </div>
  <script>
    const paymentMethodSelect = document.getElementById("payment-method");
    const btnthanhtoan = document.querySelector(".thanhtoan")
    const modal = document.querySelector(".modal1")
    const btnXacNhan = document.querySelector("#confirmPayment")
    const btnClose = document.querySelector(".close");
    const btnClose2 = document.querySelector("#cancelPayment");

    function openModal(e) {
      modal.style.display = "block";
      e.preventDefault();
      btnXacNhan.addEventListener("click", (e) => {
        const selectedPaymentMethod = paymentMethodSelect.value;
        if (selectedPaymentMethod === "PTTT01") {
          window.location.href = "payment.php";
        } else if (selectedPaymentMethod === "PTTT02") {
          window.location.href = "momo_payment.php";
        }
      });
    }

    btnthanhtoan.addEventListener("click", (e) => {
      e.preventDefault();
      openModal(e);
    });

    function closeModal() {
      modal.style.display = "none";
    }

    btnClose.addEventListener("click", closeModal);
    btnClose2.addEventListener("click", (e) => {
      e.preventDefault();
      closeModal();
    });
  </script>
</body>

</html>