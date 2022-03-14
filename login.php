<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <!-- Custom CSS File's -->
  <link rel="stylesheet" type="text/css" href="css/main.css">


  <title>Log In</title>

</head>


<body>

  <div class="wrapper-login">

    <h1>Log In</h1>


    <form class="form-login" action="./admin/login_user.php" method="POST">

      <div>
        <label>

          <input class="input-login" id="email" type="email" name="email" placeholder="E-mail" required/>
        </label>
      </div>


      <div>
        <label>

          <input class="input-login" type="password" name="password" placeholder="Password" required/>
        </label>
      </div>

      <button type="submit" name="loginform" class="button">Log In</button>
    </form>



    <div>
        <span>Don't have an account?</span>

      <a href="register.php" class="button">Sign up</a>
    </div>

  </div>


</body>
</html>