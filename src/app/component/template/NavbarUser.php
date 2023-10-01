<script type="text/javascript" defer>
            const CSRF_TOKEN_N = "<?= $_SESSION['csrf_token'] ?? '' ?>";
</script>
<nav class="navbar">
    <script type="text/javascript" src="javascript/navbar/navbar1.js" defer>
    </script>
    <a href="/home">
        <img src="/images/assets/logo_navbar.svg" class="logo">
    </a>
    <div class="navbar-link" id="navbar-link">
        <a href="/home">Home</a>
        <a href="/search">Search</a>
        <a href="/watchlist">Watchlist</a>
        <a>
            <button class="button-red" onClick="logout()">Logout</button>
        </a>
    </div>
    <button class="burger-bar" onClick="navbar()">
        <img src="images/assets/Burger bar.svg" />
    </button>
</nav>