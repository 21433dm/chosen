<?php
require "includes/head.inc.php";
require "includes/nav.inc.php";
require 'database/config.php';

$profileName = $_SESSION['userUid'];

if (isset($_SESSION['userId']) || isset($_SESSION['userUid'])) {
    echo "<div class='container'>
    <div class='row'>
        <h1>$profileName</h1>                  
    </div>
    <div class='row'>
        <div class='col-md-12'>
            <h3>Title</h3>
        </div>
    </div>
    <div class='row'>
        <div class='col-md-12'>
            <p>Likes |
            <a href=''>Like</a></p>
        </div>
    </div>
    <div class='row'>
        <div class='col-md-12'>
            <p>Content</p>
        </div>
    </div>
</div>";
} else {
    header("Location: index.php?fail=no");
}
require "includes/footer.inc.php"; 
?>
