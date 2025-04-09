<?php 

    session_start();
    require_once 'config/db.php';

    

    if (isset($_POST['signup'])) {
        $username = $_POST['username'];
        $password = $_POST['password'];
        $email = $_POST['email'];
        $std_id = $_POST['std_id'];
        $titlename = $_POST['titlename'];
        $firstname = $_POST['firstname'];
        $lastname = $_POST['lastname'];
        $address = $_POST['address'];
        $gen = $_POST['gen'];
        $job = $_POST['job'];
        $img = $_FILES['img'];
        $birthday = $_POST['birthday'];
        $age = $_POST['age'];
        $urole = 'user';
        

        if (empty($firstname)) {
            $_SESSION['error'] = 'กรุณากรอกชื่อ';
            header("location: register.php");
        } else if (empty($lastname)) {
            $_SESSION['error'] = 'กรุณากรอกนามสกุล';
            header("location: register.php");
        } else if (empty($email)) {
            $_SESSION['error'] = 'กรุณากรอกอีเมล';
            header("location: register.php");
        } else if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $_SESSION['error'] = '<h3>รูปแบบอีเมลไม่ถูกต้อง</h3>';
            header("location: register.php");
        } else if (empty($password)) {
            $_SESSION['error'] = 'กรุณากรอกรหัสผ่าน';
            header("location: register.php");
        } else if (strlen($_POST['password']) > 20 || strlen($_POST['password']) < 5) {
            $_SESSION['error'] = '<h3>รหัสผ่านต้องมีความยาวระหว่าง 5 ถึง 20 ตัวอักษร</h3>';
            header("location: register.php");
        } else {
         try {
                $allow = array('jpg', 'jpeg', 'png');
                $extension = explode('.', $img['name']);
                $fileActExt = strtolower(end($extension));
                $fileNew = rand() . "." . $fileActExt;  // rand function create the rand number 
                $filePath = 'uploads/'.$fileNew;

                $check_email = $conn->prepare("SELECT email FROM usersfew WHERE email = :email");
                $check_email->bindParam(":email", $email);
                $check_email->execute();
                $row = $check_email->fetch(PDO::FETCH_ASSOC);
                if (in_array($fileActExt, $allow)) {
                    if ($img['size'] > 0 && $img['error'] == 0) {
                        if (move_uploaded_file($img['tmp_name'], $filePath)) {
                            if ($row['email'] == $email) {
                                $_SESSION['warning'] = "มีอีเมลนี้อยู่ในระบบแล้ว <a href='signin.php'>คลิ๊กที่นี่</a> เพื่อเข้าสู่ระบบ";
                                header("location: register.php");
                            } else if (!isset($_SESSION['error'])) {
                    
                    $stmt = $conn->prepare("INSERT INTO usersfew(username, password, email, std_id, titlename, firstname, lastname, address, gen, job, img, birthday, age, urole) 
                                            VALUES(:username, :password, :email, :std_id, :titlename, :firstname, :lastname, :address, :gen, :job, :img, :birthday, :age, :urole)"); 
                    $stmt->bindParam(":username", $username);
                    $stmt->bindParam(":password", $password);
                    $stmt->bindParam(":email", $email);
                    $stmt->bindParam(":std_id", $std_id);
                    $stmt->bindParam(":titlename", $titlename);
                    $stmt->bindParam(":firstname", $firstname);
                    $stmt->bindParam(":lastname", $lastname);
                    $stmt->bindParam(":address", $address);
                    $stmt->bindParam(":gen", $gen);
                    $stmt->bindParam(":job", $job);
                    $stmt->bindParam(":img", $fileNew);
                    $stmt->bindParam(":birthday", $birthday);
                    $stmt->bindParam(":age", $age);
                    $stmt->bindParam(":urole", $urole);
                    $stmt->execute();
                    $_SESSION['success'] = "สมัครสมาชิกเรียบร้อยแล้ว!";
                    header("location: signin.php");
                } else {
                    $_SESSION['error'] = "มีบางอย่างผิดพลาด";
                    header("location: register.php");
                }

            }
        }
    }

            } catch(PDOException $e) {
                echo $e->getMessage();
            }


        }
    }

    
?>