<?php

require_once "../includes/methods.php";
require_once "../admin/headeradmin.php";

isUserLoggedIn();

?>


<?php if(isset($_SESSION['user']['user_type'])): ?>


<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">


  <link rel="stylesheet" type="text/css" href="styles.css">


  <title>Admin Page</title>

</head>

<body>

  <h1 class="latest-blogg">Latest Post</h1>


  <div class="container">

    <div class="wrapper">

      <div>
        <?php listAllBlogpost(); ?>
      </div>

      <form>
        <input type="hidden" value=" <?php echo $_SESSION['user']['id']; ?> " name="user_id"/>
      </form>

    </div>

  </div>

  <?php endif; ?>

</body>

</html>