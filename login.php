<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <!-- Custom CSS File's -->
  <link rel="stylesheet" type="text/css" href="css/login-signup.css">


  <title>Log In</title>

</head>

<body>
  
  <div class="wrapper-login">

    <h1>Log In</h1>


    <form class="form-login" action="./admin/login_user.php" method="POST">

      <div>
        <label><span>E-mail</span>

          <input class="input-login" id="email" type="email" name="email" required/>
        </label>

      </div>


      <div>
        <label><span>Password</span>

          <input class="input-login" type="password" name="password" required/>
        </label>
      </div>

      <button type="submit" name="loginform">Log In</button>
    </form>


    <div>
      Don't have an account?<a href="register.php">
        <p>Sign Up</p>
      </a>
    </div>
  </div>

  <img src="https://i.gifer.com/EaH.gif"
    width="1800" height="800" class="giphy-embed" allowFullScreen></img>

</body>

</html>