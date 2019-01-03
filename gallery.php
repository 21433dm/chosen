<?php
require "includes/head.inc.php";
require "includes/nav.inc.php";
require 'database/config.php';

?>

<section>
    <div class="container">
    <h2>Gallery</h2>
    <div class="container grid-4 center">
        <?php
        $userId = $_SESSION['userId'];

        $query = "SELECT * FROM gallery WHERE userid = $userId ORDER BY galorder DESC";
        $stmt = mysqli_stmt_init($conn);
        if (!mysqli_stmt_prepare($stmt, $query)) {
            echo "Query failed";
        } else {
            mysqli_stmt_execute($stmt);
            $result = mysqli_stmt_get_result($stmt);

            while ($row = mysqli_fetch_assoc($result)){
                echo '<a href="">
                    <div style="background-image: url(img/gallery/'.$row["imgFullName"].');"></div>
                    <h3>'.$row["title"].'</h3>
                    <p>'.$row["description"].'</p>        
                </a>';
            }
        }
        ?>
        </div>
    <div>
    <?php
    if (isset($_SESSION['userId']) || isset($_SESSION['userUid'])) {  
    echo "<div class='container'>
            <div class='row justify-content-center'>
                <form action='admin/upload.php' method='post' enctype='multipart/form-data'>
                    <div class='form-group row'>
                        <input type='text' class='form-control' name='filename' placeholder='File name...'>
                    </div>
                    <div class='form-group row'>
                        <input type='text' class='form-control' name='filetitle' placeholder='Image title...'>
                    </div>
                    <div class='form-group row'>
                        <input type='text' class='form-control' name='filedesc' placeholder='Image description...'>
                    </div>
                    <div class='form-group row'>
                        <input type='file' name='file'>
                        <input type='hidden' name='userid' value='$userId'>
                    </div>
                    <button type='submit' name='upload' class='btn btn-success'>UPLOAD</button>
                </form>
            </div> 
        </div>
    </div>
    </div>
</section>";
}
    require "includes/footer.inc.php";    
?>