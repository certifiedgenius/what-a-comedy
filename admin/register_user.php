<?php 
require_once "../properties/connection.php"; 
require_once "../properties/methods.php"; 

$email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
$password = filter_input(INPUT_POST, 'password', FILTER_SANITIZE_STRING);
$phash = password_hash($password, PASSWORD_DEFAULT);

$pdo = connectToDB();

if(isset($_REQUEST['loginform'])) 
{
	$email = strip_tags($_REQUEST['email']);		
	$password	= strip_tags($_REQUEST['password']);	
		
	if(empty($email)){
		echo "Please enter email";	
	}
	
	else if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
		echo "Please enter a valid email address";	
	}
	else if(empty($password)){
		echo "Please enter password";	
	}
	else if(strlen($password) < 6){
		echo "Password must be atleast 6 characters";	
	}
	else
	{	
		try
		{	
			$select_register=$pdo->prepare("SELECT email FROM users WHERE email=:email");
			
			$select_register->execute(array(':email'=>$email)); 
			$row=$select_register->fetch(PDO::FETCH_ASSOC);	
			
			if($row["email"]==$email){
				echo "Sorry email already exists";	
        header( "refresh:3;url=http://localhost/individuella-php/php/register.php" );
			}
			else if(!isset($errorMsg))
			{
				$new_password = password_hash($password, PASSWORD_DEFAULT);  //encrypterar lösenordet genom att använda en hash.
				$details=$pdo->prepare("INSERT INTO users	(email, password) VALUES (:email,:password)"); 							
				if($details->execute(array(	':email'	=>$email, ':password'=>$new_password))){								
					$registerMsg="Success! Please Log in!"; 
          header( "refresh:3;url=http://localhost/individuella-php/php/register.php" );
				}
			}
		}
		catch(PDOException $e)
		{
			echo $e->getMessage();
		}
	}
}

