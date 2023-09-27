<nav class="navbar">
    <script>
        function navbar(){
            var navbar_right = document.getElementById("navbar-link");
            if (navbar_right.className === "navbar-link") {
                navbar_right.className += " responsive";
            } else {
                navbar_right.className = "navbar-link";
            }
        }
    </script>
    <img src="../../../public/images/assets/logo_navbar.svg" class="logo">
    <div class="navbar-link" id="navbar-link">
        <a href="HomePage.php">Home</a>
        <a href="HomePage.php">Search</a>
        <a href="HomePage.php">Watchlist</a>
        <button class="button-red">Login</button>
    </div>
    <button class="burger-bar" onClick="navbar()">
        <img src="../../../public/images/assets/Burger bar.svg"/>
    </button>
</nav>