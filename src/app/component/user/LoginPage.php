<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
        <!---Title--->
        <title>Login</title>
        <!---Icon--->
        <link rel="icon" href="images/icon/logo.ico">
        <!---Global CSS--->
        <link rel="stylesheet" type="text/css" href="styles/template/globals.css">
        <link rel="stylesheet" type="text/css"href="styles/template/navbar.css">
        <!---Page specify CSS--->
        <link rel="stylesheet" type="text/css" href="styles/user/login.css">
        <!--JS-->
        <script type="text/javascript" src="javascript/user/login.js" defer></script>
        <script type="text/javascript" defer>
            let CSRF_TOKEN = "<?= $_SESSION['csrf_token'] ?? '' ?>";
        </script>
</head>

<body>
    <?php include(dirname(__DIR__) . "/template/NavbarUser.php");?>
    <div class="auth-page">
        <h1>Login</h1>
        <form id="login-form">
            <div class="container">
                <label for="username">Username<span class="req">*</span></label>
                <input type="text" name="username" id="username" required/>
                <div class="error" id="username-alert"></div>
    
                <label for="password">Password<span class="req">*</span></label>
                <input type="password" name="password" id="password" required/>
                <div class="error" id="password-alert"></div>

                <div>
                    <button class="button-red red-glow button-text" type="submit" name="login"><h4>Login<h4></button>
                </div>
            </div>
            <p>Already have an account? <a href="/registration">Register</a></p>
        </form>
    </div>
</body>

</html>