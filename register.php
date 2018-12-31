<?php
require "includes/head.inc.php";
require "includes/nav.inc.php";
?>
<div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Register</div>
                    <?php
                    if (isset($_GET['error'])) {
                        if ($_GET['error'] == "emptyfields") {
                            echo '<p class="error">All fields must be filled!<p>';
                        }
                        elseif ($_GET['error'] == "invalidemail") {
                            echo '<p class="error">Invalid email address!<p>';
                        }
                        elseif ($_GET['error'] == "invalidname") {
                            echo '<p class="error">You have used invalid characters!<p>';
                        }
                        elseif ($_GET['error'] == "passwordcheck") {
                            echo '<p class="error">Your passwords do not match!<p>';
                        }
                        elseif ($_GET['error'] == "usernametaken") {
                            echo '<p class="error">Username already in use!<p>';
                        }
                    }
                    elseif (isset($_GET['signup'])) {
                        if ($_GET['signup'] == "success") {
                           echo '<p class="success">Registration successful!<p>'; 
                        }  
                    }
                    ?>
                        <div class="card-body">
                            <form method="POST" action="admin/signup.php">
                                <div class="form-group row">
                                    <div class="col-md-10 offset-md-1">
                                    <input id="name" type="text" class="form-control" name="name" placeholder="Name"autofocus>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-md-10 offset-md-1">
                                    <input id="username" type="text" class="form-control" name="username" placeholder="Please create a unique username">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-md-10 offset-md-1">
                                    <input id="email" type="text" class="form-control" name="email" placeholder="Email address">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-md-10 offset-md-1">
                                    <input id="password" type="password" class="form-control" name="password" placeholder="Password">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-md-10 offset-md-1">
                                    <input id="password2" type="password" class="form-control" name="password2" placeholder="Repeat password">
                                </div>
                                </div>
                                <div class="form-group row mb-0">
                                    <div class="col-md-10 offset-md-5">
                                        <button type="submit" class="btn btn-success" name="register">Register</button>
                                    </div>
                                </div>
                            </form>
                            <?php
                                
                            ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?php
        require "includes/footer.inc.php";
        ?>
    
