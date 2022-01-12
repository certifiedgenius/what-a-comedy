<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Header</title>
</head>
<body>
  <header>
    <nav>
      <ul>
      <li>
        <a href="../index.php">Home</a>
      </li>
      <li>
        <a href="../kontakt.php">Contact</a>
      </li>
      <li>
        <a href="../galleri.php">Gallery</a>
      </li>
      <a href="../admin/logout.php">Log Out</a>
      <?php if($_SESSION['user']['user_type']): ?>
        <a href="../admin/blogpost.php">Create</a> 
      <?php endif; ?>
      </ul>
    </nav>    
  </header>
</body>
</html>