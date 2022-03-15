<?php

require_once "../includes/db.config.php";
require_once "../includes/methods.php";

isUserLoggedIn();

$db = connectToDB();

if (isset($_POST['submit-blogpost'])) {
  $blog_title = $_POST['title'];
  $blog_subject = $_POST['subject'];
  $blog_content = $_POST['content'];
  $connect = connectToDB();

  $stmt = $connect->prepare('INSERT INTO blogpost (title, subject, message) VALUES (:title, :subject, :message)');
  $stmt->bindParam('title', $blog_title);
  $stmt->bindParam('subject', $blog_subject);
  $stmt->bindParam('message', $blog_content);

  try {
    $stmt->execute();
    redirectTo('./admin');
  } catch(PDOException $e) {
    echo $e->getMessage();
  }
  $pdo = connectToDB();
}



?>





<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <!-- Custom CSS File's -->
  <link rel="stylesheet" type="text/css" href="../css/main.css">

  <title>Admin Blog post</title>
</head>

<body>

  <!-- Admin Header -->
  <?php require_once "headeradmin.php"; ?>



<section>


  <?php if(isset($_SESSION['user']['user_type'])): ?>

    <form id="form-blogpost" action="#" method="POST">

      <label for="title">Title
        <input id="inputfield" type="text" name="title">
      </label>

      <label for="subject">Subject
        <input id="inputfield" type="text" name="subject">
      </label>

      <label for="message">Content
        <input id="message" type="text" name="content">
      </label>

      <button id="submit-blogpost" type="submit" name="submit-blogpost">Submit</button>
    </form>



    <?php endif; ?>

  </section>

</body>
</html>