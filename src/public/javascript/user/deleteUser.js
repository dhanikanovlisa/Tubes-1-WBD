var modal = document.getElementById("confModal");
var btn = document.getElementById("deleteButton");
var span = document.getElementsByClassName("close")[0];
var closeButton = document.getElementById("cancel");
var okButton = document.getElementById("ok");

function popModal() {
    modal.style.display = "block";
}
function closeModal() {
    modal.style.display = "none";
}
const toast = document.getElementById("toast");
const image = document.getElementById("toast-img");
const message = document.getElementById("toast-msg");
const deleteButton = document.querySelector("#ok");

function succes() {
    if (deleteButton.innerHTML == "OK") {
        image.src = "/images/assets/check.png";
        message.className = "check";
        message.innerHTML = "Succesfully deleted user";
        toast.className = "show";
    }

    setTimeout(function () { toast.className = toast.className.replace("show", ""); }, 1700);
}

const deleteUser = (id) => {
    const xhr = new XMLHttpRequest();
    xhr.open('POST', '/delete-user');

    const formData = new FormData();
    formData.append('user_id', id);
   
    xhr.send(formData);

    xhr.onreadystatechange = () => {
        if (xhr.readyState === 4 && xhr.status === 200) {
            console.log(xhr.responseText);
            const response = JSON.parse(xhr.responseText);
            setTimeout(() => {
                location.replace(response.redirect_url);
            }, 1000);
            modal.style.display = "none";
            succes();
        }
    }
}
