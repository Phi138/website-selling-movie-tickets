// Lấy ngày hiện tại
var currentDate = new Date();

// Lấy các thông tin về tháng và năm hiện tại
var currentMonth = currentDate.getMonth();
var currentYear = currentDate.getFullYear();

// Gán thông tin về tháng và năm vào phần tử .month-text
var monthTextElement = document.querySelector('.month-text');
monthTextElement.textContent = `${getMonthName(currentMonth)} ${currentYear}`;

// Tạo và căn chỉnh lịch trong phần tử .days
var calendarContainer = document.querySelector('.days');

// Lấy các phần tử và gán sự kiện click
const prevButton = document.getElementById('prevButton');
const nextButton = document.getElementById('nextButton');
prevButton.addEventListener('click', handlePrevButtonClick);
nextButton.addEventListener('click', handleNextButtonClick);

// Hàm lấy tên tháng
function getMonthName(monthIndex) {
  var months = [
    "January", "February", "March", "April", "May", "June",
    "July", "August", "September", "October", "November", "December"
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
  var currentDateCopy = new Date(currentDate);

  // Đặt ngày của currentDateCopy thành ngày đầu tiên trong tuần (thứ 2)
  currentDateCopy.setDate(currentDate.getDate() - currentDate.getDay() + 1);

  // Tạo 7 ngày bắt đầu từ currentDateCopy
  for (var i = 0; i < 7; i++) {
    var input = document.createElement('input');
    input.type = 'radio';
    input.name = 'day';
    input.value = currentDateCopy.toISOString().split('T')[0];
    input.id = `${getMonthName(currentDateCopy.getMonth())}${i}`;

    var label = document.createElement('label');
    label.htmlFor = `${getMonthName(currentDateCopy.getMonth())}${i}`;
    label.textContent = currentDateCopy.getDate();

    var dayContainer = document.createElement('div');
    dayContainer.classList.add('day-container');
    dayContainer.appendChild(input);
    dayContainer.appendChild(label);
    calendarContainer.appendChild(dayContainer);

    // Tăng ngày của currentDateCopy lên 1
    currentDateCopy.setDate(currentDateCopy.getDate() + 1);
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

// Xử lý sự kiện click nút "Next"
function handleNextButtonClick(event) {
  event.preventDefault();
  // Thực hiện các thao tác khi nhấn nút "Next"
  // Ví dụ: chuyển đến tháng tiếp theo
  currentDate.setDate(currentDate.getDate() + 7);
  if (currentDate.getMonth() !== currentMonth) {
    currentMonth = currentDate.getMonth();
    currentYear = currentDate.getFullYear();
    monthTextElement.textContent = `${getMonthName(currentMonth)} ${currentYear}`;
  }
  renderCalendar();
}