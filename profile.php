<?php
require "includes/head.inc.php";
require "includes/nav.inc.php";
require 'database/config.php';
echo $_SESSION['userUid'];
?>
<div class="container">
    <div class="row">
        <div class="col-md-12">
        <h1>Recent Posts</h1>                  
        </div>
    </div>
    <div class='row'>
        <div class='col-md-12'>
        <h2>Title</h2>
        <p style='font-weight: bold'>Content</p>
            <a href='admin.php'>Read more...</a>
        </div>
    </div>
    <hr>
</div> 
<?php
require "includes/footer.inc.php";
?>
    
