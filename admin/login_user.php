<?php 
require_once "../properties/methods.php";
require_once "../properties/connection.php";

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

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
/* redirectTo ('./admin/) */

/* if ($user['user_type'] === NULL) {
  echo "user ett";
  header('location:http://localhost/individuella-php/index.php');
}

if($user['user_type'] === 1) {
  echo "admin";
  header("location:http://localhost/individuella-php/admin/index.php");
} 
 */