<?php
require "includes/head.inc.php";
require "includes/nav.inc.php";
require 'admin/profpic.php';
require 'database/config.php';

$profileName = $_SESSION['userUid'];

/* $query = "SELECT * FROM users;";
$result = mysqli_query($conn, $query);
if (mysqli_fetch_assoc($result) > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
        $id = $row['id'];
        $queryImg = "SELECT * FROM profileimg WHERE userid='$id';";
        $resultImg = mysqli_query($conn, $queryImg);
        while ($rowImg = mysqli_fetch_assoc($resultImg)) {
            echo "<div class='container'>
                    <div class='row'>
                    <div class='col-md-12'>";
                    if ($rowImg['status'] == 0) {
                        echo "<img src='../uploads/profile".$id.".jpg'>";
                    } else {
                        echo "<img src='../img/profile_pics/male.png'>";
                    }
                    echo $row['name'];
            echo "</div>
                </div>
            </div>";
        }
    }  
} */

if (isset($_SESSION['userId']) || isset($_SESSION['userUid'])) {   
echo "<div class='container'>
    <div class='row'>
        <form action='admin/profpic.php' method='post' enctype='multipart/form-data'>
        <input type='file' name='file'>
        <button type='submit' name='submit' class='btn btn-success'>Change Picture</button>
        </form>
    </div>
    <br>
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
    <hr>";
}

require "includes/footer.inc.php";
?>
    
