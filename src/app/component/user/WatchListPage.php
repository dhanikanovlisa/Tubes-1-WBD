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
        <link rel="stylesheet" type="text/css"href="styles/template/Navbar.css">
        <link rel="stylesheet" type="text/css"href="styles/template/cardMovie.css">
        <!---Page specify CSS--->
        <link rel="stylesheet" type="text/css"href="styles/user/watchlist.css">
</head>

<body>
    <?php include(dirname(__DIR__) . "/template/NavbarUser.php");?>
    <h1>Watch List</h1>
    <section class='cards'>
        <!-- <div class='card'>
            <img src="storage/2f426e6052e1809ef93fd60ac22b03fd.jpg" alt="Midsommar">
        </div> -->
        <?php 
            require_once DIRECTORY . '/../controller/watchlist/WatchListPageController.php';
            $watchListPageController = new WatchListPageController();
            $watchListPageController->setUserID(1);

            // print_r($watchListPageController->getWatchListFilms());
            echo $watchListPageController->generateCards();
        ?>
    </section>

    <section class='pagination'>
        <div class='button-pagination'>
            <
        </div>
        <div class='button-pagination'>
            1
        </div>
    </section>
</body>

</html>