
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>Login</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">

    <!-- Bootstrap core CSS -->
    <link href="../plugin/bootstrap/css/bootstrap.min.css" rel="stylesheet">
	
	<!-- Font Awesome -->
	<link href="../plugin/css/font-awesome.min.css" rel="stylesheet">
	
	<!-- Endless -->
	<link href="../plugin/css/endless.min.css" rel="stylesheet">

  </head>

  <body>
	<div class="login-wrapper">
		<div class="text-center">
			<h2 class="fadeInUp animation-delay8" style="font-weight:bold">
				<span class="text-success">Lmai's</span> <span style="color:#ccc; text-shadow:0 1px #fff">Admin</span>
			</h2>
		</div>
		<div class="login-widget animation-delay1">	
			<div class="panel panel-default">
				<div class="panel-heading clearfix">
					<div class="pull-left">
						<i class="fa fa-lock fa-lg"></i> Login
					</div>

					<div class="pull-right">
					</div>
				</div>
				<div class="panel-body">
					<form class="form-login" method="post" action="./login.php">
                        <?php 
                        include('../lib/Class.php');
						if(isset($_POST['submit'])){
							$ses = new userSession();
							$rs=$ses->adminLogin();
				    		if($rs=="failed"){
								?>
								<div class="login-form-links link1 " data-animation="fadeInRightBig" data-animation-delay=".0s" style="background:#FFD4FF; text-align:center; padding:5px 20px 10px;">
                    			<h4 class="red" style="color:#fff;" >Warning ! Username atau Password Anda Salah.</h4>
                				</div><br />	
								<?php
							}
						}
						?>
						<div class="form-group">
							<label>Username</label>
							<input type="text" placeholder="Username" name="user" class="form-control input-sm bounceIn animation-delay2" >
						</div>
						<div class="form-group">
							<label>Password</label>
							<input type="password" placeholder="Password" name="pass" class="form-control input-sm bounceIn animation-delay4">
						</div>
						<div class="form-group">
						</div>
	
						<hr/>
						<button type="submit" name="submit" class="btn btn-success btn-sm bounceIn animation-delay5 pull-right"><i class="fa fa-sign-in"></i> Sign in</button>	
					</form>
				</div>
			</div><!-- /panel -->
		</div><!-- /login-widget -->
	</div><!-- /login-wrapper -->

    <!-- Le javascript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    
    <!-- Jquery -->
	<script src="../plugin/js/jquery-1.10.2.min.js"></script>
    
    <!-- Bootstrap -->
    <script src="../plugin/bootstrap/js/bootstrap.min.js"></script>
   
	<!-- Modernizr -->
	<script src='../plugin/js/modernizr.min.js'></script>
   
    <!-- Pace -->
	<script src='../plugin/js/pace.min.js'></script>
   
    <!-- Popup Overlay -->
	<script src='../plugin/js/jquery.popupoverlay.min.js'></script>
   
    <!-- Slimscroll -->
	<script src='../plugin/js/jquery.slimscroll.min.js'></script>
   
	<!-- Cookie -->
	<script src='../plugin/js/jquery.cookie.min.js'></script>

	<!-- Endless -->
	<script src="../plugin/js/endless/endless.js"></script>
  </body>
</html>
