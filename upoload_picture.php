<?php

    session_start();
    require_once 'config/db.php';

        if (isset($_POST['signup'])) {
        $ext = pathinfo(basename($_FILE['picture']['name']), PATHINFO_EXTENSION);
        $new_image_name = 'img_'.uniqid().".".$ext;
        $image_path = "uploads/";
        $upload_path = $image_path.$new_image_name;

        $success = move_uploaded_file($_FILE['picture']['tmp_name'],$upload_path);
        if ($success==FALSE) {
            echo "ไม่สามารถ upload รูปภาพได้";
            exit();
        }


        $stmt = $conn->prepare("INSERT INTO usersfew(picture) 
                                            VALUES(:picture)"); 


    }

?>