<?php
include_once 'db_function.php';
include_once 'dbcon.php';
if(isset($_POST[id]))
{
	$id=$_POST[id];
	$res=deleteDB("cat_video", "id", $id);

}




?>