<?php
        session_start();
        require_once 'config/db.php';
        require_once "config/db.php";
    if (!isset($_SESSION['user_login'])) {
        $_SESSION['error'] = 'กรุณาเข้าสู่ระบบ!';
        header('location: signin.php');
    }
        


    if (isset($_POST['update'])) {
        $id = $_POST['edid'];
        $firstname = $_POST['edfirstname'];
        $lastname = $_POST['edlastname'];
        $email = $_POST['edemail'];
        $std_id = $_POST['edstd_id'];
        $address = $_POST['edaddress'];
        $gen = $_POST['edgen'];
        $job = $_POST['edjob'];
        $img = $_FILES['img'];
        $img2 = $_POST['old_img'];
        $upload = $_FILES['img']['name'];

        $stmt = $conn->query("SELECT * FROM usersfew WHERE id = $id");
        $stmt->execute();
        $row = $stmt->fetch(PDO::FETCH_ASSOC);


        if ($upload != '') {
            $allow = array('jpg', 'jpeg', 'png');
            $extension = explode('.', $img['name']);
            $fileActExt = strtolower(end($extension));
            $fileNew = rand() . "." . $fileActExt;  // rand function create the rand number 
            $filePath = 'uploads/'.$fileNew;
            if (in_array($fileActExt, $allow)) {
                if ($img['size'] > 0 && $img['error'] == 0) {
                   move_uploaded_file($img['tmp_name'], $filePath);
                }
            }

        } else {
            $fileNew = $img2;
        }
            $sql = "UPDATE usersfew SET firstname='$firstname', lastname='$lastname', email='$email', std_id='$std_id',
             address='$address', gen='$gen', job='$job', img='$fileNew' WHERE id = $id";
            $stts = $conn->prepare($sql);
            
            $stts->execute();
            if  ($stmt->rowCount()) {
                echo '<script type="text/javascript">';
                echo 'alert("บันทึกข้อมูลสำเร็จ");'; 
                echo 'window.location.href="edit.php";';
                echo '</script>';

            }   
            $conn = null;
    }

?>