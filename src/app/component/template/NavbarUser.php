<script type="text/javascript" defer>
            const CSRF_TOKEN_N = "<?= $_SESSION['csrf_token'] ?? '' ?>";
</script>
<nav class="navbar">
    <script type="text/javascript" src="javascript/navbar/navbar.js" defer>
    </script>
    <a href="/home">
        <img src="/images/assets/logo_navbar.svg" class="logo">
    </a>
    <div class="navbar-link" id="navbar-link">
        <?php if ($_SERVER["REQUEST_URI"] == "/login" || $_SERVER["REQUEST_URI"] == "/registration") : ?>
            <a href="/home">Home</a>
            <a href="/search">Search</a>
            <a href="/watchlist">Watchlist</a>
            <a href="/login"><button class="button-red">Login</button></a>
        <?php else: ?>
            <a href="/home">Home</a>
            <a href="/search">Search</a>
            <a href="/watchlist">Watchlist</a>
            <a class="hidden-link" href="/settings">Settings</a>
            <a class="hidden-link" onCLick="logout()">Logout</a>
            <img id="photo-profile" class="photo-profile" src="images/assets/profile-placeholder.png" onClick="userMenu()"/>
            <div class="user-menu" id="user-menu">
                <a class="hidden-link" href="/settings">Settings</a>
                <a class="hidden-link" onCLick="logout()">Logout</a>
            </div>
        <?php endif; ?>
    </div>
    <button class="burger-bar" onClick="navbar()">
        <img class="burger-bar" src="images/assets/Burger bar.svg" />
    </button>
</nav>