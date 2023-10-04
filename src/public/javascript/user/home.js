const toast= document.getElementById("toast");
const image = document.getElementById("toast-img");
const message = document.getElementById("toast-msg");
const watchlist = document.querySelector("#watchlist");

// function checkWatchList(){
//     const xhr = new XMLHttpRequest();
//     xhr.open('GET', '/check-watchlist/' + film_id);

//     xhr.send();
//     xhr.onreadystatechange = () => {
//         if (xhr.readyState === XMLHttpRequest.DONE){
//             var response = JSON.parse(xhr.responseText);
//             return 
//         } else {
//             return;
//         }
//     }
// }

function watchListButton(){
    const xhr = new XMLHttpRequest();
    xhr.open('GET', '/check-watchlist/' + film_id);

    xhr.send();
    xhr.onreadystatechange = () => {
        if (xhr.readyState === XMLHttpRequest.DONE){
            console.log(xhr.responseText);
            var response = JSON.parse(xhr.responseText);
            if (!response.isExist){
                xhr.open('POST', '/add-watchlist');
                const form_data = new FormData();
                form_data.append('film_id', film_id);
                xhr.send(form_data);
                xhr.onreadystatechange = () => {
                    if (xhr.readyState === XMLHttpRequest.DONE){
                        console.log(xhr.responseText);
                        response = JSON.parse(xhr.responseText);
                        image.src = "/images/assets/check.png";
                        message.className = "check";
                        message.innerHTML = response.message;
                        toast.className = "show";
                        watchlist.innerHTML = "✔";
                    }
                }
            } else {
                xhr.open('POST', '/delete-watchlist');
                const form_data = new FormData();
                form_data.append('film_id', film_id);
                xhr.send(form_data);
                xhr.onreadystatechange = () => {
                    if (xhr.readyState === XMLHttpRequest.DONE){
                        console.log(xhr.responseText);
                        response = JSON.parse(xhr.responseText);
                        image.src = "/images/assets/cross.png";
                        message.className = "cross"
                        message.innerHTML = response.message;
                        toast.className = "show";
                        watchlist.innerHTML = "+";
                    }
                }
            }
            setTimeout(function(){ toast.className = toast.className.replace("show", ""); }, 1700);
        }
    }
}

window.onload