  <header>
    <div class="headerContainer">
      <div>
        <h1 class="header-title">Admin | what a comedy</h1>
      </div>

      <div>

        <nav>
          <ol class="nav-area">
              <li><a href="../index.php">Home</a></li>
              <li><a href="../contact.php">Contact</a></li>
              <li><a href="../photos.php">Photos</a></li>

              <a href="../admin/logout.php" class="a-class">Log Out</a>


              <?php if(isset($_SESSION['user']['user_type'])): ?>

                <a href="../admin/blogpost.php" class="a-class">Create</a>

              <?php endif; ?>



          </ol>
        </nav>
      </div>
    </div>
  </header>