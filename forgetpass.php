<?php 

    session_start();
    require_once 'config/db.php';

    

    if (isset($_POST['fgpassword'])) {
        $username = $_POST['fgusername'];

            try {

                $check_data = $conn->prepare("SELECT * FROM usersfew WHERE username = :username");
                $check_data->bindParam(":username", $username);
                $check_data->execute();
                $row = $check_data->fetch(PDO::FETCH_ASSOC);

                if ($username == $row['username']) {

                    $_SESSION['success'] = "รหัสผ่านของคุณคือ ".$row['password'];
                    
                    header("location: signin.php");
                }else {
                    $_SESSION['error'] = "ไม่มีข้อมูล";
                    
                    header("location: signin.php");
                }
                
} catch(PDOException $e) {
    echo $e->getMessage();
}
}
?>


