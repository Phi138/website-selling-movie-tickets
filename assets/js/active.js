/// Lấy tên trang từ URL
var currentPage = window.location.pathname.split('/').pop();

var menus = document.querySelectorAll('#nav .links .link');

// Lặp qua từng nút và thêm sự kiện click
menus.forEach(function (menu) {
  menu.addEventListener('click', function () {
    // Loại bỏ lớp "active" từ tất cả các nút
    menus.forEach(function (btn) {
      btn.classList.remove('active');
    });

    // Thêm lớp "active" cho nút được nhấn
    menu.classList.add('active');

    // Lưu trạng thái "active" vào localStorage
    localStorage.setItem('activePage', currentPage);
  });
});

// Kiểm tra nếu có trạng thái "active" trong localStorage
var activePage = localStorage.getItem('activePage');
if (activePage) {
  // Tìm nút tương ứng với trang đã lưu trên localStorage và thêm lớp "active"
  var activeMenu = document.querySelector(`#nav .links .link[href="./${activePage}"]`);
  if (activeMenu) {
    activeMenu.classList.add('active');
  }
}


// Lấy tất cả các nút
var buttons = document.querySelectorAll('.movie .buttons .button');

// Lặp qua từng nút và thêm sự kiện click
buttons.forEach(function (button) {
  button.addEventListener('click', function () {
    // Loại bỏ lớp "active" từ tất cả các nút
    buttons.forEach(function (btn) {
      btn.classList.remove('active');
    });

    // Thêm lớp "active" cho nút được nhấn
    button.classList.add('active');
  });
});

