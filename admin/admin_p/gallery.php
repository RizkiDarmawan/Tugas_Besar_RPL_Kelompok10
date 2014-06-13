<?php
ob_start();
session_start();
if(!$_SESSION['lmai_login_admin']){
    header('location:../login.php');
    exit();
}
?>			
<?php
$a = new dbAkses();
if(isset($_POST['submit'])){
    
   $judul = $_POST['judul'];   
   $deskripsi = $_POST['deskripsi'];
   $upload=false;
   if ((!empty($_FILES['gambar'])) && ($_FILES['gambar']['error']==0)){
       $filename = basename($_FILES['gambar']['name']);
       $ext = strtolower(substr($filename, strlen($filename) - 3, 3)); 
       if (($ext=="png")||($ext=="jpg")||($ext=="gif") &&($_FILES['gambar']['size'] < 500000)){
           $uploaded_path= "../../img/$judul.jpg";
       
     	   if (move_uploaded_file($_FILES['gambar']["tmp_name"], $uploaded_path)){
		      $gambar=$judul.".jpg";
			  $upload=true;
               echo'<script>alert("berhasil diupoad");</script>';
       
	       }else{
	          echo'<script>alert("gambar Gagal Upload");</script>';
	       }
       }else{
  	       echo'<script>alert("Ukuran gambar Terlalu Besar atau format bukan gambar");</script>';
       }  
   }
    
   
    
   if($upload==true){
        echo'<script>alert("upload true");</script>';
       
       echo$a->input("insert into gallery(judul,deskripsi,gambar) values('".$judul."','".$deskripsi."','".$gambar."')");
   }
    
}
if(isset($_GET['delete'])){
   $hapus=$_GET['delete'];
   $a->delete("delete from gallery where id='".$hapus."'");
}

   $data = $a->select("select * from gallery");

?>
		<div class="padding-md" >
				<div class="col-md-12">
                    <div class="panel panel-default fadeInRight animation-delay1 ">
						<form action="./?pg=gallery" enctype="multipart/form-data" method="post">
							<div class="panel-heading">
								Simpan Foto Gallery
							</div>
							<div class="panel-body">
							    <div class="form-group">
									<label class="control-label col-md-1">Judul</label>						
                                        <div class="col-sm-11">
                                            <input type="text" name="judul" class="form-control" required />
								        </div>  
								</div>
				            </div>
							<div class="panel-body">
							    <div class="form-group">
									<label class="control-label col-md-1">Deskripsi</label>						
                                        <div class="col-sm-11">
                                            <input type="text" name="deskripsi" class="form-control" />
								        </div>  
								</div>
				            </div>
							
                            <div class="panel-body">
							    <div class="form-group">
									<label class="control-label col-md-1">Foto</label>						
                                        <div class="col-sm-11">
                                            <input type="file" name="gambar" class="form-control" />
								        </div>  
								</div>
				            </div>
										
							<div class="panel-footer">
							    <div class="row">
									<div id="timeline-forminfo" class="col-sm-6"></div>
									    <div class="col-sm-6">
									        <div class="text-right">
                                                <input type="submit" name="submit" class="btn btn-sm btn-success" value="Save">
												<button class="btn btn-sm btn-success" type="reset">Reset</button>
											 </div>
								        </div>
								     </div>
								</div>
				          </form>
				     </div><!-- /panel -->
				</div>

				
				
			</div><!-- /.padding -->
            <div class="gallery-container">
				<?php
				for($i=0; $i<$a->baris; $i++){
				echo'<div class="gallery-item">
				    <a href="./?pg=gallery&delete='.$data[$i][0].'"><button>hapus</button>
								
					<a class="image-wrapper gallery-zoom" href="../../img/'.$data[$i][3].'">
						<img src="../../img/'.$data[$i][3].'" alt="'.$data[$i][1].'">		
						<div class="image-overlay">
							<div class="image-info">
								<div class="h3">'.$data[$i][1].'</div>
								<span>'.$data[$i][2].'</span>
								<div class="image-time">2013-10-23</div>
								<div class="image-like">
									<i class="fa fa-heart"></i>
									45 Likes
								</div>
							</div>
						</div>	
					</a><!-- /image-wrapper -->
				</div><!-- /gallery-item -->';
				}
				?>
			</div><!-- /gallery-container -->
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
	<script src="../../plugin/js/jquery-1.10.2.min.js"></script>
	
	<!-- Bootstrap -->
    <script src="../../plugin/bootstrap/js/bootstrap.min.js"></script>
   
	<!-- Colorbox -->
	<script src='../../plugin/js/jquery.colorbox.min.js'></script>	

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
	
	<script>
		$(function()	{
			//Colorbox 
			$('.gallery-zoom').colorbox({
				rel:'gallery',
				maxWidth:'90%',
				width:'800px'
			});
		});
	</script>
	
  </body>
</html>
	