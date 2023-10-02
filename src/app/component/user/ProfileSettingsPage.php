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
    <link rel="stylesheet" type="text/css" href="/styles/admin/userDetail.css">
</head>

<body>
    <?php
    $username = $_SESSION["user_id"];
    /**IF someone tries to access URL */
    if (!isset($username)){
        $test = trim('/', $_SERVER["REQUEST_URI"]);
        $test = explode('/', $test);
        $username = $test[1];
    }

    $userDetail = new UserController();
    $userData = $userDetail->getUserByID($username);
    $totalRow = count($userData);
    
    if ($totalRow == 0) {
        require_once  DIRECTORY . '/../component/conditional/NotFound.php';
        exit;
    } else {
    ?>
        <div class='outer-container'>
            <h1>User</h1>
            <div class="detail-container">
                <div class="photo-profile">
                </div>
                <div>
                    <div>
                        <h2>Name</h2>
                        <p><?php echo $userData['first_name']; ?></p>
                    </div>
                </div>
            </div>
        </div>
    <?php
    }
    ?>
</body>

</html>
