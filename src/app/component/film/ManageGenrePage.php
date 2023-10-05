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
    <!---Page specify CSS--->
    <link rel="stylesheet" type="text/css" href="/styles/film/manageGenre.css">
</head>

<body>
    <?php include(dirname(__DIR__) . "/template/NavbarUser.php"); ?>
    <?php
    require_once DIRECTORY . '/../controller/film/GenreController.php';
    $genre = new GenreController();
    $result = $genre->getAllGenre();
    ?>
    <div class='container'>
        <h2>Genre</h2>
        <div>
            <div class="upper-container">
                <a href='/add-genre'>
                    <button class="button-white button-text">Add New Genre</button>
                </a>
            </div>
            <div class="cards-genre">
                <?php foreach ($result as $genre) {
                    include(DIRECTORY . "/../component/template/cardGenre.php");
                } ?>
            </div>
        </div>
    </div>
</body>

</html>