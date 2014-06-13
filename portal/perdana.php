<?php
ob_start();
session_start();	
if (!$_SESSION['lmai_login']){
		header('location:../reg/');
		exit();
}?>			<div class="padding-md" id="<?php echo(strtolower($_SESSION['lmai_jabatan'])); ?>-fiturinfo">

			    		<div class="panel-stat3 bg-info fadeInLeft animation-delay1" style="text-align:center;">
							<h2 class="m-top-none fadeInDown animation-delay2" id="userCount">Assalamu'alaikum <?php echo$_SESSION['lmai_nama']; ?>
							</h2>
							<h3 class="fadeInDown animation-delay4">Untuk <strong>mengaktifkan</strong> fitur portal ini, silahkan lengkapi form wizard berikut :</h3>
							<div class="stat-icon">
								<i class="fa fa-user fa-3x"></i>
							</div>
						</div>

				<div class="panel panel-default fadeInLeft animation-delay7">
					<form class="form-horizontal no-margin form-border" id="formWizard1" novalidate>
						<div class="panel-heading">
							Form Wizard
						</div>
						<div class="panel-tab">
							<ul class="wizard-steps wizard-demo" id="wizardDemo1"> 
								<li class="active">
									<a href="#wizardContent1" data-toggle="tab">Step 1</a>
								</li> 
								<li>
									<a href="#wizardContent2" data-toggle="tab">Step 2</a>
								</li> 
								<li>
									<a href="#wizardContent3" data-toggle="tab">Step 3</a>
								</li>
							</ul>
						</div>
							
						<div class="panel-body" id="<?php echo(strtolower($_SESSION['lmai_jabatan'])); ?>-form">
							<div class="tab-content">
								<div class="tab-pane fade in active" id="wizardContent1">
									<div class="form-group">
										<label class="control-label col-lg-2">Phone</label>
										<div class="col-lg-6">
											<input type="hidden" name="table" value="<?php echo(strtolower($_SESSION['lmai_jabatan'])); ?>" />
											<input type="hidden" name="inup" value="up" />
											
											<input type="hidden" name="f1" value="id" />
											<input type="hidden" name="v1" value="<?php echo$_SESSION['lmai_id']; ?>" />
											
											<input type="hidden" name="f2" value="hp" />
											<input type="text" name="v2" class="form-control input-sm" placeholder="(XXX) XXXX XXX" data-required="true" data-type="phone">
										</div><!-- /.col -->
									</div><!-- /form-group -->		
									<div class="form-group">
										<label class="control-label col-lg-2">Email</label>
										<div class="col-lg-6">
										    <input type="hidden" name="f3" value="email" />
											<input type="text" name="v3" class="form-control input-sm" placeholder="test@example.com" data-required="true" data-type="email">
										</div><!-- /.col -->
									</div><!-- /form-group -->
									<div class="form-group">
										<label class="control-label col-lg-2">Alamat</label>
										<div class="col-lg-6">
											<input type="hidden" name="f4" value="alamat" />
											<input type="text" name="v4" class="form-control input-sm" placeholder="Alamat Sekarang" data-required="true" >
										</div><!-- /.col -->
									</div><!-- /form-group -->		
					
								</div>
								<?php if(strtolower($_SESSION['lmai_jabatan'])=="mente"){ ?>
								<div class="tab-pane fade" id="wizardContent2">
									<div class="form-group">
										<label class="control-label col-lg-2">Asal Sekolah</label>
										<div class="col-lg-6">
										    <input type="hidden" name="f5" value="asal_sma" />
										    <input type="text" name="v5" placeholder="SMA/Sederajat" class="form-control input-sm" data-required="true" data-minlength="8">
										</div><!-- /.col -->
									</div><!-- /form-group -->
									<div class="form-group">
										<label class="control-label col-lg-2">Golongan Darah</label>
										<div class="col-lg-6">
										    <input type="hidden" name="f6" value="golongan_darah" />
											<select name="v6" class="form-control input-sm" required><option value="">- Pilih -</option>
													<option value="O">O</option>
													<option value="A">A</option>
													<option value="B">B</option>
													<option value="AB">AB</option>
											</select>
										</div><!-- /.col -->
									</div><!-- /form-group -->
									<div class="form-group">
										<label class="control-label col-lg-2">Tempat,Tgl Lahir</label>
										<div class="col-lg-3">
										    <input type="hidden" name="f7" value="tempat_lahir" />
											<input type="text" name="v7" class="form-control input-sm" placeholder="Tempat lahir" data-required="true" >
										</div><!-- /.col -->
										<div class="col-lg-3">
										    <input type="hidden" name="f8" value="tanggal_lahir" />
											<input type="date" name="v8" class="form-control input-sm" placeholder="Tanggal lahir" data-required="true" id="dateplace" />
										</div><!-- /.col -->
									</div><!-- /form-group -->		
								</div>
								<div class="tab-pane fade padding-md" id="wizardContent3">
									<div class="form-group">
										<label class="col-lg-7 control-label" style="text-align:left;">Sudah pernah ikut Mentoring Agama Islam sebelumnya ?</label>
									 	<div class="col-lg-5">
											<label class="label-radio inline">
												<input type="hidden" name="f9" value="liqo" />
												<input type="radio" name="v9" value="y" required>
												<span class="custom-radio"></span>
												Ya
											</label>
												<label class="label-radio inline">
												<input type="radio" name="v9" value="t" required>
												<span class="custom-radio"></span>
												Belum
											</label>
										</div><!-- /.col -->
									</div><!-- /form-group -->
									<div class="form-group">
										<label class="col-lg-7 control-label" style="text-align:left;">Pernah ikut kelembagaan Rohani seperti Rohis, BRM Atau FSI sebelumnya ?</label>
									 	<div class="col-lg-5">
											<label class="label-radio inline">
												<input type="hidden" name="f10" value="rohis" />
												<input type="radio" name="v10" value="y" required>
												<span class="custom-radio"></span>
												Ya
											</label>
												<label class="label-radio inline">
												<input type="radio" name="v10" value="t" required>
												<span class="custom-radio"></span>
												Tidak
											</label>
										</div><!-- /.col -->
									</div><!-- /form-group -->	
									<div class="form-group" id="pilihanprestasi">
									    <style>#pilihanprestasi span{margin:10px 20px 10px 0px; padding:7px; }</style>
										<label class="col-lg-4 control-label" style="text-align:left;">Apa prestasi dalam bidang Kerohanian Islam yang pernah diraih  ?</label>
									 	<div class="col-lg-8" style="text-align:left;">
											<input type="hidden" name="f11" value="prestasi" />
											<label class="label-checkbox inline">
												<input type="checkbox" name="v11c1" value="Musabaqah Tilawatil Qur'an, ">
												<span class="custom-checkbox"> MTQ</span>
											</label>
											<label class="label-checkbox inline">
												<input type="checkbox" name="v11c2" value="Musabaqah Syarhil Qur'an, ">
												<span class="custom-checkbox"> MSQ</span>
											</label>
											<label class="label-checkbox inline">
												<input type="checkbox" name="v11c3" value="Kaligrafi, ">
												<span class="custom-checkbox"> Kaligrafi</span>
												
											</label>
											<label class="label-checkbox inline">
												<input type="checkbox" name="v11c4" value="Nasyid, ">
												<span class="custom-checkbox"> Nasyid</span>
												
											</label>
											<label class="label-checkbox inline">
												<input type="checkbox" name="v11c5" value="Hafidz Qur'an, ">
												<span class="custom-checkbox"> Hafidz Qur'an</span>
												
											</label>
											<label class="label-checkbox inline">
												<input type="checkbox" name="v11c6" value="Da'i / Da'iah, ">
												<span class="custom-checkbox"> Da'i/Da'iah</span>
												
											</label>
											<label class="label-checkbox inline">
												<input type="checkbox" name="v11c7" value="lainnya, ">
												<span class="custom-checkbox"> Lainnya</span>
												
											</label>
										</div><!-- /.col -->
									</div><!-- /form-group -->
									<?php }else{ ?>
								<div class="tab-pane fade" id="wizardContent2">
									<div class="form-group">
										<label class="control-label col-lg-2" style="text-align:left;">Golongan Darah</label>
										<div class="col-lg-6">
										    <input type="hidden" name="f5" value="golongan_darah" />
											<select name="v5" class="form-control input-sm" required><option value="">- Pilih -</option>
													<option value="O">O</option>
													<option value="A">A</option>
													<option value="B">B</option>
													<option value="AB">AB</option>
											</select>
										</div><!-- /.col -->
									</div><!-- /form-group -->
									<div class="form-group">
										<label class="col-lg-7 control-label" style="text-align:left;">Sudah pernah ikut Pelatihan Penataran Mentor (PPM) ?</label>
									 	<div class="col-lg-5">
											<label class="label-radio inline">
												<input type="hidden" name="f6" value="ppm" required />
												<input type="radio" name="v6" value="y">
												<span class="custom-radio"></span>
												Ya
											</label>
												<label class="label-radio inline">
												<input type="radio" name="v6" value="t" required>
												<span class="custom-radio"></span>
												Belum
											</label>
										</div><!-- /.col -->
									</div><!-- /form-group -->
									<div class="form-group">
										<label class="col-lg-7 control-label" style="text-align:left;">Sudah pernah ikut Sekolah Mentor (SM) ?</label>
									 	<div class="col-lg-5">
											<label class="label-radio inline">
												<input type="hidden" name="f7" value="sm" />
												<input type="radio" name="v7" value="y" required>
												<span class="custom-radio"></span>
												Ya
											</label>
												<label class="label-radio inline">
												<input type="radio" name="v7" value="t" required>
												<span class="custom-radio"></span>
												Tidak
											</label>
										</div><!-- /.col -->
									</div><!-- /form-group -->	

								</div>
								<div class="tab-pane fade padding-md" id="wizardContent3">

									<?php 
									}
									?>
									<div class="pull-right">
									<input type="submit" class="btn btn-lg btn-warning" name="submit" value="Finish !" onclick="return app.perdana('<?php echo$lmai_jabatan; ?>');"> 
									</div>

								</div>
							</div>
						</div>
						<div class="panel-footer clearfix">
							<div class="pull-left">
								<button class="btn btn-success btn-sm disabled" id="prevStep1" disabled>Previous</button>
								<button class="btn btn-sm btn-success" id="nextStep1">Next</button>
								
							</div>

							<div class="pull-right" style="width:30%">
								<div class="progress progress-striped active m-top-sm m-bottom-none">
									<div class="progress-bar progress-bar-success" id="wizardProgress" style="width:33%;">
									</div>
								</div>
							</div>
						</div>
					</form>
				</div><!-- /panel -->	
				
						 <div class="panel-stat3 bg-info fadeInLeft animation-delay10" style="text-align:center;">
							<h2 class="m-top-none">& enjoy it !</h2>
						</div>
				
				
						
			</div><!-- /.padding-md -->
		</div><!-- /main-container -->
	</div><!-- /wrapper -->

	<a href="" id="scroll-to-top" class="hidden-print"><i class="fa fa-chevron-up"></i></a>
	
	<!-- Logout confirmation -->
	<div class="custom-popup width-100" id="logoutConfirm">
	</div>
		
    <!-- Le javascript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
	
	<!-- Jquery -->
	<script src="../plugin/js/jquery-1.10.2.min.js"></script>
	
	<script src="../lib/mylibrary.js"></script>
	
	<!-- Bootstrap -->
    <script src="../plugin/bootstrap/js/bootstrap.min.js"></script>
   
	<!-- Parsley -->
	<script src="../plugin/js/parsley.min.js"></script>
	
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
	<script src="../plugin/js/endless/endless_wizard.js"></script>
	<script src="../plugin/js/endless/endless.js"></script>
	
  </body>
</html>
