<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <title>Reg LMAI</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
	<link rel="shortcut icon" href="../img/lmai-icon.png">
    <link href="css/preview.css" rel="stylesheet" />
    <script src="js/modernizr.js"></script>
    <script src="js/jquery-min.js"></script>
    <link href='http://fonts.googleapis.com/css?family=Roboto:400,300' rel='stylesheet' type='text/css'>
	<script>
	var app = {
		validatePass : function(p1, p2) {
    		var p1= $("#"+p1).val();
			if (p1 != p2.value) {
           	   p2.setCustomValidity('Password incorrect');
    		} else { 
          	   p2.setCustomValidity('');
    	    }
	    },
	};
	</script>
</head>
<body class="eternity-form">
<?php
include('../lib/Class.php');

	
error_reporting(0);
$page = $_GET['page'];
if($page=="newmente"){ 
?>
<!--===================================================================================================================
CREATE NEW ACCOUNT 
====================================================================================================================-->
	<section class="colorBg2 colorBg" id="demo2" data-panel="second">
        <div class=" container">
            <!-- #region Registration Form -->
			
            <div class="registration-form-section">
                <form method="post" action="./?page=newmente">
                
				<?php 
				if(isset($_POST['submit'])){
					$reg = new userReg();
					$rs=$reg->register("mente");
				    if($rs=="double"){
					?>
					<div class="login-form-links link1 " data-animation="fadeInRightBig" data-animation-delay=".0s" style="background:#ffffd4; text-align:center; padding:5px 20px 10px;">
                    <h4 class="red" style="color:red;">Warning ! No Bp Anda Telah Terdaftar Sebelumnya.</h4>
                    <span class="green">Anda mengalami masalah ? Hubungi LMAI (cp : ).</span>
                	</div>	
					<?php
					}
				}
				?>
					<div class="section-title reg-header " data-animation="fadeInDown">
                        <h3>Buat Account Mentee Disini </h3>

                    </div>
                    <div class="clearfix">
                        <div class="col-sm-6 registration-left-section  " data-animation="fadeInUp">
                            <div class="reg-content">
                                <div class="textbox-wrap">
                                    <div class="input-group">
                                        <span class="input-group-addon "><i class="icon-user icon-color"></i></span>
                                        <input type="text" name="nama" class="form-control " placeholder=" &nbsp;Nama Lengkap" required="required" />
                                    </div>
                                </div>
       							<div class="textbox-wrap">
                                    <div class="input-group">
                                        <span class="input-group-addon "><i class="icon-comments icon-color"></i></span>
										<select class="form-control" name="gender" placeholder="jurusan" required>
												<option value="">- Gender -</option>
												<option value="L">Laki-Laki</option>
												<option value="P">Perempuan</option>
										</select>
                                    </div>
                                </div>
								<div class="textbox-wrap">
                                    <div class="input-group">
                                        <span class="input-group-addon "><i class="icon-group icon-color"></i></span>
										<select class="form-control" name="jurusan" placeholder="jurusan" required><option value="">- Jurusan / Prodi -</option>
										<?php //include('../lib/Class.php');
										$a = new dbAkses();
										$fak = $a->select("select * from fakultas"); 
										for($i=0; $i<$a->baris; $i++){
										   echo'<optgroup label="Fakultas '.$fak[$i][1].'">';
										   $b = new dbAkses();
										   $jur = $b->select("select* from jurusan where jurusan.id_fakultas=".$fak[$i][0]." ");
										   for($j=0; $j<$b->baris; $j++){echo'<option value="'.$jur[$j][0].'">'.$jur[$j][1].'</option>';}
										   echo'</optgroup>';  
										}?>
										</select>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6 registration-right-section " data-animation="fadeInUp">
                            <div class="reg-content">
                                <div class="textbox-wrap">
                                    <div class="input-group">
                                        <span class="input-group-addon "><i class="icon-user icon-color"></i></span>
                                        <input type="text" name="id" class="form-control " placeholder="NIM / BP" required="required" pattern='\d\d\d\d\d\d\d\d\d\d' />
                                    </div>
                                </div>
                                <div class="textbox-wrap">
                                    <div class="input-group">
                                        <span class="input-group-addon "><i class="icon-key icon-color"></i></span>
                                        <input type="password" name="password" id="password" class="form-control " placeholder="Password min 6 character" required="" pattern="[a-zA-Z0-9]{6,40}" />
                                    </div>
                                </div>
                                <div class="textbox-wrap">
                                    <div class="input-group">
                                        <span class="input-group-addon "><i class="icon-key icon-color"></i></span>
                                        <input type="password" name="cpassword" id="cpassword" name="cpassword" required onfocus="app.validatePass('password', this);" oninput="app.validatePass('password', this);" class="form-control " placeholder="Confirm-Password" />
                                    </div>
                                </div>
								
                            </div>
                        </div>
                    </div>
                    <div class="registration-form-action clearfix " data-animation="fadeInUp" data-animation-delay=".15s">
                        <a href="./" class="btn btn-success pull-left blue-btn ">
                            <i class="icon-chevron-left"></i>&nbsp; &nbsp;Back To Login  
                        </a>
                        <button type="submit" name="submit" class="btn btn-success pull-right green-btn ">Register Now &nbsp; <i class="icon-chevron-right"></i></button>

                    </div>
		          </form>
            </div>



        </div>
    </section>
<?php }else if($page=="newmentor"){ 
	$a= new dbAkses();
	$kode=$a->select("select kode from kode_mentor");
    $keyword=$_POST['keyword'];
	if ($keyword==$kode[0][0]){ ?>
<!--===================================================================================================================
CREATE NEW ACCOUNT MENTOR
====================================================================================================================-->
    
    <section class="colorBg2 colorBg" id="demo2" data-panel="second">
        <div class=" container">
            <br />
            <br />
            <!-- #region Registration Form -->
            <div class="registration-form-section">
                <?php 
				if(isset($_POST['submit'])){
					$reg = new userReg();
					$rs=$reg->register("mentor");
				    if($rs=="double"){
					?>
					<div class="login-form-links link1 " data-animation="fadeInRightBig" data-animation-delay=".0s" style="background:#ffffd4; text-align:center; padding:5px 20px 10px;">
                    <h4 class="red" style="color:red;">Warning ! No Bp Anda Telah Terdaftar Sebelumnya.</h4>
                    <span class="green">Anda mengalami masalah ? Hubungi LMAI (cp : ).</span>
                	</div>	
					<?php
					}
				}
				?>
				<form method="post" action="" onsubmit="return validasi();">
                    <div class="section-title reg-header " data-animation="fadeInDown">
                        <h3>Buat Account Mentor Disini </h3>
                    </div>
					<div class="clearfix">
                        <div class="col-sm-6 registration-left-section  " data-animation="fadeInUp">
                            <div class="reg-content">
                                <div class="textbox-wrap">
                                    <div class="input-group">
										<input type="hidden" name="keyword" value="<?php echo$keyword; ?>" />
                                        <span class="input-group-addon "><i class="icon-user icon-color"></i></span>
                                        <input type="text" name="nama" class="form-control " placeholder=" &nbsp;Nama Lengkap" required="required" />
                                    </div>
                                </div>
       							<div class="textbox-wrap">
                                    <div class="input-group">
                                        <span class="input-group-addon "><i class="icon-comments icon-color"></i></span>
										<select class="form-control" name="gender" placeholder="jurusan" required>
												<option value="">- Gender -</option>
												<option value="L">Ikhwan</option>
												<option value="P">Akhwat</option>
										</select>
                                    </div>
                                </div>
								<div class="textbox-wrap">
                                    <div class="input-group">
                                        <span class="input-group-addon "><i class="icon-group icon-color"></i></span>
										<select class="form-control" name="jurusan" placeholder="jurusan" required><option value="">- Jurusan / Prodi -</option>
										<?php //include('../lib/Class.php');
										$a = new dbAkses();
										$fak = $a->select("select * from fakultas"); 
										for($i=0; $i<$a->baris; $i++){
										   echo'<optgroup label="Fakultas '.$fak[$i][1].'">';
										   $b = new dbAkses();
										   $jur = $b->select("select* from jurusan where jurusan.id_fakultas=".$fak[$i][0]." ");
										   for($j=0; $j<$b->baris; $j++){echo'<option value="'.$jur[$j][0].'">'.$jur[$j][1].'</option>';}
										   echo'</optgroup>';  
										}?>
										</select>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6 registration-right-section " data-animation="fadeInUp">
                            <div class="reg-content">
                                <div class="textbox-wrap">
                                    <div class="input-group">
                                        <span class="input-group-addon "><i class="icon-user icon-color"></i></span>
                                        <input type="text" name="id" class="form-control " placeholder="NIM / BP" required="required" pattern='\d\d\d\d\d\d\d\d\d\d' />
                                    </div>
                                </div>
                                <div class="textbox-wrap">
                                    <div class="input-group">
                                        <span class="input-group-addon "><i class="icon-key icon-color"></i></span>
                                        <input type="password" name="password" id="password" class="form-control " placeholder="Password min 6 character" required="" pattern="[a-zA-Z0-9]{6,40}" />
                                    </div>
                                </div>
                                <div class="textbox-wrap">
                                    <div class="input-group">
                                        <span class="input-group-addon "><i class="icon-key icon-color"></i></span>
                                        <input type="password" name="cpassword" id="cpassword" name="cpassword" required onfocus="app.validatePass('password', this);" oninput="app.validatePass('password', this);" class="form-control " placeholder="Confirm-Password" />
                                    </div>
                                </div>
								
                            </div>
                        </div>
                    </div>
                    <div class="registration-form-action clearfix " data-animation="fadeInUp" data-animation-delay=".15s">
                        <a href="./" class="btn btn-success pull-left blue-btn ">
                            <i class="icon-chevron-left"></i>&nbsp; &nbsp;Back To Login  
                        </a>
                        <button type="submit" name="submit" class="btn btn-success pull-right green-btn ">Register Now &nbsp; <i class="icon-chevron-right"></i></button>

                    </div>
		          </form>
            </div>



        </div>
    </section>
	
	
	<?php }else{ ?>
<!--===================================================================================================================
CHECK IT OUT
====================================================================================================================-->
    <section class="colorBg3 colorBg" id="demo3" data-panel="third">
        <div class=" container">
            <div class="forgot-password-section" data-animation="bounceInLeft">
            <?php if ($keyword!=null){  ?>
                <div class="login-form-links link1 " data-animation="fadeInRightBig" data-animation-delay=".0s" style="background:#FFD4FF; text-align:center;">
                    <h2 class="red" style="color:red;">Key Word Salah.</h2>
                    <span class="blue">Belum Punya Keyword Mentor ?</span>
					<br />
                    <span>Hubungi admin LMAI Pusat atau Admin Fakultas.</span>
                </div>		
		    <?php } ?>
            
			
			    <div class="section-title">
                    <h3 style="text-align:center;">Antum Adalah Mentor ?</h3>
                </div>
                <div class="forgot-content">
                    <form action="./?page=newmentor" method="post">
                        <div class="textbox-wrap">
                            <div class="input-group">
                                <span class="input-group-addon "><i class="icon-key icon-color"></i></span>
                                <input type="password" name="keyword" class="form-control " placeholder="KeyWord" required="required" />
                            </div>
                        </div>
                        <div class="forget-form-action clearfix">
                            <a class="btn btn-success pull-left blue-btn" href="./"><i class="icon-chevron-left"></i>&nbsp;&nbsp;Back  </a>
                            <button type="submit" class="btn btn-success pull-right green-btn">Submit &nbsp;&nbsp; <i class="icon-chevron-right"></i></button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>


<?php } }else if($page=="forgot"){ ?>
<!--===================================================================================================================
FORGOT 
====================================================================================================================-->

    <section class="colorBg3 colorBg" id="demo3" data-panel="third">
        <div class=" container">
            <br />
            <br />
            <br />
			
            <div class="forgot-password-section" data-animation="bounceInLeft">
            <?php 
			if(isset($_POST['kirimemail'])){
				$email=$_POST['email'];
				$forgot= new forgotPass();
				$forgot->kirimEmail($email);
				
				$keyword="";
				if ($keyword!=null){  ?>
                <div class="login-form-links link1 " data-animation="fadeInRightBig" data-animation-delay=".0s" style="background:#FFD4FF; text-align:center;">
                    <h2 class="red" style="color:red;">Maaf, Anda Belum Terdaftar.</h2>
                    <span class="blue">Anda Ingin Melaporkan Permasalahan ?</span>
					<br />
                    <span>Hubungi admin LMAI Pusat atau Admin Fakultas.</span>
                </div>		
		    <?php } 
			} ?>
			
			
    
				<div class="section-title">
                    <h3>Lupa Password ?</h3>
                </div>
                <div class="forgot-content">
                    <form method="post" action="./?page=forgot">
                        
                        <div class="textbox-wrap">
                            <div class="input-group">
                                <span class="input-group-addon "><i class="icon-envelope icon-color"></i></span>
                                <input type="email" name="email" class="form-control " placeholder="Email Anda" required="required" />
                            </div>
                        </div>
                        <div class="forget-form-action clearfix">
                            <a class="btn btn-success pull-left blue-btn" href="./"><i class="icon-chevron-left"></i>&nbsp;&nbsp;Back  </a>
                            <button type="submit" name="kirimemail" class="btn btn-success pull-right green-btn">Submit &nbsp;&nbsp; <i class="icon-chevron-right"></i></button>
                        </div>
                    </form>
                </div>
            </div>


        </div>
    </section>
<?php }else{ ?>
<!--===================================================================================================================
LOGIN 
====================================================================================================================-->
    <section class="colorBg1 colorBg" id="demo1" data-panel="first">
        <div class=" container" style="margin-top:-30px; padding:0px;">
            <div class="login-form-section" >
                <div class="login-content " data-animation="bounceIn">
                    <form action="./?page=a" method="post">
                        <?php 
						if(isset($_POST['submit'])){
							$ses = new userSession();
							$rs=$ses->userLogin();
				    		if($rs=="failed"){
								?>
								<div class="login-form-links link1 " data-animation="fadeInRightBig" data-animation-delay=".0s" style="background:#FFD4FF; text-align:center; padding:5px 20px 10px;">
                    			<h4 class="red" style="color:#fff;" >Warning ! Username atau Password Anda Salah.</h4>
                				</div>	
								<?php
							}
						}
						?>

						<div class="section-title" style="text-align:center;">
                            <h4>Assalamu'alaikum.</h4> 
							<h3>Log In Portal LMAI</h3>
                        </div>
                        <div class="textbox-wrap">
                            <div class="input-group">
                                <span class="input-group-addon "><i class="icon-user icon-color"></i></span>
                                <input type="text" name="user" required="required" class="form-control" placeholder="Username" />
                            </div>
                        </div>
                        <div class="textbox-wrap">
                            <div class="input-group">
                                <span class="input-group-addon "><i class="icon-key icon-color"></i></span>
                                <input type="password" name="pass" required="required" class="form-control " placeholder="Password" />
                            </div>
                        </div>
                        <div class="login-form-action clearfix">
                            <div class="checkbox pull-left">
                            </div>
                            <button type="submit" name="submit" class="btn btn-success pull-right green-btn">LogIn &nbsp; <i class="icon-chevron-right"></i></button>
                        </div>
                    </form>
                </div>
                <div class="login-form-links link1 " data-animation="fadeInLeftBig" data-animation-delay=".2s">
                    <h4 class="blue">Belum Punya Account Mentoring?</h4>
                    <span>La Tahzan !</span>
                    <a href="./?page=newmente" class="blue">Click Disini</a>
                    <span>untuk Register & </span>
                    <a href="./?page=newmentor" class="blue">Click Disini</a>
                    <span>untuk Register Khusus Mentor</span>
                    
                </div>
                <div class="login-form-links link2 " data-animation="fadeInRightBig" data-animation-delay=".4s" style="margin-bottom:-40px;">
                    <h4 class="green">Lupa Password?</h4>
                    <span>La Tahzan !</span>
                    <a href="./?page=forgot" class="green">Click Disini</a>
                    <span>Untuk mendapatkannya kembali</span>
                </div>
            </div>
        </div>
    </section>
<?php
}
?>
    <script src="js/bootstrap.js"></script>
    <script src="js/respond.src.js"></script>
    <script src="js/jquery.icheck.js"></script>
    <script src="js/placeholders.min.js"></script>
    <script src="js/waypoints.min.js"></script>
    <script src="js/jquery.panelSnap.js"></script>

    <script type="text/javascript">
        $(function () {
            $("input").iCheck({
                checkboxClass: 'icheckbox_square-blue',
                increaseArea: '20%' // optional
            });
            $(".dark input").iCheck({
                checkboxClass: 'icheckbox_polaris',
                increaseArea: '20%' // optional
            });
            $(".form-control").focus(function () {
                $(this).closest(".textbox-wrap").addClass("focused");
            }).blur(function () {
                $(this).closest(".textbox-wrap").removeClass("focused");
            });

            //On Scroll Animations


            if ($(window).width() >= 968 && !Modernizr.touch && Modernizr.cssanimations) {

                $("body").addClass("scroll-animations-activated");
                $('[data-animation-delay]').each(function () {
                    var animationDelay = $(this).data("animation-delay");
                    $(this).css({
                        "-webkit-animation-delay": animationDelay,
                        "-moz-animation-delay": animationDelay,
                        "-o-animation-delay": animationDelay,
                        "-ms-animation-delay": animationDelay,
                        "animation-delay": animationDelay
                    });

                });
                $('[data-animation]').waypoint(function (direction) {
                    if (direction == "down") {
                        $(this).addClass("animated " + $(this).data("animation"));

                    }
                }, {
                    offset: '90%'
                }).waypoint(function (direction) {
                    if (direction == "up") {
                        $(this).removeClass("animated " + $(this).data("animation"));

                    }
                }, {
                    offset: $(window).height() + 1
                });
            }

            //End On Scroll Animations


            $(".main-nav a[href]").click(function () {
                var scrollElm = $(this).attr("href");

                $("html,body").animate({ scrollTop: $(scrollElm).offset().top }, 500);

                $(".main-nav a[href]").removeClass("active");
                $(this).addClass("active");
            });




            if ($(window).width() > 1000 && !Modernizr.touch) {
                var options = {
                    $menu: ".main-nav",
                    menuSelector: 'a',
                    panelSelector: 'section',
                    namespace: '.panelSnap',
                    onSnapStart: function () { },
                    onSnapFinish: function ($target) {
                        $target.find('input:first').focus();
                    },
                    directionThreshold: 50,
                    slideSpeed: 200
                };
                $('body').panelSnap(options);

            }

            $(".colorBg a[href]").click(function () {
                var scrollElm = $(this).attr("href");

                $("html,body").animate({ scrollTop: $(scrollElm).offset().top }, 500);

                return false;
            });


           

        });
    </script>

</body>
</html>
