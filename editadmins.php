<?php 

    session_start();

    require_once "config/db.php";
    if (!isset($_SESSION['admin_login'])) {
        $_SESSION['error'] = 'กรุณาเข้าสู่ระบบ!';
        header('location: signin.php');
    }
        


    if (isset($_POST['update'])) {
        $id = $_POST['edid'];
        $titlename = $_POST['edtitlename'];
        $firstname = $_POST['edfirstname'];
        $lastname = $_POST['edlastname'];
        $username = $_POST['edusername'];
        $password = $_POST['edpassword'];
        $email = $_POST['edemail'];
        $std_id = $_POST['edstd_id'];
        $address = $_POST['edaddress'];
        $gen = $_POST['edgen'];
        $job = $_POST['edjob'];
        $birthday = $_POST['edbirthday'];
        $age = $_POST['edage'];
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
            $sql = "UPDATE usersfew SET titlename ='$titlename', firstname='$firstname', lastname='$lastname', username='$username', password='$password', email='$email', std_id='$std_id',
             address='$address', gen='$gen', job='$job', birthday='$birthday', age='$age', img='$fileNew' WHERE id = $id";
            $stts = $conn->prepare($sql);
            
            $stts->execute();
            if  ($stmt->rowCount()) {
                echo '<script type="text/javascript">';
                echo 'alert("บันทึกข้อมูลสำเร็จ");'; 
                echo 'window.location.href="editadmin.php";';
                echo '</script>';

            }   
            $conn = null;
    }


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>เเก้ไขข้อมูลนักศึกษา</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <style>
        .container {
            max-width: 550px;
        }
    </style>
</head>
<body>
    <div class="container mt-5">
        <h1>Edit Data</h1>
        <hr>
        <form action="editadmins.php" method="post" enctype="multipart/form-data">
            <?php
                if (isset($_GET['id'])) {
                        $id = $_GET['id'];
                        $stmt = $conn->query("SELECT * FROM usersfew WHERE id = $id");
                        $stmt->execute();
                        $data = $stmt->fetch();
                }
            ?>
                <input type="hidden" value="<?php echo $id; ?>" name="edid" >

                <div class="mb-3">
                    <label for="titlename" class="col-form-label">คำนำหน้าชื่อ:</label>
                    <input type="text" value="<?php echo $data['titlename']; ?>" required class="form-control" name="edtitlename" >
                </div>
                <div class="mb-3">
                    <label for="firstname" class="col-form-label">ชื่อ:</label>
                    <input type="text" value="<?php echo $data['firstname']; ?>" required class="form-control" name="edfirstname" >
                    <input type="hidden" value="<?php echo $data['img']; ?>" required class="form-control" name="old_img" >
                </div>
                <div class="mb-3">
                    <label for="firstname" class="col-form-label">นามสกุล:</label>
                    <input type="text" value="<?php echo $data['lastname']; ?>" required class="form-control" name="edlastname">
                </div>
                <div class="mb-3">
                    <label for="username" class="col-form-label">username:</label>
                    <input type="text" value="<?php echo $data['username']; ?>" required class="form-control" name="edusername">
                </div>
                <div class="mb-3">
                    <label for="password" class="col-form-label">password:</label>
                    <input type="text" value="<?php echo $data['password']; ?>" required class="form-control" name="edpassword">
                </div>
                <div class="mb-3">
                    <label for="email" class="col-form-label">email:</label>
                    <input type="email" value="<?php echo $data['email']; ?>" required class="form-control" name="edemail">
                </div>
                <div class="mb-3">
                    <label for="address" class="col-form-label">ที่อยู่:</label>
                    <input type="text" value="<?php echo $data['address']; ?>" required class="form-control" name="edaddress">
                </div>
                <div class="mb-3">
                    <label for="std_id" class="col-form-label">รหัสนักศึกษา:</label>
                    <input type="text" value="<?php echo $data['std_id']; ?>" required class="form-control" name="edstd_id">
                </div>
                <div class="mb-3">
                    <label for="gen" class="col-form-label">รุ่นที่จบการศึกษา:</label>
                    <input type="text" value="<?php echo $data['gen']; ?>" required class="form-control" name="edgen">
                </div>
                <div class="mb-3">
                    <label for="่job" class="col-form-label">อาชีพ:</label>
                    <input type="text" value="<?php echo $data['job']; ?>" required class="form-control" name="edjob">
                </div>
                <div class="mb-3">
                    <label for="birthday" class="col-form-label">วันเกิด:</label>
                    <input type="date" value="<?php echo $data['birthday']; ?>" required class="form-control" name="edbirthday">
                </div>
                <div class="mb-3">
                    <label for="age" class="col-form-label">อายุ:</label>
                    <input type="text" value="<?php echo $data['age']; ?>" required class="form-control" name="edage">
                </div>
                <div class="mb-3">
                    <label for="img" class="col-form-label">Image:</label>
                    <input type="file" class="form-control" id="imgInput" name="img">
                    <img width="100%" src="uploads/<?php echo $data['img']; ?>" id="previewImg" alt="">
                </div>
                <hr>
                <a href="editadmin.php" class="btn btn-secondary">Go Back</a>
                <button type="submit" name="update" class="btn btn-primary">Update</button>
            </form>
    </div><br><div class="mt-4"></div>

    <script>
        let imgInput = document.getElementById('imgInput');
        let previewImg = document.getElementById('previewImg');

        imgInput.onchange = evt => {
            const [file] = imgInput.files;
                if (file) {
                    previewImg.src = URL.createObjectURL(file)
            }
        }

    </script>
</body>
</html>