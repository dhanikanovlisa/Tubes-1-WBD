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
        <link rel="stylesheet" type="text/css"href="styles/template/navbar.css">
        <link rel="stylesheet" type="text/css"href="styles/template/card.css">
        <link rel="stylesheet" type="text/css" href="styles/user/homepage.css">
        <!---Page specify CSS--->
</head>

<body>
    <?php include(dirname(__DIR__) . "/template/NavbarUser.php");?>

    <div class="img-header">
            <img src="images/assets/movie-poster-sample.jpg"/>
            <div class="img-header-overlay"></div>
            <div class="img-header-text">
                <h1>Movie Title</h1>
                <h4>20 January 2017</h4>
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam sem nulla, malesuada a justo a, consequat fermentum eros. Etiam auctor accumsan enim eget molestie. In tellus sapien, pharetra eget dolor at, pretium placerat erat. Donec sed risus congue, varius velit quis, placerat arcu. Sed at fringilla ipsum. </p>
                <div>
                    <button class="button-white">Watch Now</button>
                    <button class="button-white">+</button>
                </div>
            </div>
        </div>

        <?php include(dirname(__DIR__) . "/template/Card.php");?>
    <!-- <div class="cards">
            <!-- <div class="card">
                <img src="images/assets/movie-poster-sample.jpg"/>
            </div>
            <div class="card">
                <img src="images/assets/movie-poster-sample.jpg"/>
            </div>
            <div class="card">
                <img src="images/assets/movie-poster-sample.jpg"/>
            </div>
            <div class="card">
                <img src="images/assets/movie-poster-sample.jpg"/>
            </div>
            <div class="card">
                <img src="images/assets/movie-poster-sample.jpg"/>
            </div>
            <div class="card">
                <img src="images/assets/movie-poster-sample.jpg"/>
            </div>
            <div class="card">
                <img src="images/assets/movie-poster-sample.jpg"/>
            </div>
            <div class="card">
                <img src="images/assets/movie-poster-sample.jpg"/>
            </div>
            <div class="card">
                <img src="images/assets/movie-poster-sample.jpg"/>
            </div>
            <div class="card">
                <img src="images/assets/movie-poster-sample.jpg"/>
            </div>
            <div class="card">
                <img src="images/assets/movie-poster-sample.jpg"/>
            </div>
            <div class="card">
                <img src="images/assets/movie-poster-sample.jpg"/>
            </div>
            <div class="card">
                <img src="images/assets/movie-poster-sample.jpg"/>
            </div>
            <div class="card">
                <img src="images/assets/movie-poster-sample.jpg"/>
            </div>
            <div class="card">
                <img src="images/assets/movie-poster-sample.jpg"/>
            </div>
            <div class="card">
                <img src="images/assets/movie-poster-sample.jpg"/>
            </div>
            <div class="card">
                <img src="images/assets/movie-poster-sample.jpg"/>
            </div>
            <div class="card">
                <img src="images/assets/movie-poster-sample.jpg"/>
            </div> -->
        </div> -->
</body>

</html>