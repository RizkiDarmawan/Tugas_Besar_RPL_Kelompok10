<?php
function cekMyCookie(){
		echo (isset($_COOKIE['rememberme']))?"Cookie telah aktif":"Cookie tidak aktif";
	}
cekMyCookie();
	

?>