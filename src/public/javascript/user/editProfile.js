let username = document.getElementById('username');
let firstName = document.getElementById('first-name');
let lastName = document.getElementById('last-name'); 
let email = document.getElementById('email');
let phoneNumber = document.getElementById('phone-number');


function popModal() {
    modal.style.display = "block";
}
function closeModal() {
    modal.style.display = "none";
}
const closePage = (id) => {
    location.replace('/settings' + id);
}

editProfile && editProfile.addEventListener('submit', async (e) => {
    e.preventDefault(userID);
    console.log()
    let xhr = new XMLHttpRequest();
    xhr.open('POST', '/update-profile');
    const formData = new FormData();
    formData.append('user_id', userID);
    formData.append('username', username.value);
    formData.append('first_name', firstName.value);
    formData.append('last_name', lastName.value);
    formData.append('email', email.value);
    formData.append('phone_number', phoneNumber);

    xhr.onreadystatechange = () => {
        if (xhr.readyState === 4 && xhr.status === 200) {
            console.log(xhr.responseText);
            const response = JSON.parse(xhr.responseText);
            location.replace(response.redirect_url);
        }
    }
    xhr.send(formData);
});