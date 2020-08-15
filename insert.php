<?php 
include_once 'dbcon.php';

if(isset($_POST['add_cat']))
{
	$category=$_POST['cat'];
	$q="insert into category(video_category) values('$category')";
	$res=mysqli_query($con, $q);
	if($res)
	{


	?>

	<script type="text/javascript">
		alert("category inserted");
		window.location.href="index.php";
	</script>

	<?php
	}
}

?>