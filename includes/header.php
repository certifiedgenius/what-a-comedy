<!-- Header -->
<header>
                <div class="headerContainer">
                        <div>
                                <h1 class="header-title">what a comedy</h1>
                        </div>


                        <!--Navigation Bar-->
                        <div>
                                <nav>
                                        <ol class="nav-area">
                                                <li><a href="index.php">Home</a></li>
                                                <li><a href="blog.php">Blog</a></li>

                                                <?php if(isset($_SESSION['user']['user_type'])): ?>

                                                        <li><a href="../admin/blogpost.php" class="a-class">Upload</a></li>

                                                <?php endif; ?>

                                                        <li><a href="photos.php">Photos</a></li>
                                                        <li><a href="aboutme.php">About Me</a></li>

                                                        <li><a href="../admin/logout.php" class="a-class">Logout</a></li>

                                                <a class="btn-area" href="contact.php"><button>Contact Me</button></a>
                                        </ol>
                                </nav>
                        </div>
                </div>
</header>