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
        <title>หน้าหลัก</title>
        <link href="https://cdn.jsdelivr.net/npm/simple-datatables@latest/dist/style.css" rel="stylesheet" />
        <link href="styleuserlogin.css" rel="stylesheet" />
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
            <a class="navbar-brand ps-3" href="">ระบบฐานข้อมูลศิษย์เก่าเเผนกเทคโนโลยีคอมพิวเตอร์</a>
            <!-- Sidebar Toggle-->
            
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
                        <li><a class="dropdown-item" href="index.php">ออกจากระบบ</a></li>
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
                    <form action="">
                    <div class="container-fluid px-4">
                        <h1 class="mt-4">ข้อมูลศิษย์เก่า</h1>
                        <div class="card mb-4">
                            <table id="myTable" class="table table-hover table-bordered">
                            <div class="card-body">
                                <th>ข้อมูลศิษย์เก่า</th>
                                <th>ตัวเลือก</th>


                                <?php 
                                    $stmt = $conn->query("SELECT * FROM usersfew WHERE id > '1'");
                                    $stmt->execute();

                                    $users = $stmt->fetchAll();
                                    foreach($users as $user) {
                                ?>
                                    <tr>
                                        <td width="110px">
                                        <img class="rounded" width="160px" height="160px" src="uploads/<?php echo $user['img']; ?>" alt="">
                                        </td>
                                        <td width="700px"><br>
                                        <p>ชื่อ:  <?php echo $user['titlename'] . ' ' . $user['firstname']. ' ' . $user['lastname']?><br></p>
                                        <p>รหัสนักศึกษา: <?php echo $user['std_id'] ?><br></p>
                                        <p>รุ่นที่จบการศึกษา: <?php echo $user['gen'] ?><br></p>
                                        <p>อาชีพ: <?php echo $user['job'] ?></p>
                                        <!-- <div class="modal fade" id="userModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog">
                                            <div class="modal-content">
                                            <div class="modal-body">
                                                <form action="insert.php" method="post" enctype="multipart/form-data">
                                                    <div class="mb-3">
                                                        <label for="id" class="col-form-label">ID:</label>
                                                        <input type="text" readonly required class="form-control" name="id" value="<?php echo $user['id']?>">
                                                    </div>
                                                    <div class="mb-3">
                                                        <label for="firstname" class="col-form-label">ชื่อ-นามสกุล:</label>
                                                        <input type="text" readonly required class="form-control" name="firstname" value="<?php echo $user['firstname'] . ' ' . $user['lastname'] ?>">
                                                    </div>
                                                    <div class="mb-3">
                                                        <label for="lastname" class="col-form-label">รหัสนักศึกษา:</label>
                                                        <input type="text" readonly required class="form-control" name="lastname" value="<?php echo $user['std_id']?>">
                                                    </div>
                                                    <div class="mb-3">
                                                        <label for="gen" class="col-form-label">รุ่นที่จบการศึกษา:</label>
                                                        <input type="text" readonly required class="form-control" name="position" value="<?php echo $user['gen']?>">
                                                    </div>
                                                    <div class="mb-3">
                                                        <label for="address" class="col-form-label">ที่อยู่:</label>
                                                        <input type="text" readonly required class="form-control" name="position" value="<?php echo $user['address']?>">
                                                    </div>
                                                    <div class="mb-3">
                                                        <label for="birthday" class="col-form-label">วันเกิด:</label>
                                                        <input type="text" readonly required class="form-control" name="position" value="<?php echo $user['birthday']?>">
                                                    </div>
                                                    <div class="mb-3">
                                                        <label for="img" class="col-form-label">รูปโปรไฟล์:</label>
                                                        
                                                        <img loading="lazy" width="100%" id="previewImg" alt="">
                                                        <img width="100%" src="uploads/<?php echo $user['img']; ?>" id="previewImg" alt="">
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                    </div>
                                                </form>
                                            </div>
                                            </div>
                                            </div>
                                        </div>
                                        </td> -->
                                            <td width="280px">
                                            <div class="container mt-5">
                                                    <div class="row">
                                                        <div class="col-md-6 d-flex justify-content-end">
                                                            <!-- <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#userModal" data-bs-whatever="@mdo">ดูข้อมูลเพิ่มเติม</button> -->

                                                            <a href="more.php?id=<?php echo $user['id']; ?>" class="btn btn-danger">ดูข้อมูลเพิ่มเติม</a>
                                                        </div>
                                                    </div>
                                                </td>
                                            </tr>
                                <?php
                                    }
                                ?>
                                </div> 
                                </form>         
                                
                                    </tbody>
                                </table>
                                <div class="card-header"></div>

                                
                            </div>

                            
    
        
                        </div>
                        <div class="footer-dark">
        <footer>
            <div class="container">
                <div class="row">
                    <div class="col-md-6 item text">
                        <h3>ผู้จัดทำเว็ปไซต์</h3>
                        <p>นาย จักรกฤษณ๋ คุ้มภัย ปวส.2 กลุ่ม1 เเผนกเทคโนโลยีคอมพิวเตอร์</p><br>
                        <p>นาย ชยากร อยู่คงพัน ปวส.2 กลุ่ม1 เเผนกเทคโนโลยีคอมพิวเตอร์</p>
                    </div>
                    <!-- <div class="col item social"><a href="#"><i class="icon-facebook"></i></a><a href="#"><i class="icon ion-social-twitter"></i></a><a href="#"><i class="icon ion-social-snapchat"></i></a><a href="#"><i class="icon ion-social-instagram"></i></a></div> -->
                </div>
                <p class="copyright">วิทยาลัยเทคนิคลพบุรี เเผนก เทคโนโลยีคอมพิวเตอร์</p>
            </div>
        </footer>
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/js/bootstrap.bundle.min.js"></script>
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
    </body>
</html>
