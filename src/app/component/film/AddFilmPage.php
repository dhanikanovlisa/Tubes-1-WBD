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
</head>

<body>
    <?php include(dirname(__DIR__) . "/template/NavbarUser.php"); ?>
    <div class='container'>
        <h2>Add Film</h2>
        <div class="whole-container">
            <div class="image-container">
                <div class="card">
                    <img src="images/assets/placeholder-image.webp" />
                </div>
                <button class="text-black button-text">Change Poster</button>
            </div>
            <div class="detail-container">
                <form>
                    <div class="field-container">
                       <div class="input-container">
                       <label for="filmName">Film Name<span class="req">*</span></label>
                        <input type="text" id="filmName" name="filmName" placeholder="Title" required />
                       </div>
                       <div class="input-container">
                           <label for="filmName">Description<span class="req">*</span></label>
                           <input type="text" id="filmName" name="filmName" placeholder="Title" required />
                       </div>
                       <div class="input-container">
                           <label for="filmName">Genre<span class="req">*</span></label>
                           <input type="checkbox" id="action" name="action" value="action">
                           <label for="action" class="text-white">Action</label>
                       </div>
                       <div class="input-container">
                        <div>
                            </div>
                       </div>
                    </div>
                    <div class="button-container">
                        <button class="button-red button-text">Cancel</button>
                        <button class="button-white button-text">Save</button>
                    </div>
                </form>

            </div>
        </div>
    </div>
</body>

</html>