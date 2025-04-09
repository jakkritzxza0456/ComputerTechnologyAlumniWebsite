<?php 

    session_start();
    require_once 'config/db.php';
    if (!isset($_SESSION['admin_login'])) {
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
        <title>ค้นหาข้อมูล</title>
        <link href="https://cdn.jsdelivr.net/npm/simple-datatables@latest/dist/style.css" rel="stylesheet" />
        <link href="styleuserlogin.css" rel="stylesheet" />
        <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/js/all.min.js" crossorigin="anonymous"></script>
        <link rel="stylesheet" href="https://cdn.datatables.net/1.11.4/css/jquery.dataTables.min.css">

    </head>
    <body class="sb-nav-fixed">
        <?php 
            if (isset($_SESSION['admin_login'])) {
                
                $admin_id = $_SESSION['admin_login'];
                $stmt = $conn->query("SELECT * FROM usersfew WHERE id = $admin_id");
                $stmt->execute();
                $row = $stmt->fetch(PDO::FETCH_ASSOC);
            }
        ?>

        <nav class="sb-topnav navbar navbar-expand sb-sidenav-light1">
            
            <!-- Navbar Brand-->
            <a class="navbar-brand ps-3" href="">ระบบฐานข้อมูลศิษย์เก่าเเผนกเทคโนโลยีคอมพิวเตอร์</a>
            <!-- Sidebar Toggle-->
            <!-- <button class="btn btn-link btn-sm order-1 order-lg-0 me-4 me-lg-0" id="sidebarToggle" href="#!"><i class="fas fa-bars"></i></button> -->
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
                    <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        <i class="fas fa-user fa-fw"></i><?php echo $row['firstname'] . ' ' . $row['lastname'] ?></a>
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
                            <a class="nav-link" href="admin.php">
                                <div class="sb-nav-link-icon"><i class="fa fa-home"></i></div>
                                หน้าหลัก
                            </a>
                            <a class="nav-link" href="searchadmin.php">
                                <div class="sb-nav-link-icon"><i class="fa fa-search"></i></div>
                                ค้นหาข้อมูล
                            </a>
                            <a class="nav-link" href="editadmin.php">
                                <div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
                                เเก้ไขข้อมูลนักศึกษา
                            </a>
                            <!-- <a class="nav-link" href="editadmin.php">
                                <div class="sb-nav-link-icon"><i class="fa fa-download"></i></div>
                                ดาวน์โหลดข้อมูลนักศึกษา
                            </a> -->
                            
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
                        <h1 class="mt-4">ค้นหาข้อมูลรายชื่อศิษย์เก่า</h1>
                        <div class="card mb-4">
                            <div class="card-header"></div>
                            <table id="myTable" class="table table-hover table-bordered">
                            <div class="card-body">
                            <thead>
                                    <th>คำนำหน้าชื่อ</th>
                                    <th>ชื่อ - นามสกุล</th>
                                    <th>อายุ</th>
                                    <th>รหัสนักศึกษา</th>
                                    <th>รุ่นที่จบการศึกษา</th>
                                    <th>ที่อยู่</th>
                                    <th>วัน/เดือน/ปีเกิด</th>
                                </thead>
                                <tbody>
                                <?php

                                    $stmt = $conn->query("SELECT * FROM usersfew WHERE urole = 'user'");
                                    $stmt->execute();

                                    $users = $stmt->fetchAll();
                                    foreach($users as $user) {
                                ?>
                                    <tr>
                                        <td><?php echo $user['titlename'] ?></td>
                                        <td><?php echo $user['firstname']. ' ' . $user['lastname']?></td>
                                        <td><?php echo $user['age'] ?></td>
                                        <td><?php echo $user['std_id'] ?></td>
                                        <td><?php echo $user['gen'] ?></td>
                                        <td><?php echo $user['address'] ?></td>
                                        <td><?php echo $user['birthday'] ?></td>
                                    </tr>
                                <?php
                                    }
                                ?>
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
