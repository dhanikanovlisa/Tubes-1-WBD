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
    <link rel="stylesheet" type="text/css" href="/styles/film/detailFilm.css">

</head>

<body>
    <?php include(dirname(__DIR__) . "/template/NavbarUser.php");

    $filmID = $params['id'];
    /**IF someone tries to access URL */
    if (!isset($filmID)) {
        $test = trim('/', $_SERVER["REQUEST_URI"]);
        $test = explode('/', $test);
        $filmID = $test[1];
    }

    $filmDetail = new FilmController();
    $filmData = $filmDetail->getFilmData($filmID);
    $filmGenre = $filmDetail->getFilmGenre($filmID);
    // print_r($filmGenre);
    $totalRow = count($filmData);
    ?>
    <div class='container'>
        <?php
        if ($totalRow == 0) {
            require_once dirname(dirname(__DIR__)) . '/component/conditional/NotFound.php';
            exit;
        } else {
        ?>
            <div class='outer-container'>
                <div class="title-container">
                    <h2><?php echo $filmData["title"] ?></h2>
                </div>
                <div class="whole-container">
                    <div class="image-container">
                        <div class="card">
                            <?php
                            $urlPhoto = "/storage/poster/" . $filmData["film_poster"];

                            ?>
                            <img src="<?php echo $urlPhoto; ?>" alt="Film Image" />
                        </div>
                    </div>
                    <div class="detail-container">
                        <div class="field-container">
                            <h3>Description</h3>
                            <p><?php echo $filmData["description"] ?></p>
                            <h3>Genre</h3>
                            <div class="description-container">
                                <?php
                                echo "<p>" . implode(", ", array_column($filmGenre, "name")) . "</p>";
                                ?>
                            </div>
                            <h3>Release Year</h3>
                            <p><?php echo $filmData["date_release"] ?></p>
                            <h3>Duration</h3>
                            <?php
                            require_once dirname(dirname(__DIR__)) . '/utils/duration.php';
                            $result = turnToHourAndMinute($filmData["duration"]);
                            echo "<p>" . $result["hour"] . " hour " . $result["minute"] . " minute </p>";
                            ?>

                        </div>
                        <div class="button-container">
                            <button class="button-red button-text">Delete</button>
                            <a href="/edit-film/<?php echo $filmID; ?>">
                                <button class="button-white button-text">Edit</button>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        <?php
        }
        ?>
    </div>
</body>


</html>