const toast= document.getElementById("toast");
const image = document.getElementById("toast-img");
const message = document.getElementById("toast-msg");
const watchlist = document.querySelector("#watchlist");

function watchListButton(){
    console.log(watchlist.innerHTML.trim());
    if(watchlist.innerHTML.trim() == "+"){
        image.src = "/images/assets/check.png";
        message.className = "check";
        message.innerHTML = "Movie added to watch list";
        toast.className = "show";
        watchlist.innerHTML = "✔";
    } else {
        image.src = "/images/assets/cross.png";
        message.className = "cross"
        message.innerHTML = "Movie removed from watch list";
        toast.className = "show";
        watchlist.innerHTML = "+";
    }

    setTimeout(function(){ toast.className = toast.className.replace("show", ""); }, 1700);
}