<?php 
include_once 'dbcon.php';

if(isset($_POST['add_video']))
{

				$vid_name=$_FILES['video']['name'];
				$vid_name_without_ext = substr($vid_name, 0, strrpos($vid_name, '.')); 

              $vid_temp_loc=$_FILES['video']['tmp_name'];
              $vid_store="upload/".$vid_name;
              move_uploaded_file($vid_temp_loc, $vid_store);


              ?>
              <input type="hidden" id="video_name" value="<?php echo $vid_name_without_ext; ?>">
              <input type="hidden" id="video_path" value="<?php echo "http://localhost/dars/$vid_store"; ?>">
              <?php

	$q="insert into uncat_video(title , url) values('$vid_name_without_ext', 'http://localhost/dars/$vid_store')";
	$res=mysqli_query($con, $q);
	if($res)
	{


	?>

	<script type="text/javascript">
		name=document.getElementById('video_name').value;
		path=document.getElementById('video_path').value;

		alert("video uploaded successfully\n"+"name: "+name+"\n"+"path: "+path);
	window.location.href="index.php";

	</script>

	<?php
	}
}

?>


