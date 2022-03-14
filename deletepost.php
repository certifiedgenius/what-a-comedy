<?php

require_once "./includes/methods.php";
require_once "./includes/db.config.php";

$pdo = connectToDB();

$stmt = $pdo->prepare('DELETE FROM blogpost WHERE id = :id');

$stmt->bindParam(':id', $_GET['id']);

$id = $_GET['id'];


$stmt->execute();