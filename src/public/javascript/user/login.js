const usernameInput = document.querySelector('#username');
const passwordInput = document.querySelector('#password');
const loginForm = document.querySelector('#login-form');
const usernameAlert = document.getElementById('username-alert');
const passwordAlert = document.getElementById('password-alert');

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

loginForm && loginForm.addEventListener('submit', async (e) => {
    e.preventDefault();

    const xhr_uname = new XMLHttpRequest();
    xhr_uname.open('GET', '/check/username/:' + usernameInput.value);
    console.log("masuk submit");
    xhr_uname.send();
    xhr_uname.onreadystatechange = () => {
        if (xhr_uname.readyState === XMLHttpRequest.DONE){
            console.log(xhr_uname.responseText);
            const response = JSON.parse(xhr_uname.responseText);
            if (!response.isValid){
                setErrorWarning(usernameInput, usernameAlert, 'Username is not available');
            } else {
                removeErrorWarning(usernameInput, usernameAlert);
                const xhr_pass = new XMLHttpRequest();
                xhr_pass.open('POST', '/login/login');
            
                const formData = new FormData();
                formData.append('username', usernameInput.value);
                formData.append('password', passwordInput.value);
                formData.append('csrf_token', CSRF_TOKEN);
            
                xhr_pass.send(formData);
                xhr_pass.onreadystatechange = () => {
                    if (xhr_pass.readyState === XMLHttpRequest.DONE) {
                        if (xhr_pass.status === 400){
                            setErrorWarning(passwordInput, passwordAlert, 'Username or password is incorrect');
                            return;
                        }
                        const response = JSON.parse(xhr_pass.responseText);
                        console.log(response);
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
        setErrorWarning(usernameInput, usernameAlert, 'Username format is invalid');
    }
    else {
        removeErrorWarning(usernameInput, usernameAlert);
    }
});

passwordInput && passwordInput.addEventListener('keyup', () => {
    const password = passwordInput.value;
    if (password.length < 6) {
        setErrorWarning(passwordInput, passwordAlert, 'Password must be at least 6 characters');
    } else {
        removeErrorWarning(passwordInput, passwordAlert);
    }
});