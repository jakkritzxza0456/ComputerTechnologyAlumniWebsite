<?php 

    session_start();
    require_once 'config/db.php';

    
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <link rel="stylesheet" href="stylesregister.css">
    
</head>
<body>
    <div class="container">
        <form action="signup_db.php" method="post" enctype="multipart/form-data">
            <?php if(isset($_SESSION['error'])) { ?>
                <div class="alert alert-danger" role="alert">
                    <?php 
                        echo $_SESSION['error'];
                        unset($_SESSION['error']);
                    ?>
                </div>
            <?php } ?>
                <?php if(isset($_SESSION['success'])) { ?>
                    <div class="alert alert-success" role="alert">
                        <?php 
                            echo $_SESSION['success'];
                            unset($_SESSION['success']);
                        ?>
                    </div>
                <?php } ?>
                    <?php if(isset($_SESSION['warning'])) { ?>
                        <div class="alert alert-warning" role="alert">
                            <?php 
                                echo $_SESSION['warning'];
                                unset($_SESSION['warning']);
                            ?>
                        </div>
                    <?php } ?>
            <div class="login-wrapper">
                <div class="login-left">
                <img src="img/123.jpg" alt="">
                <div class="h1">REGISTER</div>
            </div>
            <div class="login-right">
                    <div class="form-group">
                        <label for="username">ชื่อบัญชีผู้ใช้</label>
                        <input type="text" name="username" placeholder="ต้องควรมี 5 - 20 ตัวอักษร" required>           
                    </div>
                    <div class="form-group">
                        <label for="password">รหัสผ่าน</label>
                        <input type="text" name="password" placeholder="ต้องมี 5 - 20 ตัวอักษร" required>                    
                    </div>
                    <div class="form-group">
                        <label for="email">อีเมลล์</label>
                        <input type="text" name="email" placeholder="example@gmaiil.com" required>                  
                    </div>
                    <div class="form-group2">
                        <label for="address">ที่อยู่</label>
                        <input type="text" name="address" placeholder="" required>              
                    </div>

                    <div class="form-group3">
                        <label for="gen">รุ่นที่จบการศึกษา</label>
                        <input type="text" name="gen" placeholder="01-17" required>            
                    </div>

                    <div class="form-group4">
                        <label for="job">อาชีพ</label>
                        <input type="text" name="job" placeholder="" required>          
                    </div>
                    <div class="form-group5">
                        <label for="birth">วันเดือนปีเกิด</label>
                        <input type="date" name="birthday" placeholder="" required>            
                    </div>
                    <div class="form-group5-1">
                        <label for="age">อายุ</label>
                        <input type="text" name="age" placeholder="" required>            
                    </div>
                    <div class="form-group7">
                        <label for="picture">เลือกรูปโปรไฟล์</label>
                        <input type="file" required class="form-control" name="img">       
                    </div>   
                    <div class="button-area">
                        <button type="submit" name="signup" onclick="calAge()" class="btn btn-primary">Sign Up</button>
                        
                    </div>
                </div>
                <div class="login-right2">               
                    <div class="form-group">
                        <label for="titlename">คำนำหน้าชื่อ</label><br><br>
                        
                        <input type="radio" name="titlename" value="นาย"  required>  
                        <label for="titlename">นาย</label>                                       
                        <input type="radio" name="titlename" value="นาง"  required>    
                        <label for="titlename">นาง</label>                                      
                        <input type="radio" name="titlename" value="นางสาว"  required>  
                        <label for="titlename">นางสาว</label>                 
                    </div>
                    <div class="form-group">
                        <label for="firstname">ชื่อ</label>
                        <input type="text" name="firstname" placeholder="" required>                   
                    </div>
                    <div class="form-group">
                        <label for="lastname">นามสกุล</label>
                        <input type="text" name="lastname" placeholder="" required>                  
                    </div>
                    <div class="form-group6">
                        <label for="std_id">รหัสนักศึกษา</label>
                        <input type="text" name="std_id" placeholder="" required>            
                    </div>
                    
                </div>
            </div>
            
        <script src="script.js"></script>
        </form>
        
    </div>   
</body>
</html>