<?php
        session_start();
        require_once 'config/db.php';
        if (!isset($_SESSION['user_login'])) {
            $_SESSION['error'] = 'กรุณาเข้าสู่ระบบ!';
            header('location: signin.php');
        }
        if (isset($_SESSION['user_login'])) {
            
            $user_id = $_SESSION['user_login'];
            $stmt = $conn->query("SELECT * FROM usersfew WHERE id = $user_id");
            $stmt->execute();
            $row = $stmt->fetch(PDO::FETCH_ASSOC);
        }
        

        $edpassword = $_POST['edpassword'];


                    if (empty($edpassword)) {
                        $edpassword = $row['pasword'];
                    }
                                    
                



            try {
            // set the PDO error mode to exception
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            
            $sql = "UPDATE usersfew SET password='$edpassword' WHERE id = $user_id";
            
            // Prepare statement
            $stmt = $conn->prepare($sql);
            
            // execute the query
            $stmt->execute();
            
            // echo a message to say the UPDATE succeeded
            if  ($stmt->rowCount()) {
                echo '<script type="text/javascript">';
                echo 'alert("บันทึกข้อมูลสำเร็จ");'; 
                echo 'window.location.href="changepass.php";';
                echo '</script>';
        }
        
            } catch(PDOException $e) {
            echo $sql . "<br>" . $e->getMessage();
            }
            
        $conn = null;

        
        ?>