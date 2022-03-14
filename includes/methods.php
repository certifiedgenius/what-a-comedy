<?php

require_once ('db.config.php');

// $path = "/includes/db.config.php";

// echo "Path : $path";

// require "$path";


session_start();




function redirectTo($url = null) {
    $url = $url ?? '';
    header("Location: http://what-a-comedy.test/$url");
    exit;
}


function isUserLoggedIn() {
    ["user_type" => 1];

    if (!isset($_SESSION['user'])) {
        redirectTo('./login.php');
    }
}


function listAllBlogpost() {

    $pdo = connectToDB();

    $statement = $pdo->prepare('SELECT id, title, subject, message, isVisible FROM blogpost');
    $statement->execute();
    $results = $statement->fetchAll(PDO::FETCH_CLASS);

    foreach ($results as $blogpost) {
        if($_SESSION['user']['user_type']) {
            echo '<div class="post">

                    <a class="post" href="/what-a-comedy.test/post.php?id='. $blogpost->id .'">'.$blogpost->title. '</a>

                 </div>';
                 echo '<button class="btn">

                 <a class="btn" href="/what-a-comedy.test/deletepost.php?id='. $blogpost->id .'">Delete</a>

                 </button>';

        } else {
                    echo '<div class="post"><a class="post" href="/what-a-comedy.test/post.php?id='. $blogpost->id .'">'.$blogpost->title. '</a></div>';
                }
    }

    /* echo '<ul>';
    foreach ($results as $blogpost) {
        echo '<li class="post"><a class="post" href="/what-a-comedy.test/post.php?id='. $blogpost->id .'">'.$blogpost->title. '</a></li>'; //http://what-a-comedy.test
    }
    echo '</ul>'; */
}

function showAllAttributes() {

    $pdo = connectToDB();

    $stmt = $pdo->prepare('SELECT title, subject, message FROM blogpost WHERE id = :id');
    $stmt->bindParam(':id', $_GET['id']);
    $stmt->execute();
    $get = $stmt->fetch(PDO::FETCH_ASSOC);

    echo '<li class="title-post">';
    print_r($get['title']);
    echo '</li>';

    echo '<li class="subject-post">';
    print_r($get['subject']);
    echo '</li>';

    echo '<li class="message-post">';
    print_r($get['message']);
    echo '</li>';
}

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">


    <link href="styles.css" type="text/css" rel="stylesheet">

    <title>Methods admin/blogpost</title>

</head>

<body>



</body>

</html>