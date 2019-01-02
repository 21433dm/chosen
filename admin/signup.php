<?php
if (isset($_POST['register'])) {

    require '../database/config.php';

    $name = $_POST['name'];
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $password2 = $_POST['password2'];

    if (empty($name) || empty($username) || empty($email) || empty($password) || empty($password2)) {
        header("Location: ../register.php?error=emptyfields&name=".$name."&username=".$username."&email=".$email);
        exit();
    }
    elseif(!preg_match("/^[a-zA-Z0-9\s]*$/", $name) && !filter_var($email, FILTER_VALIDATE_EMAIL)) {
        header("Location: ../register.php?error=invalidemail");
        exit();
    }
    elseif (!preg_match("/^[a-zA-Z0-9\s]*$/", $name) || !preg_match("/^[a-zA-Z0-9]*$/", $username)) {
        header("Location: ../register.php?error=invalidname&email=".$email);
        exit();
    }
    elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        header("Location: ../register.php?error=invalidemail&name=".$name."&username=".$username);
        exit();
    }
    elseif ($password != $password2) {
        header("Location: ../register.php?error=passwordcheck&name=".$name."&username=".$username."&email=".$email);
        exit();
    }
    else {
        $query = "SELECT username FROM users WHERE username=?;";
        $stmt = mysqli_stmt_init($conn);
        if (!mysqli_stmt_prepare($stmt, $query)) {
            header("Location: ../register.php?error=sqlerror");
            exit();
        }
        else {
            mysqli_stmt_bind_param($stmt, "s", $username);
            mysqli_stmt_execute($stmt);
            mysqli_stmt_store_result($stmt);
            $resultCheck = mysqli_stmt_num_rows($stmt);
            if ($resultCheck > 0) {
                header("Location: ../register.php?error=usernametaken&name=".$name."&email=".$email);
                exit();
            }
            else {
               $query = "INSERT INTO users (name, username, email, password) VALUES (?, ?, ?, ?);";
               $stmt = mysqli_stmt_init($conn);
               if (!mysqli_stmt_prepare($stmt, $query)) {
                header("Location: ../register.php?error=sqlerror");
                exit();
                }
                else {
                    $hashedPwd = password_hash($password, PASSWORD_DEFAULT);

                    mysqli_stmt_bind_param($stmt, "ssss", $name, $username, $email, $hashedPwd);
                    mysqli_stmt_execute($stmt);
                    header("Location: ../register.php?signup=success");
                    exit();
                }
            }
        }
    }
    mysqli_stmt_close($stmt);
    mysqli_close($conn);
}
else {
    header("Location: ../register.php");
    exit();
}