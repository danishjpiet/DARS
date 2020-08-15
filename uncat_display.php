<?php 

include_once 'dbcon.php';
include_once 'db_function.php';

	$q="select * from uncat_video";
	$res=mysqli_query($con, $q);
	$num=mysqli_num_rows($res);
	if($num>0)
	{
		while ($data=mysqli_fetch_array($res)) {
			?>
			<tr>
				<td><?php echo $data['title']; ?></td>
				<td><a href="<?php echo $data['url']; ?>"> <?php echo $data['url']; ?> </a></td>


<?php
				$result=getDB("category");
				$num=mysqli_num_rows($result);
				if($num>0)
				{
					?>
					<td>
					<select name="category" id="category" onchange="changeFunc(<?php echo $data['id']; ?>)">
					<option value=""></option>	
					<?php
					while ($row=mysqli_fetch_array($result)) {
						?>
						<option value="<?php echo $row['video_category']; ?>"><?php echo $row['video_category']; ?></option>

							  
						<?php
					}
					
					?>
					
					</select>
					</td>
					<?php
				}
			?>

				

				<td><button class="btn btn-success" onclick=editData()>edit</button></td>
				<td><button class="btn btn-success" onclick=deleteData(<?php echo $data['id']; ?>)>delete</button></td>
			</tr>

			<?php
		}
	}
	

?>

<script type="text/javascript">
	
function changeFunc(id) {
    var cat = document.getElementById("category");
    var selectedValue = cat.options[cat.selectedIndex].value;
    alert(selectedValue);

    if(!selectedValue=='')
    {

    	 $.ajax({

			url:"move_video_cat.php",
			type:"post",
			data:{id:id,cat:selectedValue},
			success : function(data){
				displayUnCatData();
				displayCatData(this.id);

			}
		});


    }
        

   }



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

$.ajax({

			url:"cat_display.php",
			type:"post",
			data:{id:id},
			success : function(data){
				$("#tabledata2").html(data);
			}
		});

}



function deleteData(id) {

    	 $.ajax({
			url:"delete_uncat.php",
			type:"post",
			data:{id:id},
			success:function(data){
				displayUnCatData();
				displayCatData(this.id);

			}
		});
   }



</script>