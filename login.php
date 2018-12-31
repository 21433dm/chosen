<?php
require "includes/head.inc.php";
require "includes/nav.inc.php";
?>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Login</div>
                    <?php
                    if (isset($_GET['error'])) {
                        if ($_GET['error'] == "emptyfields") {
                            echo '<p class="error">All fields must be filled!<p>';
                        }
                        elseif ($_GET['error'] == "nouser") {
                            echo '<p class="error">User not found!<p>';
                        }
                        elseif ($_GET['error'] == "wrongpwd") {
                            echo '<p class="error">Wrong password!<p>';
                        }
                    }
                    elseif (isset($_GET['login'])) {
                        if ($_GET['login'] == "success") {
                           echo '<p class="success">Login successful!<p>'; 
                        }  
                    }
                    ?>
                    <div class="card-body">
                        <form method="POST" action="admin/login.php">
                            <div class="form-group row">    
                                <div class="col-md-10 offset-md-1">
                                    <input id="email" type="text" class="form-control" name="email" placeholder="Email address" autofocus>
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-md-10 offset-md-1">
                                    <input id="password" type="password" class="form-control" name="password" placeholder="Password">
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-md-6 offset-md-4">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" name="remember" id="remember">
                                        <label class="form-check-label" for="remember">
                                        Remember Me
                                        </label>
                                    </div>
                                </div>
                            </div>
                                <div class="form-group row mb-0">
                                <div class="col-md-8 offset-md-4">
                                    <button type="submit" class="btn btn-success" name="login">
                                    Login
                                    </button>
                                    <a class="btn btn-link" href="">
                                    Forgot Your Password?
                                    </a>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div> 
    </div> 
    <?php
    require "includes/footer.inc.php";
    ?>
    
