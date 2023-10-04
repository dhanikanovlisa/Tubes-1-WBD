
let filmName = document.getElementById('filmName');
let filmDescription = document.getElementById('filmDescription');
let filmPoster = document.getElementById('filmPoster');
let filmVideo = document.getElementById('filmVideo');
let filmHourDuration = document.getElementById('filmHourDuration');
let filmMinuteDuration = document.getElementById('filmMinuteDuration');
let date = document.getElementById('filmDate');

const filmNameAlert = document.getElementById('filmNameAlert');

let selectedGenres = [];
document.addEventListener('DOMContentLoaded', function () {
    let genreCheckboxes = document.querySelectorAll('.checkbox-item input[type="checkbox"]');
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
function setErrorWarning(input, desc, message) {
    input.className += ' error-input';
    desc.innerText = message;
    desc.style.display = 'block';
}

function removeErrorWarning(input, desc) {
    input.className = '';
    desc.innerText = '';
    desc.style.display = 'none';
}

filmName && filmName.addEventListener('keyup', async (e) => {
    const film_name = filmName.value;
    e.preventDefault();
        const xhr_uname = new XMLHttpRequest();
        xhr_uname.open('GET', '/check/filmname/:' + film_name);
        
        xhr_uname.send();
        xhr_uname.onreadystatechange = () => {
            if (xhr_uname.readyState === XMLHttpRequest.DONE){
                const response = JSON.parse(xhr_uname.responseText);
                if (response.isExist){
                    setErrorWarning(usernameInput, usernameAlert, 'Film Name Already Exist');
                    return;
                }
            }
        }
        removeErrorWarning(filmName, filmNameAlert);
});

addFilmForm && addFilmForm.addEventListener('submit', async (e) => {
    e.preventDefault();

    let xhr = new XMLHttpRequest();
    xhr.open('POST', '/add-film/add-film');


    let formData = new FormData();
    formData.append('title', filmName.value);
    formData.append('description', filmDescription.value);
    selectedGenres.forEach(genre => {
        formData.append('filmGenre[]', genre);
    });
    formData.append('filmHourDuration', filmHourDuration.value);
    formData.append('filmMinuteDuration', filmMinuteDuration.value);
    formData.append('film_poster', filmPoster.files[0].name);
    formData.append('film_path', filmVideo.files[0].name);
    formData.append('date_release', date.value);

    xhr.onreadystatechange = () => {
        if (xhr.readyState === 4 && xhr.status === 200) {
            console.log(xhr.responseText);
            let response = JSON.parse(xhr.responseText);
            location.replace(response.redirect_url);
        }
    }
    xhr.send(formData);
});