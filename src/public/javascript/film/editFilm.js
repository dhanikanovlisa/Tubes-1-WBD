let filmName = document.getElementById('filmName');
let filmDescription = document.getElementById('filmDescription');
let filmPoster = document.getElementById('filmPoster');
let filmVideo = document.getElementById('filmVideo');
let filmHeader = document.getElementById('filmHeader');
let filmHourDuration = document.getElementById('filmHourDuration');
let filmMinuteDuration = document.getElementById('filmMinuteDuration');
let date = document.getElementById('filmDate');
let filePosterName = document.getElementById('display-filePoster-name');
let fileVideoName = document.getElementById('display-fileVideo-name');
let fileHeaderName = document.getElementById('display-fileHeader-name');
const filmNameAlert = document.getElementById('filmName-alert');
const toast= document.getElementById("toast");
const image = document.getElementById("toast-img");
const message = document.getElementById("toast-msg");
const saveButton = document.querySelector("#saveButton");


let selectedGenres = [];
document.addEventListener('DOMContentLoaded', function () {
    let genreCheckboxes = document.querySelectorAll('.check-container input[type="checkbox"]');
    genreCheckboxes.forEach(function (checkbox) {
        checkbox.addEventListener('change', function () {
            if (this.checked) {
                selectedGenres.push(this.value);
            } else {
                selectedGenres = selectedGenres.filter(value => value !== this.value);
            }

        });
    });
});

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

filmPoster.addEventListener('change', () => {
    filePosterName.textContent = "File Name: " + filmPoster.files[0].name;
});

filmVideo.addEventListener('change', () => {
    fileVideoName.textContent = "File Name: " + filmVideo.files[0].name;
});

filmHeader.addEventListener('change', () => {
    fileHeaderName.textContent = "File Name: " + filmHeader.files[0].name;
});

function succes() {
    if (saveButton.innerHTML == "Save") {
        image.src = "/images/assets/check.png";
        message.className = "check";
        message.innerHTML = "Succesfully edited film";
        toast.className = "show";
    }
    setTimeout(function () { toast.className = toast.className.replace("show", ""); }, 1700);
}

function removeErrorWarning(input, desc) {
    desc.style.display = 'none';
}

filmName && filmName.addEventListener('keyup', async (e) => {
    const film_name = filmName.value;
    e.preventDefault();
    const xhr_uname = new XMLHttpRequest();
    xhr_uname.open('GET', '/check/filmname/:' + film_name);

    xhr_uname.send();
    xhr_uname.onreadystatechange = () => {
        if (xhr_uname.readyState === XMLHttpRequest.DONE) {
            const response = JSON.parse(xhr_uname.responseText);
            if (response.isExist) {
                setErrorWarning(filmName, filmNameAlert, 'Film Name Already Exist');
                return;
            }
        }
    }
    removeErrorWarning(filmName, filmNameAlert);
});

function closePage(){
    location.replace('/manage-film');
}

editFilmForm && editFilmForm.addEventListener('submit', async (e) => {
    e.preventDefault();
    let xhr = new XMLHttpRequest();
    xhr.open('POST', '/update-film');

    const formData = new FormData();
    formData.append('film_id', filmID);
    formData.append('title', filmName.value);
    formData.append('description', filmDescription.value);
    selectedGenres.forEach(genre => {
        formData.append('filmGenre[]', genre);
    });
    formData.append('filmHourDuration', filmHourDuration.value);
    formData.append('filmMinuteDuration', filmMinuteDuration.value);
    if (filmPoster.files[0] != undefined) {
        formData.append('film_poster', filmPoster.files[0].name);
    } else {
        formData.append('film_poster', '');
    }

    if (filmVideo.files[0] != undefined) {
        formData.append('film_path', filmVideo.files[0].name);
    } else {
        formData.append('film_path', '');
    }

    if (filmHeader.files[0] != undefined) {
        formData.append('film_header', filmHeader.files[0].name);
    } else {
        formData.append('film_header', '');
    }
    formData.append('date_release', date.value);


    xhr.onreadystatechange = () => {
        if (xhr.readyState === 4 && xhr.status === 200) {
            const response = JSON.parse(xhr.responseText);
            setTimeout(() => {
                location.replace(response.redirect_url);
            }, 1500);
        }
    }
    xhr.send(formData);
});