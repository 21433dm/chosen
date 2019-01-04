<?php
session_start();
?>

<div class="brand">
    <img src="img/rgj-header_new.png" alt="RGJ Header">
</div>
<nav class="navbar navbar-dark bg-dark">
    <a class="navbar-brand" href="index.php">GREENBOOK</a>
    <a class="nav-link ml-auto" href="about.php">ABOUT</a>
    <?php
    if (!isset($_SESSION['userId']) || !isset($_SESSION['userUid'])) {
        echo '<a class="nav-link" href="login.php">LOGIN</a>
              <a class="nav-link" href="register.php">REGISTER</a>';
    }
    elseif (isset($_SESSION['userId']) || isset($_SESSION['userUid'])) {
           echo '<a class="nav-link" href="profile.php">HOME</a>
                 <a class="nav-link" href="posts.php">POSTS</a>
                 <a class="nav-link" href="gallery.php">GALLERY</a>
                 <a class="nav-link" href="admin/logout.php">LOGOUT</a>';        
       }
    ?>    
</nav>
        