<?php 

    session_start();
    require_once 'config/db.php';

    if (isset($_POST['signin'])) {
        $username = $_POST['username'];
        $password = $_POST['password'];

      
        if (empty($username)) {
            $_SESSION['error'] = 'กรุณากรอกชื่อผู้ใช้';
            header("location: signin.php");
        } else if (empty($password)) {
            $_SESSION['error'] = 'กรุณากรอกรหัสผ่าน';
            header("location: signin.php");
        } else if (strlen($_POST['password']) > 20 || strlen($_POST['password']) < 5) {
            $_SESSION['error'] = 'รหัสผ่านต้องมีความยาวระหว่าง 5 ถึง 20 ตัวอักษร';
            header("location: signin.php");
        } else {
            try {

                $check_data = $conn->prepare("SELECT * FROM usersfew WHERE username = :username");
                $check_data->bindParam(":username", $username);
                $check_data->execute();
                $row = $check_data->fetch(PDO::FETCH_ASSOC);

                            if ($check_data->rowCount() > 0) {
                                if ($username == $row['username']) {
                                    if ($password == $row['password']) {
                                        if ($row['urole'] == 'admin') {
                                            $_SESSION['admin_login'] = $row['id'];
                                            header("location: admin.php");
                                        } else {
                                                $_SESSION['user_login'] = $row['id'];
                                                header("location: userlogin.php");
                                        } 
                                    } else {
                                            $_SESSION['error'] = 'รหัสผ่านไม่ถูกต้อง';
                                            header("location: signin.php");
                                    }
                                } else {
                                        $_SESSION['error'] = "บัญชีผู้ใช่ไม่ถูกต้อง";
                                        header("location: signin.php");
                                }
                            } else {
                                    $_SESSION['error'] = "ไม่มีข้อมูลในระบบ";
                                    header("location: signin.php");
                            }

            } catch(PDOException $e) {
                echo $e->getMessage();
            }
        }
    } 
?>