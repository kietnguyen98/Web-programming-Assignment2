const passwordError = document.getElementById('passwordError')
const checkPasswordMatching = document.getElementById('checkPasswordMatching')
const form = document.getElementById('updateAccount')

form.addEventListener('submit', (e) => {

    if ((password.value.length < 10) || (password.value.length > 20)) {
        e.preventDefault()
    }

    if (checkPasswordMatching.innerText === 'Chưa chính xác !') {
        e.preventDefault()
    }
})



