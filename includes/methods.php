<?php

session_start();
require_once ('db.config.php');





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
                <a class="btn blog-post-cta" href="http://what-a-comedy.test/deletepost.php?id='. $blogpost->id .'">Delete</a>
                </button>';


        } else  {
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


    /* Blog post title */
    echo '<div class="container">';


        echo '<section>';


            echo '<article>';

                echo '<div class="author-info">';

                    echo '<span class="title-post">';

                        echo '<h1>'; print_r($get['title']); '</h1>';

                    echo '</span>';


    /* Post Author */
    echo '<span>';
    echo '<address>';
    print_r($get['subject']);
    echo '</address>';
    echo '</span>';

                echo '</div>';


    /* Blog post text, the essay */
    echo '<p class="pijonärer-idag">';
    print_r($get['message']);
    echo '</p>';


    echo '</article>';
    echo '</section>';
    echo '</div>';
}

?>