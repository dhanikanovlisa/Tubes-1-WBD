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
        <script type="text/javascript" src="javascript/navbar/navbar.js" defer></script>
        <link rel="stylesheet" type="text/css"href="styles/user/search.css">
</head>

<body>
    <?php include(dirname(__DIR__) . "/template/NavbarUser.php");?>
    <?php
        require_once(DIRECTORY . '/../controller/search/SearchPageController.php');
        $SearchPageController = new SearchPageController();
    ?>
    <section>
        <header>
            <h2>Search</h2>
        </header>
    
        <form class='search-container'>
            <div>
                <label for='search' class='white-text'>Search</label>
                <input name='search' id='search' type='text' placeholder='Search...'>
            </div>
            <div>
                <label for='orderby' class='white-text'>Name</label>
                <select name='orderby' id='orderby'>
                    <option value='ASC'>Ascending</option>
                    <option value='DESC'>Descending</option>
                </select>
            </div>
            <div>
                <label for='genre' class='white-text'>Genre</label>
                <select name='genre' id='genre'>
                    <?php /**generate genres*/ ?>
                </select>
            </div>
        </form>
    </section>
    
</body>

</html>