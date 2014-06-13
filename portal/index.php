<?php
ob_start();
session_start();	
error_reporting(0);
if (!$_SESSION['lmai_login']){
		header('location:../reg/');
		exit();
	}
	
$lmai_id=$_SESSION['lmai_id'];
$lmai_nama=$_SESSION['lmai_nama'];
$lmai_jabatan=strtolower($_SESSION['lmai_jabatan']);
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>Portal LMAI</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">

    <!-- Bootstrap core CSS -->
    <link href="../plugin/../plugin/bootstrap/css/bootstrap.min.css" rel="stylesheet">
	
	<!-- Font Awesome -->
	<link href="../plugin/css/font-awesome.min.css" rel="stylesheet">
	
	<!-- Pace -->
	<link href="../plugin/css/pace.css" rel="stylesheet">
	
	<!-- Color box -->
	<link href="../plugin/css/colorbox/colorbox.css" rel="stylesheet">
	
	<!-- Morris -->
	<link href="../plugin/css/morris.css" rel="stylesheet"/>	
	
	<!-- Calendar -->
	<link href='css/fullcalendar.css' rel='stylesheet' />	
	
	<!-- Datatable -->
	<link href="../plugin/css/jquery.dataTables_themeroller.css" rel="stylesheet">
	
	<!-- Endless -->
	<link href="../plugin/css/endless.min.css" rel="stylesheet">
	<link href="../plugin/css/endless-skin.css" rel="stylesheet">
	
  </head>

  <body class="overflow-hidden" onload="portal.initialize(); portal.refresh_kelompok('portal_kelompok','<?php echo$lmai_jabatan; ?>','<?php echo$lmai_id; ?>'); portal.refresh_kelompok('overviewkhs','<?php echo$lmai_jabatan; ?>','<?php echo$lmai_id; ?>'); portal.refresh_kelompok('khs','<?php echo$lmai_jabatan; ?>','<?php echo$lmai_id; ?>');portal.refresh_kelompok('jadwal_alternatif','<?php echo$lmai_jabatan; ?>','<?php echo$lmai_id; ?>');portal.refresh_mkuliah('m_kuliah','<?php echo$lmai_id; ?>');">
	<!-- Overlay Div -->
	<div id="overlay" class="transparent">
	</div>
	
	<a href="" id="theme-setting-icon" style="Top:45px;"><i class="fa fa-cog fa-lg"></i></a>
	<div id="theme-setting" style="Top:45px;">
		<div class="title">
			<strong class="no-margin">Skin Color</strong>
		</div>
		<div class="theme-box">
			<a class="theme-color" style="background:#323447" id="default"></a>
			<a class="theme-color" style="background:#efefef" id="skin-1"></a>
			<a class="theme-color" style="background:#a93922" id="skin-2"></a>
			<a class="theme-color" style="background:#3e6b96" id="skin-3"></a>
			<a class="theme-color" style="background:#635247" id="skin-4"></a>
			<a class="theme-color" style="background:#3a3a3a" id="skin-5"></a>
			<a class="theme-color" style="background:#495B6C" id="skin-6"></a>
		</div>
		<div class="title">
			<strong class="no-margin">Sidebar Menu</strong>
		</div>
		<div class="theme-box">
			<label class="label-checkbox">
				<input type="checkbox" checked id="fixedSidebar">
				<span class="custom-checkbox"></span>
				Fixed Sidebar
			</label>
		</div>
	</div><!-- /theme-setting -->

	<div id="wrapper" class="preload">
		<div id="top-nav" class="fixed skin-6">
			<a href="#" class="brand">
				<span>LMAI</span>
				<span class="text-toggle badge-success bounceIn" style="padding:5px 10px; border-radius:10px;"> Portal <?php echo$_SESSION['lmai_jabatan']; ?></span>
			</a><!-- /brand -->					
			<button type="button" class="navbar-toggle pull-left" id="sidebarToggle">
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
			</button>
			<ul class="nav-notification clearfix">
				<li class="profile dropdown">
					<a class="dropdown-toggle" data-toggle="dropdown" href="#">
						<strong class="profil-nama">Hi. <?php echo$_SESSION['lmai_nama']; ?></strong>
						<span><i class="fa fa-chevron-down"></i></span>
					</a>
					<ul class="dropdown-menu">
						<li>
							<a class="clearfix" href="#">
								<img src="../img/user.jpg" alt="User Avatar">
								<div class="detail">
									<strong class="profil-nama"><?php echo$_SESSION['lmai_nama']; ?></strong>
									<p class="grey profil-email"></p> 
								</div>
							</a>
						</li>
						<li><a tabindex="-1" href="./?pg=profile" class="main-link"><i class="fa fa-edit fa-lg"></i> Edit profile</a></li>
						<li class="divider"></li>
						<li><a tabindex="-1" class="main-link" href="../reg/logout.php"><i class="fa fa-lock fa-lg"></i> Log out</a></li>
					</ul>
				</li>
			</ul>
		</div><!-- /top-nav-->
		
		<aside class="fixed skin-6">
			<div class="sidebar-inner scrollable-sidebar">
				<div class="size-toggle">
					<a class="btn btn-sm" id="sizeToggle">
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
					</a>
					<a class="btn btn-sm pull-right"  href="../reg/logout.php">
						<i class="fa fa-power-off"></i>
					</a>
				</div><!-- /size-toggle -->	
				<div class="user-block clearfix">
					<img src="../img/user.jpg" alt="User Avatar">
					<div class="detail">
						<strong class="profil-nama"><?php echo$_SESSION['lmai_nama']; ?></strong>
					</div>
				</div><!-- /user-block -->
				<div class="search-block">
					<div class="input-group">
						<input type="text" class="form-control input-sm" placeholder="search here...">
						<span class="input-group-btn">
							<button class="btn btn-default btn-sm" type="button"><i class="fa fa-search"></i></button>
						</span>
					</div><!-- /input-group -->
				</div><!-- /search-block -->
				<div class="main-menu">
					<ul>
						<li>
							<a href="./?pg=dashboard">
								<span class="menu-icon">
									<i class="fa fa-desktop fa-lg"></i> 
								</span>
								<span class="text">
									Dashboard
								</span>
								<span class="menu-hover"></span>
							</a>
						</li>
												<li class="openable">
							<a href="#">
								<span class="menu-icon">
									<i class="fa fa-file-text fa-lg"></i> 
								</span>
								<span class="text">
									&nbsp; About LMAI '14 &nbsp;
								</span>
								<span class="badge badge-success bounceIn animation-delay5">2</span>
								<span class="menu-hover"></span>
							</a>
							<ul class="submenu">
								<li><a href="./?pg=gallery">
									<span class="submenu-label">
										<i class="fa fa-picture-o fa-lg"></i>&nbsp; Gallery
									</span>
									<span class="menu-hover"></span>
									</a>
								</li>
								<li><a href="./?pg=timeline">
									<span class="submenu-label">
										<i class="fa fa-sitemap fa-lg"></i>&nbsp; Timeline LMAI
									</span>
									<span class="menu-hover"></span>
								</a>
								</li>
							</ul>
						</li>
						<li>
							<a href="./?pg=khs">
								<span class="menu-icon">
									<i class="fa fa-book fa-lg"></i> 
								</span>
								<span class="text">
									Kartu Hasil Studi
								</span>
								<span class="menu-hover"></span>
							</a>
						</li>
						<li>
							<a href="./?pg=kelompok">
								<span class="menu-icon">
									<i class="fa fa-group fa-lg"></i> 
								</span>
								<span class="text">
									Kelompok 
								</span>
								<span class="menu-hover"></span>
							</a>
						</li>
						<li>
							<a href="./?pg=jadwal">
								<span class="menu-icon">
									<i class="fa fa-clock-o fa-lg"></i> 
								</span>
								<span class="text">
									&nbsp;Penjadwalan
								</span>
								<span class="menu-hover"></span>
							</a>
						</li>
						<li>
							<a href="./?pg=profile">
								<span class="menu-icon">
									<i class="fa fa-user fa-lg"></i> 
								</span>
								<span class="text">
									Profile
								</span>
								<span class="menu-hover"></span>
							</a>
						</li>
					</ul>
					
					<div class="alert alert-info">
						Welcome to LMAI's Portal. Don't forget to say Ta'awuz & Basmallah. 
					</div>
				</div><!-- /main-menu -->
			</div><!-- /sidebar-inner -->
		</aside>
<!----------------------------------------------------------------------------------------------------------------------------------------------------->
		
		<div id="main-container" style="clear:both;">
	    <?php
		include('../lib/Class.php');

        echo'<input type="hidden" id="lmai_id" value="'.$lmai_id.'"/>';
		$a= new dbAkses();
		$data=$a->select("select hp,email from ".$lmai_jabatan." where id='".$lmai_id."'");
        $email=$data[0][1];
		if($data[0][0]==0||$data[0][0]==""){
		    include('perdana.php');
		}
		else{
			$webapp = new webApp();
			//$webapp->page();
		}
		?>

<!-- Footer ======================================================================================================================================== -->
<footer>
	<div class="row">
		<div class="col-sm-6">
			<span class="footer-brand">
			<strong class="text-danger">Portal</strong>
			</span>
			<p class="no-margin">
				&copy; 2014 <strong>Lembaga Mentoring Agama Islam</strong>. 
			</p>
		</div><!-- /.col -->
	</div><!-- /.row-->
</footer>
		