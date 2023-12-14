const $ = document.querySelector.bind(document);

function changeLanguage(language) {
  // Lấy ra phần tử div chứa ngôn ngữ
  const languageDropdown = $("#language-dropdown");

  // Lấy ra thẻ i (biểu tượng mũi tên)
  const icon = languageDropdown.querySelector('i');

  // Thay đổi nội dung của phần tử có class "has-dropdown" khi click
  languageDropdown.textContent = language;

  // Thêm thẻ i vào lại phần tử "has-dropdown"
  languageDropdown.appendChild(icon);
}
