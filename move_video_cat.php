<?php 
include_once 'dbcon.php';
include_once 'db_function.php';
$id=$_POST['id'];
$cat=$_POST['cat'];
$result=getDB("uncat_video", "id", $id);
$num=mysqli_num_rows($result);
if($num>0)
{
	$row=mysqli_fetch_array($result);
	$title=$row['title'];
	$url=$row['url'];
	$res=insertDB("cat_video", "title", "url", "video_category", $title, $url, $cat);
	if($res)
	{
		deleteDB("uncat_video", "id", $id);
		return $id;
	}	
}

?>