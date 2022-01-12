<?php

    require_once "./includes/methods.php";

    isUserLoggedIn();

?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/main.css">

    <title>Photos</title>
</head>


<body>

    <!-- Header -->
    <?php include 'includes/header.php'; ?>




    <!-- Photo Gallery -->
        <div id="photo-page-container">
            <div id="modal-popup">
                <button id="btn" class="close">Close</button>
                <img src="" id="image-popup">
                <p id="description"></p>
            </div>
        </div>



    <!-- Unreleased Drake -->
    <div class="audio-container">
        <!-- The audio file  -->
        <audio controls autoplay loop>
            <source src="Audio/Drake - Mention Me (with Rema).mp3" type="audio/mpeg" />
        </audio>
    </div>



    <!--footer-->
    <?php include 'includes/footer.php'; ?>




    <script src="/js/app.js"></script>
</body>
</html>