<?php
ob_start();
session_start();
if(!$_SESSION['lmai_login_admin']){
    header('location:../login.php');
    exit();
}
?>			<div id="breadcrumb">
				<ul class="breadcrumb">
					 <li><i class="fa fa-home"></i> Home</li>
					 <li>Data Master</li>	 
					  
				</ul>
			</div><!--breadcrumb-->
			<ul class="tab-bar grey-tab">
				<li class="active">
					<a href="#overview" onclick="data_master.quantitas()" data-toggle="tab">
						<span class="block text-center">
							<i class="fa fa-home fa-2x"></i> 
						</span>
						Overview
					</a>
				</li>
				<li>
					<a href="#fakultas" onclick="data_master.refreshtable('fakultas')" data-toggle="tab">
						<span class="block text-center">
							<i class="fa fa-edit fa-2x"></i> 
						</span>
						Fakultas
					</a>
				</li>
				<li>
					<a href="#jurusan" onclick="data_master.refreshtable('jurusan')" data-toggle="tab">
						<span class="block text-center">
							<i class="fa fa-edit fa-2x"></i> 
						</span>
						jurusan
					</a>
				</li>
				<li>
					<a href="#mat_pel" onclick="data_master.refreshtable('mat_pel')" data-toggle="tab">
						<span class="block text-center">
							<i class="fa fa-edit fa-2x"></i> 
						</span>
						Mata Pel
					</a>
				</li>
				<li>
					<a href="#amalanyaumi" onclick="data_master.refreshtable('amalanyaumi')" data-toggle="tab">
						<span class="block text-center">
							<i class="fa fa-edit fa-2x"></i> 
						</span>
						Amalanyaumi
					</a>
				</li>
				<li>
					<a href="#ket_shift" onclick="data_master.refreshtable('ket_shift')" data-toggle="tab">
						<span class="block text-center">
							<i class="fa fa-edit fa-2x"></i> 
						</span>
						Shift
					</a>
				</li>
				<li>
					<a href="#admin_f" onclick="data_master.refreshtable('admin_f')" data-toggle="tab">
						<span class="block text-center">
							<i class="fa fa-user fa-2x"></i> 
						</span>
						Admin Fakultas
					</a>
				</li>
				<li>
					<a href="#admin_p" onclick="data_master.refreshtable('admin_p')" data-toggle="tab">
						<span class="block text-center">
							<i class="fa fa-user fa-2x"></i> 
						</span>
						Admin Pusat
					</a>
				</li>
				<li>
					<a href="#kode_mentor" onclick="data_master.refreshtable('kode_mentor')" data-toggle="tab">
						<span class="block text-center">
							<i class="fa fa-pencil fa-2x"></i> 
						</span>
						Kode Mentor
					</a>
				</li>

			</ul>			
			<div class="padding-md">
				<div class="row">
					<div class="col-md-12 col-sm-9">
						<div class="tab-content fadeInDown animation-delay1">
							<div class="tab-pane fade in active fadeInDown animation-delay1" id="overview">
								<div class="col-md-4 col-sm-4">
									 <div class="panel panel-default panel-stat2 bg-success">
									 <div class="panel-body">
									 <span class="stat-icon">
									 <i class="fa fa-bar-chart-o"></i>
									 </span>
									 <div class="pull-right text-right">
									 <div class="value" id="qty1">58</div>
									 <div class="title">Fakultas</div>
									 </div>
									 </div>
									 </div><!-- /panel -->
								</div><!-- /.col -->
								<div class="col-md-4 col-sm-4">
									 <div class="panel panel-default panel-stat2 bg-warning">
									 <div class="panel-body">
									 <span class="stat-icon">
									 <i class="fa fa-bar-chart-o"></i>
									 </span>
									 <div class="pull-right text-right">
									 <div class="value" id="qty2">58</div>
									 <div class="title">Jurusan</div>
									 </div>
									 </div>
									 </div><!-- /panel -->
								</div><!-- /.col -->
								<div class="col-md-4 col-sm-4">
									 <div class="panel panel-default panel-stat2 bg-info">
									 <div class="panel-body">
									 <span class="stat-icon">
									 <i class="fa fa-comment"></i>
									 </span>
									 <div class="pull-right text-right">
									 <div class="value" id="qty3">41</div>
									 <div class="title">Penilaian</div>
									 </div>
									 </div>
									 </div><!-- /panel -->
								</div><!-- /.col -->
								<div class="col-md-4 col-sm-4">
									 <div class="panel panel-default panel-stat2 bg-danger">
									 <div class="panel-body">
									 <span class="stat-icon">
									 <i class="fa fa-shopping-cart"></i>
									 </span>
									 <div class="pull-right text-right">
									 <div class="value" id="qty4">88</div>
									 <div class="title">Amalan Yaumi</div>
									 </div>
									 </div>
									 </div><!-- /panel -->
								</div><!-- /.col -->
								<div class="col-md-4 col-sm-4">
									 <div class="panel panel-default panel-stat2">
									 <div class="panel-body">
									 <span class="stat-icon">
									 <i class="fa fa-user"></i>
									 </span>
									 <div class="pull-right text-right">
									 <div class="value" id="qty5">45</div>
									 <div class="title">Admin fakultas</div>
									 </div>
									 </div>
									 </div><!-- /panel -->
								</div><!-- /.col -->
								<div class="col-md-4 col-sm-4">
									 <div class="panel panel-default panel-stat2 bg-primary">
									 <div class="panel-body">
									 <span class="stat-icon">
									 <i class="fa fa-user"></i>
									 </span>
									 <div class="pull-right text-right">
									 <div class="value" id="qty6">72</div>
									 <div class="title"><small>Admin Pusat</small></div>
									 </div>
									 </div>
									 </div><!-- /panel -->
								</div><!-- /.col -->
								<div class="col-md-3 col-sm-4">
									 <div class="panel panel-default panel-stat1 bg-success">
									 <div class="panel-body">
									 <div class="value" id="qty7">12</div>
									 <div class="title">
									 <span class="m-left-xs">Shift</span>
									 </div>
									 </div>
									 </div><!-- /panel -->
								</div><!-- /.col -->
								<div class="col-md-3 col-sm-4">
									 <div class="panel panel-default panel-stat1 bg-warning">
									 <div class="panel-body">
									 <div class="value" id="qty8">39</div>
									 <div class="title">
									 <span class="m-left-xs">Kode Mentor</span>
									 </div>
									 </div>
									 </div><!-- /panel -->
								</div><!-- /.col -->
							</div><!-- /tab1 -->
						
<!-- FAKULTAS ==================================================================================================================================== FAKULTAS -->						
							<div class="tab-pane fade" id="fakultas">
								<div class="panel panel-default fadeInDown animation-delay1 ">
									<form class="form-horizontal form-border" onsubmit="return data_master.insert(this,'fakultas');" id="fakultas-form" method="post">
										<div class="panel-heading">
											Master Data fakultas
										</div>
										<div class="panel-body">
											<div class="form-group">
												<label class="control-label col-md-2">Fakultas</label>												
												<div class="col-md-10">
												    <input type="hidden" name="inup" value="in" />
												    <input type="hidden" name="table" value="fakultas" />

												    <input type="hidden" name="f1" value="id" />
												    <input type="hidden" name="v1" />
													
												    <input type="hidden" name="f2" value="nama" />
													<input type="text" name="v2" id="fakultas-focus" required class="form-control input-sm" placeholder="Nama Fakultas, exp : Teknik" value="">
												</div><!-- /.col -->
											</div><!-- /form-group -->
										</div>
										<div class="panel-footer">
										    <div class="row">
												<div id="fakultas-forminfo" class="col-sm-7"></div>
											    <div class="col-sm-5">
											        <div class="text-right">
												        <input type="submit" class="btn btn-sm btn-success" id="fakultas-submit" value="Save">
												        <button class="btn btn-sm btn-success" type="reset" onclick="data_master.resetpage('fakultas')">Reset</button>
											        </div>
											    </div>
											</div>
										</div>
									</form>
								</div><!-- /panel -->
							
								<div class="panel panel-default table-responsive fadeInUp animation-delay1">
									<div class="panel-heading">
									    <span class="pull-left"><i class="fa fa-bar-chart-o fa-lg"></i></span> &nbsp; Data Fakultas
									    <ul class="tool-bar">
									   	    <li><a href="#" onclick="data_master.refreshtable('fakultas');" class="refresh-widget" data-toggle="tooltip" data-placement="bottom" title="" data-original-title="Refresh"><i class="fa fa-refresh"></i></a></li>
										</ul>
										<a href="#" style="display:none;" id="fakultas-refresh" class="refresh-widget" data-toggle="tooltip" data-placement="bottom" title="" data-original-title="Refresh"><i class="fa fa-refresh"></i></a>
									</div>
									<div class="panel-body">
									    <div class="row">
											<div class="col-md-8"></div>
											<div class="col-md-4">
												 <div class="input-group" style="z-index:0; margin-bottom:10px;" id="fakultas-search">
							            		 	  <input type="text" name="search" class="form-control input-sm">
							            			  <div class="input-group-btn"><button type="button" onclick="data_master.searching('fakultas')" class="btn btn-sm btn-success" tabindex="-1">Search</button></div>
							        			 </div>
											</div>
										</div>
									    <div id="fakultas-tableinfo"></div>
										<div id="fakultas-table"></div>
									</div>
									<div class="loading-overlay">
										<i class="loading-icon fa fa-refresh fa-spin fa-lg"></i>
									</div>
								</div><!-- /panel -->
							</div><!-- /tab2 -->
<!-- jurusan ==================================================================================================================================== jurusan -->						
							<div class="tab-pane fade" id="jurusan">
								<div class="panel panel-default fadeInDown animation-delay1 ">
									<form class="form-horizontal form-border" onsubmit="return data_master.insert(this,'jurusan');" id="jurusan-form" method="post">
										<div class="panel-heading">
											Master Data jurusan
										</div>
										<div class="panel-body">
											<div class="form-group">
												<label class="control-label col-md-2">jurusan</label>												
												<div class="col-md-10">
												    <input type="hidden" name="inup" value="in" />
												    <input type="hidden" name="table" value="jurusan" />

												    <input type="hidden" name="f1" value="id" />
												    <input type="hidden" name="v1" />
													
												    <input type="hidden" name="f2" value="nama" />
													<input type="text" name="v2" id="jurusan-focus" required class="form-control input-sm" placeholder="Nama jurusan, exp : sistem informasi" value="">
												</div><!-- /.col -->
											</div><!-- /form-group -->
											<div class="form-group">
												<label class="control-label col-md-2">fakultas</label>												
												<div class="col-md-10">
												    <input type="hidden" name="f3" value="id_fakultas" />
												    <select name="v3" id="fak1-option" required class="form-control">
													</select>
											    </div>
											</div>					
										</div>
										<div class="panel-footer">
										    <div class="row">
												<div id="jurusan-forminfo" class="col-sm-7"></div>
											    <div class="col-sm-5">
											        <div class="text-right">
												        <input type="submit" class="btn btn-sm btn-success" id="jurusan-submit" value="Save">
												        <button class="btn btn-sm btn-success" type="reset" onclick="data_master.resetpage('jurusan')">Reset</button>
											        </div>
											    </div>
											</div>
										</div>
									</form>
								</div><!-- /panel -->
							
								<div class="panel panel-default table-responsive fadeInUp animation-delay1">
									<div class="panel-heading">
									    <span class="pull-left"><i class="fa fa-bar-chart-o fa-lg"></i></span> &nbsp; Data jurusan
									    <ul class="tool-bar">
									   	    <li><a href="#" onclick="data_master.refreshtable('jurusan');" class="refresh-widget" data-toggle="tooltip" data-placement="bottom" title="" data-original-title="Refresh"><i class="fa fa-refresh"></i></a></li>
										</ul>
										<a href="#" style="display:none;" id="jurusan-refresh" class="refresh-widget" data-toggle="tooltip" data-placement="bottom" title="" data-original-title="Refresh"><i class="fa fa-refresh"></i></a>
									</div>
									<div class="panel-body">
									    <div class="row">
											<div class="col-md-8"></div>
											<div class="col-md-4">
												 <div class="input-group" style="z-index:0; margin-bottom:10px;" id="jurusan-search">
							            		 	  <input type="text" name="search" class="form-control input-sm">
							            			  <div class="input-group-btn"><button type="button" onclick="data_master.searching('jurusan')" class="btn btn-sm btn-success" tabindex="-1">Search</button></div>
							        			 </div>
											</div>
										</div>
									    <div id="jurusan-tableinfo"></div>
										<div id="jurusan-table"></div>
									</div>
									<div class="loading-overlay">
										<i class="loading-icon fa fa-refresh fa-spin fa-lg"></i>
									</div>
								</div><!-- /panel -->
							</div><!-- /tab2 -->
<!-- mat_pel ==================================================================================================================================== mat_pel -->						
							<div class="tab-pane fade" id="mat_pel">
								<div class="panel panel-default fadeInDown animation-delay1 ">
									<form class="form-horizontal form-border" onsubmit="return data_master.insert(this,'mat_pel');" id="mat_pel-form" method="post">
										<div class="panel-heading">
											Master Data Mata Pelajaran
										</div>
										<div class="panel-body">
											<div class="form-group">
												<label class="control-label col-md-2">Pelajaran</label>												
												<div class="col-md-10">
												    <input type="hidden" name="inup" value="in" />
												    <input type="hidden" name="table" value="mat_pel" />

												    <input type="hidden" name="f1" value="id" />
												    <input type="hidden" name="v1" />
													
												    <input type="hidden" name="f2" value="nama" />
													<input type="text" name="v2" id="mat_pel-focus" required class="form-control input-sm" placeholder="Nama mat_pel, exp : sistem informasi" value="">
												</div><!-- /.col -->
											</div><!-- /form-group -->
											<div class="form-group">
												<label class="control-label col-md-2">Persentase</label>												
												<div class="col-md-10">
													<input type="hidden" name="f3" value="persen" />
												    <input type="text" name="v3" required class="form-control input-sm" placeholder="Persentase, exp : 50" value="">
											    </div>
											</div>					
										</div>
										<div class="panel-footer">
										    <div class="row">
												<div id="mat_pel-forminfo" class="col-sm-7"></div>
											    <div class="col-sm-5">
											        <div class="text-right">
												        <input type="submit" class="btn btn-sm btn-success" id="mat_pel-submit" value="Save">
												        <button class="btn btn-sm btn-success" type="reset" onclick="data_master.resetpage('mat_pel')">Reset</button>
											        </div>
											    </div>
											</div>
										</div>
									</form>
								</div><!-- /panel -->
							
								<div class="panel panel-default table-responsive fadeInUp animation-delay1">
									<div class="panel-heading">
									    <span class="pull-left"><i class="fa fa-bar-chart-o fa-lg"></i></span> &nbsp; Data mat_pel
									    <ul class="tool-bar">
									   	    <li><a href="#" onclick="data_master.refreshtable('mat_pel');" class="refresh-widget" data-toggle="tooltip" data-placement="bottom" title="" data-original-title="Refresh"><i class="fa fa-refresh"></i></a></li>
										</ul>
										<a href="#" style="display:none;" id="mat_pel-refresh" class="refresh-widget" data-toggle="tooltip" data-placement="bottom" title="" data-original-title="Refresh"><i class="fa fa-refresh"></i></a>
									</div>
									<div class="panel-body">
									    <div class="row">
											<div class="col-md-8"></div>
											<div class="col-md-4">
												 <div class="input-group" style="z-index:0; margin-bottom:10px;" id="mat_pel-search">
							            		 	  <input type="text" name="search" class="form-control input-sm">
							            			  <div class="input-group-btn"><button type="button" onclick="data_master.searching('mat_pel')" class="btn btn-sm btn-success" tabindex="-1">Search</button></div>
							        			 </div>
											</div>
										</div>
									    <div id="mat_pel-tableinfo"></div>
										<div id="mat_pel-table"></div>
									</div>
									<div class="loading-overlay">
										<i class="loading-icon fa fa-refresh fa-spin fa-lg"></i>
									</div>
								</div><!-- /panel -->
							</div><!-- /tab2 -->
<!-- amalanyaumi ==================================================================================================================================== amalanyaumi -->						
							<div class="tab-pane fade" id="amalanyaumi">
								<div class="panel panel-default fadeInDown animation-delay1 ">
									<form class="form-horizontal form-border" onsubmit="return data_master.insert(this,'amalanyaumi');" id="amalanyaumi-form" method="post">
										<div class="panel-heading">
											Master Data Mata Pelajaran
										</div>
										<div class="panel-body">
											<div class="form-group">
												<label class="control-label col-md-2">Amalan</label>												
												<div class="col-md-10">
												    <input type="hidden" name="inup" value="in" />
												    <input type="hidden" name="table" value="amalanyaumi" />

												    <input type="hidden" name="f1" value="id" />
												    <input type="hidden" name="v1" />
													
												    <input type="hidden" name="f2" value="amalan" />
													<input type="text" name="v2" id="amalanyaumi-focus" required class="form-control input-sm" placeholder="Nama amalanyaumi, exp : sholat dhuha" value="">
												</div><!-- /.col -->
											</div><!-- /form-group -->
											<div class="form-group">
												<label class="control-label col-md-2">Target</label>												
												<div class="col-md-10">
													<input type="hidden" name="f3" value="target" />
												    <input type="text" name="v3" required class="form-control input-sm" placeholder="Target, exp : min 2 x / minggu" value="">
											    </div>
											</div>					
										</div>
										<div class="panel-footer">
										    <div class="row">
												<div id="amalanyaumi-forminfo" class="col-sm-7"></div>
											    <div class="col-sm-5">
											        <div class="text-right">
												        <input type="submit" class="btn btn-sm btn-success" id="amalanyaumi-submit" value="Save">
												        <button class="btn btn-sm btn-success" type="reset" onclick="data_master.resetpage('amalanyaumi')">Reset</button>
											        </div>
											    </div>
											</div>
										</div>
									</form>
								</div><!-- /panel -->
							
								<div class="panel panel-default table-responsive fadeInUp animation-delay1">
									<div class="panel-heading">
									    <span class="pull-left"><i class="fa fa-bar-chart-o fa-lg"></i></span> &nbsp; Data amalanyaumi
									    <ul class="tool-bar">
									   	    <li><a href="#" onclick="data_master.refreshtable('amalanyaumi');" class="refresh-widget" data-toggle="tooltip" data-placement="bottom" title="" data-original-title="Refresh"><i class="fa fa-refresh"></i></a></li>
										</ul>
										<a href="#" style="display:none;" id="amalanyaumi-refresh" class="refresh-widget" data-toggle="tooltip" data-placement="bottom" title="" data-original-title="Refresh"><i class="fa fa-refresh"></i></a>
									</div>
									<div class="panel-body">
									    <div class="row">
											<div class="col-md-8"></div>
											<div class="col-md-4">
												 <div class="input-group" style="z-index:0; margin-bottom:10px;" id="amalanyaumi-search">
							            		 	  <input type="text" name="search" class="form-control input-sm">
							            			  <div class="input-group-btn"><button type="button" onclick="data_master.searching('amalanyaumi')" class="btn btn-sm btn-success" tabindex="-1">Search</button></div>
							        			 </div>
											</div>
										</div>
									    <div id="amalanyaumi-tableinfo"></div>
										<div id="amalanyaumi-table"></div>
									</div>
									<div class="loading-overlay">
										<i class="loading-icon fa fa-refresh fa-spin fa-lg"></i>
									</div>
								</div><!-- /panel -->
							</div><!-- /tab2 -->
<!-- ket_shift ==================================================================================================================================== ket_shift -->						
							<div class="tab-pane fade" id="ket_shift">
								<div class="col-md-6">
								<div class="panel panel-default fadeInRight animation-delay1 ">
									<form class="form-horizontal form-border" onsubmit="return data_master.insert(this,'ket_shift');" id="ket_shift-form" method="post">
										<div class="panel-heading">
											Simpan Keterangan Shift
										</div>
										<div class="panel-body">
											<div class="form-group">
												<label class="control-label col-md-2">Shift</label>												
												<div class="col-md-10">
												    <input type="hidden" name="inup" value="in" />
												    <input type="hidden" name="table" value="ket_shift" />

												    <input type="hidden" name="f1" value="id" />
													<input type="text" name="v1" id="ket_shift-focus" required class="form-control input-sm" placeholder="Nama shift, exp : 1" value="">
												</div><!-- /.col -->
											</div><!-- /form-group -->
											<div class="form-group">
												<label class="control-label col-md-2">Interval</label>												
												<div class="col-md-10">
													<input type="hidden" name="f2" value="jam" />
												    <input type="text" name="v2" required class="form-control input-sm" placeholder="Rentang Waktu, exp : 10:20 - 11:00" value="">
											    </div>
											</div>					
										</div>
										<div class="panel-footer">
										    <div class="row">
												<div id="ket_shift-forminfo" class="col-sm-7"></div>
											    <div class="col-sm-5">
											        <div class="text-right">
												        <input type="submit" class="btn btn-sm btn-success" id="ket_shift-submit" value="Save">
												        <button class="btn btn-sm btn-success" type="reset" onclick="data_master.resetpage('ket_shift')">Reset</button>
											        </div>
											    </div>
											</div>
										</div>
									</form>
								</div><!-- /panel -->
								
								
								</div>
								
								<div class="col-md-6">
								<div class="panel panel-default table-responsive fadeInLeft animation-delay1">
									<div class="panel-heading">
									    <span class="pull-left"><i class="fa fa-bar-chart-o fa-lg"></i></span> &nbsp; Data ket_shift
									    <ul class="tool-bar">
									   	    <li><a href="#" onclick="data_master.refreshtable('ket_shift');" class="refresh-widget" data-toggle="tooltip" data-placement="bottom" title="" data-original-title="Refresh"><i class="fa fa-refresh"></i></a></li>
										</ul>
										<a href="#" style="display:none;" id="ket_shift-refresh" class="refresh-widget" data-toggle="tooltip" data-placement="bottom" title="" data-original-title="Refresh"><i class="fa fa-refresh"></i></a>
									</div>
									<div class="panel-body">
									    <div id="ket_shift-tableinfo"></div>
										<div id="ket_shift-table"></div>
									</div>
									<div class="loading-overlay">
										<i class="loading-icon fa fa-refresh fa-spin fa-lg"></i>
									</div>
								</div><!-- /panel -->
								</div>
							</div><!-- /tab2 -->
<!-- admin_f ==================================================================================================================================== admin_f -->						
							<div class="tab-pane fade" id="admin_f">
								<div class="col-md-6">
								<div class="panel-stat3 bg-info fadeInRight animation-delay1">
									 <h2 class="m-top-none" id="userCount"></h2>
									 <h4>Registered Administrator of Faculty</h4>
									 <span style="font-size:20px;" class="m-left-xs"><i class="fa fa-arrow-circle-o-up fa-lg"></i> &nbsp; <span id="admin_f-user"></span> User</span>
									 <div class="stat-icon">
									 	  <i class="fa fa-user fa-3x"></i>
									 </div>
									 <div class="loading-overlay">
									 	  <i class="loading-icon fa fa-refresh fa-spin fa-lg"></i>
									 </div>
								</div>
								<div class="panel panel-default fadeInRight animation-delay1 ">
									<form class="form-horizontal form-border" onsubmit="return data_master.insert(this,'admin_f');" id="admin_f-form" method="post">
										<div class="panel-heading">
											Simpan Data Admin Fakultas
										</div>
										<div class="panel-body">
										    <div class="form-group">
												<label class="control-label col-md-3">fakultas</label>												
												<div class="col-md-9">
												    <input type="hidden" name="f7" value="id_fakultas" />
												    <select name="v7" id="fak2-option" required class="form-control">
													</select>
											    </div>
											</div>
											<div class="form-group">
												<label class="control-label col-md-3">Username</label>												
												<div class="col-md-9">
												    <input type="hidden" name="inup" value="in" />
												    <input type="hidden" name="table" value="admin_f" />

													<input type="hidden" name="f1" value="id" />
													<input type="hidden" name="v1" value="" />
													
												    <input type="hidden" name="f2" value="nama" />
													<input type="text" name="v2" id="admin_f-focus" required class="form-control input-sm" placeholder="" value="">
												</div><!-- /.col -->
											</div><!-- /form-group -->
											<div class="form-group">
												<label class="control-label col-md-3">Password</label>												
												<div class="col-md-9">
													<input type="hidden" name="f3" value="password" />
												    <input type="password" id="p1" name="v3" required class="form-control input-sm" placeholder="min 6 char" value="" pattern="[a-zA-Z0-9]{6,30}">
											    </div>
											</div>
											<div class="form-group">
												<label class="control-label col-md-3">Conf Password</label>												
												<div class="col-md-9">
													<input type="hidden" value="password" />
												    <input type="password" name="v3" required onfocus="data_master.validatePass('p1', this);" oninput="data_master.validatePass('p1', this);" class="form-control input-sm" placeholder="" value="">
											    </div>
											</div>
											<div class="form-group">
												<label class="control-label col-md-3">Email</label>												
												<div class="col-md-9">
													<input type="hidden" name="f4" value="email" />
												    <input type="text" name="v4" required pattern=".*@.*" class="form-control input-sm" placeholder="" value="">
											    </div>
											</div>
											<div class="form-group">
												<label class="control-label col-md-3">Phone</label>												
												<div class="col-md-9">
													<input type="hidden" name="f5" value="hp" />
												    <input type="text" name="v5" required pattern='\d\d\d\d\d\d\d\d\d\d.*\d' class="form-control input-sm" placeholder="" value="">
											    </div>
											</div>
											<div class="form-group">
												<label class="control-label col-md-3">No Bp</label>												
												<div class="col-md-9">
													<input type="hidden" name="f6" value="id_mentor" />
												    <input type="text" name="v6" pattern='\d\d\d\d\d\d\d\d\d\d' class="form-control input-sm" placeholder="" value="">
											    </div>
											</div>						
				
										</div>
										
										<div class="panel-footer">
										    <div class="row">
												<div id="admin_f-forminfo" class="col-sm-6"></div>
											    <div class="col-sm-6">
											        <div class="text-right">
												        <input type="submit" class="btn btn-sm btn-success" id="admin_f-submit" value="Save">
												        <button class="btn btn-sm btn-success" type="reset" onclick="data_master.resetpage('admin_f')">Reset</button>
											        </div>
											    </div>
											</div>
										</div>
									</form>
								</div><!-- /panel -->
								
								</div>
								
								<div class="col-md-6">
								
								<div class="panel panel-default table-responsive fadeInLeft animation-delay1">
									<div class="panel-heading">
									    <span class="pull-left"><i class="fa fa-bar-chart-o fa-lg"></i></span> &nbsp; Data admin_fakultas
									    <ul class="tool-bar">
									   	    <li><a href="#" onclick="data_master.refreshtable('admin_f');" class="refresh-widget" data-toggle="tooltip" data-placement="bottom" title="" data-original-title="Refresh"><i class="fa fa-refresh"></i></a></li>
										</ul>
										<a href="#" style="display:none;" id="admin_f-refresh" class="refresh-widget" data-toggle="tooltip" data-placement="bottom" title="" data-original-title="Refresh"><i class="fa fa-refresh"></i></a>
									</div>
									<div class="panel-body">
									    <div class="row">
											<div class="col-md-5"></div>
											<div class="col-md-7">
												 <div class="input-group" style="z-index:0; margin-bottom:10px;" id="admin_f-search">
							            		 	  <input type="text" name="search" class="form-control input-sm">
							            			  <div class="input-group-btn"><button type="button" onclick="data_master.searching('admin_f')" class="btn btn-sm btn-success" tabindex="-1">Search</button></div>
							        			 </div>
											</div>
										</div>
									    <div id="admin_f-tableinfo"></div>
										<div id="admin_f-table"></div>
									</div>
									<div class="loading-overlay">
										<i class="loading-icon fa fa-refresh fa-spin fa-lg"></i>
									</div>
								</div><!-- /panel -->
								</div>
							</div><!-- /tab2 -->
<!-- admin_p ==================================================================================================================================== admin_p -->						
							<div class="tab-pane fade" id="admin_p">
								<div class="col-md-6">
								<div class="panel-stat3 bg-success fadeInRight animation-delay1">
									 <h2 class="m-top-none" id="userCount"></h2>
									 <h4>Registered Administrator LMAI</h4>
									 <span style="font-size:20px;" class="m-left-xs"><i class="fa fa-arrow-circle-o-up fa-lg"></i> &nbsp; <span id="admin_p-user"></span> User</span>
									 <div class="stat-icon">
									 	  <i class="fa fa-user fa-3x"></i>
									 </div>
									 <div class="loading-overlay">
									 	  <i class="loading-icon fa fa-refresh fa-spin fa-lg"></i>
									 </div>
								</div>
								<div class="panel panel-default fadeInRight animation-delay1 ">
									<form class="form-horizontal form-border" onsubmit="return data_master.insert(this,'admin_p');" id="admin_p-form" method="post">
										<div class="panel-heading">
											Simpan Data Admin Pusat
										</div>
										<div class="panel-body">
										    <div class="form-group">
												<label class="control-label col-md-3">Username</label>												
												<div class="col-md-9">
												    <input type="hidden" name="inup" value="in" />
												    <input type="hidden" name="table" value="admin_p" />

													<input type="hidden" name="f1" value="id" />
													<input type="hidden" name="v1" value="" />
													
												    <input type="hidden" name="f2" value="nama" />
													<input type="text" name="v2" id="admin_p-focus" required class="form-control input-sm" placeholder="" value="">
												</div><!-- /.col -->
											</div><!-- /form-group -->
											<div class="form-group">
												<label class="control-label col-md-3">Password</label>												
												<div class="col-md-9">
													<input type="hidden" name="f3" value="password" />
												    <input type="password" id="p2" name="v3" required class="form-control input-sm" placeholder="min 6 char" value="" pattern="[a-zA-Z0-9]{6,30}">
											    </div>
											</div>
											<div class="form-group">
												<label class="control-label col-md-3">Conf Password</label>												
												<div class="col-md-9">
													<input type="hidden" value="password" />
												    <input type="password" name="v3" required onfocus="data_master.validatePass('p2', this);" oninput="data_master.validatePass('p2', this);" class="form-control input-sm" placeholder="" value="">
											    </div>
											</div>
											<div class="form-group">
												<label class="control-label col-md-3">Email</label>												
												<div class="col-md-9">
													<input type="hidden" name="f4" value="email" />
												    <input type="text" name="v4" required pattern=".*@.*" class="form-control input-sm" placeholder="" value="">
											    </div>
											</div>
											<div class="form-group">
												<label class="control-label col-md-3">Phone</label>												
												<div class="col-md-9">
													<input type="hidden" name="f5" value="hp" />
												    <input type="text" name="v5" required pattern='\d\d\d\d\d\d\d\d\d\d.*\d' class="form-control input-sm" placeholder="" value="">
											    </div>
											</div>
											<div class="form-group">
												<label class="control-label col-md-3">No Bp</label>												
												<div class="col-md-9">
													<input type="hidden" name="f6" value="id_mentor" />
												    <input type="text" name="v6" pattern='\d\d\d\d\d\d\d\d\d\d' class="form-control input-sm" placeholder="" value="">
											    </div>
											</div>						
				
										</div>
										
										<div class="panel-footer">
										    <div class="row">
												<div id="admin_p-forminfo" class="col-sm-6"></div>
											    <div class="col-sm-6">
											        <div class="text-right">
												        <input type="submit" class="btn btn-sm btn-success" id="admin_p-submit" value="Save">
												        <button class="btn btn-sm btn-success" type="reset" onclick="data_master.resetpage('admin_p')">Reset</button>
											        </div>
											    </div>
											</div>
										</div>
									</form>
								</div><!-- /panel -->
								
								</div>
								
								<div class="col-md-6">
								
								<div class="panel panel-default table-responsive fadeInLeft animation-delay1">
									<div class="panel-heading">
									    <span class="pull-left"><i class="fa fa-bar-chart-o fa-lg"></i></span> &nbsp; Data admin pusat
									    <ul class="tool-bar">
									   	    <li><a href="#" onclick="data_master.refreshtable('admin_p');" class="refresh-widget" data-toggle="tooltip" data-placement="bottom" title="" data-original-title="Refresh"><i class="fa fa-refresh"></i></a></li>
										</ul>
										<a href="#" style="display:none;" id="admin_p-refresh" class="refresh-widget" data-toggle="tooltip" data-placement="bottom" title="" data-original-title="Refresh"><i class="fa fa-refresh"></i></a>
									</div>
									<div class="panel-body">
									    <div class="row">
											<div class="col-md-5"></div>
											<div class="col-md-7">
												 <div class="input-group" style="z-index:0; margin-bottom:10px;" id="admin_p-search">
							            		 	  <input type="text" name="search" class="form-control input-sm">
							            			  <div class="input-group-btn"><button type="button" onclick="data_master.searching('admin_p')" class="btn btn-sm btn-success" tabindex="-1">Search</button></div>
							        			 </div>
											</div>
										</div>
									    <div id="admin_p-tableinfo"></div>
										<div id="admin_p-table"></div>
									</div>
									<div class="loading-overlay">
										<i class="loading-icon fa fa-refresh fa-spin fa-lg"></i>
									</div>
								</div><!-- /panel -->
								</div>
							</div><!-- /tab2 -->
<!-- kode_mentor ==================================================================================================================================== kode_mentor -->						
							<div class="tab-pane fade" id="kode_mentor">
								<div class="col-md-6">
								
								<div class="panel panel-default table-responsive fadeInLeft animation-delay1">
									<div class="panel-heading">
									    <span class="pull-left"><i class="fa fa-bar-chart-o fa-lg"></i></span> &nbsp; Kode Registrasi Mentor
									    <ul class="tool-bar">
									   	    <li><a href="#" onclick="data_master.resetpage('kode_mentor');" class="refresh-widget" data-toggle="tooltip" data-placement="bottom" title="" data-original-title="Refresh"><i class="fa fa-refresh"></i></a></li>
										</ul>
										<a href="#" style="display:none;" id="kode_mentor-refresh" class="refresh-widget" data-toggle="tooltip" data-placement="bottom" title="" data-original-title="Refresh"><i class="fa fa-refresh"></i></a>
									</div>
									<div class="panel-body">
									    <div class="row">
											<div class="col-md-0"></div>
											<div class="col-md-12">
												 <form method="post" onsubmit="return data_master.insert(this,'kode_mentor')" id="kode_mentor-form">
												 <div class="input-group" style="z-index:0; margin-bottom:10px;" id="kode_mentor-search">
							            		 	  	  <input type="hidden" name="table" value="kode_mentor" />

														  <input type="hidden" name="f1" value="id" />
														  <input type="hidden" name="v1" value="1" />
													      
														  <input type="hidden" name="f2" value="kode" />
														  <input type="text" name="v2" class="form-control input-sm" required>
							            			      <div class="input-group-btn"><button type="submit" class="btn btn-sm btn-success" tabindex="-1">Save</button></div>
												 </div>
					        			      	 </form>
												 <div id="kode_mentor-forminfo"></div>
												 <br />
											</div>
										</div>
									    <div class="panel-stat3 bg-success fadeInUp animation-delay1">
									 		 <h2 class="m-top-none" id="userCount"></h2>
									 		 <h4>KODE :</h4>
									 		 <span style="font-size:20px;" class="m-left-xs">
											 	   <i class="fa fa-arrow-circle-o-up fa-lg"></i>&nbsp; 
												   <span id="kode_mentor-table"></span>
											 </span>
									 		 <div class="stat-icon">
									 	  	 	  <i class="fa fa-user fa-3x"></i>
									 		 </div>
										</div>
								
									</div>
									<div class="loading-overlay">
										<i class="loading-icon fa fa-refresh fa-spin fa-lg"></i>
									</div>
								</div><!-- /panel -->
								</div>
							</div><!-- /tab2 -->

<!-- END ================================================================================================================================================ END -->







						</div><!-- /tab-content -->
					</div><!-- /.col -->
				</div><!-- /.row -->			
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
	<script src="../../plugin/js/jquery-1.10.2.min.js"></script>
	
	<!-- Datatable -->
	<script src='../../lib/mylibrary.js'></script>	
	
	<!-- Bootstrap -->
    <script src="../../plugin/bootstrap/js/bootstrap.min.js"></script>
	
	<!-- Datatable -->
	<script src='../../plugin/js/jquery.dataTables.min.js'></script>	
	
   
	<!-- holder -->
	<script src='../../plugin/js/uncompressed/holder.js'></script>
	
	<!-- Modernizr -->
	<script src='../../plugin/js/modernizr.min.js'></script>
	
	<!-- Pace -->
	<script src='../../plugin/js/pace.min.js'></script>
	
	<!-- Popup Overlay -->
	<script src='../../plugin/js/jquery.popupoverlay.min.js'></script>
	
	<!-- Slimscroll -->
	<script src='../../plugin/js/jquery.slimscroll.min.js'></script>
	
	<!-- Cookie -->
	<script src='../../plugin/js/jquery.cookie.min.js'></script>
	
	<!-- Endless -->
	<script src="../../plugin/js/endless/endless.js"></script>
	
  </body>
</html>
