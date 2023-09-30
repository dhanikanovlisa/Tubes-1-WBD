const usernameInput = document.querySelector('#username');
const emailInput = document.querySelector('#email');
const phoneInput = document.querySelector('#phone-number');
const passwordInput = document.querySelector('#password');
const confirmPasswordInput = document.querySelector('#confirm-password');
const registrationForm = document.querySelector('#registration-form');

const usernameRegex = /^[a-zA-Z0-9]+$/;
const emailRegex = /^[\w-\.]+@([\w-]+\.)+[\w-]{2,4}$/;
const phoneRegex = /^[0-9]+$/;

let usernameValid = false;
let emailValid = false;
let passwordValid = false;
let passwordConfirmedValid = false;

usernameInput && usernameInput.addEventListener('keyup', () => {
    const username = usernameInput.value;
    if (!usernameRegex.test(username)) {
        usernameInput.className = 'red-glow';
    }
    else {
        usernameValid = true;
        usernameInput.className = '';
    }
});

emailInput && emailInput.addEventListener('keyup', () => {
    const email = emailInput.value;
    if (!emailRegex.test(email)) {
        emailInput.className = 'red-glow';
    }
    else {
        emailValid = true;
        emailInput.className = '';
    }
});

phoneInput && phoneInput.addEventListener('keyup', () => {
    const phone = phoneInput.value;
    if (!phoneRegex.test(phone)) {
        phoneInput.className = 'red-glow';
    }
    else {
        phoneInput.className = '';
    }
});

passwordInput && passwordInput.addEventListener('keyup', () => {
    const password = passwordInput.value;
    if (password.length < 6) {
        passwordInput.className = 'red-glow';
    }
    else {
        passwordValid = true;
        passwordInput.className = '';
    }
});

confirmPasswordInput && confirmPasswordInput.addEventListener('keyup', () => {
    const confirmPassword = confirmPasswordInput.value;
    if (confirmPassword !== passwordInput.value) {
        confirmPasswordInput.className = 'red-glow';
    }
    else {
        passwordConfirmedValid = true;
        confirmPasswordInput.className = '';
    }
});

registrationForm && registrationForm.addEventListener('submit', async (e) => {
    e.preventDefault();
    console.log('submit');
    const xhr = new XMLHttpRequest();
    xhr.open('POST', '/public/user/register');

    const formData = new FormData();
    formData.append('username', usernameInput.value);
    formData.append('email', emailInput.value);
    formData.append('phone', phoneInput.value);
    formData.append('password', passwordInput.value);

    xhr.send(formData);
    xhr.onreadystatechange = () => {
        if (xhr.readyState === 4 && xhr.status === 200) {
            console.log("dsa");
            // console.log(xhr.responseText);
            // const response = JSON.parse(xhr.responseText);
            // location.replace(response.redirect_url);
        }
    }
});
