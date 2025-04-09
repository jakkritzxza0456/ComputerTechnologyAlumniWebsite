<?php 

    session_start();
    require_once 'config/db.php';
    if (!isset($_SESSION['user_login'])) {
        $_SESSION['error'] = 'กรุณาเข้าสู่ระบบ!';
        header('location: signin.php');
    }
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>เเก้ไขข้อมูลส่วนตัว</title>
        <link href="https://cdn.jsdelivr.net/npm/simple-datatables@latest/dist/style.css" rel="stylesheet" />
        <link href="stylesedit.css" rel="stylesheet" />
        <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/js/all.min.js" crossorigin="anonymous"></script>
        <link rel="stylesheet" href="https://cdn.datatables.net/1.11.4/css/jquery.dataTables.min.css">

    </head>
    <body class="sb-nav-fixed">
            <?php 
            if (isset($_SESSION['user_login'])) {
                
                $user_id = $_SESSION['user_login'];
                $stmt = $conn->query("SELECT * FROM usersfew WHERE id = $user_id");
                $stmt->execute();
                $row = $stmt->fetch(PDO::FETCH_ASSOC);
            }
        ?>
        <nav class="sb-topnav navbar navbar-expand sb-sidenav-light1">
            
            <!-- Navbar Brand-->
            <a class="navbar-brand ps-3" href="">MENU</a>
            <!-- Sidebar Toggle-->
            <button class="btn btn-link btn-sm order-1 order-lg-0 me-4 me-lg-0" id="sidebarToggle" href="#!"><i class="fas fa-bars"></i></button>
            <!-- Navbar Search-->
            <form class="d-none d-md-inline-block form-inline ms-auto me-0 me-md-3 my-2 my-md-0">
                <!--<div class="input-group">
                    <input class="form-control" type="text" placeholder="Search for..." aria-label="Search for..." aria-describedby="btnNavbarSearch" />
                    <button class="btn btn-primary" id="btnNavbarSearch" type="button"><i class="fas fa-search"></i></button>
                </div>-->
            </form>
            <!-- Navbar-->
            <ul class="navbar-nav ms-auto ms-md-0 me-3 me-lg-4">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false"><i class="fas fa-user fa-fw"></i><?php echo $row['firstname'] .' '. $row['lastname'] ?></a>
                    <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">


                        <li><a class="dropdown-item" href="logout.php">ออกจากระบบ</a></li>
                    </ul>
                </li>
            </ul>
        </nav>
        <div id="layoutSidenav">
            <div id="layoutSidenav_nav">
                <nav class="sb-sidenav accordion sb-sidenav-light" id="sidenavAccordion">
                    <div class="sb-sidenav-menu">
                        <div class="nav">
                            <div class="sb-sidenav-menu-heading"></div>
                            <a class="nav-link" href="userlogin.php">
                                <div class="sb-nav-link-icon"><i class="fa fa-home"></i></div>
                                หน้าหลัก
                            </a>
                            <a class="nav-link" href="searchuser.php">
                                <div class="sb-nav-link-icon"><i class="fa fa-search"></i></div>
                                ค้นหาข้อมูล
                            </a>
                            <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapseLayouts" aria-expanded="false" aria-controls="collapseLayouts">
                                <div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
                                เเก้ไขข้อมูลส่วนตัว
                                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                            </a>
                            <div class="collapse" id="collapseLayouts" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                                <nav class="sb-sidenav-menu-nested nav">
                                    <a class="nav-link" href="edit.php">เเก้ไขข้อมูล</a>
                                    <a class="nav-link" href="changepass.php">เปลี่ยนรหัสผ่าน</a>
                                </nav>
                            </div>
                            
                            <a class="nav-link" href="https://web.facebook.com/Softwarelopburi/">
                                <div class="sb-nav-link-icon"><i class="fa fa-phone-square"></i></div>
                                ติดต่อสอบถาม
                            </a>
                        </div>
                    </div>
                </nav>
            </div>
            <div id="layoutSidenav_content">
                <main>
                <div class="container-fluid px-4">
                    <div class="login-right">
                        <div class="container mt-4">
                            
                
                        <form action="update.php" method="post" enctype="multipart/form-data">
                            <div class="form-group">
                            <tr>
                                <td>
                                    <input type="hidden" value="<?php echo $row['id']; ?>" name="edid" >
                                    <label for="edfirstname">ชื่อ</label><br>
                                    <input type="text"  name="edfirstname"  value="<?php echo $row['firstname'] ?>" style="width:200px;"><br>
                                    <label for="edlastname">นามสกุล</label><br>
                                    <input type="text" name="edlastname"  value="<?php echo $row['lastname'] ?>" style="width:200px;"><br>
                                    <label for="edstd_id">รหัสนักศึกษา</label><br>
                                    <input type="text" name="edstd_id"  value="<?php echo $row['std_id'] ?>" style="width:200px;"><br>
                                    <label for="edemail">อีเมลล์</label><br>
                                    <input type="text" name="edemail"  value="<?php echo $row['email'] ?>" style="width:250px;"><br>
                                    <label for="edaddress">ที่อยู่</label><br>
                                    <input type="text" name="edaddress"  value="<?php echo $row['address'] ?>" style="width:350px;"><br>
                                    <label for="edgen">รุ่นที่จบการศึกษา</label><br>
                                    <input type="text" name="edgen"  value="<?php echo $row['gen'] ?>" style="width:150px;"><br>
                                    <label for="edjob">อาชีพ</label><br>
                                    <input type="text" name="edjob"  value="<?php echo $row['job'] ?>" style="width:200px;"><br>
                                    <label for="img" class="col-form-label">เลือกรูปโปรไฟล์</label>
                                    <input type="file" class="form-control" id="imgInput" name="img" style="width:350px;">
                                    <input type="hidden" value="<?php echo $row['img']; ?>" required class="form-control" name="old_img" >
                                    </div>
                                </td>
                            </tr>
                            <div class="button-area mt-4">
                                <button type="submit" name="update" class="btn btn-danger">เเก้ไขข้อมูล</button>

                                
                                
                            </div>
                            
                            <div class="form-group1"><br>
                                <img class="rounded" width="400px" height="400px" src="uploads/<?php echo $row['img']; ?>" alt="">
                                
                            </div>
                            
                        </div>
                        </div>
                    </div>
                </main>
            </div>
        </div>

        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
        <script src="//cdn.datatables.net/1.11.4/js/jquery.dataTables.min.js"></script>

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="js/scripts.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
        <script src="assets/demo/chart-area-demo.js"></script>
        <script src="assets/demo/chart-bar-demo.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/simple-datatables@latest" crossorigin="anonymous"></script>
        <script src="js/datatables-simple-demo.js"></script>
        <script>
            $(document).ready( function () {
        $('#myTable').DataTable();
        } );
        </script>  
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
