<?php
include('Class.php');
error_reporting(0);
$tablename =$_GET['table'];
$id =$_GET['id'];
$length=$_GET['length'];
$paksa=$_GET['paksa'];

$aks = new dbAkses();
$relasi=array();
$relasi['fakultas']=array("jurusan");
$relasi['jurusan']=array("null");
$relasi['mat_pel']=array("null");
$relasi['amalanyaumi']=array("null");
$relasi['admin_f']=array("null");
$relasi['admin_p']=array("null");
$relasi['ket_shift']=array("null");
$relasi['timeline']=array("null");
	


	if($paksa=="1"){
   		$data=$aks->delete("delete from ".$tablename." where id='".$id."'");		
		for($i=0; $i<10; $i++){
       		if ($relasi[$tablename][$i]!=null){
				$check=$relasi[$tablename][$i];
	      		$sql="delete from ".$check." where id_".$tablename."='".$id."'";
	   	  		echo$status=$aks->delete($sql);
   	    	}
   	   		else{$i=10;}
		}
	}else{
		
		if($length <= 1){
                        		
			$str="";
			$bolehdihapus=false;
			for($i=0; $i<10; $i++){

   	   			if ($relasi[$tablename][$i]!=null){
          	        $check=$relasi[$tablename][$i];
					if($check!="null"){
	      				$sql="select count(*) from ".$check." where id_".$tablename."='".$id."'";
	      				$status=$aks->select($sql);
						if($status[0][0]>0){
	         				$bolehdihapus=false;
		     				$str.=$check.", ";
	  	  				}else{
	         		 		$bolehdihapus=true;
	      				}
					}else{$bolehdihapus=true;}
       			}else{
				    $i=10;
				}
    		}

    		if($bolehdihapus==true){
	    		//$data="dihapus";
	    		echo$data=$aks->delete("delete from ".$tablename." where id='".$id."'");
    		}else{
			    echo$data='Data ini sedang digunakan oleh data '.$str.'. *Penghapusan data induk secara paksa akan mengakibatkan penghapusan pada data anak. <a href="#logoutConfirm" class="label label-danger logoutConfirm_open" onclick="hapuspaksa()">hapus paksa</a>';
    		}
		}else{
		    $id=explode(",",$id);
			
			for($j=0; $j<$length; $j++){
			   $str="";
			   $bolehdihapus=false;
			   
			   for($i=0; $i<10; $i++){
   	   			   if ($relasi[$tablename][$i]!=null){
          	           
					   $check=$relasi[$tablename][$i];
	      			   if($check!="null"){
	      			
					   		$sql="select count(*) from ".$check." where id_".$tablename."='".$id[$i]."'";
	      			   		$status=$aks->select($sql);
	      			   		if($status[0][0]>0){
	         					$bolehdihapus=false;
		     					$str.=$check.", ";
	  	  			   		}else{
	         		 			$bolehdihapus=true;
	      			   		}
					   }else{$bolehdihapus=true;}
       			   }else{$i=10;}
    		   }   
			}
			for($j=0; $j<$length; $j++){
			   if($bolehdihapus==true){
			        $sql="delete from ".$tablename." where id='".$id[$j]."'";
	    			$data=$aks->delete($sql);
    		   }else{
        			$data='Tidak Bisa Dihapus, Data ini sedang digunakan oleh data <strong>'.$str.'</strong> *Silahkan hapus data satu persatu';
    		   }
			}
			echo$data;
		}
		
	}
?>