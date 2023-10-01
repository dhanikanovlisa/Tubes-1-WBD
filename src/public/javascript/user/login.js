const usernameInput = document.querySelector('#username');
const passwordInput = document.querySelector('#password');
const loginForm = document.querySelector('#login-form');

const usernameRegex = /^[a-zA-Z0-9]+$/;

usernameInput && usernameInput.addEventListener('keyup', () => {
    const username = usernameInput.value;

    if (!usernameRegex.test(username)) {
        usernameInput.className = 'red-glow';
    }
    else {
        usernameValid = true;
        usernameInput.className = '';
    }

    const xhr = new XMLHttpRequest();
    xhr.open('GET', '/check/username/:' + usernameInput.value);
    
    xhr.send();
    xhr.onreadystatechange = () => {
        if (xhr.readyState === XMLHttpRequest.DONE){
            const response = JSON.parse(xhr.responseText);
            if (!response.isValid){
                usernameInput.className = 'red-glow';
            } else {
                usernameValid = true;
                usernameInput.className = '';
            }
        }
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

loginForm && loginForm.addEventListener('submit', async (e) => {
    e.preventDefault();
    const xhr = new XMLHttpRequest();
    xhr.open('POST', '/login/login');

    const formData = new FormData();
    formData.append('username', usernameInput.value);
    formData.append('password', passwordInput.value);
    formData.append('csrf_token', CSRF_TOKEN);

    xhr.send(formData);
    xhr.onreadystatechange = () => {
        if (xhr.readyState === XMLHttpRequest.DONE) {
            console.log(xhr.responseText);
            if (xhr.status === 400){
                alert('Wrong password');
                return;
            }
            const response = JSON.parse(xhr.responseText);
            location.replace(response.redirect_url);
        }
    }
});