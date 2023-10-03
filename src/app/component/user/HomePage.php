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
    <link rel="stylesheet" type="text/css" href="styles/template/navbar.css">
    <link rel="stylesheet" type="text/css" href="styles/template/cardMovie.css">
    <link rel="stylesheet" type="text/css" href="styles/template/toast.css">
    <!---Page specify CSS--->
    <link rel="stylesheet" type="text/css" href="styles/user/homepage.css">
    <link rel="stylesheet" type="text/css" href="styles/template/pagination.css">
    <!-- JS --->
    <script type="text/javascript" src="javascript/user/home.js" defer></script>
</head>
<body>
    <?php include(dirname(__DIR__) . "/template/NavbarUser.php"); ?>
    <?php
        require_once DIRECTORY . '/../controller/user/HomePageController.php';
        $home = new HomePageController();
    ?>
    <div class="img-header">
        <?php
            $film_header = $home->generateFilmHeader()[0];
            $film_id = $film_header['film_id'];
            $title = $film_header['title'];
            $date = date_create($film_header['date_release']);
            $release = date_format($date, "j M Y");
            $desc = $film_header['description'];
            $img_path = $film_header['film_poster'];
            $isOnWatchList = $home->isFilmOnWatchList($_SESSION['user_id'], $film_id);
        ?>
        <img src=<?php echo '"storage/poster/'.$img_path.'"'?> />
        <div class="img-header-overlay"></div>
        <div class="img-header-text">
            <h1><?php echo $title?></h1>
            <h4><?php echo $release?></h4>
            <p><?php echo $desc?></p>
            <div class="buttons">
                <button class="button-white button-text">Watch Now</button>
                <button class="button-white button-text watchlist" onClick="watchListButton()" id="watchlist">
                    <?php
                        if ($isOnWatchList){
                            echo "&#10004";
                        } else {
                            echo "+";
                        }
                    ?>
                </button>
            </div>
        </div>
    </div>
    <div class="body">
        <div class="body-title"><h2>What Do You Want to Watch Today?</h2></div>
        <div class="cards">
            <?php  $home->generateCards()?>
        </div>
        <div class="pagination">
            <?php $home->generatePagination()?>
        </div>
    </div>
    <?php include(dirname(__DIR__) . "/template/toast.php"); ?>
</body>

</html>