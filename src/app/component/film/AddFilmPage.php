<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <!---Title--->
    <title>Notflix</title>
    <!---Icon--->
    <link rel="icon" href="images/icon/logo.ico">
    <!---Global CSS--->
    <link rel="stylesheet" type="text/css" href="styles/template/globals.css">
    <link rel="stylesheet" type="text/css" href="styles/template/Navbar.css">
    <link rel="stylesheet" type="text/css" href="styles/template/cardMovie.css">
    <!---Page specify CSS--->
    <link rel="stylesheet" type="text/css" href="styles/film/addFilm.css">
    <script src="javascript/film/addFilm.js" defer></script>
</head>

<body>
    <?php include(dirname(__DIR__) . "/template/NavbarUser.php"); ?>
    <div class='container'>
        <h2>Add Film</h2>
        <div class="whole-container">
            <div class="detail-container">
                <form id="addFilmForm">
                    <div class="field-container">
                        <div class="input-container">
                            <label for="filmName">Film Name<span class="req">*</span></label>
                            <input type="text" id="filmName" name="filmName" placeholder="Title" required />
                            <label for="filmPoster">Film Poster<span class="req">*</span></label>
                            <input type="file" id="filmPoster" name="filmPoster" accept="image/*" required />
                            <label for="filmVideo">Film Video<span class="req">*</span></label>
                            <input type="file" id="filmPoster" name="filmVideo" accept="video/*" required />
                        </div>
                        <div class="input-container">
                            <label for="filmDescriptsion">Description<span class="req">*</span></label>
                            <textarea id="filmDescription" name="filmDescription" placeholder="Description" required></textarea>
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
                            <div class="select-container">
                                <label for="filmHourDuration">Hour<span class="req">*</span></label>

                                <div class="custom-select">
                                    <select id="filmHourDuration" name="filmHourDuration">
                                        <?php
                                        require_once dirname(dirname(__DIR__)) . '/utils/duration.php';
                                        $hours = listofHour();
                                        foreach ($hours as $h) {
                                        ?>
                                            <option value="<?php echo $h; ?>"><?php echo $h; ?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                            </div>
                            <div class="select-container">
                                <label for="filmMinuteDuration">Minute<span class="req">*</span></label>
                                <select id="filmMinuteDuration" name="filmMinuteDuration">
                                    <?php
                                    require_once dirname(dirname(__DIR__)) . '/utils/duration.php';
                                    $minutes = listofMinutes();
                                    foreach ($minutes as $m) {
                                    ?>
                                        <option value="<?php echo $m; ?>"><?php echo $m; ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                        </div>
                        <div class="date-select-container">
                            <div class="select-container">
                                <label for="date">Date<span class="req">*</span></label>
                                <div class="custom-select">
                                    <select id="date" name="date">
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
                        <div class="button-container">
                            <button type="submit" class="button-red button-text">Cancel</button>
                            <button type ="submit" class="button-white button-text">Save</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>

</html>