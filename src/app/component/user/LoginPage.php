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
        <!--Page JS-->
        <script type="text/javascript" src="javascript/user/login1.js" defer></script>

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
                <label for="username">Username</label>
                <input type="text" name="username" id="username" required/>
    
                <label for="password">Password</label>
                <input type="password" name="password" id="password" required/>
    
                <button class="button-red" type="submit" name="login">Login</button>
                <p>Already have an account? <a href="/registration">Register</a></p>
            </div>
        </form>
    </div>
</body>

</html>