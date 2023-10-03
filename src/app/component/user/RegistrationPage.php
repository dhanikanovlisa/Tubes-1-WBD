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
</head>

<body>
    <?php include(dirname(__DIR__) . "/template/NavbarUser.php");?>
    <div class="auth-page">
        <h1>Sign Up</h1>
        <form id="registration-form">
            <div class="container">
                <label class="one" for="username">Username</label>
                <input class="one" type="text" name="username" id="username" required/>
                <div class="error" id="username-alert"></div>

                <label for="email">Email</label>
                <input type="text" name="email" id="email" required/>
                <div class="error" id="email-alert"></div>

                <label for="phone-number">Phone Number</label>
                <input type="text" name="phone-number" id="phone-number" required/>
                <div class="error" id="phone-alert"></div>

                <div class="half-container">
                    <div class="one-half">
                    <label for="first-name">First Name</label>
                    <input type="text" name="first-name" id="first-name" required/>
                    </div>

                    <div class="two-half">
                    <label for="last-name">Last Name</label>
                    <input type="text" name="last-name" id="last-name" required/>
                    </div>
                </div>
                <div class="error" id="name-alert"></div>
    
                <label for="password">Password</label>
                <input type="password" name="password" id="password" required/>
                <div class="error" id="password-alert"></div>

                <label for="confirm-password">Confirm Password</label>
                <input type="password" name="confirm-password" id="confirm-password" required/>
                <div class="error" id="confirm-password-alert"></div>

                <div class="submit">
                    <button class="button-red red-glow button-text" type="submit" name="login">Sign Up</button>
                </div>
            </div>
        </form>
        <div class="small-text">Already have an account? <a href="/login">Login</a></div>
    </div>
</body>

</html>