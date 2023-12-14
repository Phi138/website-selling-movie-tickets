const signIn = document.querySelector('.signIn')
const signUp = document.querySelector('.signUp')

const loginModal = document.querySelector('#loginModal')
const registerModal = document.querySelector('#registerModal')

const btnCloses = document.querySelectorAll('.footer input[type="button"]')

signIn.addEventListener('click', () => {
  loginModal.style.display = 'flex'
})
signUp.addEventListener('click', () => {
  registerModal.style.display = 'flex'
})

// Hàm xử lý đóng modal
function closeModal() {
  loginModal.style.display = 'none'
  registerModal.style.display = 'none'
}

btnCloses.forEach(btnClose => {
  btnClose.addEventListener('click', () => {
    closeModal();
  })
})