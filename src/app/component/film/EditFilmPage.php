<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <!---Title--->
    <title>Notflix</title>
    <!---Icon--->
    <link rel="icon" href="/images/icon/logo.ico">
    <!---Global CSS--->
    <link rel="stylesheet" type="text/css" href="/styles/template/globals.css">
    <link rel="stylesheet" type="text/css" href="/styles/template/Navbar.css">
    <link rel="stylesheet" type="text/css" href="/styles/template/cardMovie.css">
    <!---Page specify CSS--->
    <link rel="stylesheet" type="text/css" href="/styles/film/editFilm.css">
</head>

<body>
    <?php include(dirname(__DIR__) . "/template/NavbarUser.php");

    $filmID = $params['id'];
    // Check if the filmID is not set in the URL
    if (!isset($filmID)) {
        $test = trim('/', $_SERVER["REQUEST_URI"]);
        $test = explode('/', $test);
        $filmID = $test[1];
    }

    $filmDetail = new FilmController();
    $filmData = $filmDetail->getFilmData($filmID);
    $filmGenre = $filmDetail->getFilmGenre($filmID);
    $totalRow = count($filmData);
    ?>
    <div class='container'>
        <?php
        if ($totalRow == 0) {
            require_once dirname(dirname(__DIR__)) . '/component/conditional/NotFound.php';
            exit;
        } else {
        ?>
            <div class="title-container">
                <h2>Edit Film</h2>
            </div>
            <div class="whole-container">
                <div class="image-container">
                    <div class="card">
                        <?php
                        $urlPhoto = "/storage/poster/" . $filmData["film_poster"];

                        ?>
                        <img src="<?php echo $urlPhoto; ?>" alt="Film Image" />
                    </div>
                    <button class="text-black button-text">Change Poster</button>
                </div>
                <div class="detail-container">

                </div>
            </div>
        <?php
        }
        ?>
    </div>
</body>


</html>