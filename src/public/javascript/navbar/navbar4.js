function navbar(){
    var navbar_right = document.getElementById("navbar-link");
    if (navbar_right.className === "navbar-link") {
        navbar_right.className += " responsive";
    } else {
        navbar_right.className = "navbar-link";
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

let responsive_navbar = document.getElementById("navbar-link");
window.onclick = function(e){
    console.log("click4");
    console.log(e.target);
    console.log(e.target.className);
    if (responsive_navbar.className === "navbar-link responsive" ){
        if (e.target.className != "burger-bar" && e.target.className != "navbar-link responsive"){
            console.log("clicks");
            console.log(e.target.className);
            responsive_navbar.className = "navbar-link";
        }
    }
}