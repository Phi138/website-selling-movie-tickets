const list = document.querySelector(".list");
const items = document.querySelectorAll(".item");
const prevButton = document.getElementById("prev");
const nextButton = document.getElementById("next");
const dots = document.querySelectorAll(".dots li");
let currentIndex = 0;
let timer; // Thêm biến timer

function updateSlider() {
  list.style.transform = `translateX(-${currentIndex * 100}%)`;
  dots.forEach((dot, index) => {
    dot.classList.toggle("active", index === currentIndex);
  });
}

function startAutoSlide() {
  timer = setInterval(() => {
    currentIndex = (currentIndex + 1) % items.length;
    updateSlider();
  }, 3000); // 5 giây cho mỗi slide
}

function stopAutoSlide() {
  clearInterval(timer);
}

prevButton.addEventListener("click", () => {
  currentIndex = (currentIndex - 1 + items.length) % items.length;
  updateSlider();
  stopAutoSlide(); // Dừng auto slide khi người dùng nhấp "Previous"
});

nextButton.addEventListener("click", () => {
  currentIndex = (currentIndex + 1) % items.length;
  updateSlider();
  stopAutoSlide(); // Dừng auto slide khi người dùng nhấp "Next"
});

dots.forEach((dot, index) => {
  dot.addEventListener("click", () => {
    currentIndex = index;
    updateSlider();
    stopAutoSlide(); // Dừng auto slide khi người dùng nhấp vào chấm
  });
});

// startAutoSlide();
