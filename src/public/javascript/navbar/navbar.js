function navbar(){
    var navbar_right = document.getElementById("navbar-link");
    if (navbar_right.className === "navbar-link") {
        navbar_right.className += " responsive";
    } else {
        navbar_right.className = "navbar-link";
    }
}