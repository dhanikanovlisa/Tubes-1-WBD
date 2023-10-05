const toast = document.getElementById("toast");
const image = document.getElementById("toast-img");
const message = document.getElementById("toast-msg");
const submitButton = document.querySelector("#submitButton");

function succes(){
    if (submitButton.innerHTML == "Submit") {
        image.src = "/images/assets/check.png";
        message.className = "check";
        message.innerHTML = "Succesfully added new genre";
        toast.className = "show";
    }
}

var genreName = document.getElementById('genre');
addGenreForm && addGenreForm.addEventListener('submit', async (e) => {
    e.preventDefault();
    let xhr = new XMLHttpRequest();
    xhr.open('POST', '/add-genre/add-genre');


    let formData = new FormData();
    console.log(genreName.value);  
    formData.append('name', genreName.value);

    xhr.onreadystatechange = () => {
        if (xhr.readyState === 4 && xhr.status === 200) {
            console.log(xhr.responseText);
            let response = JSON.parse(xhr.responseText);
            succes();
            setTimeout(() => {
                location.replace(response.redirect_url);
            }, 1500);
        }
    }
    xhr.send(formData);
});