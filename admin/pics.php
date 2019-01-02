<?php
require 'database/config.php';

$query = "SELECT * FROM users";
$result = mysqli_query($conn, $query);
if (mysqli_fetch_assoc($result) > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
        $id = $row['id'];
        $queryImg = "SELECT * FROM profileimg WHERE userid='$id'";
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
}