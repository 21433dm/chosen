<?php
require "includes/head.inc.php";
require "includes/nav.inc.php";
require 'database/config.php';
require "admin/pics.php";

$profileName = $_SESSION['userUid'];

if (isset($_SESSION['userId']) || isset($_SESSION['userUid'])) {
echo "<div class='container'>
    <div class='row'>
        <h1>$profileName</h1>                  
    </div>
    <div class='row'>
        <div class='col-md-12'>
        <h2>Recent Posts</h2>                  
        </div>
    </div>
    <div class='row'>
        <div class='col-md-12'>
        <h2>Title</h2>
        <p style='font-weight: bold'>Content</p>
            <a href='posts.php'>Read more...</a>
        </div>
    </div>
    <hr>
    <div class='row'>
        <div class='col-md-12'>
        <p>Upload files here</p>
        <div class='row'>
            <div class='col-md-12'>";
    if (isset($_GET['upload'])) {
        if ($_GET['upload'] == "success") {
            echo '<p class="success">File uploaded successfully!<p>';
        }
    }
echo "</div>
        </div>
        <form action='admin/upload.php' method='post' enctype='multipart/form-data'>
            <input type='file' name='file'>
        <button type='submit' class='btn btn-success' name='upload'>UPLOAD</button>
        </form>
        </div>
    </div> 
</div>"; 
} else {
    header("Location: index.php?fail=no");
}
require "includes/footer.inc.php";
?>
    
