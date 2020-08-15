<?php 

include_once 'dbcon.php';
include_once 'db_function.php';

if (isset($_POST['id'])) {
	
?>

<script type="text/javascript">
	alert("aSome");
</script>

<?php
$id=$_POST['id'];



$result=getDB("cat_video", "id", $id);
$num=mysqli_num_rows($result);
if($num>0)
{

	$row=mysqli_fetch_array($result);
	$title=$row['title'];
	$url=$row['url'];
	$res=insertDB("uncat_video", "title", "url", $title, $url);
	if($res)
	{

		deleteDB("cat_video", "id", $id);
		header("location:index.php");
	}
	
}


}


?>
