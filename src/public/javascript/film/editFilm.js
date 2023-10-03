let id = document.getElementById('title-container');
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


const updateFilm = () => {
    console.log(filmName.value);
    console.log(filmDescription.value);   
    console.log(filmPoster.value);
    console.log(filmVideo.value);
    console.log(filmHourDuration.value);
    console.log(filmMinuteDuration.value);
    console.log(date.value);

}

editFilmForm && editFilmForm.addEventListener('submit', async (e) => {
    e.preventDefault();
    let xhr = new XMLHttpRequest();
    xhr.open('POST', '/edit-film/edit-film');


    const formData = new FormData();
    formData.append('film_id', id);
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
            const response = JSON.parse(xhr.responseText);
            location.replace(response.redirect_url);
        }
    }
    xhr.send(formData);
});

// const updateFilm = (id) => {
//     console.log("tes");
//     const xhr = new XMLHttpRequest();
//     xhr.open('POST', '/edit-film/edit-film');

//     const formData = new FormData();
//     formData.append('film_id', id);
//     formData.append('title', filmName.value);
//     formData.append('description', filmDescription.value);
//     selectedGenres.forEach(genre => {
//         formData.append('filmGenre[]', genre);
//     });
//     formData.append('filmHourDuration', filmHourDuration.value);
//     formData.append('filmMinuteDuration', filmMinuteDuration.value);
//     formData.append('film_poster', filmPoster.files[0].name);
//     formData.append('film_path', filmVideo.files[0].name);
//     formData.append('date_release', date.value);

    
//     xhr.onreadystatechange = () => {
//         if (xhr.readyState === 4 && xhr.status === 200) {
//             console.log(xhr.responseText);
//             const response = JSON.parse(xhr.responseText);
//             location.replace(response.redirect_url);
//         }
//     }
//     xhr.send(formData);
// }