<?php
function admin()
{
$quyen=$_SESSION["level"];
if($quyen==1) return true;
}
?>