
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <title>Eternity Forms Preview</title>

    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link href="css/preview.css" rel="stylesheet" />
    <script src="js/modernizr.js"></script>
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
    
   
    <section class="colorBg4 colorBg dark" id="demo4" data-panel="fourth">
        <div class=" container">

            <div class="login-form-section">
                <div class="login-content " data-animation="bounceIn">
                    <form>
                        <div class="section-title">
                            <h3>Change Your Password</h3>
                        </div>
                        <div class="textbox-wrap">
                            <div class="input-group">
                                <span class="input-group-addon "><i class="icon-key icon-color"></i></span>
                                <input type="password" name="pass" id="pass" required="required" pattern="[a-zA-Z0-9]{6,40}" class="form-control " placeholder="Password" />
                            </div>
                        </div>
                        <div class="textbox-wrap">
                            <div class="input-group">
                                <span class="input-group-addon "><i class="icon-key icon-color"></i></span>
                                <input type="password" name="cpass" onfocus="app.validatePass('pass', this);" oninput="app.validatePass('pass', this);" required="required" class="form-control " placeholder="ConfPassword" />
                            </div>
                        </div>
                        <div class="login-form-action clearfix">
                            
                            <button type="submit" class="btn btn-success pull-right green-btn">Change &nbsp; <i class="icon-chevron-right"></i></button>
                        </div>
                    </form>
                </div>
               
            </div>



        </div>
    </section>
    
    <script src="js/jquery-1.9.1.js"></script>
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
