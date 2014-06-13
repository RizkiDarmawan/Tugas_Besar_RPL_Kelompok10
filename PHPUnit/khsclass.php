<?php
Class khs{
	
	public $angkatotal=0;
	
	function predikat($nilai){
	    
		$pred="";
		
		if($nilai<=100&&$nilai>=80){
		    $pred="A";
		}else if($nilai<=79&&$nilai>=70){
			$pred="B";
		}else if($nilai<=69&&$nilai>=50){
			$pred="C";
		}else if($nilai<=49&&$nilai>=40){
			$pred="D";
		}else if($nilai<=39&&$nilai>=0){
		    $pred="E";
		}else{
		    $pred="unknow";
		}
		return$pred;
	}

}
?>