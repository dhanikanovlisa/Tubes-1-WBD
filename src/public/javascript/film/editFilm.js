var addFilmForm = document.querySelector("#addFilmForm");
var filmNameInput = document.querySelector("#filmName");
var descriptionInput = document.querySelector("#filmDescription");
var genreCheckboxes = document.querySelectorAll('.genre-checkbox');
var film_poster = document.querySelectorAll('.film-poster');
var film_path = document.querySelectorAll('.film-path');
var hourInput = document.querySelector("#filmHourDuration");
var minuteInput = document.querySelector("#filmMinuteDuration");
var dateInput = document.querySelector("#date");
var monthInput = document.querySelector("#month");
var yearInput = document.querySelector("#year");

let selectedGenres = [];
document.addEventListener('DOMContentLoaded', function () {
    const genreCheckboxes = document.querySelectorAll('.checkbox-item input[type="checkbox"]');
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
    
    



const updateFilm = (id) => {
    console.log("tes");
    const xhr = new XMLHttpRequest();
    xhr.open('POST', '/edit-film/edit');

    const formData = new FormData();
    formData.append('film_id', id);
    formData.append('title', filmNameInput.value);
    formData.append('description', descriptionInput.value);
    selectedGenres.forEach(genre => {
        formData.append('filmGenre[]', genre);
    });

    if (Object.is(fileNameInput.value, null)  Object.is(hourInput, null) || Object.is(minuteInput, null) || Object.is(dateInput, null) || Object.is(monthInput, null) || Object.is(yearInput, null)) {
        const dateString = '0000-00-00';
        formData.append('filmHourDuration', 0);
        formData.append('filmMinuteDuration',0);
        formData.append('film_poster', 0);
        formData.append('film_path',0);
        formData.append('date_release', dateString);

    } else {
        const dateString = yearInput.value + "-" + monthInput.value + "-" + dateInput.value;
        formData.append('filmHourDuration', hourInput.value);
        formData.append('filmMinuteDuration', minuteInput.value);
        formData.append('film_poster', film_poster);
        formData.append('film_path', film_path);
        formData.append('date_release', dateString);
    }
    console.log("tes");
    xhr.send(formData);
    xhr.onreadystatechange = () => {
        if (xhr.readyState === 4 && xhr.status === 200) {
            console.log(xhr.responseText);
            const response = JSON.parse(xhr.responseText);
            location.replace(response.redirect_url);
        }
    }
}