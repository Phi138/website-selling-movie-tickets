<?php
include "./CSQL/config/connect.php";
// Kiểm tra xem ngày đã được chọn hay chưa
if (isset($_GET['day'])) {
  $selectedDate = date('Y-m-d', strtotime($_GET['day']));
} else {
  $selectedDate = date('Y-m-d');
}
// Truy vấn lấy thông tin lịch chiếu phim và giờ chiếu dựa trên ngày được chọn
$query = "SELECT lc.*, lc.MaLichChieu, lc.MaPhim, p.Anh, ch.GioChieu, phong.MaPhong,p.TenPhim,phong.TenPhong,lc.MaLichPhim
          FROM lichchieuphim lc
          INNER JOIN lichchieu ch ON lc.MaLichChieu = ch.MaLichChieu
          INNER JOIN phong ON lc.MaPhong = phong.MaPhong
          INNER JOIN phim p ON lc.MaPhim = p.MaPhim
          WHERE DATE(ch.NgayChieu) = ?";
$stmt = $conn->prepare($query);
$stmt->bind_param("s", $selectedDate);
$stmt->execute();
$result = $stmt->get_result();
$currentMovies = '';
$currentMovie = '';
$previousMovieId = null;

while ($row = $result->fetch_assoc()) {
  $maLichChieu = $row['MaLichChieu'];
  $maPhim = $row['TenPhim'];
  $tenPhong = $row['TenPhong'];
  $anhPhim = $row['Anh'];
  $gioChieu = explode(",", $row['GioChieu']);
  $Phong = $row['MaPhong'];
  $MalichPhim = $row['MaLichPhim'];

  if ($previousMovieId !== $maPhim) {
    // Nếu mã phim khác với phim trước đó, tạo div "current-movie" mới
    if ($previousMovieId !== null) {
      $currentMovie .= '</div></div></div>';
      $currentMovies .= $currentMovie;
    }
    // Tạo div "current-movie" mới cho phim hiện tại
    $currentMovie = '
      <div id="currentm">
        <div class="current-movies">
          <div class="current-movie">
            <div class="cm-img-box">
              <img class="im" src="./Admincp/hinhPhim/'.$anhPhim.'" alt="">
            </div>
            <h3 class="movie-title">'.$maPhim.'</h3>
            <div class="showtimes">
    ';
  }

  foreach ($gioChieu as $gio) {
    // Hiển thị thẻ <a> với thông tin giờ chiếu
    $currentMovie .= '<a href="room.php?phong='.$Phong.'&tenphim='.$maPhim.'&giochieu='.$gio.'&malichchieu='.$maLichChieu.'&tenphong='.$tenPhong.'&malichphim='.$MalichPhim. '" class="btn" data-phong="'.$Phong.'">'.$gio.'</a>';
  }

  // Cập nhật mã phim trước đó
  $previousMovieId = $maPhim;
}

// Kết thúc div "current-movie" cuối cùng
if ($previousMovieId !== null) {
  $currentMovie .= '</div></div></div>';
  $currentMovies .= $currentMovie;
}

// Hiển thị các lớp "current-movie"
echo $currentMovies;

// Đóng kết nối cơ sở dữ liệu
$stmt->close();
$conn->close();
?>
<script>
  // Lấy ngày hiện tại
  var currentDate = new Date();
  var options = { year: 'numeric', month: '2-digit', day: '2-digit', hour: '2-digit', minute: '2-digit', second: '2-digit', hour12: false };
  var formattedDate = currentDate.toLocaleString('en-US', options);
  console.log(formattedDate);
  // Lấy các thông tin về tháng và năm hiện tại
  var currentMonth = currentDate.getMonth();
  var currentYear = currentDate.getFullYear();
  // Gán thông tin về tháng và năm vào phần tử .month-text
  var monthTextElement = document.querySelector('.month-text');
  monthTextElement.textContent = `${getMonthName(currentMonth)} ${currentYear}`;
  // Tạo và căn chỉnh lịch trong phần tử .days
  var calendarContainer = document.querySelector('.days');
  // Lấy các phần tử và gán sự kiện click
  var prevButton = document.getElementById('prevButton');
  var nextButton = document.getElementById('nextButton');
  prevButton.addEventListener('click', handlePrevButtonClick);
  nextButton.addEventListener('click', handleNextButtonClick);
  // Hàm lấy tên tháng
  function getMonthName(monthIndex) {
    var months = [
      "Tháng 1", "Tháng 2", "Tháng 3", "Tháng 4", "Tháng 5", "Tháng 6",
      "Tháng 7", "Tháng 8", "Tháng 9", "Tháng 10", "Tháng 11", "Tháng 12"
    ];
    return months[monthIndex];
  }
  // Hàm kiểm tra năm nhuận
  function isLeapYear(year) {
    return (year % 4 === 0 && year % 100 !== 0) || year % 400 === 0;
  }
  // Hàm tính số ngày trong tháng
  function getDaysInMonth(month, year) {
    var daysInMonth = [
      31, 28, 31, 30, 31, 30, 31, 31, 30, 31, 30, 31
    ];
    if (month === 1 && isLeapYear(year)) {
      return 29;
    } else {
      return daysInMonth[month];
    }
  }
  // Hàm render lịch
  function renderCalendar() {
    // Xóa các ngày hiện tại trong lịch
    calendarContainer.innerHTML = '';
    var monthName = getMonthName(currentMonth);
    var monthText = `${currentMonth + 1}   ${currentYear} ${monthName}`;
    monthTextElement.textContent = monthText;
    // Tạo một bản sao của ngày hiện tại để thay đổi giá trị
    var currentDateCopy = new Date(currentYear, currentMonth, 1);
    // Đặt ngày của currentDateCopy thành ngày đầu tiên trong tuần (thứ 2)
    currentDateCopy.setDate(currentDate.getDate() - currentDate.getDay() + 1);
    // Tạo 7 ngày bắt đầu từ currentDateCopy
    for (var i = 0; i < 7; i++) {
      var input = document.createElement('input');
      input.type = 'radio';
      input.name = 'day';
      input.value = currentDateCopy.toISOString().split('T')[0];
      input.id = `${getMonthName(currentDateCopy.getMonth())}${i}`;
      input.onclick = selectDay;
      var label = document.createElement('label');
      label.htmlFor = `${getMonthName(currentDateCopy.getMonth())}${i}`;
      label.textContent = currentDateCopy.getDate()-1;
      var dayContainer = document.createElement('div');
      dayContainer.classList.add('day-container');
      dayContainer.appendChild(input);
      dayContainer.appendChild(label);
      calendarContainer.appendChild(dayContainer);
      // Tăng ngày của currentDateCopy lên 1
      currentDateCopy.setDate(currentDateCopy.getDate() +1);
    }
  }
  // Gọi hàm renderCalendar để hiển thị lịch ban đầu
  renderCalendar();
  // Xử lý sự kiện click nút "Previous"
  function handlePrevButtonClick(event) {
    event.preventDefault();
    // Thực hiện các thao tác khi nhấn nút "Previous"
    // Ví dụ: chuyển đến tháng trước đó
    currentDate.setDate(currentDate.getDate() - 7);
    if (currentDate.getMonth() !== currentMonth) {
      currentMonth = currentDate.getMonth();
      currentYear = currentDate.getFullYear();
      monthTextElement.textContent = `${getMonthName(currentMonth)} ${currentYear}`;
    }
    renderCalendar();
  }
  function handleNextButtonClick(event) {
  event.preventDefault();
  // Thực hiện các thao tác khi nhấn nút "Next"
  currentDate.setDate(currentDate.getDate() + 7);
  if (currentDate.getMonth() !== currentMonth) {
    currentMonth = currentDate.getMonth();
    currentYear = currentDate.getFullYear();
    monthTextElement.textContent = `${getMonthName(currentMonth)} ${currentYear}`;
  }
  renderCalendar();
}
  // Hàm xử lý khi người dùng chọn một ngày
  function selectDay() {
    var selectedDate = new Date(this.value + 'T00:00:00');
    selectedDate = new Date(selectedDate);  // Chuyển đổi giá trị ngày thành đối tượng Date
    var year = selectedDate.getFullYear();
    var month = selectedDate.getMonth() + 1;  // Tháng trong JavaScript tính từ 0 đến 11, nên cần cộng thêm 1
    var day = selectedDate.getDate();
    var formattedDate = year + '-' + month.toString().padStart(2, '0') + '-' + day.toString().padStart(2, '0');
    window.location.href = 'showtime.php?day=' + formattedDate; 
  }
</script>