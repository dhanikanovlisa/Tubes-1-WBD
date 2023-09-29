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
    <link rel="stylesheet" type="text/css" href="styles/admin/manageUser.css">
    <!-- Include the external JavaScript file -->
    <script src="javascript/cardUser.js"></script>
</head>

<body>
    <?php
    // Ganti Query
    $userData = [
        ["name" => 'Dhanika Novlisariyanti', "role" => 'Admin'],
        ["name" => 'Diaaam', "role" => 'User'],
    ];
    ?>
    <div class="container">
    <?php foreach ($userData as $user) {
        include(dirname(__DIR__) . "/template/cardUser.php");
    }?> 
    </div>
    <script>
        const userData = <?php echo json_encode($userData); ?>;
    </script>
</body>

</html>
