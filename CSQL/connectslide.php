
    <?php 
   
   include "./CSQL/config/connect.php";
    // Truy vấn dữ liệu ảnh từ cơ sở dữ liệu
    $query = "SELECT Banner FROM phim";
    $result = mysqli_query($conn, $query);

    // Tạo phần tử HTML cho mỗi ảnh
    while ($row = mysqli_fetch_assoc($result)) {
      $imageURL = $row['Banner'];
      echo '<a href="#!" class="item"><img src="Admincp/hinhPhim/' . $imageURL . '" alt=""></a>';
    }

    // Đóng kết nối cơ sở dữ liệu
    mysqli_close($conn);
    ?>