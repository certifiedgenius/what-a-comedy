<?php

require_once "../db.config.php";


session_start();


ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

function redirectTo($url = null) {
    $url = $url ?? '';
    header("Location: http://localhost/what_a_comedy/php/$url");
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

    $statement = $pdo->prepare('SELECT id, title, subject, message FROM blogpost');
    $statement->execute();
    $results = $statement->fetchAll(PDO::FETCH_CLASS);

    echo '<ul>';
    foreach ($results as $blogpost) {
        echo '<li class="post"><a class="post" href="/what_a_comedy/post.php?id='. $blogpost->id .'">'.$blogpost->title. '</a></li>';
    }
    echo '</ul>';
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

    <title>Methods</title>

</head>

<body>



</body>

</html>