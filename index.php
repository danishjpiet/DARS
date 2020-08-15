<?php include_once 'db_function.php'; ?>
<?php include_once 'dbcon.php'; ?>
<!DOCTYPE html>
<html>
<head>
	<title>DARS</title>

<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
  <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css"> 
  <script type="text/javascript" src="https://js.stripe.com/v2/"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

</head>
<body>

<div class="bg-primary text-center mt-5">
	

<form method="post" id="vidForm" name="vidForm" action="upload.php" enctype="multipart/form-data" onsubmit="return validateFile()">
	<input type="file" name="video" id="video" multiple accept=".mp4, .mkv"/>
	<input type="submit" class="btn btn-success" name="add_video" id="add_video" value="add video"/>

</form>
</div>


<div class="container">            
  <table class="table table-hover">
    <thead>
      <tr>
        
			<?php
				$res=getDB("uncat_video");
				$num=mysqli_num_rows($res);
				if($num>0)
				{
					?>
					<th>Title</th>
	        		<th>URL</th>
					<?php	
				}
			?>


        <?php
				$res=getDB("category");
				$num=mysqli_num_rows($res);
				if($num>0)
				{
				?>
				<th>Move to Category</th>
				<?php	
				}
			?>
      </tr>
    </thead>
    <tbody id="tabledata1">
      
    </tbody>
  </table>
</div>





<div class="bg-primary text-center mt-5">
<form method="post" action="insert.php" id="catForm" name="catForm" onsubmit="return validateCat()">
	<input type="text" name="cat" style="width: 300px" id="cat" placeholder="type new category" />
	<input type="submit" class="btn btn-success" name="add_cat" id="add_cat" value="add Category"/>

</form>
</div>

<div class="mt-5  bg-secondary"></div>

	<?php 

	$qy="select distinct * from category";
	$resultt=mysqli_query($con, $qy );
	$num1=mysqli_num_rows($resultt);
	if($num1>0){

		while ($row=mysqli_fetch_assoc($resultt)) {

			$video_cat=$row['video_category'];
	
	?>

			<button class="btn btn-success float-right mr-2	" onclick="displayCatData(<?php echo $row['id'] ?>)" ><?php echo $row['video_category']; ?></button>

<?php
		}
	}

	 ?>
	


<?php
				$res=getDB("cat_video");
				$num=mysqli_num_rows($res);
				if($num>0)
				{
				?>




				<div class="container">
				           
				  <table id="tabledata2" class="table table-hover">
				    
				    
				  </table>
				</div>


<?php	
				}
			?>
<script type="text/javascript">
	
window.addEventListener("load", displayUnCatData);

function displayUnCatData(){

$.ajax({

			url:"uncat_display.php",
			type:"post",
			success : function(data){
				$("#tabledata1").html(data);
			}
		});

}




function displayCatData(id){

alert(id);
$.ajax({

			url:"cat_display.php",
			type:"post",
			data:{id:id},
			success : function(data){
				$("#tabledata2").html(data);
			}
		});

}



function validateFile() {
var file = document.getElementById("video");
  

			if(file.files.length == 0 ){ 
                alert("please select file");
                return false;
            } 

}

function validateCat() {
var cat = document.getElementById("cat").value;
  

			if(cat == '' ){ 
                alert("please fill the category");
                return false;
            } 

}



</script>

</body>
</html>