<?php
require '../database/config.php';

$queryImg = "SELECT * FROM users WHERE username=? AND name=?;";
    $stmt = mysqli_stmt_init($conn);
        if (!mysqli_stmt_prepare($stmt, $queryImg)) {
            header("Location: ../register.php?error=sqlerror");
            exit();
        }
        else {
            mysqli_stmt_bind_param($stmt, "ss", $username, $name);
            $result = mysqli_stmt_execute($stmt);
            if (mysqli_num_rows($result) > 0) {
                while ($row = mysqli_fetch_assoc($result)) {
                    $userid = $row['id'];
                    $status = 1;
                    $query = "INSERT INTO profileimg (userid, status) VALUES (?, ?);";
                    $stmt = mysqli_stmt_init($conn);
                    mysqli_stmt_bind_param($stmt, "ii", $userid, $status); 
                    mysqli_stmt_execute($stmt);
                    header("Location: ../profile.php");
                }
            } else {
                echo "You have an error!";
            }
        }
    mysqli_stmt_close($stmt);
    mysqli_close($conn);