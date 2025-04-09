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
    <title>ข้อมูลศิษย์เก่าเพิ่มเติม</title>

    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <style>
        .container {
            max-width: 550px;
        }
    </style>
</head>
<body>
            <?php
                if (isset($_GET['id'])) {
                        $id = $_GET['id'];
                        $stmt = $conn->query("SELECT * FROM usersfew WHERE id = $id");
                        $stmt->execute();
                        $data = $stmt->fetch();
                }
            ?>
    <div class="container mt-5">
        <h1>ข้อมูลเพิ่มเติม<?php echo $data['firstname'] . ' ' . $data['lastname'] ?></h1>
        <hr>
        <form action="index.php" method="post" enctype="multipart/form-data">
            
                <input type="hidden" value="<?php echo $id; ?>" name="edid" >

                <div class="mb-3">
                    <label for="firstname" class="col-form-label">ชื่อ:</label>
                    <input type="text" readonly value="<?php echo $data['firstname']; ?>" required class="form-control" name="edfirstname" >
                </div>
                <div class="mb-3">
                    <label for="firstname" class="col-form-label">นามสกุล:</label>
                    <input type="text" readonly value="<?php echo $data['lastname']; ?>" required class="form-control" name="edlastname">
                </div>
                <div class="mb-3">
                    <label for="email" class="col-form-label">email:</label>
                    <input type="email" readonly value="<?php echo $data['email']; ?>" required class="form-control" name="edemail">
                </div>
                <div class="mb-3">
                    <label for="address" class="col-form-label">ที่อยู่:</label>
                    <input type="text" readonly value="<?php echo $data['address']; ?>" required class="form-control" name="edaddress">
                </div>
                <div class="mb-3">
                    <label for="std_id" class="col-form-label">รหัสนักศึกษา:</label>
                    <input type="text" readonly value="<?php echo $data['std_id']; ?>" required class="form-control" name="edstd_id">
                </div>
                <div class="mb-3">
                    <label for="gen" class="col-form-label">รุ่นที่จบการศึกษา:</label>
                    <input type="text" readonly value="<?php echo $data['gen']; ?>" required class="form-control" name="edgen">
                </div>
                <div class="mb-3">
                    <label for="่job" class="col-form-label">อาชีพ:</label>
                    <input type="text" readonly value="<?php echo $data['job']; ?>" required class="form-control" name="edjob">
                </div>
                <div class="mb-3">
                    <label for="birthday" class="col-form-label">วันเกิด:</label>
                    <input type="date" readonly value="<?php echo $data['birthday']; ?>" required class="form-control" name="edbirthday">
                </div>
                <div class="mb-3">
                    <label for="age" class="col-form-label">อายุ:</label>
                    <input type="text" readonly value="<?php echo $data['age']; ?>" required class="form-control" name="edage">
                </div>
                <div class="mb-3">
                    <label for="img" class="col-form-label">Image:</label>
                    <img width="100%" src="uploads/<?php echo $data['img']; ?>" id="previewImg" alt="">
                </div>
                <hr>
                <a href="index.php" class="btn btn-secondary">กลับหน้าหลัก</a>
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