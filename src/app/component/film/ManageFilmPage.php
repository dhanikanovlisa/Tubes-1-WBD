<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!---Title--->
    <title>Notflix</title>
    <!---Icon--->
    <link rel="icon" href="images/icon/logo.ico">
    <!---Global CSS--->
    <link rel="stylesheet" type="text/css" href="/styles/template/globals.css">
    <link rel="stylesheet" type="text/css" href="/styles/template/Navbar.css">
    <link rel="stylesheet" type="text/css" href="/styles/template/cardMovie.css">
    <!---Page specify CSS--->
    <link rel="stylesheet" type="text/css" href="/styles/film/manageFilm.css">
    <script type="text/javascript" src="javascript/user/search.js" defer></script>
    <link rel="stylesheet" type="text/css"href="styles/user/search.css">
</head>

<body>
    <?php include(dirname(__DIR__) . "/template/NavbarUser.php"); ?>
    <?php
    require_once DIRECTORY . '/../controller/film/FilmController.php';
    $film = new FilmController();
    $result = $film->getAllFilm();
    ?>
    <div class='container'>
        <h2>Film</h2>
        <div>
            <div class="upper-container">
                <div>
                    <input name='title' id='title' type='text' placeholder='Search...'>
                </div>
                <a href='/add-film'>
                    <button class="button-white button-text">Add New Movie</button>
                </a>
            </div>
            <div class="cards">
                <?php foreach ($result as $film) {
                    include(DIRECTORY . "/../component/template/cardMovie.php");
                } ?>
            </div>
        </div>
    </div>
</body>

</html>