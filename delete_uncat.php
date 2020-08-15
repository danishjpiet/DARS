<?php
include_once 'db_function.php';
include_once 'dbcon.php';
if(isset($_POST[id]))
{
	$id=$_POST[id];
	$res=deleteDB("uncat_video", "id", $id);

}




?>