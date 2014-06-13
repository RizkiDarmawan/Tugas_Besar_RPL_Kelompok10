<?php	
class dbKontrol{
   private $host = "localhost";
   private $user = "root";
   private $pass = "";
   private $dbname = "lmai2014";
   protected $conn;
   
   protected function dbBuka(){
      $this->conn = mysqli_connect("$this->host","$this->user","$this->pass","$this->dbname");
	  if(mysqli_connect_error()){
	     echo "Koneksi Ke DB Error Karena : ".mysqli_connect_error();
	  }
   }
   protected function dbTutup(){
      mysqli_close($this->conn);
   }
}

class dbAkses extends dbKontrol{
   public $baris;
   public $kolom;
   function __construct(){
      $this->dbBuka();
   }
   function select($sql){
	  $exec= mysqli_query($this->conn,$sql);
	  if(!$exec){echo"##### SQL ANDA SALAH ##### ! ".mysqli_error($this->conn); exit();}

	  $array = array();
	  
	  $this->baris = 0;
	  while($data=mysqli_fetch_row($exec)){
	     $field=mysqli_num_fields($exec);
		 for($this->kolom=0; $this->kolom<$field; $this->kolom++){
		    $array[$this->baris][$this->kolom] = $data[$this->kolom];
		 }
		 $this->baris++;
	  }
	  return $array;
   }
   
   function input($sql){
      $result= mysqli_query($this->conn,$sql);
	  if(!$result){
  		 return mysqli_error($this->conn);
	  }
	  else{
	     return "Success";
	  }
   }
   function update($sql){
      $result= mysqli_query($this->conn,$sql)or die (mysqli_error($this->conn));
	  if(!$result){
  		 return mysqli_error($this->conn);
	  }
	  else{
	     return "Success";
	  }
   }
   function delete($sql){
      $result=mysqli_query($this->conn,$sql) or die (mysqli_error($this->conn));
	  if(!$result){
  		 return mysqli_error($this->conn);
	  }
	  else{
	     return "Success";
	  }
   }
}

?>