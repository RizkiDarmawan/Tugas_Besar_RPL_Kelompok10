<?php
ob_start();
session_start();	
if (!$_SESSION['lmai_login']){
		header('location:../reg/');
		exit();
}?>			<?php
			$lmai_id = $_SESSION['lmai_id']; $lmai_nama= $_SESSION['lmai_nama']; $lmai_jabatan=strtolower($_SESSION['lmai_jabatan']);		

			//include('../lib/Class.php');
			
			$a = new dbAkses();
			$data=$a->select("select * from ".$lmai_jabatan.",fakultas,jurusan where fakultas.id=jurusan.id_fakultas and ".$lmai_jabatan.".id_jurusan=jurusan.id and ".$lmai_jabatan.".id='".$lmai_id."'");
			for($i=0; $i<$a->kolom; $i++){
			    //echo$i."|".$data[0][$i]."&nbsp;  ";
			}
			$id=$data[0][0];
			$email=$data[0][2];
			$nama=$data[0][3];
			$gender=$data[0][4];
			$hp=$data[0][5];
			if($lmai_jabatan=="mente"){
				 $tempat_lahir=$data[0][6];
				 $tanggal_lahir=$data[0][7];			
				 $golongan_darah=$data[0][8];
				 $liqo=$data[0][9];
				 $rohis=$data[0][10];
				 $prestasi=explode(", ",$data[0][11]);
				 $alamat=$data[0][12];
				 $asal_sma=$data[0][13];
				 $fakultas=$data[0][18];
				 $jurusan=$data[0][20];
			}else{
				 $alamat=$data[0][6];
				 $golongan_darah=$data[0][7];
				 $ppm=$data[0][8];
				 $sm=$data[0][9];
				 $fakultas=$data[0][12];
				 $jurusan=$data[0][14];
			}
			?>
			
			<div id="breadcrumb">
				<ul class="breadcrumb">
					 <li><i class="fa fa-home"></i><a href="index.html"> Home</a></li>
					 <li>Page</li>	 
					 <li class="active">Profile</li>	 
				</ul>
			</div><!--breadcrumb-->
			<ul class="tab-bar grey-tab">
				<li class="active">
					<a href="#overview" data-toggle="tab">
						<span class="block text-center">
							<i class="fa fa-home fa-2x"></i> 
						</span>
						Overview
					</a>
				</li>
				<li>
					<a href="#edit" data-toggle="tab">
						<span class="block text-center">
							<i class="fa fa-edit fa-2x"></i> 
						</span>
						Edit Profile
					</a>
				</li>
			</ul>
			
			<div class="padding-md">
				<div class="row">
					<div class="col-md-4 col-sm-3">
						<div class="row">
							<div class="col-xs-6 col-sm-12 col-md-6 text-center">
								<a href="#">
									<img src="img/user.jpg" alt="User Avatar" class="img-thumbnail">
								</a>
								<div class="seperator"></div>
								<div class="seperator"></div>
							</div><!-- /.col -->
							<div class="col-xs-6 col-sm-12 col-md-6">
								<strong class="font-14 profil-nama"><?php echo$nama; ?></strong>
								<small class="block text-muted profil-email">
									<?php echo$email; ?>
								</small> 
								<div class="seperator"></div>
								<a class="btn btn-success btn-xs m-bottom-sm">Follow</a>
								<div class="seperator"></div>
								<a href="http://facebook.com/<?php echo$email; ?>" target="_blank" class="social-connect tooltip-test facebook-hover pull-left m-right-xs" data-toggle="tooltip" data-original-title="Facebook"><i class="fa fa-facebook"></i></a>
								<a href="http://twitter.com/<?php echo$email; ?>" target="_blank" class="social-connect tooltip-test twitter-hover pull-left m-right-xs" data-toggle="tooltip" data-original-title="Twitter"><i class="fa fa-twitter"></i></a>
								<a href="http://googleplus.com/<?php echo$email; ?>" target="_blank" class="social-connect tooltip-test google-plus-hover pull-left m-right-xs" data-toggle="tooltip" data-original-title="Google Plus"><i class="fa fa-google-plus"></i></a>
								<div class="seperator"></div>
								<div class="seperator"></div>
							</div><!-- /.col -->
						</div><!-- /.row -->
						
					</div><!-- /.col -->
					<div class="col-md-8 col-sm-9">
						<div class="tab-content">
							<div class="tab-pane fade in active" id="overview">
								<div class="row">
									<div class="col-md-6">
										<div class="panel panel-default fadeInDown animation-delay2">
											<div class="panel-heading">
												<i class="fa fa-twitter"></i> About Me
											</div>
											<style>#profil-report .badge-info{width:100%; padding:10px; border-radius:0 10px 0 10px;}</style>
											<ul class="list-group" id="profil-report"> 
												<li class="list-group-item"> 
													<p>nama lengkap : <br /><a class="badge badge-info profil-nama"><?php echo$nama; ?></a> </p> 
													<small class="block text-muted">
														<i class="fa fa-clock-o"></i> &nbsp; gender : <a id="profil-gender" class="badge badge-success"><?php echo$gender; ?></a> 
														, golongan darah : <a id="profil-golongan_darah" class="badge badge-success"><?php echo$golongan_darah; ?></a>
													</small>
												</li>
												<li class="list-group-item"> 
													<p>email : <br /><a class="badge badge-info profil-email" ><?php echo$email; ?></a> </p> 
												</li>
												<li class="list-group-item"> 
													<p>phone / telp : <br /><a class="badge badge-info profil-hp" ><?php echo$hp; ?></a> </p> 
												</li>
												<li class="list-group-item"> 
													<p>no BP / NIM : <br /><a class="badge badge-info profil-id" ><?php echo$id; ?></a> </p> 
												</li>
												<li class="list-group-item"> 
													<p>fakultas : <br /><a class="badge badge-info" ><?php echo$fakultas; ?></a> </p> 
												</li>
												<li class="list-group-item"> 
													<p>jurusan : <br /><a class="badge badge-info" ><?php echo$jurusan; ?></a> </p> 
												</li>
												<li class="list-group-item"> 
													<p>alamat : <br /><a class="badge badge-info profil-alamat" ><?php echo$alamat; ?></a> </p> 
												</li>
											</ul><!-- /list-group -->
										</div><!-- /panel -->
									</div><!-- /.col -->
									<?php if($lmai_jabatan=="mente"){ ?>
									<div class="col-md-6">
										<div class="panel panel-default fadeInUp animation-delay4">
											<div class="panel-heading">
												Prestasi 
											</div>
											<div class="list-group">
												<?php for($i=0; $i<10; $i++){ 
													  if($prestasi[$i]!=null){
												?>
												<a href="#" class="list-group-item">
													<div class="list-group-item-text clearfix">
														<div class="pull-left m-left-sm m-top-sm">
															<span class="badge badge-warning"><?php echo$prestasi[$i]; ?></span>
														</div>
													</div>
												</a>
												<?php }else{$i=10;}} ?>
											</div><!-- /list-group -->	
										</div><!-- /panel -->
										<div class="panel panel-overview fadeInUp animation-delay5">
											<?php if ($liqo=="y"){ ?>
											<div class="overview-icon bg-success">
												<i class="fa fa-check"></i>
											</div>
											<div class="overview-value">
												<div class="h2">Pernah Mentoring</div>
											</div>
										</div>
											<?php } 
											if ($rohis=="y"){ ?>
										<div class="panel panel-overview fadeInUp animation-delay5">
											<div class="overview-icon bg-success">
												<i class="fa fa-check"></i>
											</div>
											<div class="overview-value">
												<div class="h2">Alumni Rohis</div>
											</div>
										</div>
										<?php } ?>
									</div><!-- /.col -->
									<?php }else{ ?>
									<div class="col-md-6">
										<div class="panel panel-overview fadeInUp animation-delay5">
											<?php if ($ppm=="y"){ ?>
											<div class="overview-icon bg-success">
												<i class="fa fa-check"></i>
											</div>
											<div class="overview-value">
												<div class="h2">PPM</div>
												<div class="text-muted"></div>
											</div>
										</div>
											<?php } 
											if ($sm=="y"){ ?>
										<div class="panel panel-overview fadeInUp animation-delay5">
											<div class="overview-icon bg-success">
												<i class="fa fa-check"></i>
											</div>
											<div class="overview-value">
												<div class="h2">Sekolah Mentor</div>
												<div class="text-muted"></div>
											</div>
										</div>
										<?php } ?>
										
									</div><!-- /.col -->
																		
									<?php } ?>
									
								</div><!-- /.row -->
							</div><!-- /tab1 -->
							<div class="tab-pane fade" id="edit">
								<div class="panel panel-default fadeInDown animation-delay1">
									<form class="form-horizontal form-border" onsubmit="return portal.edit_profil(this,'<?php echo$lmai_jabatan; ?>');" id="<?php echo$lmai_jabatan; ?>-form" method="post">
										<div class="panel-heading">
											Basic Information
										</div>
										<div class="panel-body">
											<div class="form-group">
											    <input type="hidden" name="table" value="<?php echo($lmai_jabatan); ?>" />
												<input type="hidden" name="inup" value="up" />
													
												<input type="hidden" name="f1" value="id" />
												<input type="hidden" name="v1" id="<?php echo$lmai_jabatan; ?>-id" value="<?php echo$id; ?>" />

												<input type="hidden" name="f2" value="nama" />
												<label class="control-label col-md-2">Username</label>												
												<div class="col-md-10">
													<input type="text" name="v2" class="form-control input-sm" placeholder="Username" value="<?php echo$nama; ?>" />
												</div><!-- /.col -->
											</div><!-- /form-group -->
											<div class="form-group">
												<label class="control-label col-md-2">Email</label>
												<div class="col-md-10">
													<input type="hidden" name="f3" value="email" />
													<input type="text" name="v3" class="form-control input-sm" value="<?php echo$email; ?>" />
												</div><!-- /.col -->
											</div><!-- /form-group -->
											<div class="form-group">
												<label class="control-label col-md-2">Gender</label>
												<div class="col-md-10">
													<label class="label-radio inline">
													    <input type="hidden" name="f4" value="gender" />
														<input type="radio" name="v4" value="L" <?php if($gender=="L"){echo"checked";} ?> />
														<span class="custom-radio"></span>
														Male
													</label>
													<label class="label-radio inline">
														<input type="radio" name="v4" value="P" <?php if($gender=="P"){echo"checked";} ?> />
														<span class="custom-radio"></span>
														Female
													</label>
												</div><!-- /.col -->
											</div><!-- /form-group -->
											<div class="form-group">
												<label class="control-label col-md-2">Alamat</label>
												<div class="col-md-10">
												    <input type="hidden" name="f5" value="alamat" />
													<textarea name="v5" class="form-control" rows="3"><?php echo$alamat; ?></textarea>
												</div><!-- /.col -->
											</div><!-- /form-group -->
											<div class="form-group">
												<label class="control-label col-md-2">Phone</label>
												<div class="col-md-10">
													<input type="hidden" name="f6" value="hp" />
													<input type="text" name="v6" class="form-control input-sm" value="<?php echo$hp; ?>" />
												</div><!-- /.col -->
											</div><!-- /form-group -->
											<div class="form-group">
												<label class="control-label col-md-2">Golongan Darah</label>
												<div class="col-md-10">
													<input type="hidden" name="f7" value="golongan_darah" />
													<select name="v7" class="form-control input-sm" required><option value="<?php echo$golongan_darah; ?>"><?php echo$golongan_darah; ?></option>
														<option value="O">O</option>
														<option value="A">A</option>
														<option value="B">B</option>
														<option value="AB">AB</option>
													</select>
												</div><!-- /.col -->
											</div><!-- /form-group -->
										</div>
										<div class="panel-footer">
										    <div id="<?php echo$lmai_jabatan; ?>-forminfo" class="col-sm-7"></div>
											<div class="text-right">
												<button type="submit" class="btn btn-sm btn-success">Update</button>
												<button class="btn btn-sm btn-success" type="reset">Reset</button>
											</div>
										</div>
									</form>
								</div><!-- /panel -->
							
								</div><!-- /tab2 -->
							</div><!-- /tab-content -->
					</div><!-- /.col -->
				</div><!-- /.row -->			
			</div><!-- /.padding-md -->
		</div><!-- /main-container -->
	</div><!-- /wrapper -->

	<a href="" id="scroll-to-top" class="hidden-print"><i class="fa fa-chevron-up"></i></a>
	
	<!-- Logout confirmation -->
	<div class="custom-popup width-100" id="logoutConfirm">
		<div class="padding-md">
			<h4 class="m-top-none"> Do you want to logout?</h4>
		</div>

		<div class="text-center">
			<a class="btn btn-success m-right-sm" href="login.html">Logout</a>
			<a class="btn btn-danger logoutConfirm_close">Cancel</a>
		</div>
	</div>
	
    <!-- Le javascript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
	
	<!-- Jquery -->
	<script src="../plugin/js/jquery-1.10.2.min.js"></script>
	
	<script src="../lib/mylibrary.js"></script>
	
	<!-- Bootstrap -->
    <script src="../plugin/bootstrap/js/bootstrap.min.js"></script>
   
	<!-- holder -->
	<script src='../plugin/js/uncompressed/holder.js'></script>
	
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
