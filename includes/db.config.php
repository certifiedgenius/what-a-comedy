<?php

function connectToDB() {

    $db_host = 'localhost';
    $db_name = 'what_a_comedy';
    $db_username = 'root';
    $db_password = 'root';


    try {
        $db = new PDO("mysql:host=$db_host;dbname=$db_name", $db_username, $db_password);
    }

    catch (PDOException $e) {
        "there was a failure" . $e->getMessage();
    }
    return $db;
}
connectToDB();