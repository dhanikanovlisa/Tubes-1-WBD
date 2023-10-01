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