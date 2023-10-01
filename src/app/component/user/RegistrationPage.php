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
        <!---JS--->
        <script type="text/javascript" src="javascript/user/register.js" defer></script>
        <script type="text/javascript" defer>
            let CSRF_TOKEN = "<?= $_SESSION['csrf_token'] ?? '' ?>";
        </script>
</head>

<body>
    <?php include(dirname(__DIR__) . "/template/NavbarUser.php");?>
    <div class="auth-page">
        <h1>Sign Up</h1>
        <form id="registration-form">
            <div class="container">
                <label for="username">Username</label>
                <input type="text" name="username" id="username" required/>

                <label for="email">Email</label>
                <input type="text" name="email" id="email" required/>

                <label for="phone-number">Phone Number</label>
                <input type="text" name="phone-number" id="phone-number" required/>
    
                <label for="password">Password</label>
                <input type="password" name="password" id="password" required/>

                <label for="confirm-password">Confirm Password</label>
                <input type="password" name="confirm-password" id="confirm-password" required/>
    
                <button class="button-red" type="submit" name="login">Sign Up</button>
                <p>Already have an account? <a href="/login">Login</a></p>
            </div>
        </form>
    </div>
</body>

</html>