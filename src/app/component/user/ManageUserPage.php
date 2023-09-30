<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <!-- Title -->
    <title>Notflix</title>
    <!-- Icon -->
    <link rel="icon" href="images/icon/logo.ico">
    <!-- Global CSS -->
    <link rel="stylesheet" type="text/css" href="styles/template/globals.css">
    <link rel="stylesheet" type="text/css" href="styles/template/cardUser.css">
    <!-- Page-specific CSS -->
    <link rel="stylesheet" type="text/css" href="styles/user/manageUser.css">
    <!-- Include the external JavaScript file -->
    <script src="javascript/component/cardUser.js"></script>
</head>

<body>
    <?php include(dirname(__DIR__) . "/template/NavbarUser.php"); ?>
    <?php
    require_once DIRECTORY . '/../controller/user/ManageUserController.php';
    $user = new ManageUserController();
    $result = $user->getAllUser();
    ?>
    <div class="container">
    <?php foreach ($result as $user) {
        include(DIRECTORY . "/../component/template/cardUser.php");
    }?> 
    </div>
    <script>
        const userData = <?php echo json_encode($result); ?>;
    </script>
</body>

</html>
