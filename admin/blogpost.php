<?php
require_once "../properties/connection.php";
require_once "../properties/methods.php";
require_once "headeradmin.php";
isUserLoggedIn();

$pdo = connectToDB();

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
    redirectTo('./admin/');
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
  <title>Blogpost</title>
  
</head>
<body>
<?php if($_SESSION['user']['user_type']): ?>
<form id="form-blogpost" action="#" method="POST">
    <label for="title">Title
      <input id="inputfield" type="text" name="title" />
    </label>
    <label for="subject">Subject
      <input id="inputfield" type="text" name="subject" />
    </label>
    <label for="message">Content
      <input id="message" type="text" name="content" />
    </label>
    <button id="submit-blogpost" type="submit" name="submit-blogpost">Submit</button>
  </form>
<?php endif; ?>
</body>

<style>
  /* HEADER */
  #header {
    display: flex;
    width: 100%;
    background-color: burlywood;
    height: 3rem;
  }

  #a-tagg {
    text-decoration: none;
    color: black;
  }

  #ul-main {
    display: flex;
    gap: 1.2rem;
    
  }

  #main-li {
    list-style: none;
  }

  #inputfield {
    height: 2rem;
  }

  #message {
    height: 6rem;
    width: 20rem;
  }

  /* ********************************** */
</style>
</html>