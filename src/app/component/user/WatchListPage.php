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
        <link rel="stylesheet" type="text/css"href="styles/template/pagination.css">
        <!---Page specify CSS--->
        <link rel="stylesheet" type="text/css"href="styles/user/watchlist.css">
</head>

<body>
    <?php include(dirname(__DIR__) . "/template/NavbarUser.php");?>
    <?php 
        require_once DIRECTORY . '/../controller/watchlist/WatchListPageController.php';
        $watchListPageController = new WatchListPageController();
        $watchListPageController->setUserID(1);
    ?>
    <header>
        <h2>Your Watchlist</h2>
    </header>
    <section class='cards'>
        <?php 
            $watchListPageController->generateCards();
        ?>
    </section>

    <section class='pagination'>
        <?php 
            $watchListPageController->generatePagination();
        ?>
    </section>
</body>

</html>