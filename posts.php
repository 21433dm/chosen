<?php
require "includes/head.inc.php";
require "includes/nav.inc.php";
require 'database/config.php';
require "admin/pics.php";

$profileName = $_SESSION['userUid'];

if (isset($_SESSION['userId']) || isset($_SESSION['userUid'])) {
$query = "SELECT * FROM users";
$result = mysqli_query($conn, $query);
if (mysqli_fetch_assoc($result) > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
        $id = $row['id'];
        $queryImg = "SELECT * FROM profileimg WHERE userid='$id'";
        $resultImg = mysqli_query($conn, $queryImg);
        while ($rowImg = mysqli_fetch_assoc($resultImg)) {
            echo "<div class='row'>
                <div class='col-md-12'>";
                    if ($rowImg['status'] == 1) {
                        echo "<img src='uploads/profile".$id.".jpg'>";
                    } else {
                        echo "<img src='img/profile_pics/male.png'>";
                    }
                    echo $row['name'];
            echo "</div>
            </div>";
        }
    }  
}
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
