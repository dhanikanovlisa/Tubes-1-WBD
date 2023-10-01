const usernameInput = document.querySelector('#username');
const passwordInput = document.querySelector('#password');
const loginForm = document.querySelector('#login-form');
const username_alert = document.getElementById('username-alert');
const password_alert = document.getElementById('password-alert');

const usernameRegex = /^[a-zA-Z0-9]+$/;

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

loginForm && loginForm.addEventListener('submit', async (e) => {
    e.preventDefault();

    const xhr_uname = new XMLHttpRequest();
    xhr_uname.open('GET', '/check/username/:' + usernameInput.value);
    
    xhr_uname.send();
    xhr_uname.onreadystatechange = () => {
        if (xhr_uname.readyState === XMLHttpRequest.DONE){
            const response = JSON.parse(xhr_uname.responseText);
            if (!response.isValid){
                setErrorWarning(usernameInput, username_alert, 'Username is not available');
            } else {
                usernameValid = true;
                removeErrorWarning(usernameInput, username_alert);
                const xhr_pass = new XMLHttpRequest();
                xhr_pass.open('POST', '/login/login');
            
                const formData = new FormData();
                formData.append('username', usernameInput.value);
                formData.append('password', passwordInput.value);
                formData.append('csrf_token', CSRF_TOKEN);
            
                xhr_pass.send(formData);
                xhr_pass.onreadystatechange = () => {
                    if (xhr_pass.readyState === XMLHttpRequest.DONE) {
                        console.log(xhr_pass.responseText);
                        if (xhr_pass.status === 400){
                            setErrorWarning(passwordInput, password_alert, 'Username or password is incorrect');
                            return;
                        }
                        const response = JSON.parse(xhr_pass.responseText);
                        location.replace(response.redirect_url);
                    }
                }
            }
        }
    }
});

usernameInput && usernameInput.addEventListener('keyup', () => {
    const username = usernameInput.value;

    if (!usernameRegex.test(username)) {
        console.log('username invalid');
        setErrorWarning(usernameInput, username_alert, 'Username format is invalid');
    }
    else {
        usernameValid = true;
        removeErrorWarning(usernameInput, username_alert);
    }
});

passwordInput && passwordInput.addEventListener('keyup', () => {
    const password = passwordInput.value;
    if (password.length < 6) {
        setErrorWarning(passwordInput, password_alert, 'Password must be at least 6 characters');
    } else {
        removeErrorWarning(passwordInput, password_alert);
    }
});