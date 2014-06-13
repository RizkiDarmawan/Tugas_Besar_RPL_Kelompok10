<style>
@media screen and (max-width: 560px) {
   .berita table{
     font-size:15px;
   }
}
</style>
<!-- Jquery -->
<?php
if(isset($_POST['submit'])){
    $icon = $_POST['icon'];
    $pengum = $_POST['pengum'];
    
    
    $a=new dbAkses();
    $qt = $a->select("select count(id) from pengumuman where ket ='pusat'");
    if($qt[0][0]==0){
        $a->input("insert into pengumuman(id, icon, isi, ket) values('999','".$icon."','".$pengum."','pusat')");
    }else{
        $a->update("update pengumuman set icon='".$icon."', isi='".$pengum."' where ket='pusat'");
    }
}
$b= new dbAkses();

$data=$b->select("select * from pengumuman where ket='pusat'")


?>

<script src="../../plugin/js/jquery-1.10.2.min.js"></script>
	
<script type="text/javascript" src="../../plugin/ckeditor/ckeditor_basic.js"></script>
    			
			<div class="padding-md" >
            
                <span class="label label-info">LMAI PUSAT</span>
				<div class="alert-animated">
					<div class="alert-inner">
						<div class="alert-message">
							<table>
                                <tr>
                                <td style="padding:30px;">
                                   <i style="font-size:100px;" class="fa <?php echo$data[0][1]; ?>"></i>
                                </td>
                                <td style="text-align:left;">
                                    <?php echo$data[0][2]; ?>
                                </td>
                                </tr>
                            </table>
                        </div>
                    </div>
				</div>
				
				
				<div class="col-md-10">
								<div class="panel panel-default fadeInRight animation-delay1 ">
									<form class="form-horizontal form-border" action="./?pg=pengumuman" method="post">
										<div class="panel-heading">
											Simpan Data TimeLine
										</div>
										<div class="panel-body">
										    <div class="form-group">
												<label class="control-label col-md-1">Icon</label>												
												<div class="col-md-11">
												    <select name="icon" required class="form-control">
													    <option value="">- pilih -</option>
														<option value="fa-briefcase" >Briefcase <span><i class="fa fa-user"></i></span></option>						
														<option value="fa-bell">Lonceng</option>
														<option value="fa-file-text-o">File</option>
														<option value="fa-clock-o">Jam</option>
														<option value="fa-picture-o">Picture</option>
														<option value="fa-comment">Comment</option>
														<option value="fa-plane">pesawat</option>
														<option value="fa-pencil">pencil</option>
													</select>
											    </div>
											</div>
											<div class="form-group">
												<label class="control-label col-md-1">Deskripsi</label>												
												<div class="col-md-11">
													<input type="hidden" name="f8" value="ket" />
													<textarea name="pengum" placeholder="Berita" id="pengum"></textarea>
			                                        <script>var editor = CKEDITOR.replace('pengum');</script>
												</div>
											</div>						
				
										</div>
										
										<div class="panel-footer">
										    <div class="row">
												<div id="timeline-forminfo" class="col-sm-6"></div>
											    <div class="col-sm-6">
											        <div class="text-right">
												        <input type="submit" name="submit" class="btn btn-sm btn-success" id="timeline-submit" value="Save">
												        <button class="btn btn-sm btn-success" type="reset" onclick="data_master.resetpage('timeline')">Reset</button>
											        </div>
											    </div>
											</div>
										</div>
									</form>
								</div><!-- /panel -->
								
								</div>

				
				
			</div><!-- /.padding -->
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
	
	
    

	<script src="../../lib/mylibrary.js"></script>
	
	<!--Bootstrap-->
    <script src="../../plugin/bootstrap/js/bootstrap.min.js"></script>
  
	<!--Colorbox-->
	<script src='../../plugin/js/jquery.colorbox.min.js'></script>	
		
	<!-- Modernizr -->
	<script src='../../plugin/js/modernizr.min.js'></script>	
		
	<!-- Pace -->
	<script src='../../plugin/js/pace.min.js'></script>	
		
	<!-- Popup Overlay -->
	<script src='../../plugin/js/jquery.popupoverlay.min.js'></script>	
		
	<!-- Slimscroll -->
	<script src='../../plugin/js/jquery.slimscroll.min.js'></script>	
		
	<!--Cookie-->
	<script src='../../plugin/js/jquery.cookie.min.js'></script>

	<!--Endless-->
	<script src="../../plugin/js/endless/endless.js"></script>
	
	<script>
		$(function()	{
			//Timeline color box
			$('.timeline-img').colorbox({
				rel:'group1',
				width:"90%",
				maxWidth:'800px'
			});
		});
	</script>
	
  </body>
</html>
