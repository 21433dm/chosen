<?php
require "includes/head.inc.php";
require "includes/nav.inc.php";
echo $_SESSION['userUid'];
?>
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <h4>Title</h4>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <p>Likes |
            <a href="">Like</a></p>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <p>Content</p>
        </div>
    </div>
</div> 
<?php
require "includes/footer.inc.php";
?>
