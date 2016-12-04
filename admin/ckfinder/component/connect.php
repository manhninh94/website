<?php
// kết nối với database
   $connect =mysql_connect("localhost","root","") or die ("Lỗi kết nối cơ sở dữ liệu");
  
 // Ket noi với data ss
   mysql_select_db("data ss",$connect) or die ("Lỗi kết nối cơ sở dữ liệu");
   
?>