<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <!---Title--->
    <title>Notflix</title>
    <!---Icon--->
    <link rel="icon" href="/images/icon/logo.ico">
    <!---Global CSS--->
    <link rel="stylesheet" type="text/css" href="/styles/template/globals.css">
    <link rel="stylesheet" type="text/css" href="/styles/template/Navbar.css">
    <!---Page specify CSS--->
    <link rel="stylesheet" type="text/css" href="/styles/user/profilesetting.css">
</head>

<body>
    <?php include(dirname(__DIR__) . "/template/NavbarUser.php"); ?>
    <?php
    require_once DIRECTORY . '/../controller/user/UserController.php';
    $id = $_SESSION["user_id"];
    /**IF someone tries to access URL */

    $userDetail = new UserController();
    $userData = $userDetail->getUserByID($id);
    $totalRow = count($userData);

    if ($totalRow == 0) {
        require_once  DIRECTORY . '/../component/conditional/NotFound.php';
        exit;
    } else {
    ?>
        <div class='outer-container'>
            <div class="upper-container">
                <div class="header">
                    <h1>Profile</h1>
                </div>
                <div class="whole-container">
                    <div class="profile">
                        <img src="/images/assets/profile-placeholder.png" />
                    </div>

                    <div class="detail-container">
                        <form id="editProfile">
                            <div class="container">
                                <label class="one" for="username">Username</label>
                                <input class="one" type="text" name="username" id="username" required />
                                <div class="error" id="username-alert"></div>

                                <label for="email">Email</label>
                                <input type="text" name="email" id="email" required />
                                <div class="error" id="email-alert"></div>

                                <label for="phone-number">Phone Number</label>
                                <input type="text" name="phone-number" id="phone-number" required />
                                <div class="error" id="phone-alert"></div>

                                <div class="half-container">
                                    <div class="one-half">
                                        <label for="first-name">First Name</label>
                                        <input type="text" name="first-name" id="first-name" required />
                                    </div>

                                    <div class="two-half">
                                        <label for="last-name">Last Name</label>
                                        <input type="text" name="last-name" id="last-name" required />
                                    </div>
                                </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    <?php
    }
    ?>
</body>

</html>