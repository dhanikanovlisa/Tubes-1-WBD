<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <!---Title--->
    <title>Notflix</title>
    <!---Icon--->
    <link rel="icon" href="images/icon/logo.ico">
    <!---Global CSS--->
    <link rel="stylesheet" type="text/css" href="/styles/template/globals.css">
    <link rel="stylesheet" type="text/css" href="/styles/template/Navbar.css">
    <!---Page specify CSS--->
    <link rel="stylesheet" type="text/css" href="/styles/admin/detailFilm.css">
    <script type="text/javascript" src="javascript/navbar/navbar.js" defer></script>
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

    $filmDetail = new FilmController();
    $filmData = $filmDetail->getFilmData($filmID);
    $totalRow = count($filmData);

    if ($totalRow == 0) {
        require_once  dirname(dirname(__DIR__)) . '/component/conditional/NotFound.php';
        exit;
    } else {
    ?>
        <div class='outer-container'>
            <h1><?php echo $filmID ?></h1>
        </div>
    <?php
    }
    ?>
</body>

</html>