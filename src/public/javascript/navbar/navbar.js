const navbar_link = document.getElementById("navbar-link");
const photo_profile = document.getElementById("photo-profile");
const usermenu = document.querySelector("#user-menu")

function navbar(){
    if (navbar_link.className === "navbar-link") {
        navbar_link.className += " responsive";
        photo_profile.className += " resp-mode";
        usermenu.style.display = 'none';
        
    } else {
        navbar_link.className = "navbar-link";
        photo_profile.className = "photo-profile";
    }
}

function logout(){
    const xhr = new XMLHttpRequest();
    xhr.open('GET', '/logout');
    xhr.send();
    xhr.onreadystatechange = () => {
        console.log("logout");
        if (xhr.readyState === XMLHttpRequest.DONE){
            window.location.href = 'login';
        }
    }
}

function userMenu(){
    let usermenu = document.querySelector("#user-menu")
    if (photo_profile.className == "photo-profile resp-mode") return;
    if (usermenu.style.display=="block"){
        usermenu.style.display = "none";
    } else {
        usermenu.style.display = "block";
    }
}

window.onclick = function(e){
    console.log("click4");
    console.log(e.target);
    console.log(e.target.className);
    if (navbar_link.className === "navbar-link responsive" ){
        if (e.target.className != "burger-bar" && e.target.className != "navbar-link responsive"){
            console.log("clicks");
            console.log(e.target.className);
            navbar_link.className = "navbar-link";
            photo_profile.className = "photo-profile";
        }
    }


}

document.addEventListener('DOMContentLoaded', function () {
    // const cards = document.querySelectorAll('.cards');

    // const fillCard = (dataUser) => {
    //     dataUser.forEach((user, index) => {
    //         const photo = cards[index].querySelector("img");
    //         photo.setAttribute("src", user.photo);
    //     });
    // }

    // fillCard(userData);
});