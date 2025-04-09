<?php 

session_start();
require_once 'config/db.php';

?>

<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
<link rel="stylesheet" href="stylesignin.css">

	<hr>
        <form action="signin_db.php" method="post">
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












			
			<div class="login-wrap">
				<div class="login-html">
					<input id="tab-1" type="radio" name="tab" class="sign-in" checked><label for="tab-1" class="tab">Sign In</label>
					<input id="tab-2" type="radio" name="tab" class="for-pwd"><label for="tab-2" class="tab">Forgot Password</label>
					<div class="login-form">
						<div class="sign-in-htm">
							<div class="group">
								<label for="user" class="label">Username</label>
								<input type="text" class="input" name="username" aria-describedby="username">
							</div>
							<div class="group">
								<label for="pass" class="label">Password</label>
								<input name="password" type="password" class="input">
								
							</div>
							<div class="group">
								<button type="submit" name="signin" class="button">Sign In</button>
							</div>
							
							<p>ยังไม่เป็นสมาชิกใช่ไหม คลิ๊กที่นี่เพื่อ <a href="register.php">สมัครสมาชิก</a></p>
							<p>คลิ๊กที่นี่เพื่อ <a href="index.php">กลับสู่หน้าหลัก</a></p>
			</form>				
			<form action="forgetpass.php" method="post">				
						</div>
						<div class="for-pwd-htm">





							<form action="forgetpass.php" method="POST">
							<div class="group">
								<label for="user" class="label">Username</label>
								<input name="fgusername" type="text" class="input">
							</div>
							<div class="group">
								<button type="submit" class="button" name="fgpassword">Forget Password</button>
							</div>
							</form>


							<div class="hr"></div>
						</div>
					</div>
				</div>
			</div>
			</form>