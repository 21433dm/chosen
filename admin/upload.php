<?php

if (isset($_POST['upload'])) {

    require '../database/config.php';

    $newFileName = $_POST['filename'];
    if (empty($newFileName)) {
        $newFileName = "gallery";
    } else {
        $newFileName = strtolower(str_replace(" ", "-", $newFileName));
    }

    $imgTitle = $_POST['filetitle'];
    $imgDesc = $_POST['filedesc'];
    $userId = $_POST['userid'];

    $file = $_FILES['file'];

    $fileName = $file['name'];
    $fileType = $file['type'];
    $fileTmpName = $file['tmp_name'];
    $fileError = $file['error'];
    $fileSize = $file['size'];

    $fileExt = explode(".", $fileName);
    $fileActualExt = strtolower(end($fileExt));

    $allowed = array("jpg", "jpeg", "png");

    if (in_array($fileActualExt, $allowed)) {
        if ($fileError === 0) {
            if ($fileSize < 2000000) {
                $imgFullName = $newFileName . "." . uniqid("", true) . "." . $fileActualExt;
                $fileDestination = "../img/gallery/" . $imgFullName;

                if (empty($imgTitle) || empty($imgDesc)) {
                    header("Location: ../gallery.php?upload=empty");
                    exit();
                } else {
                    $query = "SELECT * FROM gallery;";
                    $stmt = mysqli_stmt_init($conn);
                    if (!mysqli_stmt_prepare($stmt, $query)) {
                        echo "Query failed!";
                    } else {
                        mysqli_stmt_execute($stmt);
                        $result = mysqli_stmt_get_result($stmt);
                        $rowCount = mysqli_num_rows($result);
                        $setImageOrder = $rowCount + 1;

                        $query = "INSERT INTO gallery (title, description, imgFullName, galorder, userid) VALUES (?, ?, ?, ?, ?);";
                        if (!mysqli_stmt_prepare($stmt, $query)) {
                            echo "Query failed!";
                        } else {
                            mysqli_stmt_bind_param($stmt, "ssssi", $imgTitle, $imgDesc, $imgFullName, $setImageOrder, $userId);
                            mysqli_stmt_execute($stmt);

                            move_uploaded_file($fileTmpName, $fileDestination);
                            header("Location: ../gallery.php?upload=success");
                        }
                    }
                }
            } else {
                echo "File size to large!";
                exit();
            }
        } else {
            "You had an error!";
            exit();
        }
    } else {
        echo "Incorrect file type!";
        exit();
    }
}