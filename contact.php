<?php

require_once "./db.config.php";
require_once "./includes/methods.php";
require_once "./includes/header.php";

isUserLoggedIn();



    if (isset($_POST['submitkontakt'])) { // submit contact
        $firstName = $_POST['firstName'];
        $lastName = $_POST['lastName'];
        $email = $_POST['email'];
        $subject = $_POST['subject'];
        $message = $_POST['message'];

        $servername = "localhost";
        $database = "what_a_comedy";
        $username = "muddaco";
        $password = "mUdacCo5!#ssS";
        $sql = "mysql:host=$servername;dbname=$database;";

    try {
        $my_Db_Connection = new PDO($sql, $username, $password);
        echo "Connected successfully";
    }

    catch (PDOException $error) {
        echo 'Connection error: ' . $error->getMessage();
    }

    $db_kontakt = $my_Db_Connection->prepare("INSERT INTO kontakt (email, name, subject, message) VALUES (:email, :name, :subject, :message)");
        $db_kontakt->bindParam(':name', $firstName);
        $db_kontakt->bindParam(':email', $email);
        $db_kontakt->bindParam(':subject', $subject);
        $db_kontakt->bindParam(':message', $message);

    if ($db_kontakt->execute()) {
        echo "Successful";
    }

    else {
        echo "Error";
    }
    redirectTo("./admin/");
}

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" type="text/css" href="css/main.css">

    <title>Contact</title>

</head>



<body>

<!-- Header -->
<?php include 'includes/header.php'; ?>



    <!-- Contact Form -->
    <div class="contact-page-container">
        <form>
            <h1 class="h1">Contact Me</h1>


            <div class="inside-form">
                <div class="input-holder">
                    <input type="email" class="input-text" required>
                    <span class="label">Email Address</span>
                </div>


                <div class="input-holder">
                    <input type="text" class="input-text" required>
                    <span class="label">Full Name</span>
                </div>


                <div class="input-holder">
                    <textarea class="input-text-message" cols="41.9" rows="5" required></textarea>
                    <span class="label"><br>Message</span>
                </div>


                <button onclick="alert('We will respond as soon as we can')" class="send-btn" type="submit" name="submit" value="Submit">Submit</button>
            </div>
        </form>
    </div>




    <!--footer-->
    <?php include 'includes/footer.php'; ?>




</body>
</html>

<!-- TODO LIST
    Change Label TO SPAN

-->