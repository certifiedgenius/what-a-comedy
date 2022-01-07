<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/main.css">

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
                    <input type="text" class="input-text" required>
                    <span class="label">Email Address</span>
                </div>


                <div class="input-holder">
                    <input type="text" class="input-text" required>
                    <span class="label">Full Name</span>
                </div>


                <div class="input-holder">
                    <textarea required></textarea>
                    <span class="label">Message</span>
                </div>


                <button class="send-btn">Send</button>
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