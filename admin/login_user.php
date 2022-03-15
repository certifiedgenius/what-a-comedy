<?php

require_once "../includes/methods.php";
require_once "../includes/db.config.php";




$email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
$password = filter_input(INPUT_POST, 'password', FILTER_SANITIZE_STRING);
$pdo = connectToDB();


$stmt = $pdo->prepare('SELECT * FROM users WHERE email = :email');
$stmt->execute(['email' => $email]);
$user = $stmt->fetch();




if(!password_verify($password, $user['password'])) {
  redirectTo('./login.php');
};


$_SESSION['user'] = $user;
redirectTo('./index.php');
/* redirectTo ('./admin) */





if ($user['user_type'] === 0) {
  echo "user";
  header('location:http://what-a-comedy.test/index.php');


} else if ($user['user_type'] === 1) {
  echo "admin";
  header("location:http://what-a-comedy.test/admin/index.php");


} else {
  echo "E-mail or Password is incorrect.";
};

