const usernameInput = document.getElementById('username');
const emailInput = document.getElementById('email');
const phoneInput = document.getElementById('phone-number');
const firstNameInput = document.getElementById('first-name');
const lastNameInput = document.getElementById('last-name');
const passwordInput = document.getElementById('password');
const confirmPasswordInput = document.getElementById('confirm-password');
const registrationForm = document.getElementById('registration-form');

const usernameAlert = document.getElementById('username-alert');
const emailAlert = document.getElementById('email-alert');
const phoneAlert = document.getElementById('phone-alert');
const nameAlert = document.getElementById('name-alert');
const passwordAlert = document.getElementById('password-alert');
const confirmPasswordAlert = document.getElementById('confirm-password-alert');

function setErrorWarning(input, desc, message){
    input.className += ' error-input';
    desc.innerText = message;
    desc.style.display = 'block';
}

function removeErrorWarning(input, desc){
    input.className = '';
    desc.innerText = '';
    desc.style.display = 'none';
}

const usernameRegex = /^[a-z0-9_\.]+$/;
const emailRegex = /^[\w-\.]+@([\w-]+\.)+[\w-]{2,4}$/;
const phoneRegex = /^[0-9]+$/;
const nameRegex = /^[a-z ,.'-]+$/i;

let usernameValid = false;
let emailValid = false;
let passwordValid = false;
let passwordConfirmedValid = false;


usernameInput && usernameInput.addEventListener('keyup', async(e) => {
    const username = usernameInput.value;

    if (!usernameRegex.test(username)) {
        setErrorWarning(usernameInput, usernameAlert, 'Username format is incorrect');
        return;
    }
    else {
        e.preventDefault();
        const xhr_uname = new XMLHttpRequest();
        xhr_uname.open('GET', '/check/username/:' + username);
        
        xhr_uname.send();
        xhr_uname.onreadystatechange = () => {
            if (xhr_uname.readyState === XMLHttpRequest.DONE){
                const response = JSON.parse(xhr_uname.responseText);
                if (response.isExist){
                    setErrorWarning(usernameInput, usernameAlert, 'Username is not available');
                    return;
                }
            }
        }
        removeErrorWarning(usernameInput, usernameAlert);
    }
});

emailInput && emailInput.addEventListener('keyup', async (e) => {
    const email = emailInput.value;
    if (!emailRegex.test(email)) {
        setErrorWarning(emailInput, emailAlert, 'Email format is incorrect');
        return;
    }
    else {
        e.preventDefault();
        const xhr = new XMLHttpRequest();
        xhr.open('GET', '/check/email/:' + email);
        
        xhr.send();
        xhr.onreadystatechange = () => {
            if (xhr.readyState === XMLHttpRequest.DONE){
                const response = JSON.parse(xhr.responseText);
                if (response.isExist){
                    setErrorWarning(emailInput, emailAlert, 'Email is already registered');
                    return;
                }
            }
        }
    }
    removeErrorWarning(emailInput, emailAlert);
});

phoneInput && phoneInput.addEventListener('keyup', () => {
    const phone = phoneInput.value;
    if (!phoneRegex.test(phone)) {
        setErrorWarning(phoneInput, phoneAlert, 'Phone number format is incorrect');
    }
    else {
        removeErrorWarning(phoneInput, phoneAlert);
    }
});

firstNameInput && firstNameInput.addEventListener('keyup', () => {
    const firstName = firstNameInput.value;
    if (!nameRegex.test(firstName)) {
        setErrorWarning(firstNameInput, nameAlert, 'First name format is incorrect');
    }
    else {
        removeErrorWarning(firstNameInput, nameAlert);
    }
});

lastNameInput && lastNameInput.addEventListener('keyup', () => {
    const lastName = lastNameInput.value;
    if (!nameRegex.test(lastName)) {
        setErrorWarning(lastNameInput, nameAlert, 'Last name format is incorrect');
    }
    else {
        removeErrorWarning(lastNameInput, nameAlert);
    }
});

passwordInput && passwordInput.addEventListener('keyup', () => {
    const password = passwordInput.value;
    if (password.length < 6) {
        setErrorWarning(passwordInput, passwordAlert, 'Password must be at least 6 characters');
    }
    else {
        passwordValid = true;
        removeErrorWarning(passwordInput, passwordAlert);
    }
});

confirmPasswordInput && confirmPasswordInput.addEventListener('keyup', () => {
    const confirmPassword = confirmPasswordInput.value;
    if (confirmPassword !== passwordInput.value) {
        setErrorWarning(confirmPasswordInput, confirmPasswordAlert, 'Password does not match');
    }
    else {
        passwordConfirmedValid = true;
        removeErrorWarning(confirmPasswordInput, confirmPasswordAlert);
    }
});

registrationForm && registrationForm.addEventListener('submit', async (e) => {
    e.preventDefault();
    console.log('submit');
    const xhr = new XMLHttpRequest();
    xhr.open('POST', '/register/register');

    const formData = new FormData();
    formData.append('username', usernameInput.value);
    formData.append('email', emailInput.value);
    formData.append('phone', phoneInput.value);
    formData.append('firstName', firstNameInput.value);
    formData.append('lastName', lastNameInput.value);
    formData.append('password', passwordInput.value);

    xhr.send(formData);
    xhr.onreadystatechange = () => {
        if (xhr.readyState === 4 && xhr.status === 200) {
            console.log(xhr.responseText);
            const response = JSON.parse(xhr.responseText);
            location.replace(response.redirect_url);
        }
    }
});
