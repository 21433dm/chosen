<?php

if (isset($_POST['submit'])) {
    $file = $_FILES['file'];

    $fileName = $_FILES['file']['name'];
    $fileTmpName = $_FILES['file']['tmp_name'];
    $fileSize = $_FILES['file']['size'];
    $fileError = $_FILES['file']['error'];
    $fileType = $_FILES['file']['type'];
    $id = $_POST['id'];

    $fileExt = explode('.', $fileName);
    $fileActualExt = strtolower(end($fileExt));

    $allowed = array('jpg', 'jpeg', 'png');

    if (in_array($fileActualExt, $allowed)) {
        if ($fileError === 0) {
            if ($fileSize < 1000000) {
                $fileNameNew = "profile".$id.".".$fileActualExt;
                $fileDestination = '../img/profile_pics/'.$fileNameNew;
                move_uploaded_file($fileTmpName, $fileDestination);
                header("Location: ../profile.php?upload=success");   
            } else {
                header("Location: ../profile.php?error=big");
                exit();
            }    
        } else {
            header("Location: ../profile.php?error=error");
            exit();
        }    
    } else {
        header("Location: ../profile.php?error=type");
        exit;
    }

        
        
        
        
        
            
                
            
        
    } 
