<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">


    <link rel="stylesheet" type="text/css" href="css/register.css">


    <title>Register</title>
</head>

<body>
    <div class="register-container">
        <h1 class="h1-register">Sign up for what a comedy</h1>
        <form class="form-register" action="./admin/register_user.php" method="POST">
            <div class="div-register">
                <label><span>E-mail</span>
                    <input class="input-user" id="email" type="email" name="email" required />
                </label>
            </div>

            <div class="div-register">
                <label><span>Password</span>
                    <input class="input-user" type="password" name="password" required />
                </label>
            </div>
            <button class="register-btn" type="submit" name="loginform">Create</button>
        </form>
        <div class="div-tagg">
            Already have an account?<a href="login.php">
                <p class="text-info">Login here</p>
            </a>
        </div>
    </div>
    
</body>

</html>