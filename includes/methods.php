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

    $statement = $pdo->prepare('SELECT id, title, subject, message FROM blogpost');
    $statement->execute();
    $results = $statement->fetchAll(PDO::FETCH_CLASS);

    foreach ($results as $blogpost) {
        if(isset($_SESSION['user']['user_type'])) {
            echo '<div class="post">

                    <a class="post" href="http://what-a-comedy.test/articles.php?id='. $blogpost->id .'">'.$blogpost->title. '</a>

                 </div>';
                 echo '<button class="btn">

                 <a class="btn" href="http://what-a-comedy.test/deletepost.php?id='. $blogpost->id .'">Delete</a>

                 </button>';

        } else {
                    echo '<div class="post"><a class="post" href="http://what-a-comedy.test/articles.php?id='. $blogpost->id .'">'.$blogpost->title. '</a></div>';
                }
    }
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