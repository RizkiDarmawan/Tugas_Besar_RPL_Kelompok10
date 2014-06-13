<?php
ob_start();
session_start();	
error_reporting(0);
if (!$_SESSION['lmai_login']){
		header('location:../reg/');
		exit();
	}
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Opening Mentoring</title>
        <meta charset="UTF-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"> 
        <meta name="viewport" content="width=device-width, initial-scale=1.0"> 
        <meta name="description" content="" />
        <meta name="keywords" content="" />
        <meta name="author" content="Codrops" />
        <link rel="shortcut icon" href="../favicon.ico"> 
        
		<link rel="stylesheet" type="text/css" href="css/demo.css" />
        <link rel="stylesheet" type="text/css" href="css/style2.css" />
		<!--[if lt IE 10]>
				<link rel="stylesheet" type="text/css" href="css/style2IE.css" />
		<![endif]-->
    </head>
	<script language=javascript>
       setTimeout("location.href='../portal/'", 17000);
	</script>
    <body>
	    <div class="container">
          <div class="sp-container">
				<div class="sp-content">
					<div class="sp-globe"></div>
					
					<h2 class="frame-1" style="font-size:70px">Ahlan Wa Sahlan <?php echo$_SESSION['lmai_nama']; ?></h2>
					<h2 class="frame-2" style="font-size:70px">Di Portal Resmi LMAI UNAND</h2>
					<h2 class="frame-3" style="font-size:60px">Kamu akan dipandu dalam pelaksanaan :</h2>
					<h2 class="frame-4" style="font-size:120px">Mentoring 2014</h2>
					<h2 class="frame-5" style="font-size:70px"><span>So, Prepare Your Spirit </span><span>&</span><span> Creativity</span></h2>
					<a class="sp-circle-link" href="../portal/" target="_blank">Next !</a>
				</div>
			</div>
        </div>
		
    </body>
</html>