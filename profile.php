<?php
require "includes/head.inc.php";
require "includes/nav.inc.php";
require 'admin/profpic.php';
require 'database/config.php';

echo "<div>";
if (isset($_GET['error'])) {
    if ($_GET['error'] == "big") {
        echo '<p class="error">Your file is too big!<p>';
    }
    elseif ($_GET['error'] == "error") {
        echo '<p class="error">There was an error uploading your file!<p>';
    }
    elseif ($_GET['error'] == "type") {
        echo '<p class="error">You cannot upload files of this type!<p>';
    }
}
elseif (isset($_GET['upload'])) {
    if ($_GET['upload'] == "success") {
        echo '<p class="success">File uploaded successfully!<p>';
    }
}
echo "</div>";

$id = $_SESSION['userId'];
$query = "SELECT * FROM users WHERE id=$id;";
$result = mysqli_query($conn, $query);
if (mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
        $id = $row['id'];
        $queryImg = "SELECT * FROM profileimg WHERE userid='$id'";
        $resultImg = mysqli_query($conn, $queryImg);
        while ($rowImg = mysqli_fetch_assoc($resultImg)) {
            echo "<div class='container'>
                    <div class='row'>
                    <div class='col-md-12'>";
                    if ($rowImg['stat'] == 0) {
                        echo "<img src='img/profile_pics/profile".$id.".jpg'>";
                    } else {
                        echo "<img src='img/profile_pics/male.png'>";
                    }
                    echo "<h2>".$row['name']."<h2>
                    </div>
                </div>
            </div>";
        }
    }  
}

if (isset($_SESSION['userId']) || isset($_SESSION['userUid'])) {   
echo "<div class='container'>
    <div class='row'>
        <form action='admin/profpic.php' method='post' enctype='multipart/form-data'>
        <input type='file' name='file'>
        <input type='hidden' name='id' value='$id'>
        <button type='submit' name='submit' class='btn btn-success'>Change Picture</button>
        </form>
    </div>
    <br>
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
    <hr>";
}

require "includes/footer.inc.php";
?>
    
