const addFilmForm = document.querySelector("#addFilmForm");
const filmNameInput = document.querySelector("#filmName");
const descriptionInput = document.querySelector("#filmDescription");
const genreCheckboxes = document.querySelectorAll('.genre-checkbox');
const film_poster = document.querySelectorAll('.film-poster');
const film_path = document.querySelectorAll('.film-path');

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

const hourInput = document.querySelector("#filmHourDuration");
const minuteInput = document.querySelector("#filmMinuteDuration");
const dateInput = document.querySelector("#date");
const monthInput = document.querySelector("#month");
const yearInput = document.querySelector("#year");
const dateString = yearInput.value + "-" + monthInput.value + "-" + dateInput.value;

addFilmForm && addFilmForm.addEventListener('submit', async (e) => {
    e.preventDefault();
    console.log('submit');

    const xhr = new XMLHttpRequest();
    xhr.open('POST', '/add-film/add-film');


    const formData = new FormData();
    formData.append('title', filmNameInput.value);
    formData.append('description', descriptionInput.value);
    selectedGenres.forEach(genre => {
        formData.append('filmGenre[]', genre);
    });
    formData.append('filmHourDuration', hourInput.value);
    formData.append('filmMinuteDuration', minuteInput.value);
    formData.append('film_poster', film_poster);
    formData.append('film_path', film_path);
    formData.append('date_release', dateString);
    xhr.send(formData);

    xhr.onreadystatechange = () => {
        if (xhr.readyState === 4 && xhr.status === 200) {
            console.log(xhr.responseText);
            const response = JSON.parse(xhr.responseText);
            location.replace(response.redirect_url);
        }
    }
});
