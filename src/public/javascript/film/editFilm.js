let filmName = document.getElementById('filmName');
let filmDescription = document.getElementById('filmDescription');   
let filmPoster = document.getElementById('filmPoster'); 
let filmVideo = document.getElementById('filmVideo');
let filmHourDuration = document.getElementById('filmHourDuration');
let filmMinuteDuration = document.getElementById('filmMinuteDuration');
let date = document.getElementById('filmDate');

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
    formData.append('film_poster', "tes.jpg");
    formData.append('film_path',"tes.mp4");
    formData.append('date_release', date.value);

    
    xhr.onreadystatechange = () => {
        if (xhr.readyState === 4 && xhr.status === 200) {
            console.log(xhr.responseText);
            const response = JSON.parse(xhr.responseText);
            location.replace(response.redirect_url);
        }
    }
    xhr.send(formData);
});