<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
        <!---Title--->
        <title>Notflix</title>
        <!---Icon--->
        <link rel="icon" href="images/icon/logo.ico">
        <!---Global CSS--->
        <link rel="stylesheet" type="text/css" href="../../../public/styles/template/globals.css">
        <link rel="stylesheet" type="text/css" href="../../../public/styles/template/navbar.css">
        <!---Page specify CSS--->
        <link rel="stylesheet" type="text/css" href="../../../public/styles/user/login.css">
</head>

<body>
    <?php include("../template/navbar.php"); ?>
    <div class="login">
        <h1>Login</h1>
        <form action="login.php" method="post">
            <div class="container">
                <label for="username">Username</label>
                <input type="text" name="username" required>
    
                <label for="password">Password</label>
                <input type="password" name="password"  required>
    
                <button class="button-red" type="submit" name="login">Login</button>
                <p>Don't have an account? <a href="SignupPage.php">Register</a></p>
            </div>
    </div>
</body>

</html>