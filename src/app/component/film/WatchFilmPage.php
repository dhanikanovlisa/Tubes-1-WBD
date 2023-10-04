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
    <link rel="stylesheet" type="text/css" href="/styles/template/navbar.css">
    <!---Page specify CSS--->
    <link rel="stylesheet" type="text/css" href="/styles/film/watchFilm.css">
</head>

<body>
    <?php include(dirname(__DIR__) . "/template/NavbarUser.php"); ?>
    <?php
    $filmID = $params['id'];
    /**IF someone tries to access URL */
    if (!isset($filmID)) {
        $test = trim('/', $_SERVER["REQUEST_URI"]);
        $test = explode('/', $test);
        $filmID = $test[1];
    }

    $filmController = new FilmController();
    $filmData = $filmController->getFilmData($filmID);
    $totalRow = count($filmData);

    if ($totalRow == 0) {
        require_once  dirname(dirname(__DIR__)) . '/component/conditional/NotFound.php';
        exit;
    } else {
    ?>
    <?php
    }
    ?>
    
    <section>
        <header>
            <h1><?php echo htmlspecialchars($filmData['title']); ?></h1>
        </header>
        <video controls id='video-player' >
            <source src='../storage/film/<?php echo htmlspecialchars($filmData['film_path']) ?>' type='video/mp4'>
        </video>
        <div id='details'>
            <div id='description'>
                <h2>Description</h2>
                <p><?php echo htmlspecialchars($filmData['description']) ?></p>
            </div>
            <div id='genre'>
                <h2>Genre</h2>
                <p><?php
                    $genres = $filmController->getFilmGenre($filmID);
                    $response = array();
                    foreach($genres as $genre){
                        array_push($response, $genre['name']);
                    }
                    echo implode(', ', $response);
                    ?>
            </div>
            <div id='release'>
                <h2>Release</h2>
                <p><?php echo htmlspecialchars($filmData['date_release']) ?></p>
            </div>
            <div id='duration'>
                <h2>Duration</h2>
                <p><?php echo htmlspecialchars($filmData['duration']) ?></p>
            </div>
        </div>
    </section>

</body>

</html>