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
    <link rel="stylesheet" type="text/css" href="/styles/user/editprofile.css">
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
                                <div class="field-contain">
                                    <label class="one" for="username">Username</label>
                                    <input class="one" type="text" name="username" id="username" placeholder="<?php echo $userData["username"]?>"/>
                                </div>

                                <div class="half-container">
                                    <div class="one-half">
                                        <label for="first-name">First Name</label>
                                        <input type="text" name="first-name" id="first-name" placeholder="<?php echo $userData["first_name"]?>"/>
                                    </div>

                                    <div class="two-half">
                                        <label for="last-name">Last Name</label>
                                        <input type="text" name="last-name" id="last-name" placeholder="<?php echo $userData["last_name"]?>"/>
                                    </div>
                                </div>

                                <div class="field-contain">
                                    <label for="email">Email</label>
                                    <input type="text" name="email" id="email" placeholder="<?php echo $userData["email"]?>"/>
                                </div>

                                <div class="field-contain">
                                    <label for="phone-number">Phone Number</label>
                                    <input type="text" name="phone-number" id="phone-number" placeholder="<?php echo $userData["phone_number"]?>"/>
                                </div>
                                <div class="btn-contain">
                                    <button class="button-red button-text">Cancel</button>
                                    <button class="button-white button-text">Save</button>
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