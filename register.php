<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Custom CSS File's -->
    <link rel="stylesheet" type="text/css" href="css/main.css">


    <title>Register</title>

</head>


<body>

    <div class="wrapper-login">

        <h1>Sign up for what a comedy</h1>

        <form class="form-login" action="./admin/register_user.php" method="POST">

            <div>
                <label>

                    <input class="input-user input-login" id="email" type="email" name="email" placeholder="E-mail" required>
                </label>
            </div>


            <div>
                <label>

                    <input class="input-user input-login" type="password" name="password" placeholder="Password" required>
                </label>
            </div>

            <button class="button" type="submit" name="loginform">Create</button>
        </form>




        <div>
            Already have an account?<a href="login.php">

                <p class="button">Log in here</p>
            </a>
        </div>

    </div>

</body>
</html>