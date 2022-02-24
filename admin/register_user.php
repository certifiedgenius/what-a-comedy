<?php

require_once "../includes/db.config.php";
require_once "../includes/methods.php";


$email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
$password = filter_input(INPUT_POST, 'password', FILTER_SANITIZE_STRING);
$passwordHash = password_hash($password, PASSWORD_DEFAULT);


$pdo = connectToDB();


if (isset($_REQUEST['loginform'])) {

	$email = strip_tags($_REQUEST['email']);
	$password	= strip_tags($_REQUEST['password']);

	if (empty($email)) {
		echo "Please enter email";
	}

	else if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
		echo "Please enter a valid E-mail address.";
	}

	else if (empty($password)) {
		echo "Please enter your password.";
	}

	else if (strlen($password) < 6) {
		echo "Password must at be least 6 characters in length.";
	} else {
		try {
			$select_register=$pdo->prepare("SELECT email FROM users WHERE email=:email");

			$select_register->execute(array(':email'=>$email));
			$row=$select_register->fetch(PDO::FETCH_ASSOC);

			if ($row["email"]==$email) {
				echo "Sorry, that E-mail already exists.";
				header( "refresh:3;url=http://what-a-comedy.test/register.php" );
			}

			else if (!isset($errorMsg)) {
				$new_password = password_hash($password, PASSWORD_DEFAULT);

				$details=$pdo->prepare("INSERT INTO users (email, password) VALUES (:email,:password)");


				if ($details->execute(array(':email'=>$email, ':password'=>$new_password))) {
					$registerMsg="Successful! Please Log in.";
					header( "refresh:3;url=http://what-a-comedy.test/register.php" );
				}
			}
		}
		catch(PDOException $e) {
			echo $e->getMessage();
		}
	}
};