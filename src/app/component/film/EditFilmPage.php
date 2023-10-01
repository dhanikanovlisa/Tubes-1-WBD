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
    <?php


 include(dirname(__DIR__) . "/template/NavbarUser.php");
    require_once dirname(dirname(__DIR__)) . '/utils/duration.php';
    require_once dirname(dirname(__DIR__)) . '/utils/date.php';
    $hours = listofHour();
    $minutes = listofMinutes();

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
    $hourFilm = turnToHourAndMinute($filmData["duration"]);
    $release = parseDate($filmData["date_release"]);
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
                    <form id="addFilmForm">
                        <div class="field-container">
                            <div class="input-container">
                                <label for="filmName">Film Name<span class="req">*</span></label>
                                <input type="text" id="filmName" name="filmName" placeholder="<?php echo $filmData["title"] ?>" required />

                            </div>
                            <div class="input-container">
                                <label for="filmDescriptsion">Description<span class="req">*</span></label>
                                <textarea id="filmDescription" name="filmDescription" placeholder="<?php echo $filmData["description"] ?>" required></textarea>
                            </div>
                            <div class="input-container">
                                <h3>Genre<span class="req">*</span></h3>
                                <?php
                                require_once dirname(dirname(__DIR__)) . '/controller/film/GenreController.php';
                                $genre = new GenreController();
                                $result = $genre->getAllGenre();
                                ?>

                                <div class="checkbox-container">
                                    <?php foreach ($result as $row) { ?>
                                        <div class="checkbox-item">
                                            <input type="checkbox" id="genre_<?php echo $row['genre_id']; ?>" name="filmGenre[]" value="<?php echo $row['genre_id']; ?>">
                                            <label for="genre_<?php echo $row['genre_id']; ?>"><?php echo $row['name']; ?></label>
                                        </div>
                                    <?php } ?>
                                </div>
                            </div>
                            <div class="duration-select-container">
                                <div class="title-container">
                                    <h3>Duration</h3>
                                </div>
                                <div class="border">
                                    <div class="select-container">
                                        <label for="filmHourDuration">Hour<span class="req">*</span></label>
                                        <select id="filmHourDuration" name="filmHourDuration">
                                            <option value="" disabled selected><?php echo $hourFilm["hour"]?></option>
                                            <?php

                                            foreach ($hours as $h) {
                                            ?>
                                                <option placeholder="<?php echo $filmHour[0] ?>" value="<?php echo $h; ?>"><?php echo $h; ?></option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                    <div class="select-container">
                                        <label for="filmMinuteDuration">Minute<span class="req">*</span></label>
                                        <select id="filmMinuteDuration" name="filmMinuteDuration">
                                        <option value="" disabled selected><?php echo $hourFilm["minute"]?></option>
                                            <?php

                                            foreach ($minutes as $m) {
                                            ?>
                                                <option value="<?php echo $m; ?>"><?php echo $m; ?></option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="duration-select-container">
                            <div class="title-container">
                                    <h3>Release Date</h3>
                                </div>
                                <div class="border">
                                    <div class="select-container">
                                        <label for="date">Date<span class="req">*</span></label>
                                        <div class="custom-select">
                                            <select id="date" name="date">
                                                <option value="" disabled selected><?php echo $release["date"]?></option>
                                                <?php
                                                require_once dirname(dirname(__DIR__)) . '/utils/date.php';
                                                $date = listofDate();
                                                foreach ($date as $d) {
                                                ?>
                                                    <option value="<?php echo $d; ?>"><?php echo $d; ?></option>
                                                <?php } ?>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="select-container">
                                        <label for="month">Month<span class="req">*</span></label>
                                        <div class="custom-select">
                                            <select id="month" name="month">
                                                <option value="" disabled selected><?php echo $release["month"]?></option>
                                                <?php
                                                require_once dirname(dirname(__DIR__)) . '/utils/date.php';
                                                $month = listofMonth();
                                                foreach ($month as $m) {
                                                ?>
                                                    <option value="<?php echo $m; ?>"><?php echo $m; ?></option>
                                                <?php } ?>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="select-container">
                                        <label for="year">Year<span class="req">*</span></label>
                                        <div class="custom-select">
                                            <select id="year" name="year">
                                                <option value="" disabled selected><?php echo $release["year"]?></option>
                                                <?php
                                                require_once dirname(dirname(__DIR__)) . '/utils/date.php';
                                                $year = listofYear();
                                                foreach ($year as $y) {
                                                ?>
                                                    <option value="<?php echo $y; ?>"><?php echo $y; ?></option>
                                                <?php } ?>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="button-container">
                                <a href="/manage-film">
                                    <button id="cancel" type="submit" class="button-red button-text">Cancel</button>
                                </a>
                                <button type="submit" class="button-white button-text">Save</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        <?php
        }
        ?>
    </div>
    <script>
    </script>
</body>


</html>