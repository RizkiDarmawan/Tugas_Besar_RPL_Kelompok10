<?php
class webApp{
     
     public $page; 
     
     function __Construct(){
	        
			
     }
     function page(){
            if(isset($_GET['pg'])){
			    $this->page=$_GET['pg'];
                return include($this->page.'.php');
            }
     }
}

?>