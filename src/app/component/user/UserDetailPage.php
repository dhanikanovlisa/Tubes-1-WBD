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
    <link rel="stylesheet" type="text/css" href="/styles/admin/userDetail.css">
    <link rel="stylesheet" type="text/css" href="/styles/template/confirmationModal.css">
    <script type="text/javascript" src="/javascript/user/deleteUser.js" defer></script>
</head>

<body>
    <?php include(dirname(__DIR__) . "/template/NavbarUser.php"); ?>
    <?php
    $id = $params['id'];
    /**IF someone tries to access URL */
    if (!isset($id)) {
        $test = trim('/', $_SERVER["REQUEST_URI"]);
        $test = explode('/', $test);
        $username = $test[1];
    }

    $userDetail = new UserController();
    $userData = $userDetail->getUserBYID($id);
    $totalRow = count($userData);
    if ($totalRow == 0) {
        require_once  dirname(dirname(__DIR__)) . '/component/conditional/NotFound.php';
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

                        <div class="field-container">
                            <h3>Username</h3>
                            <p><?php echo $userData['username']; ?></p>
                        </div>
                        <div class="field-container">
                            <h3>Name</h3>
                            <p><?php echo $userData['first_name'] . " " .  $userData['last_name']; ?></p>
                        </div>
                        <div class="field-container">
                            <h3>Email</h3>
                            <p><?php echo $userData['email'] ?></p>
                        </div>
                        <div class="field-container">
                            <h3>Phone Number</h3>
                            <p><?php echo $userData['phone_number'] ?></p>
                        </div>
                        <div class="field-container">
                            <h3>Admin</h3>
                            <p><?php 
                            if($userData['is_admin']){
                                echo "Yes";
                            } else if(!$userData['is_admin']){
                                echo "No";
                            }
                            ?></p>
                        </div>
                        <div class="field-container">
                                <button class="button-white button-text" onClick="popModal()">Delete Account</button>
                                <div id="confModal" class="modal red-glow">
                                    <div class="modal-content red-glow">
                                        <div class="whole">
                                            <div class="title-container">
                                                <h3 class="text-black" id="main-message">Are you sure you want to Delete This User?</h3>
                                                <p class="text-black" id="description-message">This will be gone</p>
                                            </div>
                                            <div class="button-container">
                                                <button id="cancel" class="button-red button-text" onClick="closeModal()">Cancel</button>
                                                <button id="ok" class="button-green button-text" onclick="deleteUser(<?php echo $id; ?>)">OK</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    <?php
    }
    ?>
</body>

</html>