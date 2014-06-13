<?php
//require_once "Class.php";
class security /*extends dbKontrol*/{
   function replace($str){
      $str =str_replace('"', "''", $str);
	  $str =str_replace("'", "''", $str);
      $str =str_replace("$", "", $str);
      $str =str_replace("#", "", $str);
      $str =str_replace(";", "", $str);
      $str =str_replace("%", "", $str);
      $str = strip_tags($str);
      return $str;
   }
   function escape($str){
	  $this->dbBuka();
	  $str = mysqli_real_escape_string($this->conn,$str);
	  return $str;
   }
}
?>