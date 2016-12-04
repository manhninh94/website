<?php 
    $con=mysql_connect("mysql.hostinger.vn","u427760457_root","ninh1994");
    if(!$con)
    {
    die('could not connect'. mysql_error());
    }
    mysql_select_db("u427760457_simso",$con);
    mysql_set_charset('utf-8');
?>