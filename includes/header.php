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
                                                <li><a href="photos.php">Photos</a></li>
                                                <li><a href="aboutme.php">About Me</a></li>
                                                <li><a class="a-class"  href="../php/admin/logout.php">Logout</a></li>

                                                <?php if($_SESSION['user']['user_type']): ?>

                                                        <a class="a-class" href="../php/admin/blogpost.php">Create</a>

                                                        <?php endif; ?>

                                                <a class="btn-area" href="contact.php"><button>Contact Me</button></a>
                                        </ol>
                                </nav>
                        </div>
                </div>
        </header>