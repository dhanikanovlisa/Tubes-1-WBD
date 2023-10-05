<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!---Title--->
    <title>Notflix</title>
    <!---Icon--->
    <link rel="icon" href="/images/icon/logo.ico">
    <!---Global CSS--->
    <link rel="stylesheet" type="text/css" href="/styles/template/globals.css">
    <link rel="stylesheet" type="text/css" href="/styles/template/Navbar.css">
    <link rel="stylesheet" type="text/css" href="/styles/template/toast.css">
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
    $filmData = $filmDetail->getFilmData($filmID); //udh bener querynya
    $filmGenre = $filmDetail->getFilmGenre($filmID); //udh bener querynya
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
                <div class="detail-container">
                    <form id="editFilmForm">
                        <div class="field-container">
                            <div class="upper">
                                <div>
                                    <div class="input-container">
                                        <!--Film Name-->
                                        <h3 for="filmName">Film Name</h3>
                                        <input type="text" id="filmName" name="filmName" placeholder="<?php echo $filmData['title'] ?>" />
                                    </div>
                                    <div class="input-container">
                                        <h3 for="filmDescriptsion">Description</h3>
                                        <textarea id="filmDescription" name="filmDescription" placeholder="<?php echo $filmData['description'] ?>"></textarea>
                                    </div>
                                </div>

                                <div class="input-container">
                                    <h3>Genre</h3>
                                    <?php
                                    require_once dirname(dirname(__DIR__)) . '/controller/film/GenreController.php';
                                    $genre = new GenreController();
                                    $result = $genre->getAllGenre();
                                    ?>

                                    <div class="checkbox-container">
                                        <?php foreach ($result as $row) { ?>
                                            <div class="checkbox-item">
                                                <input type="checkbox" id="genre_<?php echo $row['genre_id']; ?>" name="filmGenre[]" value="<?php echo $row['genre_id']; ?>">
                                                <div class="checkbox-contain">
                                                    <span class="custom-checkbox"></span>
                                                    <label class="chekbox-label" for="genre_<?php echo $row['genre_id']; ?>"><?php echo $row['name']; ?>
                                                </div>
                                                </label>
                                            </div>
                                        <?php } ?>
                                    </div>
                                </div>
                            </div>
                            <div class="duration-select-container">
                                <h3>Duration</h3>
                                <div class="border">
                                    <div class="select-container">
                                        <label for="filmHourDuration">Hour</label>
                                        <select id="filmHourDuration" name="filmHourDuration">
                                            <option value="" disabled selected><?php echo $hourFilm["hour"] ?></option>
                                            <?php

                                            foreach ($hours as $h) {
                                            ?>
                                                <option placeholder="<?php echo $filmHour[0] ?>" value="<?php echo $h; ?>"><?php echo $h; ?></option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                    <div class="select-container">
                                        <label for="filmMinuteDuration">Minute</label>
                                        <select id="filmMinuteDuration" name="filmMinuteDuration">
                                            <option value="" disabled selected><?php echo $hourFilm["minute"] ?></option>
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
                                <h3>Release Date</h3>
                                <input type="date" id="filmDate" name="filmDate" value="" min="1950-01-01" max="2024-12-31" pattern="\d{4}-\d{2}-\d{2}" />
                            </div>
                            <div class="upload-content">
                                <!--Film Poster-->
                                <div>
                                    <h3>Film Poster</h3>
                                    <input type="file" id="filmPoster" name="filmPoster" accept="image/*" class="inputFile" />
                                    <label for="filmPoster" class="file-style">
                                    <div class="centered">
                                        <svg xmlns="http://www.w3.org/2000/svg" height="3em" viewBox="0 0 448 512">
                                            <style>
                                                svg {
                                                    fill: #fff5f6
                                                }
                                            </style>
                                            <path d="M246.6 9.4c-12.5-12.5-32.8-12.5-45.3 0l-128 128c-12.5 12.5-12.5 32.8 0 45.3s32.8 12.5 45.3 0L192 109.3V320c0 17.7 14.3 32 32 32s32-14.3 32-32V109.3l73.4 73.4c12.5 12.5 32.8 12.5 45.3 0s12.5-32.8 0-45.3l-128-128zM64 352c0-17.7-14.3-32-32-32s-32 14.3-32 32v64c0 53 43 96 96 96H352c53 0 96-43 96-96V352c0-17.7-14.3-32-32-32s-32 14.3-32 32v64c0 17.7-14.3 32-32 32H96c-17.7 0-32-14.3-32-32V352z" />
                                        </svg>
                                        <p class="button-text">Upload Film Poster</p>
                                    </div>
                                    </label>
                                    <div class="file-name" id="display-filePoster-name"></div>
                                </div>

                                <!--Film Video-->
                                <div>
                                    <h3>Film Video</h3>
                                    <input type="file" id="filmVideo" name="filmVideo" accept="video/*" />
                                    <label for="filmVideo" class="file-style">
                                        <div class="centered">
                                            <svg xmlns="http://www.w3.org/2000/svg" height="3em" viewBox="0 0 448 512">
                                                <style>
                                                    svg {
                                                        fill: #fff5f6
                                                    }
                                                </style>
                                                <path d="M246.6 9.4c-12.5-12.5-32.8-12.5-45.3 0l-128 128c-12.5 12.5-12.5 32.8 0 45.3s32.8 12.5 45.3 0L192 109.3V320c0 17.7 14.3 32 32 32s32-14.3 32-32V109.3l73.4 73.4c12.5 12.5 32.8 12.5 45.3 0s12.5-32.8 0-45.3l-128-128zM64 352c0-17.7-14.3-32-32-32s-32 14.3-32 32v64c0 53 43 96 96 96H352c53 0 96-43 96-96V352c0-17.7-14.3-32-32-32s-32 14.3-32 32v64c0 17.7-14.3 32-32 32H96c-17.7 0-32-14.3-32-32V352z" />
                                            </svg>
                                            <p class="button-text">Upload Film Video</p>
                                        </div>
                                    </label>
                                    <div class="file-name" id="display-fileVideo-name"></div>
                                </div>
                                <div>
                                    <h3>Film Header</h3>
                                    <input type="file" id="filmHeader" name="filmHeader" accept="image/*" />
                                    <label for="filmHeader" class="file-style">
                                        <div class="centered">
                                            <svg xmlns="http://www.w3.org/2000/svg" height="3em" viewBox="0 0 448 512">
                                                <style>
                                                    svg {
                                                        fill: #fff5f6
                                                    }
                                                </style>
                                                <path d="M246.6 9.4c-12.5-12.5-32.8-12.5-45.3 0l-128 128c-12.5 12.5-12.5 32.8 0 45.3s32.8 12.5 45.3 0L192 109.3V320c0 17.7 14.3 32 32 32s32-14.3 32-32V109.3l73.4 73.4c12.5 12.5 32.8 12.5 45.3 0s12.5-32.8 0-45.3l-128-128zM64 352c0-17.7-14.3-32-32-32s-32 14.3-32 32v64c0 53 43 96 96 96H352c53 0 96-43 96-96V352c0-17.7-14.3-32-32-32s-32 14.3-32 32v64c0 17.7-14.3 32-32 32H96c-17.7 0-32-14.3-32-32V352z" />
                                            </svg>
                                            <p class="button-text">Upload Film Header</p>
                                        </div>
                                    </label>
                                    <div class="file-name" id="display-fileHeader-name"></div>
                                </div>
                            </div>
                            <div class="button-container">
                                <a href="/manage-film">
                                    <button id="cancel" type="submit" class="button-red button-text">Cancel</button>
                                </a>
                                <button id="saveButton" class="button-white button-text" onclick="succes()">Save</button>
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
        var filmID = <?php echo json_encode($filmID); ?>;
    </script>
    <script src="/javascript/film/editFilm.js" defer></script>
    <?php include(dirname(__DIR__) . "/template/toast.php"); ?>
</body>


</html>